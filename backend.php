<?php
// ============================================================
// Sunfra Poultry - EMS Backend Server (PHP Version)
// Connects to MySQL and exposes REST API for the frontend
// ============================================================

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");

// Handle CORS Preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// ── MySQL Connection ──────────────────────────────────────────
require_once 'database.php';

// ── Auto-Create Tables if Not Exists ─────────────────────────
try {
    // kus_farms
    $pdo->exec("CREATE TABLE IF NOT EXISTS kus_farms (
        id VARCHAR(50) PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        owner_name VARCHAR(255),
        phone VARCHAR(50),
        location VARCHAR(255),
        status VARCHAR(50) DEFAULT 'Active',
        remarks TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // kus_customers
    $pdo->exec("CREATE TABLE IF NOT EXISTS kus_customers (
        id VARCHAR(50) PRIMARY KEY,
        type VARCHAR(100),
        name VARCHAR(255) NOT NULL,
        phone VARCHAR(50),
        location VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // kus_purchases
    $pdo->exec("CREATE TABLE IF NOT EXISTS kus_purchases (
        id VARCHAR(50) PRIMARY KEY,
        farm_id VARCHAR(50),
        farm_name VARCHAR(255),
        owner_name VARCHAR(255),
        phone VARCHAR(50),
        location VARCHAR(255),
        date DATE,
        trays INT DEFAULT 0,
        loose_eggs INT DEFAULT 0,
        total_eggs INT DEFAULT 0,
        price_per_egg DECIMAL(10,4) DEFAULT 0,
        purchase_amount DECIMAL(15,2) DEFAULT 0,
        additional_cost JSON,
        total_additional_cost DECIMAL(15,2) DEFAULT 0,
        total_cost DECIMAL(15,2) DEFAULT 0,
        average_cost DECIMAL(10,4) DEFAULT 0,
        is_batched TINYINT(1) DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // kus_batches (Inventory/Godown)
    $pdo->exec("CREATE TABLE IF NOT EXISTS kus_batches (
        id VARCHAR(50) PRIMARY KEY,
        purchase_id VARCHAR(50),
        farm_name VARCHAR(255),
        owner_name VARCHAR(255),
        phone VARCHAR(50),
        location VARCHAR(255),
        total_eggs INT DEFAULT 0,
        available_eggs INT DEFAULT 0,
        average_cost DECIMAL(10,4) DEFAULT 0,
        godown_number VARCHAR(100),
        status VARCHAR(50) DEFAULT 'Active',
        damaged_eggs INT DEFAULT 0,
        returned_eggs INT DEFAULT 0,
        total_damaged_logged INT DEFAULT 0,
        total_returned_logged INT DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // kus_processing_logs
    $pdo->exec("CREATE TABLE IF NOT EXISTS kus_processing_logs (
        id VARCHAR(50) PRIMARY KEY,
        batch_id VARCHAR(50),
        previous_eggs INT DEFAULT 0,
        broken INT DEFAULT 0,
        dirty INT DEFAULT 0,
        damaged INT DEFAULT 0,
        scrap INT DEFAULT 0,
        total_loss_eggs INT DEFAULT 0,
        good_eggs INT DEFAULT 0,
        expenses JSON,
        total_processing_expense DECIMAL(15,2) DEFAULT 0,
        new_batch_cost DECIMAL(15,2) DEFAULT 0,
        new_cost_per_egg DECIMAL(10,4) DEFAULT 0,
        date DATE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // kus_sales
    $pdo->exec("CREATE TABLE IF NOT EXISTS kus_sales (
        id VARCHAR(50) PRIMARY KEY,
        batch_id VARCHAR(50),
        customer_id VARCHAR(50),
        customer_name VARCHAR(255),
        customer_type VARCHAR(100),
        date DATE,
        trays_sold INT DEFAULT 0,
        loose_eggs INT DEFAULT 0,
        total_eggs_sold INT DEFAULT 0,
        selling_price DECIMAL(10,4) DEFAULT 0,
        sales_revenue DECIMAL(15,2) DEFAULT 0,
        transportation_cost DECIMAL(15,2) DEFAULT 0,
        transportation_details JSON,
        charges JSON,
        net_profit DECIMAL(15,2) DEFAULT 0,
        profit_per_egg DECIMAL(10,4) DEFAULT 0,
        invoice_number VARCHAR(100),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // kus_return_logs
    $pdo->exec("CREATE TABLE IF NOT EXISTS kus_return_logs (
        id VARCHAR(50) PRIMARY KEY,
        date DATE,
        customer VARCHAR(100),
        batch_no VARCHAR(50),
        sale_id VARCHAR(50),
        sales_date DATE,
        sold_trays INT DEFAULT 0,
        sold_eggs INT DEFAULT 0,
        damaged INT DEFAULT 0,
        scrap INT DEFAULT 0,
        dirty INT DEFAULT 0,
        small_eggs INT DEFAULT 0,
        big_eggs INT DEFAULT 0,
        airline_eggs INT DEFAULT 0,
        total_returned INT DEFAULT 0,
        returned_trays INT DEFAULT 0,
        loose_eggs INT DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // kus_recovery_logs
    $pdo->exec("CREATE TABLE IF NOT EXISTS kus_recovery_logs (
        id VARCHAR(50) PRIMARY KEY,
        customer_name VARCHAR(255),
        phone VARCHAR(50),
        location VARCHAR(255),
        sales JSON,
        total_revenue DECIMAL(15,2) DEFAULT 0,
        date DATE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

} catch (\PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Table verification/creation failed: " . $e->getMessage()]);
    exit();
}

// ── Routing Mappings ──────────────────────────────────────────
$TABLE_MAP = [
    'farms'          => 'kus_farms',
    'purchases'      => 'kus_purchases',
    'batches'        => 'kus_batches',
    'processingLogs' => 'kus_processing_logs',
    'customers'      => 'kus_customers',
    'sales'          => 'kus_sales',
    'returnLogs'     => 'kus_return_logs',
    'recoveryLogs'   => 'kus_recovery_logs'
];

// Determine the key from request parameter
$key = $_GET['key'] ?? null;
if (!$key || !isset($TABLE_MAP[$key])) {
    http_response_code(400);
    echo json_encode(["error" => "Invalid or missing 'key' parameter."]);
    exit();
}

$table = $TABLE_MAP[$key];
$method = $_SERVER['REQUEST_METHOD'];

// ── GET Request — Retrieve All Records ────────────────────────
if ($method === 'GET') {
    try {
        $stmt = $pdo->query("SELECT * FROM {$table} ORDER BY created_at ASC");
        $rows = $stmt->fetchAll();
        $result = [];

        foreach ($rows as $row) {
            $result[] = mapRowToJs($key, $row);
        }

        echo json_encode($result);
    } catch (\Exception $e) {
        http_response_code(500);
        echo json_encode(["error" => $e->getMessage()]);
    }
    exit();
}

// ── POST Request — Overwrite and Persist State Array ──────────
if ($method === 'POST') {
    $input = file_get_contents('php://input');
    $records = json_decode($input, true);

    if (!is_array($records)) {
        http_response_code(400);
        echo json_encode(["error" => "Request body must be a JSON array."]);
        exit();
    }

    try {
        $pdo->beginTransaction();

        // Clear existing records
        $pdo->exec("DELETE FROM {$table}");

        // Build INSERT SQL dynamically
        $sql = getInsertSql($key);
        $stmt = $pdo->prepare($sql);

        foreach ($records as $rec) {
            $params = mapJsToRow($key, $rec);
            $stmt->execute($params);
        }

        $pdo->commit();
        echo json_encode(["success" => true, "count" => count($records)]);
    } catch (\Exception $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        http_response_code(500);
        echo json_encode(["error" => $e->getMessage()]);
    }
    exit();
}

// ── Row Mapping Utilities ─────────────────────────────────────

function mapRowToJs($key, $row) {
    switch ($key) {
        case 'farms':
            return [
                'id' => $row['id'],
                'name' => $row['name'],
                'ownerName' => $row['owner_name'],
                'phone' => $row['phone'],
                'location' => $row['location'],
                'status' => $row['status'],
                'remarks' => $row['remarks']
            ];
        case 'purchases':
            return [
                'id' => $row['id'],
                'farmId' => $row['farm_id'],
                'farmName' => $row['farm_name'],
                'ownerName' => $row['owner_name'],
                'phone' => $row['phone'],
                'location' => $row['location'],
                'date' => $row['date'],
                'trays' => (int)$row['trays'],
                'looseEggs' => (int)$row['loose_eggs'],
                'totalEggs' => (int)$row['total_eggs'],
                'pricePerEgg' => (float)$row['price_per_egg'],
                'purchaseAmount' => (float)$row['purchase_amount'],
                'additionalCost' => json_decode($row['additional_cost'] ?? '{}', true),
                'totalAdditionalCost' => (float)$row['total_additional_cost'],
                'totalCost' => (float)$row['total_cost'],
                'averageCost' => (float)$row['average_cost'],
                'isBatched' => (bool)$row['is_batched']
            ];
        case 'batches':
            return [
                'id' => $row['id'],
                'purchaseId' => $row['purchase_id'],
                'farmName' => $row['farm_name'],
                'ownerName' => $row['owner_name'],
                'phone' => $row['phone'],
                'location' => $row['location'],
                'totalEggs' => (int)$row['total_eggs'],
                'availableEggs' => (int)$row['available_eggs'],
                'averageCost' => (float)$row['average_cost'],
                'godownNumber' => $row['godown_number'],
                'status' => $row['status'],
                'damagedEggs' => (int)$row['damaged_eggs'],
                'returnedEggs' => (int)$row['returned_eggs'],
                'totalDamagedLogged' => (int)$row['total_damaged_logged'],
                'totalReturnedLogged' => (int)$row['total_returned_logged']
            ];
        case 'processingLogs':
            return [
                'id' => $row['id'],
                'batchId' => $row['batch_id'],
                'previousEggs' => (int)$row['previous_eggs'],
                'broken' => (int)$row['broken'],
                'dirty' => (int)$row['dirty'],
                'damaged' => (int)$row['damaged'],
                'scrap' => (int)$row['scrap'],
                'totalLossEggs' => (int)$row['total_loss_eggs'],
                'goodEggs' => (int)$row['good_eggs'],
                'expenses' => json_decode($row['expenses'] ?? '{}', true),
                'totalProcessingExpense' => (float)$row['total_processing_expense'],
                'newBatchCost' => (float)$row['new_batch_cost'],
                'newCostPerEgg' => (float)$row['new_cost_per_egg'],
                'date' => $row['date']
            ];
        case 'customers':
            return [
                'id' => $row['id'],
                'type' => $row['type'],
                'name' => $row['name'],
                'phone' => $row['phone'],
                'location' => $row['location']
            ];
        case 'sales':
            return [
                'id' => $row['id'],
                'batchId' => $row['batch_id'],
                'customerId' => $row['customer_id'],
                'customerName' => $row['customer_name'],
                'customerType' => $row['customer_type'],
                'date' => $row['date'],
                'traysSold' => (int)$row['trays_sold'],
                'looseEggs' => (int)$row['loose_eggs'],
                'totalEggsSold' => (int)$row['total_eggs_sold'],
                'sellingPrice' => (float)$row['selling_price'],
                'salesRevenue' => (float)$row['sales_revenue'],
                'transportationCost' => (float)$row['transportation_cost'],
                'transportationDetails' => json_decode($row['transportation_details'] ?? '{}', true),
                'charges' => json_decode($row['charges'] ?? '{}', true),
                'netProfit' => (float)$row['net_profit'],
                'profitPerEgg' => (float)$row['profit_per_egg'],
                'invoiceNumber' => $row['invoice_number']
            ];
        case 'returnLogs':
            return [
                'id' => $row['id'],
                'date' => $row['date'],
                'customer' => $row['customer'],
                'batchNo' => $row['batch_no'],
                'saleId' => $row['sale_id'],
                'salesDate' => $row['sales_date'],
                'soldTrays' => (int)$row['sold_trays'],
                'soldEggs' => (int)$row['sold_eggs'],
                'damaged' => (int)$row['damaged'],
                'scrap' => (int)$row['scrap'],
                'dirty' => (int)$row['dirty'],
                'small' => (int)$row['small_eggs'],
                'big' => (int)$row['big_eggs'],
                'airline' => (int)$row['airline_eggs'],
                'totalReturned' => (int)$row['total_returned'],
                'returnedTrays' => (int)$row['returned_trays'],
                'looseEggs' => (int)$row['loose_eggs']
            ];
        case 'recoveryLogs':
            return [
                'id' => $row['id'],
                'customerName' => $row['customer_name'],
                'phone' => $row['phone'],
                'location' => $row['location'],
                'sales' => json_decode($row['sales'] ?? '{}', true),
                'totalRevenue' => (float)$row['total_revenue'],
                'date' => $row['date']
            ];
    }
}

function mapJsToRow($key, $o) {
    switch ($key) {
        case 'farms':
            return [
                ':id' => $o['id'],
                ':name' => $o['name'],
                ':owner_name' => $o['ownerName'] ?? null,
                ':phone' => $o['phone'] ?? null,
                ':location' => $o['location'] ?? null,
                ':status' => $o['status'] ?? 'Active',
                ':remarks' => $o['remarks'] ?? null
            ];
        case 'purchases':
            return [
                ':id' => $o['id'],
                ':farm_id' => $o['farmId'] ?? null,
                ':farm_name' => $o['farmName'] ?? null,
                ':owner_name' => $o['ownerName'] ?? null,
                ':phone' => $o['phone'] ?? null,
                ':location' => $o['location'] ?? null,
                ':date' => $o['date'] ?? null,
                ':trays' => (int)($o['trays'] ?? 0),
                ':loose_eggs' => (int)($o['looseEggs'] ?? 0),
                ':total_eggs' => (int)($o['totalEggs'] ?? 0),
                ':price_per_egg' => (float)($o['pricePerEgg'] ?? 0),
                ':purchase_amount' => (float)($o['purchaseAmount'] ?? 0),
                ':additional_cost' => json_encode($o['additionalCost'] ?? (object)[]),
                ':total_additional_cost' => (float)($o['totalAdditionalCost'] ?? 0),
                ':total_cost' => (float)($o['totalCost'] ?? 0),
                ':average_cost' => (float)($o['averageCost'] ?? 0),
                ':is_batched' => !empty($o['isBatched']) ? 1 : 0
            ];
        case 'batches':
            return [
                ':id' => $o['id'],
                ':purchase_id' => $o['purchaseId'] ?? null,
                ':farm_name' => $o['farmName'] ?? null,
                ':owner_name' => $o['ownerName'] ?? null,
                ':phone' => $o['phone'] ?? null,
                ':location' => $o['location'] ?? null,
                ':total_eggs' => (int)($o['totalEggs'] ?? 0),
                ':available_eggs' => (int)($o['availableEggs'] ?? 0),
                ':average_cost' => (float)($o['averageCost'] ?? 0),
                ':godown_number' => $o['godownNumber'] ?? null,
                ':status' => $o['status'] ?? 'Active',
                ':damaged_eggs' => (int)($o['damagedEggs'] ?? 0),
                ':returned_eggs' => (int)($o['returnedEggs'] ?? 0),
                ':total_damaged_logged' => (int)($o['totalDamagedLogged'] ?? 0),
                ':total_returned_logged' => (int)($o['totalReturnedLogged'] ?? 0)
            ];
        case 'processingLogs':
            return [
                ':id' => $o['id'],
                ':batch_id' => $o['batchId'] ?? null,
                ':previous_eggs' => (int)($o['previousEggs'] ?? 0),
                ':broken' => (int)($o['broken'] ?? 0),
                ':dirty' => (int)($o['dirty'] ?? 0),
                ':damaged' => (int)($o['damaged'] ?? 0),
                ':scrap' => (int)($o['scrap'] ?? 0),
                ':total_loss_eggs' => (int)($o['totalLossEggs'] ?? 0),
                ':good_eggs' => (int)($o['goodEggs'] ?? 0),
                ':expenses' => json_encode($o['expenses'] ?? (object)[]),
                ':total_processing_expense' => (float)($o['totalProcessingExpense'] ?? 0),
                ':new_batch_cost' => (float)($o['newBatchCost'] ?? 0),
                ':new_cost_per_egg' => (float)($o['newCostPerEgg'] ?? 0),
                ':date' => $o['date'] ?? null
            ];
        case 'customers':
            return [
                ':id' => $o['id'],
                ':type' => $o['type'] ?? null,
                ':name' => $o['name'],
                ':phone' => $o['phone'] ?? null,
                ':location' => $o['location'] ?? null
            ];
        case 'sales':
            return [
                ':id' => $o['id'],
                ':batch_id' => $o['batchId'] ?? null,
                ':customer_id' => $o['customerId'] ?? null,
                ':customer_name' => $o['customerName'] ?? null,
                ':customer_type' => $o['customerType'] ?? null,
                ':date' => $o['date'] ?? null,
                ':trays_sold' => (int)($o['traysSold'] ?? 0),
                ':loose_eggs' => (int)($o['looseEggs'] ?? 0),
                ':total_eggs_sold' => (int)($o['totalEggsSold'] ?? 0),
                ':selling_price' => (float)($o['sellingPrice'] ?? 0),
                ':sales_revenue' => (float)($o['salesRevenue'] ?? 0),
                ':transportation_cost' => (float)($o['transportationCost'] ?? 0),
                ':transportation_details' => json_encode($o['transportationDetails'] ?? (object)[]),
                ':charges' => json_encode($o['charges'] ?? (object)[]),
                ':net_profit' => (float)($o['netProfit'] ?? 0),
                ':profit_per_egg' => (float)($o['profitPerEgg'] ?? 0),
                ':invoice_number' => $o['invoiceNumber'] ?? null
            ];
        case 'returnLogs':
            return [
                ':id' => $o['id'],
                ':date' => $o['date'] ?? null,
                ':customer' => $o['customer'] ?? null,
                ':batch_no' => $o['batchNo'] ?? null,
                ':sale_id' => $o['saleId'] ?? null,
                ':sales_date' => $o['salesDate'] ?? null,
                ':sold_trays' => (int)($o['soldTrays'] ?? 0),
                ':sold_eggs' => (int)($o['soldEggs'] ?? 0),
                ':damaged' => (int)($o['damaged'] ?? 0),
                ':scrap' => (int)($o['scrap'] ?? 0),
                ':dirty' => (int)($o['dirty'] ?? 0),
                ':small_eggs' => (int)($o['small'] ?? 0),
                ':big_eggs' => (int)($o['big'] ?? 0),
                ':airline_eggs' => (int)($o['airline'] ?? 0),
                ':total_returned' => (int)($o['totalReturned'] ?? 0),
                ':returned_trays' => (int)($o['returnedTrays'] ?? 0),
                ':loose_eggs' => (int)($o['looseEggs'] ?? 0)
            ];
        case 'recoveryLogs':
            return [
                ':id' => $o['id'],
                ':customer_name' => $o['customerName'] ?? null,
                ':phone' => $o['phone'] ?? null,
                ':location' => $o['location'] ?? null,
                ':sales' => json_encode($o['sales'] ?? (object)[]),
                ':total_revenue' => (float)($o['totalRevenue'] ?? 0),
                ':date' => $o['date'] ?? null
            ];
    }
}

function getInsertSql($key) {
    switch ($key) {
        case 'farms':
            return "INSERT INTO kus_farms (id, name, owner_name, phone, location, status, remarks) 
                    VALUES (:id, :name, :owner_name, :phone, :location, :status, :remarks)";
        case 'purchases':
            return "INSERT INTO kus_purchases (id, farm_id, farm_name, owner_name, phone, location, date, trays, loose_eggs, total_eggs, price_per_egg, purchase_amount, additional_cost, total_additional_cost, total_cost, average_cost, is_batched) 
                    VALUES (:id, :farm_id, :farm_name, :owner_name, :phone, :location, :date, :trays, :loose_eggs, :total_eggs, :price_per_egg, :purchase_amount, :additional_cost, :total_additional_cost, :total_cost, :average_cost, :is_batched)";
        case 'batches':
            return "INSERT INTO kus_batches (id, purchase_id, farm_name, owner_name, phone, location, total_eggs, available_eggs, average_cost, godown_number, status, damaged_eggs, returned_eggs, total_damaged_logged, total_returned_logged) 
                    VALUES (:id, :purchase_id, :farm_name, :owner_name, :phone, :location, :total_eggs, :available_eggs, :average_cost, :godown_number, :status, :damaged_eggs, :returned_eggs, :total_damaged_logged, :total_returned_logged)";
        case 'processingLogs':
            return "INSERT INTO kus_processing_logs (id, batch_id, previous_eggs, broken, dirty, damaged, scrap, total_loss_eggs, good_eggs, expenses, total_processing_expense, new_batch_cost, new_cost_per_egg, date) 
                    VALUES (:id, :batch_id, :previous_eggs, :broken, :dirty, :damaged, :scrap, :total_loss_eggs, :good_eggs, :expenses, :total_processing_expense, :new_batch_cost, :new_cost_per_egg, :date)";
        case 'customers':
            return "INSERT INTO kus_customers (id, type, name, phone, location) 
                    VALUES (:id, :type, :name, :phone, :location)";
        case 'sales':
            return "INSERT INTO kus_sales (id, batch_id, customer_id, customer_name, customer_type, date, trays_sold, loose_eggs, total_eggs_sold, selling_price, sales_revenue, transportation_cost, transportation_details, charges, net_profit, profit_per_egg, invoice_number) 
                    VALUES (:id, :batch_id, :customer_id, :customer_name, :customer_type, :date, :trays_sold, :loose_eggs, :total_eggs_sold, :selling_price, :sales_revenue, :transportation_cost, :transportation_details, :charges, :net_profit, :profit_per_egg, :invoice_number)";
        case 'returnLogs':
            return "INSERT INTO kus_return_logs (id, date, customer, batch_no, sale_id, sales_date, sold_trays, sold_eggs, damaged, scrap, dirty, small_eggs, big_eggs, airline_eggs, total_returned, returned_trays, loose_eggs) 
                    VALUES (:id, :date, :customer, :batch_no, :sale_id, :sales_date, :sold_trays, :sold_eggs, :damaged, :scrap, :dirty, :small_eggs, :big_eggs, :airline_eggs, :total_returned, :returned_trays, :loose_eggs)";
        case 'recoveryLogs':
            return "INSERT INTO kus_recovery_logs (id, customer_name, phone, location, sales, total_revenue, date) 
                    VALUES (:id, :customer_name, :phone, :location, :sales, :total_revenue, :date)";
    }
}
?>
