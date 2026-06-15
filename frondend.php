<!DOCTYPE html><!-- v2 -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunfra Poultry - Egg Management System</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

:root {
    --bg-dark: #F8FAFC;
    /* Slate 50 - clean light background */
    --sidebar-bg: #FFFFFF;
    /* Pure white sidebar */
    --card-bg: #FFFFFF;
    /* Pure white card backgrounds */
    --card-border: #E2E8F0;
    /* Slate 200 border for soft separation */
    --input-bg: #FFFFFF;
    /* White inputs */
    --input-border: #CBD5E1;
    /* Slate 300 input border */

    --color-primary: #D97706;
    /* Warm Amber (600) for high readability in light mode */
    --color-primary-hover: #B45309;
    /* Darker Amber (700) */
    --color-primary-glow: rgba(217, 119, 6, 0.08);

    --color-success: #059669;
    /* Emerald 600 */
    --color-success-bg: rgba(5, 150, 105, 0.08);
    --color-danger: #E11D48;
    /* Rose 600 */
    --color-danger-bg: rgba(225, 29, 72, 0.08);
    --color-info: #2563EB;
    /* Blue 600 */
    --color-info-bg: rgba(37, 99, 235, 0.08);

    --text-primary: #0F172A;
    /* Slate 900 for dark text */
    --text-secondary: #475569;
    /* Slate 600 for lighter text */
    --text-muted: #64748B;
    /* Slate 500 for muted elements */

    --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px 0 rgba(0, 0, 0, 0.03);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.01);
    --shadow-glow: 0 0 15px rgba(217, 119, 6, 0.1);

    --transition-fast: 0.15s ease;
    --transition-normal: 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    --border-radius: 12px;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background-color: var(--bg-dark);
    color: var(--text-primary);
    overflow-x: hidden;
    line-height: 1.5;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 700;
    letter-spacing: -0.025em;
}

/* Scrollbar Styles */
::-webkit-scrollbar {
    width: 6px;
    height: 6px;
}

::-webkit-scrollbar-track {
    background: var(--bg-dark);
}

::-webkit-scrollbar-thumb {
    background: rgba(15, 23, 42, 0.15);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--color-primary);
}

/* Layout */
.app-container {
    display: flex;
    min-height: 100vh;
}

/* Sidebar Styling */
.sidebar {
    width: 260px;
    background-color: var(--sidebar-bg);
    border-right: 1px solid var(--card-border);
    display: flex;
    flex-direction: column;
    position: fixed;
    height: 100vh;
    z-index: 100;
    transition: var(--transition-normal);
}

.sidebar-header {
    padding: 24px;
    display: flex;
    align-items: center;
    gap: 12px;
    border-bottom: 1px solid var(--card-border);
}

.logo-icon {
    width: 38px;
    height: 38px;
    background: linear-gradient(135deg, var(--color-primary), #FBBF24);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFFFFF;
    font-weight: 800;
    font-size: 1.25rem;
    box-shadow: 0 4px 12px rgba(217, 119, 6, 0.3);
}

.logo-text {
    font-size: 1.15rem;
    font-weight: 800;
    background: linear-gradient(to right, #0F172A, #475569);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.sidebar-nav {
    flex: 1;
    padding: 24px 16px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    overflow-y: auto;
}

.nav-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    border-radius: var(--border-radius);
    color: var(--text-secondary);
    text-decoration: none;
    font-weight: 500;
    font-size: 0.925rem;
    cursor: pointer;
    transition: var(--transition-fast);
    border: 1px solid transparent;
}

.nav-item:hover {
    color: var(--text-primary);
    background-color: rgba(15, 23, 42, 0.03);
}

.nav-item.active {
    color: var(--color-primary);
    background-color: var(--color-primary-glow);
    border-color: rgba(217, 119, 6, 0.15);
    font-weight: 600;
}

.nav-item-icon {
    font-size: 1.25rem;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 24px;
}

/* Main Panel */
.main-content {
    margin-left: 260px;
    flex: 1;
    min-height: 100vh;
    padding: 40px;
    display: flex;
    flex-direction: column;
    gap: 32px;
    transition: margin-left var(--transition-normal), padding var(--transition-normal);
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.page-title h1 {
    font-size: 1.85rem;
    margin-bottom: 4px;
    background: linear-gradient(to right, #0F172A, #334155);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.page-title p {
    color: var(--text-secondary);
    font-size: 0.95rem;
}

.header-actions {
    display: flex;
    align-items: center;
    gap: 16px;
}

.date-badge {
    background-color: var(--card-bg);
    border: 1px solid var(--card-border);
    box-shadow: var(--shadow-sm);
    padding: 8px 16px;
    border-radius: 30px;
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--text-secondary);
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Tab Panels */
.tab-panel {
    display: none;
    animation: fadeIn var(--transition-normal);
}

.tab-panel.active {
    display: flex;
    flex-direction: column;
    gap: 28px;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(8px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Dashboard Analytics Widgets */
.metrics-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 20px;
}

.metric-card {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: var(--border-radius);
    padding: 24px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    box-shadow: var(--shadow-sm);
    position: relative;
    overflow: hidden;
    transition: transform var(--transition-fast), border-color var(--transition-fast);
}

.metric-card:hover {
    transform: translateY(-2px);
    border-color: var(--color-primary);
    box-shadow: var(--shadow-md);
}

.metric-card::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background-color: var(--accent-color, var(--color-primary));
}

.metric-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.metric-title {
    color: var(--text-secondary);
    font-size: 0.875rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.metric-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background-color: var(--accent-glow, var(--color-primary-glow));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent-color, var(--color-primary));
    font-size: 1.15rem;
}

.metric-value {
    font-size: 1.85rem;
    font-weight: 700;
    letter-spacing: -0.02em;
}

.metric-footer {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.8rem;
    color: var(--text-muted);
}

.metric-trend {
    font-weight: 600;
    display: flex;
    align-items: center;
}

.metric-trend.up {
    color: var(--color-success);
}

.metric-trend.down {
    color: var(--color-danger);
}

/* Dashboard Content Grid */
.dashboard-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 24px;
}

@media (max-width: 1200px) {
    .dashboard-grid {
        grid-template-columns: 1fr;
    }
}

/* Card General Styling */
.panel-card {
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: var(--border-radius);
    padding: 24px;
    backdrop-filter: blur(12px);
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.panel-card-title {
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--text-primary);
    border-bottom: 1px solid var(--card-border);
    padding-bottom: 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Charts */
.chart-container {
    position: relative;
    width: 100%;
    height: 320px;
    display: flex;
    justify-content: center;
    align-items: center;
}

canvas {
    width: 100% !important;
    height: 100% !important;
}

/* Workflow Form + Grid Layouts */
.workflow-layout {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

/* Panel layout (same as workflow, used in recovery section) */
.panel-layout {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

/* Forms */
.form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-bottom: 16px;
}

.form-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 16px;
}

label {
    font-size: 0.825rem;
    font-weight: 600;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

input,
select,
textarea {
    background-color: var(--input-bg);
    border: 1px solid var(--input-border);
    border-radius: 8px;
    padding: 12px 14px;
    color: var(--text-primary);
    font-family: inherit;
    font-size: 0.95rem;
    transition: var(--transition-fast);
    width: 100%;
}

input:focus,
select:focus,
textarea:focus {
    outline: none;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px var(--color-primary-glow);
}

input:disabled,
select:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

input[type="number"] {
    font-variant-numeric: tabular-nums;
}

/* Buttons */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 12px 20px;
    font-family: inherit;
    font-size: 0.925rem;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    transition: var(--transition-fast);
    border: none;
}

.btn-primary {
    background: linear-gradient(135deg, var(--color-primary), #F59E0B);
    color: #FFFFFF;
    box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
}

.btn-primary:hover {
    background: linear-gradient(135deg, var(--color-primary-hover), var(--color-primary));
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(217, 119, 6, 0.35);
}

.btn-secondary {
    background-color: var(--card-bg);
    border: 1px solid var(--card-border);
    box-shadow: var(--shadow-sm);
    color: var(--text-primary);
    border: 1px solid var(--card-border);
}

.btn-secondary:hover {
    background-color: var(--bg-dark);
    border-color: var(--input-border);
}

.btn-danger {
    background-color: var(--color-danger);
    color: white;
}

.btn-danger:hover {
    background-color: #E11D48;
}

.btn-icon-only {
    width: 42px;
    height: 42px;
    padding: 0;
    border-radius: 8px;
}

/* Tables styling */
.table-container {
    overflow-x: auto;
    border-radius: 8px;
    border: 1px solid var(--card-border);
    background-color: var(--card-bg);
}

table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
    font-size: 0.9rem;
}

th {
    background-color: var(--bg-dark);
    color: var(--text-secondary);
    font-weight: 600;
    padding: 14px 18px;
    border-bottom: 1px solid var(--card-border);
    text-transform: uppercase;
    font-size: 0.775rem;
    letter-spacing: 0.05em;
}

td {
    padding: 14px 18px;
    border-bottom: 1px solid var(--card-border);
    color: var(--text-primary);
    vertical-align: middle;
}

tr:last-child td {
    border-bottom: none;
}

tr:hover td {
    background-color: rgba(15, 23, 42, 0.015);
}

/* Badges */
.badge {
    display: inline-flex;
    align-items: center;
    padding: 4px 10px;
    border-radius: 30px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.025em;
}

.badge-success {
    background-color: var(--color-success-bg);
    color: var(--color-success);
}

.badge-danger {
    background-color: var(--color-danger-bg);
    color: var(--color-danger);
}

.badge-info {
    background-color: var(--color-info-bg);
    color: var(--color-info);
}

.badge-primary {
    background-color: var(--color-primary-glow);
    color: var(--color-primary);
}

/* Live Calculation Panel */
.live-calc-box {
    background-color: rgba(217, 119, 6, 0.04);
    border: 1px dashed rgba(217, 119, 6, 0.25);
    border-radius: 8px;
    padding: 16px;
    margin-top: 10px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.calc-row {
    display: flex;
    justify-content: space-between;
    font-size: 0.85rem;
}

.calc-label {
    color: var(--text-secondary);
}

.calc-value {
    font-weight: 600;
    color: var(--text-primary);
}

.calc-value.highlight {
    color: var(--color-primary);
    font-weight: 700;
}

/* Modal / Popup */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(15, 23, 42, 0.4);
    backdrop-filter: blur(8px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 200;
    opacity: 0;
    pointer-events: none;
    transition: opacity var(--transition-normal);
}

.modal-overlay.active {
    opacity: 1;
    pointer-events: all;
}

.modal-content {
    background-color: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: var(--border-radius);
    width: 460px;
    max-width: 90%;
    box-shadow: var(--shadow-lg);
    transform: scale(0.95);
    transition: transform var(--transition-normal);
    overflow: hidden;
}

.modal-overlay.active .modal-content {
    transform: scale(1);
}

.modal-header {
    padding: 20px 24px;
    border-bottom: 1px solid var(--card-border);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-title {
    font-size: 1.15rem;
    font-weight: 700;
}

.modal-close {
    background: none;
    border: none;
    color: var(--text-secondary);
    font-size: 1.5rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    transition: var(--transition-fast);
}

.modal-close:hover {
    color: var(--text-primary);
    background-color: var(--bg-dark);
}

.modal-body {
    padding: 24px;
}

.modal-footer {
    padding: 16px 24px;
    border-top: 1px solid var(--card-border);
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    background-color: var(--bg-dark);
}

/* Search bar styling */
.table-header-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    margin-bottom: 16px;
}

.search-input-wrapper {
    position: relative;
    max-width: 320px;
    width: 100%;
}

.search-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
    pointer-events: none;
}

.search-input {
    padding-left: 38px !important;
}

.empty-state {
    padding: 40px;
    text-align: center;
    color: var(--text-muted);
}

.empty-state-icon {
    font-size: 2.5rem;
    margin-bottom: 12px;
    color: rgba(15, 23, 42, 0.08);
}

/* Toast Notification */
.toast-container {
    position: fixed;
    bottom: 24px;
    right: 24px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    z-index: 300;
}

.toast {
    background-color: var(--card-bg);
    border-left: 4px solid var(--color-primary);
    box-shadow: var(--shadow-lg);
    border-top: 1px solid var(--card-border);
    border-right: 1px solid var(--card-border);
    border-bottom: 1px solid var(--card-border);
    border-radius: 0 8px 8px 0;
    padding: 14px 20px;
    color: var(--text-primary);
    font-size: 0.875rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 10px;
    transform: translateX(120%);
    animation: slideIn 0.3s forwards cubic-bezier(0.16, 1, 0.3, 1);
}

@keyframes slideIn {
    to {
        transform: translateX(0);
    }
}

.toast.toast-success {
    border-left-color: var(--color-success);
}

.toast.toast-danger {
    border-left-color: var(--color-danger);
}

/* Custom visual chart items */
.stats-bars {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.stats-bar-item {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.stats-bar-label {
    display: flex;
    justify-content: space-between;
    font-size: 0.85rem;
    color: var(--text-secondary);
}

.stats-bar-track {
    height: 8px;
    background-color: rgba(255, 255, 255, 0.05);
    border-radius: 4px;
    overflow: hidden;
}

.stats-bar-fill {
    height: 100%;
    background: linear-gradient(to right, var(--color-primary), #FBBF24);
    border-radius: 4px;
    width: 0%;
    transition: width 1s ease;
}

.stats-bar-fill.success {
    background: linear-gradient(to right, var(--color-success), #34D399);
}

.stats-bar-fill.danger {
    background: linear-gradient(to right, var(--color-danger), #FB7185);
}

.stats-bar-fill.info {
    background: linear-gradient(to right, var(--color-info), #60A5FA);
}

/* Grid Layout for Analytics */
.analytics-metrics-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

@media (max-width: 992px) {
    .analytics-metrics-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 600px) {
    .analytics-metrics-grid {
        grid-template-columns: 1fr;
    }
}

.tab-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--card-border);
    padding-bottom: 16px;
}

.tab-title {
    font-size: 1.35rem;
    font-weight: 700;
}

.tab-title {
    font-size: 1.35rem;
    font-weight: 700;
}

/* ========== RESPONSIVE LAYOUT ========== */

/* Hamburger toggle — hidden on desktop */
.sidebar-toggle {
    display: none;
    position: fixed;
    top: 14px;
    left: 14px;
    z-index: 300;
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: 8px;
    width: 40px;
    height: 40px;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    cursor: pointer;
    box-shadow: var(--shadow-sm);
    color: var(--text-primary);
}

.sidebar-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(15,23,42,0.35);
    backdrop-filter: blur(2px);
    z-index: 99;
}

/* Large desktop (1400px+) — wider content */
@media (min-width: 1400px) {
    .main-content { padding: 44px 56px; }
}

/* Tablet landscape (1024–1200px) */
@media (max-width: 1200px) {
    .dashboard-grid { grid-template-columns: 1fr; }
    .main-content { padding: 28px 28px; }
}

/* Tablet portrait (768–1024px) */
@media (max-width: 1024px) {
    .sidebar { width: 220px; }
    .main-content { margin-left: 220px; padding: 24px 20px; }
    .metrics-grid { grid-template-columns: repeat(2, 1fr); }
    .analytics-metrics-grid { grid-template-columns: repeat(2, 1fr); }
}

/* Mobile (max 767px) — collapsible sidebar */
@media (max-width: 767px) {
    .sidebar-toggle {
        display: flex;
    }
    .sidebar {
        width: 260px;
        transform: translateX(-100%);
        transition: transform var(--transition-normal);
        z-index: 200;
    }
    .sidebar.open {
        transform: translateX(0);
    }
    .sidebar-overlay.open {
        display: block;
    }
    .main-content {
        margin-left: 0;
        padding: 60px 12px 20px;
    }
    .page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    .header-actions {
        width: 100%;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 8px;
    }
    .metrics-grid { grid-template-columns: 1fr 1fr; gap: 12px; }
    .analytics-metrics-grid { grid-template-columns: 1fr; }
    .dashboard-grid { grid-template-columns: 1fr; }
    .panel-card { padding: 16px; gap: 14px; }
    .panel-card-title { font-size: 1rem; }
    .page-title h1 { font-size: 1.4rem; }
    .tab-panel.active { gap: 16px; }
    /* Inline grids collapse to single column */
    [style*="grid-template-columns"] { grid-template-columns: 1fr !important; }
    .form-row { grid-template-columns: 1fr !important; }
    table { font-size: 0.78rem; }
    th, td { padding: 10px 10px; }
}

/* Small phones (max 480px) */
@media (max-width: 480px) {
    .main-content { padding: 56px 8px 16px; }
    .metrics-grid { grid-template-columns: 1fr; }
    .btn { font-size: 0.85rem; padding: 10px 14px; }
    .page-title h1 { font-size: 1.2rem; }
    .modal-content { width: 96%; }
    th, td { padding: 8px 8px; }
}
</style>
</head>
<body>
    <div class="app-container">
        <!-- Mobile Hamburger Toggle -->
        <button class="sidebar-toggle" id="sidebar-toggle" aria-label="Open Menu">☰</button>
        <!-- Sidebar Overlay (mobile backdrop) -->
        <div class="sidebar-overlay" id="sidebar-overlay"></div>

        <!-- Sidebar Navigation -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo-icon">🐣</div>
                <div class="logo-text">Sunfra Poultry</div>
            </div>
            <nav class="sidebar-nav">
                <a class="nav-item active" data-tab="farms">
                    <span class="nav-item-icon">🚜</span>
                    <span>Farms Master</span>
                </a>
                <a class="nav-item" data-tab="purchases">
                    <span class="nav-item-icon">🛒</span>
                    <span>Purchases</span>
                </a>
                <a class="nav-item" data-tab="inventory">
                    <span class="nav-item-icon">📦</span>
                    <span>Inventory / Godown</span>
                </a>
                <a class="nav-item" data-tab="processing">
                    <span class="nav-item-icon">⚙️</span>
                    <span>Processing</span>
                </a>
                <a class="nav-item" data-tab="customers">
                    <span class="nav-item-icon">👥</span>
                    <span>Customers Master</span>
                </a>
                <a class="nav-item" data-tab="sales">
                    <span class="nav-item-icon">💰</span>
                    <span>Sales Management</span>
                </a>
                <a class="nav-item" data-tab="returns">
                    <span class="nav-item-icon">♻️</span>
                    <span>Return Eggs</span>
                </a>
                <a class="nav-item" data-tab="recovery">
                    <span class="nav-item-icon">🔄</span>
                    <span>Recovery Sales</span>
                </a>
                <a class="nav-item" data-tab="profit">
                    <span class="nav-item-icon">📈</span>
                    <span>Profit Section</span>
                </a>
            </nav>
        </aside>

        <!-- Main Body Panel -->
        <main class="main-content">
            <!-- Header -->
            <header class="page-header">
                <div style="display: flex; align-items: center; gap: 12px;">
                    <div class="page-title">
                        <h1 id="current-tab-title">Farms Master</h1>
                        <p id="current-tab-desc">Manage poultry farm directories, owners, and contact details.</p>
                    </div>
                </div>
                <div class="header-actions">
                    <div class="date-badge">
                        <span>📅</span>
                        <span id="header-date">June 10, 2026</span>
                    </div>
                </div>
            </header>

            <!-- TAB: Farms Master -->
            <section id="farms" class="tab-panel active">
                <div class="workflow-layout">
                    <div class="panel-card">
                        <div class="panel-card-title">Register New Farm</div>
                        <form id="farm-form">
                            <div class="form-group">
                                <label for="farm-name">Farm Name</label>
                                <input type="text" id="farm-name" required placeholder="e.g. Green Valley Farm">
                            </div>
                            <div class="form-group">
                                <label for="farm-owner">Owner Name</label>
                                <input type="text" id="farm-owner" required placeholder="e.g. John Doe">
                            </div>
                            <div class="form-group">
                                <label for="farm-phone">Phone Number</label>
                                <input type="tel" id="farm-phone" required placeholder="e.g. +91 98765 43210">
                            </div>
                            <div class="form-group">
                                <label for="farm-location">Location</label>
                                <input type="text" id="farm-location" required placeholder="e.g. Punjab, India">
                            </div>
                            <div class="form-group">
                                <label for="farm-status">Status</label>
                                <select id="farm-status">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="farm-remarks">Remarks</label>
                                <textarea id="farm-remarks" rows="3" placeholder="Optional comments..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%">Save Farm</button>
                        </form>
                    </div>

                    <div class="panel-card" style="flex: 1;">
                        <div class="table-header-row">
                            <div class="tab-title">Farms Directory</div>
                            <div class="search-input-wrapper">
                                <span class="search-icon">🔍</span>
                                <input type="text" id="farms-search" class="search-input" placeholder="Search farms...">
                            </div>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Farm Name</th>
                                        <th>Owner Name</th>
                                        <th>Phone</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="farms-table-body">
                                    <!-- Dynamic Rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- TAB: Purchases -->
            <section id="purchases" class="tab-panel">
                <div class="workflow-layout">
                    <div class="panel-card">
                        <div class="panel-card-title">Create Purchase Entry</div>
                        <form id="purchase-form">
                            <div class="form-group">
                                <label for="purchase-farm-select">Farm Name</label>
                                <select id="purchase-farm-select" required>
                                    <option value="">-- Select Farm --</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Farm Details (Auto-fetched)</label>
                                <div style="display: flex; flex-direction: column; gap: 4px; font-size: 0.85rem; color: var(--text-secondary); background: rgba(255,255,255,0.02); padding: 10px; border-radius: 6px; border: 1px solid var(--card-border);">
                                    <div>Owner: <span id="p-fetch-owner" style="color:var(--text-primary); font-weight:500;">-</span></div>
                                    <div>Phone: <span id="p-fetch-phone" style="color:var(--text-primary); font-weight:500;">-</span></div>
                                    <div>Location: <span id="p-fetch-location" style="color:var(--text-primary); font-weight:500;">-</span></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="purchase-date">Purchase Date</label>
                                <input type="date" id="purchase-date" required>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="purchase-trays">No. of Trays</label>
                                    <input type="number" id="purchase-trays" min="0" required placeholder="Trays">
                                </div>
                                <div class="form-group">
                                    <label for="purchase-total-eggs-display">Total Eggs</label>
                                    <input type="number" id="purchase-total-eggs-display" readonly style="background-color: var(--bg-dark); cursor: not-allowed; border: 1px solid var(--border-color);" placeholder="Auto calculated">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="purchase-neck-price">NECC Price Per Egg (₹)</label>
                                    <input type="number" id="purchase-neck-price" step="0.01" min="0.01" required placeholder="e.g. 6.00">
                                </div>
                                <div class="form-group">
                                    <label for="purchase-cutting-price">Cutting Price Per Egg (₹)</label>
                                    <input type="number" id="purchase-cutting-price" step="0.01" min="0" required placeholder="e.g. 0.05">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="purchase-actual-price-display">Actual Purchase Price (₹)</label>
                                <input type="text" id="purchase-actual-price-display" readonly style="background-color: rgba(5, 150, 105, 0.08); color: var(--color-success); font-weight: bold; border: 1px dashed var(--color-success); cursor: not-allowed;" placeholder="₹0.00">
                            </div>

                            <div class="form-group" style="margin-top: 16px;">
                                <button type="button" class="btn btn-primary" id="btn-open-expenses-modal" style="width: 100%; justify-content: center; font-size: 1rem; padding: 12px; margin-bottom: 8px;">🚚 Add Transportation & Packaging Costs</button>
                                <div style="font-size: 0.85rem; color: var(--text-secondary); text-align: center;">
                                    Additional Cost: <span id="purchase-add-cost-summary" style="color: var(--color-primary); font-weight:600;">₹0.00</span>
                                </div>
                            </div>

                            <div class="live-calc-box">
                                <div class="calc-row">
                                    <span class="calc-label">Total Eggs:</span>
                                    <span class="calc-value" id="calc-p-total-eggs">0</span>
                                </div>
                                <div class="calc-row">
                                    <span class="calc-label">Purchase Amount:</span>
                                    <span class="calc-value" id="calc-p-amount">₹0.00</span>
                                </div>
                                <div class="calc-row">
                                    <span class="calc-label">Additional Expenses:</span>
                                    <span class="calc-value" id="calc-p-additional">₹0.00</span>
                                </div>
                                <div class="calc-row" style="border-top: 1px dashed rgba(255,255,255,0.1); padding-top: 6px; margin-top: 4px;">
                                    <span class="calc-label" style="font-weight: 600;">Total Landed Cost:</span>
                                    <span class="calc-value highlight" id="calc-p-total-cost">₹0.00</span>
                                </div>
                                <div class="calc-row">
                                    <span class="calc-label">Average Cost Per Egg:</span>
                                    <span class="calc-value highlight" id="calc-p-avg-cost">₹0.00</span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" onclick="showPurchaseBreakdown()" style="width: 100%; margin-top: 8px; justify-content: center; font-size: 0.9rem;">🔍 View Calculation Details</button>

                            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 16px;">Save Purchase</button>
                        </form>
                    </div>

                    <div class="panel-card" style="flex: 1;">
                        <div class="table-header-row">
                            <div class="tab-title">Purchase Entries</div>
                            <div class="search-input-wrapper">
                                <span class="search-icon">🔍</span>
                                <input type="text" id="purchases-search" class="search-input" placeholder="Search purchases...">
                            </div>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Purchase ID</th>
                                        <th>Farm Name</th>
                                        <th>Date</th>
                                        <th>Total Eggs</th>
                                        <th>Add. Cost</th>
                                        <th>Total Cost</th>
                                        <th>Avg. Cost/Egg</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="purchases-table-body">
                                    <!-- Dynamic Rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- TAB: Inventory Batch -->
            <section id="inventory" class="tab-panel">
                <div class="workflow-layout">
                    <div class="panel-card">
                        <div class="panel-card-title">Create Godown Batch</div>
                        <form id="batch-form">
                            <div class="form-group">
                                <label for="batch-purchase-select">Purchase ID</label>
                                <select id="batch-purchase-select" required>
                                    <option value="">-- Select Purchase ID --</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Purchase Details (Auto-fetched)</label>
                                <div style="display: flex; flex-direction: column; gap: 4px; font-size: 0.85rem; color: var(--text-secondary); background: rgba(255,255,255,0.02); padding: 10px; border-radius: 6px; border: 1px solid var(--card-border);">
                                    <div>Farm: <span id="b-fetch-farm" style="color:var(--text-primary); font-weight:500;">-</span></div>
                                    <div>Owner: <span id="b-fetch-owner" style="color:var(--text-primary); font-weight:500;">-</span></div>
                                    <div>Location: <span id="b-fetch-location" style="color:var(--text-primary); font-weight:500;">-</span></div>
                                    <div>Total Eggs: <span id="b-fetch-eggs" style="color:var(--text-primary); font-weight:500;">-</span></div>
                                    <div>Avg Cost Per Egg: <span id="b-fetch-avg-cost" style="color:var(--text-primary); font-weight:500;">-</span></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="batch-godown">Godown Number (Lot)</label>
                                <select id="batch-godown" required>
                                    <option value="">-- Select Lot --</option>
                                    <option value="Lot 1">Lot 1</option>
                                    <option value="Lot 2">Lot 2</option>
                                    <option value="Lot 3">Lot 3</option>
                                    <option value="Lot 4">Lot 4</option>
                                    <option value="Lot 5">Lot 5</option>
                                    <option value="Lot 6">Lot 6</option>
                                    <option value="Lot 7">Lot 7</option>
                                    <option value="Lot 8">Lot 8</option>
                                    <option value="Lot 9">Lot 9</option>
                                    <option value="Lot 10">Lot 10</option>
                                </select>
                            </div>

                            <div class="live-calc-box" style="background-color: rgba(59, 130, 246, 0.04); border-color: rgba(59, 130, 246, 0.25);">
                                <div class="calc-row">
                                    <span class="calc-label" style="color: var(--color-info);">Auto Generated ID:</span>
                                    <span class="calc-value highlight" style="color: var(--color-info);" id="batch-id-preview">BATCH-2026-XXX</span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 16px;">Save Batch</button>
                        </form>
                    </div>

                    <div class="panel-card" style="flex: 1;">
                        <div class="table-header-row">
                            <div class="tab-title">Inventory Stock Batches</div>
                            <div class="search-input-wrapper">
                                <span class="search-icon">🔍</span>
                                <input type="text" id="inventory-search" class="search-input" placeholder="Search inventory...">
                            </div>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Batch Number</th>
                                        <th>Purchase ID</th>
                                        <th>Godown</th>
                                        <th>Available Eggs</th>
                                        <th>Average Cost/Egg</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="inventory-table-body">
                                    <!-- Dynamic Rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- TAB: Processing & Sorting -->
            <section id="processing" class="tab-panel">
                <div class="workflow-layout">
                    <div style="display:flex; flex-direction:column; gap:24px;">

                        <!-- LEFT: Processing Form -->
                        <div class="panel-card">
                            <div class="panel-card-title">⚙️ Process Batch / Lot</div>
                            <form id="processing-form">
                                <input type="hidden" id="proc-id">

                                <div class="form-group">
                                    <label for="proc-batch-select">Select Batch / Lot *</label>
                                    <select id="proc-batch-select" required>
                                        <option value="">-- Select Lot --</option>
                                    </select>
                                </div>

                                <div class="form-group" id="proc-batch-details" style="display:none;">
                                    <label>Batch Details (Auto-fetched)</label>
                                    <div style="display:flex; flex-direction:column; gap:4px; font-size:0.85rem; color:var(--text-secondary); background:rgba(255,255,255,0.02); padding:10px; border-radius:6px; border:1px solid var(--card-border);">
                                        <div>Batch ID: <span id="proc-fetch-id" style="color:var(--text-primary);font-weight:500;">-</span></div>
                                        <div>Farm: <span id="proc-fetch-farm" style="color:var(--text-primary);font-weight:500;">-</span></div>
                                        <div>Godown / Lot: <span id="proc-fetch-godown" style="color:var(--text-primary);font-weight:500;">-</span></div>
                                        <div>Available Eggs: <span id="proc-fetch-eggs" style="color:var(--color-success);font-weight:700;">-</span></div>
                                        <div>Current Cost / Egg: <span id="proc-fetch-cost" style="color:var(--color-primary);font-weight:600;">-</span></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Defective Eggs by Type</label>
                                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px;">
                                        <div class="form-group" style="margin-bottom:0;">
                                            <label for="proc-small">Small Eggs</label>
                                            <input type="number" id="proc-small" min="0" value="0" placeholder="0">
                                        </div>
                                        <div class="form-group" style="margin-bottom:0;">
                                            <label for="proc-damaged">Damaged Eggs</label>
                                            <input type="number" id="proc-damaged" min="0" value="0" placeholder="0">
                                        </div>
                                        <div class="form-group" style="margin-bottom:0;">
                                            <label for="proc-dirty">Dirty Eggs</label>
                                            <input type="number" id="proc-dirty" min="0" value="0" placeholder="0">
                                        </div>
                                        <div class="form-group" style="margin-bottom:0;">
                                            <label for="proc-big">Big Eggs</label>
                                            <input type="number" id="proc-big" min="0" value="0" placeholder="0">
                                        </div>
                                        <div class="form-group" style="margin-bottom:0;">
                                            <label for="proc-scrap">Scrap Eggs</label>
                                            <input type="number" id="proc-scrap" min="0" value="0" placeholder="0">
                                        </div>
                                        <div class="form-group" style="margin-bottom:0;">
                                            <label for="proc-airline">Airline Eggs</label>
                                            <input type="number" id="proc-airline" min="0" value="0" placeholder="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="live-calc-box" style="background-color:rgba(225,29,72,0.04); border-color:rgba(225,29,72,0.25);">
                                    <div class="calc-row">
                                        <span class="calc-label" style="color:var(--color-danger);">Total Defective Eggs:</span>
                                        <span class="calc-value" id="calc-proc-total-defective" style="color:var(--color-danger); font-size:1.05rem;">0</span>
                                    </div>
                                    <div class="calc-row">
                                        <span class="calc-label" style="color:var(--color-danger);">Defective Trays (÷30):</span>
                                        <span class="calc-value" id="calc-proc-defective-trays" style="color:var(--color-danger);">0.00</span>
                                    </div>
                                    <div class="calc-row" style="border-top:1px dashed rgba(5,150,105,0.3); padding-top:8px; margin-top:4px;">
                                        <span class="calc-label" style="color:var(--color-success);">✅ Good Eggs Remaining:</span>
                                        <span class="calc-value highlight" id="calc-proc-good-eggs" style="color:var(--color-success); font-size:1.05rem;">0</span>
                                    </div>
                                    <div class="calc-row">
                                        <span class="calc-label" style="color:var(--color-success);">Good Egg Trays (÷30):</span>
                                        <span class="calc-value" id="calc-proc-good-trays" style="color:var(--color-success);">0.00</span>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top:16px;">
                                    <label>Additional Costs</label>
                                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px;">
                                        <div class="form-group" style="margin-bottom:0;">
                                            <label for="proc-cleaning-cost">Cleaning Cost (₹)</label>
                                            <input type="number" id="proc-cleaning-cost" min="0" step="0.01" value="0" placeholder="0.00">
                                        </div>
                                        <div class="form-group" style="margin-bottom:0;">
                                            <label for="proc-paper-tray-cost">Paper Tray Cost (₹)</label>
                                            <input type="number" id="proc-paper-tray-cost" min="0" step="0.01" value="0" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>

                                <div class="live-calc-box" style="background-color:rgba(217,119,6,0.04); border-color:rgba(217,119,6,0.25);">
                                    <div class="calc-row">
                                        <span class="calc-label">Original Batch Cost:</span>
                                        <span class="calc-value" id="calc-proc-original-cost">₹0.00</span>
                                    </div>
                                    <div class="calc-row">
                                        <span class="calc-label">+ Cleaning Cost:</span>
                                        <span class="calc-value" id="calc-proc-cleaning">₹0.00</span>
                                    </div>
                                    <div class="calc-row">
                                        <span class="calc-label">+ Paper Tray Cost:</span>
                                        <span class="calc-value" id="calc-proc-paper">₹0.00</span>
                                    </div>
                                    <div class="calc-row" style="border-top:1px dashed rgba(217,119,6,0.3); padding-top:8px; margin-top:4px;">
                                        <span class="calc-label" style="color:var(--color-primary); font-weight:600;">🏷️ New Landed Price / Egg:</span>
                                        <span class="calc-value highlight" id="calc-proc-new-cost-per-egg" style="color:var(--color-primary); font-size:1.1rem; font-weight:700;">₹0.0000</span>
                                    </div>
                                </div>

                                <div class="form-group" style="margin-top:16px;">
                                    <label for="proc-date">Processing Date *</label>
                                    <input type="date" id="proc-date" required>
                                </div>

                                <button type="button" class="btn btn-secondary" onclick="showProcessingBreakdown()" style="width:100%; margin-top:8px; justify-content:center; font-size:0.9rem;">🔍 View Calculation Details</button>
                                <button type="submit" class="btn btn-primary" style="width:100%; margin-top:12px;">💾 Save Processing Log</button>
                            </form>
                        </div>

                        <!-- RIGHT: Processing Logs Table -->
                        <div class="panel-card" style="overflow-x:auto;">
                            <div class="table-header-row">
                                <div class="tab-title">Processing Logs</div>
                                <div class="search-input-wrapper">
                                    <span class="search-icon">🔍</span>
                                    <input type="text" id="processing-search" class="search-input" placeholder="Search logs...">
                                </div>
                            </div>
                            <div class="table-container">
                                <table style="min-width:1150px;">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Batch / Lot</th>
                                            <th>Prev. Eggs</th>
                                            <th>Small</th>
                                            <th>Damaged</th>
                                            <th>Dirty</th>
                                            <th>Big</th>
                                            <th>Scrap</th>
                                            <th>Airline</th>
                                            <th>Total Defective</th>
                                            <th>Good Eggs</th>
                                            <th>Cleaning ₹</th>
                                            <th>Paper Tray ₹</th>
                                            <th>New Cost/Egg</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="processing-table-body">
                                        <!-- Dynamic Rows -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <!-- TAB: Customers Master -->
            <section id="customers" class="tab-panel">
                <div class="workflow-layout">
                    <div class="panel-card">
                        <div class="panel-card-title">Add Customer</div>
                        <form id="customer-form">
                            <div class="form-group">
                                <label for="customer-type">Customer Type</label>
                                <select id="customer-type" required>
                                    <option value="Hyperpure">Hyperpure</option>
                                    <option value="Eggoz">Eggoz</option>
                                    <option value="Licious">Licious</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="customer-name">Customer Name</label>
                                <input type="text" id="customer-name" required placeholder="e.g. Licious Central Warehouse">
                            </div>
                            <div class="form-group">
                                <label for="customer-phone">Phone Number</label>
                                <input type="tel" id="customer-phone" required placeholder="e.g. +91 99999 88888">
                            </div>
                            <div class="form-group">
                                <label for="customer-location">Location</label>
                                <input type="text" id="customer-location" required placeholder="e.g. Bangalore, Karnataka">
                            </div>
                            <button type="submit" class="btn btn-primary" style="width: 100%">Save Customer</button>
                        </form>
                    </div>

                    <div class="panel-card" style="flex: 1;">
                        <div class="table-header-row">
                            <div class="tab-title">Customers Directory</div>
                            <div class="search-input-wrapper">
                                <span class="search-icon">🔍</span>
                                <input type="text" id="customers-search" class="search-input" placeholder="Search customers...">
                            </div>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Phone</th>
                                        <th>Location</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="customers-table-body">
                                    <!-- Dynamic Rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- TAB: Sales Management -->
            <section id="sales" class="tab-panel">
                <div class="workflow-layout">
                    <div class="panel-card">
                        <div class="panel-card-title">Create Sales Invoice</div>
                        <form id="sales-form">
                            <div class="form-group">
                                <label for="sales-customer-select">Customer</label>
                                <select id="sales-customer-select" required>
                                    <option value="">-- Select Customer --</option>
                                    <option value="Hyperpure">Hyperpure</option>
                                    <option value="Eggoz">Eggoz</option>
                                    <option value="Licious">Licious</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sales-batch-select">Batch Number</label>
                                <select id="sales-batch-select" required>
                                    <option value="">-- Select Batch --</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Batch Info (Auto-fetched)</label>
                                <div style="display: flex; flex-direction: column; gap: 4px; font-size: 0.85rem; color: var(--text-secondary); background: rgba(255,255,255,0.02); padding: 10px; border-radius: 6px; border: 1px solid var(--card-border);">
                                    <div>Available Stock: <span id="s-fetch-stock" style="color:var(--text-primary); font-weight:500;">-</span></div>
                                    <div>Current Cost Per Egg: <span id="s-fetch-cost" style="color:var(--text-primary); font-weight:500;">-</span></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="sales-trays">Number of Trays Sold</label>
                                    <input type="number" id="sales-trays" min="0" required placeholder="e.g. 100">
                                </div>
                                <div class="form-group">
                                    <label>Total Eggs Sold (Auto)</label>
                                    <div style="font-size: 1.2rem; font-weight: 600; padding: 10px; color: var(--color-primary); background: rgba(59, 130, 246, 0.05); border-radius: 6px; border: 1px dashed rgba(59, 130, 246, 0.3); text-align: center;" id="calc-s-total-eggs-inline">0</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="sales-selling-price">Selling Price Per Egg (₹)</label>
                                <input type="number" id="sales-selling-price" step="0.01" min="0.01" required placeholder="e.g. 7.00">
                            </div>

                            <button type="button" class="btn" id="btn-open-sales-charges-modal" style="width: 100%; justify-content: center; font-size: 1rem; padding: 12px; margin-bottom: 16px; display: none; background-color: #F59E0B; color: #ffffff; border: 1px solid #D97706; font-weight: 600;">📝 Add Customer Specifications</button>

                            <div class="live-calc-box" style="background-color: rgba(16, 185, 129, 0.04); border-color: rgba(16, 185, 129, 0.25);">
                                <div class="calc-row">
                                    <span class="calc-label">Total Eggs Sold:</span>
                                    <span class="calc-value" id="calc-s-total-eggs">0</span>
                                </div>
                                <div class="calc-row">
                                    <span class="calc-label">Customer Charges:</span>
                                    <span class="calc-value" id="calc-s-customer-charges">₹0.00</span>
                                </div>
                                <div class="calc-row">
                                    <span class="calc-label">Actual Sales Cost:</span>
                                    <span class="calc-value" id="calc-s-actual-cost">₹0.00</span>
                                </div>
                                <div class="calc-row">
                                    <span class="calc-label">Landed Price Per Egg:</span>
                                    <span class="calc-value" id="calc-s-landed-price">₹0.00</span>
                                </div>
                                <div class="calc-row" style="border-top: 1px dashed rgba(255,255,255,0.1); padding-top: 6px; margin-top: 4px; color: var(--color-success);">
                                    <span class="calc-label" style="color: var(--color-success);">Sales Revenue:</span>
                                    <span class="calc-value highlight" style="color: var(--color-success);" id="calc-s-revenue">₹0.00</span>
                                </div>
                                <div class="calc-row">
                                    <span class="calc-label" style="font-weight: 600;">Net Profit:</span>
                                    <span class="calc-value highlight" id="calc-s-gross-profit">₹0.00</span>
                                </div>
                                <div class="calc-row">
                                    <span class="calc-label">Profit Per Egg:</span>
                                    <span class="calc-value" id="calc-s-profit-egg" style="font-weight: 600;">₹0.00</span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" onclick="showSalesBreakdown()" style="width: 100%; margin-top: 8px; justify-content: center; font-size: 0.9rem;">🔍 View Calculation Details</button>

                            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 16px;">Confirm Sale</button>
                        </form>
                    </div>

                    <div class="panel-card" style="flex: 1;">
                        <div class="table-header-row">
                            <div class="tab-title">Sales History</div>
                            <div class="search-input-wrapper">
                                <span class="search-icon">🔍</span>
                                <input type="text" id="sales-search" class="search-input" placeholder="Search sales...">
                            </div>
                        </div>
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sale ID</th>
                                        <th>Customer</th>
                                        <th>Batch</th>
                                        <th>Eggs Sold</th>
                                        <th>Selling Price/Egg</th>
                                        <th>Delivery / Customer Charges</th>
                                        <th>Revenue</th>
                                        <th>Net Profit</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="sales-table-body">
                                    <!-- Dynamic Rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- TAB: Return Management -->
            <section id="returns" class="tab-panel">
                <div class="workflow-layout">
                    <div class="panel-card">
                        <div class="panel-card-title">Record Return</div>
                        <form id="recovery-form">
                            <div class="form-group">
                                <label for="ret-customer-select">Customer</label>
                                <select id="ret-customer-select" required>
                                    <option value="">-- Select Customer --</option>
                                    <option value="Hyperpure">Hyperpure</option>
                                    <option value="Eggoz">Eggoz</option>
                                    <option value="Licious">Licious</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="ret-batch-select">Sales Batch Number</label>
                                <select id="ret-batch-select" required>
                                    <option value="">-- Select Sales Batch --</option>
                                </select>
                            </div>

                            <div class="form-group" id="ret-sales-info" style="display: none;">
                                <label style="color: var(--color-primary); font-weight: 600;">Sales Info (Auto-Fetched)</label>
                                <div style="display: grid; grid-template-columns: 1fr; gap: 6px; font-size: 0.85rem; color: var(--text-secondary); background: var(--color-primary-glow); padding: 12px; border-radius: 8px; border: 1.5px dashed var(--color-primary);">
                                    <div>Sales Date: <span id="r-fetch-date" style="color: var(--text-primary); font-weight: 700;">-</span></div>
                                    <div>Total Trays Sold: <span id="r-fetch-trays" style="color: var(--text-primary); font-weight: 700;">-</span></div>
                                    <div>Total Eggs Sold: <span id="r-fetch-eggs" style="color: var(--text-primary); font-weight: 700;">-</span></div>
                                    <div>Per Egg Selling Price: <span id="r-fetch-price" style="color: var(--text-primary); font-weight: 700;">-</span></div>
                                    <div>Total Sales Amount: <span id="r-fetch-revenue" style="color: var(--text-primary); font-weight: 700;">-</span></div>
                                </div>
                            </div>

                            <div id="ret-hyperpure-fields" style="display: none;">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>Damaged Eggs</label>
                                        <input type="number" id="ret-h-damaged" min="0" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label>Scrap Eggs</label>
                                        <input type="number" id="ret-h-scrap" min="0" value="0">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>Dirty Eggs</label>
                                        <input type="number" id="ret-h-dirty" min="0" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label>Small Eggs</label>
                                        <input type="number" id="ret-h-small" min="0" value="0">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>Big Eggs</label>
                                        <input type="number" id="ret-h-big" min="0" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label>Airline Eggs</label>
                                        <input type="number" id="ret-h-airline" min="0" value="0">
                                    </div>
                                </div>
                            </div>

                            <div id="ret-eggoz-fields" style="display: none;">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>Damaged Eggs</label>
                                        <input type="number" id="ret-e-damaged" min="0" value="0">
                                    </div>
                                    <div class="form-group">
                                        <label>Scrap Eggs</label>
                                        <input type="number" id="ret-e-scrap" min="0" value="0">
                                    </div>
                                </div>
                            </div>

                            <div id="ret-licious-fields" style="display: none;">
                                <div class="form-group">
                                    <label>Licious Return (Other Eggs)</label>
                                    <input type="number" id="ret-l-returned" min="0" value="0">
                                </div>
                            </div>

                            <div class="live-calc-box" style="margin-top: 16px;">
                                <div class="calc-row">
                                    <span class="calc-label">Total Returned Eggs:</span>
                                    <span class="calc-value highlight" id="calc-ret-total-eggs">0</span>
                                </div>
                                <div class="calc-row" style="border-top: 1px dashed rgba(255,255,255,0.1); padding-top: 6px; margin-top: 4px; font-size: 0.85rem;">
                                    <span class="calc-label">Returned Trays:</span>
                                    <span class="calc-value" id="calc-ret-trays">0</span>
                                </div>
                                <div class="calc-row" style="font-size: 0.85rem;">
                                    <span class="calc-label">Loose Eggs:</span>
                                    <span class="calc-value" id="calc-ret-loose">0</span>
                                </div>
                                <div class="calc-row" style="border-top: 1px dashed rgba(255,255,255,0.1); padding-top: 6px; margin-top: 4px; font-size: 0.95rem;">
                                    <span class="calc-label" style="font-weight: 600;">Net Amount After Return:</span>
                                    <span class="calc-value highlight" style="color: var(--color-primary);" id="calc-ret-net-amount">₹0.00</span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" onclick="showReturnBreakdown()" style="width: 100%; margin-top: 8px; justify-content: center; font-size: 0.9rem;">🔍 View Calculation Details</button>

                            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 16px;">Save Return Record</button>
                        </form>
                    </div>

                    <div class="panel-card" style="flex: 2; overflow-x: auto;">
                        <div class="table-header-row">
                            <div class="tab-title">Return Records</div>
                            <div class="search-input-wrapper">
                                <span class="search-icon">🔍</span>
                                <input type="text" id="recovery-search" class="search-input" placeholder="Search returns...">
                            </div>
                        </div>
                        <div class="table-container">
                            <table style="min-width: 1100px;">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Batch No</th>
                                        <th>Sales Date</th>
                                        <th>Sold Trays</th>
                                        <th>Sold Eggs</th>
                                        <th>Damaged</th>
                                        <th>Scrap</th>
                                        <th>Dirty</th>
                                        <th>Small</th>
                                        <th>Big</th>
                                        <th>Airline</th>
                                        <th>Total Returned Eggs</th>
                                        <th>Returned Trays</th>
                                        <th>Loose Eggs</th>
                                        <th>Net Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="recovery-table-body">
                                    <!-- Dynamic Rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- TAB: Recovery Sales Section -->
            <section id="recovery" class="tab-panel">
                <div class="panel-layout">
                    <div class="panel-card" style="flex: 1;">
                        <div class="panel-card-title">Available Recovery Stock</div>
                        <div class="metrics-grid" style="margin-top: 12px; display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                            <div class="metric-card" style="--accent-color: var(--color-danger); --accent-glow: var(--color-danger-bg); padding: 10px;">
                                <div class="metric-title" style="font-size: 0.75rem;">Damaged</div>
                                <div class="metric-value" id="avail-damaged" style="font-size: 1.25rem;">0</div>
                            </div>
                            <div class="metric-card" style="--accent-color: var(--color-warning); --accent-glow: var(--color-warning-bg); padding: 10px;">
                                <div class="metric-title" style="font-size: 0.75rem;">Scrap</div>
                                <div class="metric-value" id="avail-scrap" style="font-size: 1.25rem;">0</div>
                            </div>
                            <div class="metric-card" style="--accent-color: var(--color-info); --accent-glow: var(--color-info-bg); padding: 10px;">
                                <div class="metric-title" style="font-size: 0.75rem;">Dirty</div>
                                <div class="metric-value" id="avail-dirty" style="font-size: 1.25rem;">0</div>
                            </div>
                            <div class="metric-card" style="--accent-color: var(--color-primary); --accent-glow: var(--color-primary-glow); padding: 10px;">
                                <div class="metric-title" style="font-size: 0.75rem;">Small</div>
                                <div class="metric-value" id="avail-small" style="font-size: 1.25rem;">0</div>
                            </div>
                            <div class="metric-card" style="--accent-color: var(--color-success); --accent-glow: var(--color-success-bg); padding: 10px;">
                                <div class="metric-title" style="font-size: 0.75rem;">Big</div>
                                <div class="metric-value" id="avail-big" style="font-size: 1.25rem;">0</div>
                            </div>
                            <div class="metric-card" style="--accent-color: #8b5cf6; --accent-glow: rgba(139, 92, 246, 0.1); padding: 10px;">
                                <div class="metric-title" style="font-size: 0.75rem;">Airline</div>
                                <div class="metric-value" id="avail-airline" style="font-size: 1.25rem;">0</div>
                            </div>
                            <div class="metric-card" style="--accent-color: #ec4899; --accent-glow: rgba(236, 72, 153, 0.1); padding: 10px; grid-column: span 2;">
                                <div class="metric-title" style="font-size: 0.75rem;">Licious Returned</div>
                                <div class="metric-value" id="avail-licious" style="font-size: 1.25rem;">0</div>
                            </div>
                        </div>

                        <div class="panel-card-title" style="margin-top: 20px;">Sell Recovery Eggs</div>
                        <form id="recovery-sales-form">
                            <input type="hidden" id="rec-id">

                            
                            <div class="form-group">
                                <label>Link to Purchase Batch (For Profit Analysis) *</label>
                                <select id="rec-batch-select" required>
                                    <option value="">-- Select Batch --</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Customer Name *</label>
                                <input type="text" id="rec-customer" required placeholder="Enter Name">
                            </div>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" id="rec-phone" placeholder="Enter Phone">
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" id="rec-location" placeholder="Enter Location">
                                </div>
                            </div>

                            <div style="margin-top: 15px;">
                                <label>Recovery Items to Sell</label>
                                <div style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; padding: 10px; margin-top: 8px;">
                                    <table style="width: 100%; font-size: 0.85rem; text-align: left;">
                                        <thead>
                                            <tr>
                                                <th style="padding-bottom: 8px; width: 30%">Type</th>
                                                <th style="padding-bottom: 8px; width: 25%">Sell Qty</th>
                                                <th style="padding-bottom: 8px; width: 25%">Price/Egg</th>
                                                <th style="padding-bottom: 8px; width: 20%">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody id="recovery-sales-grid">
                                            <!-- Static Rows because categories are fixed -->
                                            <tr data-type="damaged">
                                                <td style="padding: 4px 0;">Damaged</td>
                                                <td style="padding: 4px 2px;"><input type="number" class="rec-qty-input" data-type="damaged" min="0" value="0" style="width: 100%; padding: 4px;"></td>
                                                <td style="padding: 4px 2px;"><input type="number" class="rec-price-input" data-type="damaged" min="0" step="0.01" value="0" style="width: 100%; padding: 4px;"></td>
                                                <td style="padding: 4px 0;" class="rec-amount-val" data-type="damaged">₹0</td>
                                            </tr>
                                            <tr data-type="scrap">
                                                <td style="padding: 4px 0;">Scrap</td>
                                                <td style="padding: 4px 2px;"><input type="number" class="rec-qty-input" data-type="scrap" min="0" value="0" style="width: 100%; padding: 4px;"></td>
                                                <td style="padding: 4px 2px;"><input type="number" class="rec-price-input" data-type="scrap" min="0" step="0.01" value="0" style="width: 100%; padding: 4px;"></td>
                                                <td style="padding: 4px 0;" class="rec-amount-val" data-type="scrap">₹0</td>
                                            </tr>
                                            <tr data-type="dirty">
                                                <td style="padding: 4px 0;">Dirty</td>
                                                <td style="padding: 4px 2px;"><input type="number" class="rec-qty-input" data-type="dirty" min="0" value="0" style="width: 100%; padding: 4px;"></td>
                                                <td style="padding: 4px 2px;"><input type="number" class="rec-price-input" data-type="dirty" min="0" step="0.01" value="0" style="width: 100%; padding: 4px;"></td>
                                                <td style="padding: 4px 0;" class="rec-amount-val" data-type="dirty">₹0</td>
                                            </tr>
                                            <tr data-type="small">
                                                <td style="padding: 4px 0;">Small</td>
                                                <td style="padding: 4px 2px;"><input type="number" class="rec-qty-input" data-type="small" min="0" value="0" style="width: 100%; padding: 4px;"></td>
                                                <td style="padding: 4px 2px;"><input type="number" class="rec-price-input" data-type="small" min="0" step="0.01" value="0" style="width: 100%; padding: 4px;"></td>
                                                <td style="padding: 4px 0;" class="rec-amount-val" data-type="small">₹0</td>
                                            </tr>
                                            <tr data-type="big">
                                                <td style="padding: 4px 0;">Big</td>
                                                <td style="padding: 4px 2px;"><input type="number" class="rec-qty-input" data-type="big" min="0" value="0" style="width: 100%; padding: 4px;"></td>
                                                <td style="padding: 4px 2px;"><input type="number" class="rec-price-input" data-type="big" min="0" step="0.01" value="0" style="width: 100%; padding: 4px;"></td>
                                                <td style="padding: 4px 0;" class="rec-amount-val" data-type="big">₹0</td>
                                            </tr>
                                            <tr data-type="airline">
                                                <td style="padding: 4px 0;">Airline</td>
                                                <td style="padding: 4px 2px;"><input type="number" class="rec-qty-input" data-type="airline" min="0" value="0" style="width: 100%; padding: 4px;"></td>
                                                <td style="padding: 4px 2px;"><input type="number" class="rec-price-input" data-type="airline" min="0" step="0.01" value="0" style="width: 100%; padding: 4px;"></td>
                                                <td style="padding: 4px 0;" class="rec-amount-val" data-type="airline">₹0</td>
                                            </tr>
                                            <tr data-type="licious">
                                                <td style="padding: 4px 0;">Licious</td>
                                                <td style="padding: 4px 2px;"><input type="number" class="rec-qty-input" data-type="licious" min="0" value="0" style="width: 100%; padding: 4px;"></td>
                                                <td style="padding: 4px 2px;"><input type="number" class="rec-price-input" data-type="licious" min="0" step="0.01" value="0" style="width: 100%; padding: 4px;"></td>
                                                <td style="padding: 4px 0;" class="rec-amount-val" data-type="licious">₹0</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="live-calc-box" style="margin-top: 16px;">
                                <div class="calc-row">
                                    <span class="calc-label">Total Revenue:</span>
                                    <span class="calc-value highlight" id="calc-rec-total-revenue">₹0.00</span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" onclick="showRecoveryBreakdown()" style="width: 100%; margin-top: 8px; justify-content: center; font-size: 0.9rem;">🔍 View Calculation Details</button>

                            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 16px;">Save Sale Record</button>
                        </form>
                    </div>

                    <div class="panel-card" style="overflow-x: auto;">
                        <div class="table-header-row">
                            <div class="tab-title">Recovery Records</div>
                            <div class="search-input-wrapper">
                                <span class="search-icon">🔍</span>
                                <input type="text" id="actual-recovery-search" class="search-input" placeholder="Search records...">
                            </div>
                        </div>
                        <div class="table-container">
                            <table style="min-width: 1000px;">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Batch</th>
                                        <th>Customer</th>
                                        <th>Location</th>
                                        <th>Damaged</th>
                                        <th>Scrap</th>
                                        <th>Dirty</th>
                                        <th>Small</th>
                                        <th>Big</th>
                                        <th>Airline</th>
                                        <th>Licious</th>
                                        <th>Revenue</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="actual-recovery-table-body">
                                    <!-- Dynamic Rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- TAB: Profit Section -->
            <section id="profit" class="tab-panel">
                <div class="panel-card" style="margin-bottom: 20px;">
                    <div class="panel-card-title">Profit Summary</div>

                    <!-- Formula strip -->
                    <div style="background: rgba(255,255,255,0.04); border: 1px dashed rgba(255,255,255,0.15); border-radius: 10px; padding: 12px 18px; margin: 14px 0; font-size: 0.85rem; color: var(--text-secondary); display: flex; flex-wrap: wrap; align-items: center; gap: 8px;">
                        <span style="color: var(--color-success); font-weight: 600;">Sales Revenue</span>
                        <span>+</span>
                        <span style="color: var(--color-info); font-weight: 600;">Recovery Revenue</span>
                        <span>−</span>
                        <span style="color: var(--color-danger); font-weight: 600;">Purchase Cost</span>
                        <span>−</span>
                        <span style="color: var(--color-warning); font-weight: 600;">All Expenses</span>
                        <span>=</span>
                        <span style="color: var(--color-primary); font-weight: 700; font-size: 1rem;">Net Profit</span>
                    </div>

                    <!-- Main summary cards -->
                    <div class="metrics-grid" style="margin-top: 12px;">
                        <div class="metric-card" style="--accent-color: var(--color-success); --accent-glow: var(--color-success-bg)">
                            <div class="metric-header">
                                <span class="metric-title">Sales Revenue</span>
                                <span class="metric-icon">💰</span>
                            </div>
                            <div class="metric-value" id="profit-total-sales">₹0.00</div>
                            <div class="metric-footer">From all sales invoices</div>
                        </div>
                        <div class="metric-card" style="--accent-color: var(--color-info); --accent-glow: var(--color-info-bg)">
                            <div class="metric-header">
                                <span class="metric-title">Recovery Revenue</span>
                                <span class="metric-icon">🔄</span>
                            </div>
                            <div class="metric-value" id="profit-total-recovery">₹0.00</div>
                            <div class="metric-footer">From selling returned eggs</div>
                        </div>
                        <div class="metric-card" style="--accent-color: var(--color-danger); --accent-glow: var(--color-danger-bg)">
                            <div class="metric-header">
                                <span class="metric-title">Purchase Cost</span>
                                <span class="metric-icon">🛒</span>
                            </div>
                            <div class="metric-value" id="profit-total-purchase">₹0.00</div>
                            <div class="metric-footer">Eggs × Price per Egg</div>
                        </div>
                    </div>

                    <!-- Expense breakdown -->
                    <div class="analytics-metrics-grid" style="margin-top: 12px;">
                        <div class="metric-card" style="--accent-color: var(--color-warning); --accent-glow: var(--color-warning-bg)">
                            <div class="metric-header">
                                <span class="metric-title">All Expenses</span>
                                <span class="metric-icon">🧾</span>
                            </div>
                            <div class="metric-value" id="profit-total-expenses">₹0.00</div>
                            <div class="metric-footer" id="profit-expense-breakdown" style="font-size:0.75rem;">Purchase Extras + Processing + Transport</div>
                        </div>
                        <div class="metric-card" style="--accent-color: var(--color-primary); --accent-glow: var(--color-primary-glow)">
                            <div class="metric-header">
                                <span class="metric-title">Total Revenue</span>
                                <span class="metric-icon">💸</span>
                            </div>
                            <div class="metric-value" id="profit-total-revenue">₹0.00</div>
                            <div class="metric-footer">Sales + Recovery</div>
                        </div>
                        <div class="metric-card" style="--accent-color: var(--color-primary); --accent-glow: var(--color-primary-glow)">
                            <div class="metric-header">
                                <span class="metric-title">Net Profit</span>
                                <span class="metric-icon">📈</span>
                            </div>
                            <div class="metric-value" id="profit-net-profit">₹0.00</div>
                            <div class="metric-footer">Revenue − All Costs</div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="showGlobalProfitBreakdown()" style="width: 100%; margin-top: 16px; justify-content: center; font-size: 0.95rem; font-weight: 600;">🔍 View Complete Profit Calculation Math</button>
                </div>

                
                <div class="panel-card" style="margin-bottom: 20px;">
                    <div class="table-header-row">
                        <div class="tab-title">Profit Analysis By Purchase</div>
                    </div>
                    <div class="table-container" style="overflow-x: auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Purchase ID</th>
                                    <th>Net Sales Revenue</th>
                                    <th>Recovery Revenue</th>
                                    <th>Base Purchase Cost</th>
                                    <th>Total Expenses</th>
                                    <th>Final Net Profit</th>
                                    <th>Profit Per Egg</th>
                                </tr>
                            </thead>
                            <tbody id="total-profit-analysis-body">
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Sales Profit Table -->
                <div class="panel-card">
                    <div class="table-header-row">
                        <div class="tab-title">💰 Sales Profit Records</div>
                        <div class="search-input-wrapper">
                            <span class="search-icon">🔍</span>
                            <input type="text" id="profit-search" class="search-input" placeholder="Search sales...">
                        </div>
                    </div>
                    <div class="table-container" style="overflow-x: auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Sale ID</th>
                                    <th>Customer</th>
                                    <th>Batch</th>
                                    <th>Eggs Sold</th>
                                    <th>Selling Revenue</th>
                                    <th>Purchase Cost</th>
                                    <th>Expenses</th>
                                    <th>Net Profit</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody id="profit-table-body">
                                <!-- Dynamic Rows -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recovery Sales Profit Table -->
                <div class="panel-card">
                    <div class="table-header-row">
                        <div class="tab-title">🔄 Recovery Sales Profit Records</div>
                        <div class="search-input-wrapper">
                            <span class="search-icon">🔍</span>
                            <input type="text" id="recovery-profit-search" class="search-input" placeholder="Search recovery sales...">
                        </div>
                    </div>
                    <div class="table-container" style="overflow-x: auto;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Record ID</th>
                                    <th>Customer</th>
                                    <th>Linked Batch</th>
                                    <th>Eggs Sold</th>
                                    <th>Recovery Revenue</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody id="profit-recovery-table-body">
                                <!-- Dynamic Rows -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>

    
    <!-- MODAL: Purchase Additional Expenses -->
    <div class="modal-overlay" id="expenses-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Additional Expenses</h3>
                <button type="button" class="modal-close" id="btn-close-expenses-modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="expenses-form">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="exp-delivery-type">Delivery Type</label>
                        <select id="exp-delivery-type" style="width: 100%; padding: 10px; background: var(--bg-dark); border: 1px solid var(--border-color); color: var(--text-primary); border-radius: 6px;">
                            <option value="rented">Rented Vehicle</option>
                            <option value="own">Own Vehicle</option>
                        </select>
                    </div>

                    <h4 style="margin-bottom: 12px; color: var(--color-primary); font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.5px;">Transportation Expenses</h4>
                    
                    <!-- Rented Vehicle Fields -->
                    <div id="rented-vehicle-fields">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="exp-vehicle-rent">Vehicle Rent (₹)</label>
                                <input type="number" id="exp-vehicle-rent" min="0" value="0">
                            </div>
                            <div class="form-group">
                                <label for="exp-loading">Loading Cost (₹)</label>
                                <input type="number" id="exp-loading" min="0" value="0">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="exp-unloading">Unloading Cost (₹)</label>
                                <input type="number" id="exp-unloading" min="0" value="0">
                            </div>
                            <div class="form-group">
                                <label for="exp-misc">Miscellaneous Cost (₹)</label>
                                <input type="number" id="exp-misc" min="0" value="0">
                            </div>
                        </div>
                    </div>

                    <!-- Own Vehicle Fields (Initially Hidden) -->
                    <div id="own-vehicle-fields" style="display: none;">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="exp-diesel">Diesel/Petrol Cost (₹)</label>
                                <input type="number" id="exp-diesel" min="0" value="0">
                            </div>
                            <div class="form-group">
                                <label for="exp-fastag">Fastag/Toll/Permit (₹)</label>
                                <input type="number" id="exp-fastag" min="0" value="0">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="exp-driver-food">Driver Food Cost (₹)</label>
                                <input type="number" id="exp-driver-food" min="0" value="0">
                            </div>
                            <div class="form-group">
                                <label for="exp-own-loading">Loading Cost (₹)</label>
                                <input type="number" id="exp-own-loading" min="0" value="0">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="exp-own-unloading">Unloading Cost (₹)</label>
                                <input type="number" id="exp-own-unloading" min="0" value="0">
                            </div>
                            <div class="form-group">
                                <label for="exp-own-misc">Miscellaneous Cost (₹)</label>
                                <input type="number" id="exp-own-misc" min="0" value="0">
                            </div>
                        </div>
                    </div>

                    <h4 style="margin-top: 20px; margin-bottom: 12px; color: var(--color-primary); font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.5px;">Packaging Expenses</h4>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="exp-flipping">Flipping Cost (₹)</label>
                            <input type="number" id="exp-flipping" min="0" value="0">
                        </div>
                        <div class="form-group">
                            <label for="exp-paper-tray">Paper Tray Cost (₹)</label>
                            <input type="number" id="exp-paper-tray" min="0" value="0">
                        </div>
                    </div>

                    <div class="live-calc-box" style="margin-top: 20px;">
                        <div class="calc-row">
                            <span class="calc-label">Transportation Total:</span>
                            <span class="calc-value" id="calc-exp-transport">₹0.00</span>
                        </div>
                        <div class="calc-row">
                            <span class="calc-label">Packaging Total:</span>
                            <span class="calc-value" id="calc-exp-packaging">₹0.00</span>
                        </div>
                        <div class="calc-row" style="border-top: 1px dashed rgba(255,255,255,0.1); padding-top: 6px; margin-top: 4px;">
                            <span class="calc-label" style="font-weight: 600;">Total Additional Cost:</span>
                            <span class="calc-value highlight" id="calc-exp-total">₹0.00</span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btn-cancel-expenses">Cancel</button>
                <button type="button" class="btn btn-primary" id="btn-save-expenses">Apply Costs</button>
            </div>
        </div>
    </div>

    <!-- MODAL: Sales Customer Specifications -->
    <div class="modal-overlay" id="sales-charges-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Customer Specifications</h3>
                <button type="button" class="modal-close" id="btn-close-sales-charges-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="sales-dynamic-charges-container" style="display: block;">
                    <!-- Delivery Type Dropdown (Hyperpure / Licious) -->
                    <div id="sales-delivery-type-group" class="form-group" style="display: none;">
                        <label for="sales-delivery-type">Delivery Type</label>
                        <select id="sales-delivery-type">
                            <option value="">-- Select Delivery Type --</option>
                            <option value="rented">Rented Vehicle</option>
                            <option value="own">Own Vehicle</option>
                        </select>
                    </div>

                    <!-- Charge Fields (Will be toggled by JS) -->
                    <div id="charge-labour-group" class="form-group" style="display: none;">
                        <label for="s-charge-labour">Labour Cost</label>
                        <input type="number" id="s-charge-labour" min="0" value="0">
                    </div>
                    <div id="charge-rent-group" class="form-group" style="display: none;">
                        <label for="s-charge-rent">Vehicle Rent Cost</label>
                        <input type="number" id="s-charge-rent" min="0" value="0">
                    </div>
                    <div id="charge-diesel-group" class="form-group" style="display: none;">
                        <label for="s-charge-diesel">Diesel/Petrol Cost</label>
                        <input type="number" id="s-charge-diesel" min="0" value="0">
                    </div>
                    <div id="charge-loading-group" class="form-group" style="display: none;">
                        <label for="s-charge-loading">Loading Cost</label>
                        <input type="number" id="s-charge-loading" min="0" value="0">
                    </div>
                    <div id="charge-unloading-group" class="form-group" style="display: none;">
                        <label for="s-charge-unloading">Unloading Cost</label>
                        <input type="number" id="s-charge-unloading" min="0" value="0">
                    </div>
                    <div id="charge-food-group" class="form-group" style="display: none;">
                        <label for="s-charge-food">Driver Food Cost</label>
                        <input type="number" id="s-charge-food" min="0" value="0">
                    </div>
                    <div id="charge-fastag-group" class="form-group" style="display: none;">
                        <label for="s-charge-fastag">Fastag/Toll/Permit Cost</label>
                        <input type="number" id="s-charge-fastag" min="0" value="0">
                    </div>
                    <div id="charge-paper-group" class="form-group" style="display: none;">
                        <label for="s-charge-paper">Paper Tray Cost</label>
                        <input type="number" id="s-charge-paper" min="0" value="0">
                    </div>
                    <div id="charge-misc-group" class="form-group" style="display: none;">
                        <label for="s-charge-misc">Miscellaneous Cost</label>
                        <input type="number" id="s-charge-misc" min="0" value="0">
                    </div>
                    <div id="charge-cleaning-group" class="form-group" style="display: none;">
                        <label for="s-charge-cleaning">Cleaning Cost</label>
                        <input type="number" id="s-charge-cleaning" min="0" value="0">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btn-cancel-sales-charges-modal">Done</button>
            </div>
        </div>
    </div>

    <!-- Generic Breakdown Modal -->
    <div class="modal-overlay" id="calc-breakdown-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="calc-breakdown-title">Calculation Details</h3>
                <button type="button" class="modal-close" id="btn-close-calc-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="calc-breakdown-content" style="font-size: 0.95rem; color: var(--text-primary); line-height: 1.6; display: flex; flex-direction: column; gap: 8px;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btn-cancel-calc-modal">Close</button>
            </div>
        </div>
    </div>

    <!-- Toast Notifications Area -->
    <div class="toast-container" id="toast-container"></div>

    <script>
function openBreakdownModal(title, htmlContent) {
    document.getElementById('calc-breakdown-title').textContent = title;
    document.getElementById('calc-breakdown-content').innerHTML = htmlContent;
    document.getElementById('calc-breakdown-modal').classList.add('active');
}
function setupBreakdownModal() {
    const closeBtn = document.getElementById('btn-close-calc-modal');
    const cancelBtn = document.getElementById('btn-cancel-calc-modal');
    if (closeBtn) closeBtn.addEventListener('click', () => {
        document.getElementById('calc-breakdown-modal').classList.remove('active');
    });
    if (cancelBtn) cancelBtn.addEventListener('click', () => {
        document.getElementById('calc-breakdown-modal').classList.remove('active');
    });
}


// Egg Management System Application Code

// --- API-based Database DAL (PHP/MySQL) ---
const API_BASE = 'backend.php';
const DB = {
    async get(key, defaultValue = []) {
        try {
            const res = await fetch(`${API_BASE}?key=${key}`);
            if (!res.ok) throw new Error(`HTTP ${res.status}`);
            const data = await res.json();
            return Array.isArray(data) ? data : defaultValue;
        } catch (err) {
            console.warn(`DB.get(${key}) failed, using localStorage fallback:`, err.message);
            // Fallback to localStorage if server unavailable
            const local = localStorage.getItem(`ems_${key}`);
            return local ? JSON.parse(local) : defaultValue;
        }
    },
    async set(key, value) {
        try {
            const res = await fetch(`${API_BASE}?key=${key}`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(value)
            });
            if (!res.ok) throw new Error(`HTTP ${res.status}`);
            // Also keep localStorage in sync as cache
            localStorage.setItem(`ems_${key}`, JSON.stringify(value));
        } catch (err) {
            console.warn(`DB.set(${key}) failed, saving to localStorage only:`, err.message);
            localStorage.setItem(`ems_${key}`, JSON.stringify(value));
        }
    },
    clear() {
        localStorage.clear();
    }
};

// --- Application State ---
const State = {
    farms: [],
    purchases: [],
    batches: [],
    processingLogs: [],
    customers: [],
    sales: [],
    recoveries: [],
    returnLogs: [],
    recoveryLogs: [],
    
    // UI state
    currentTab: 'farms',
    activePurchaseAddCost: { total: 0, details: {} },
    editingFarmId: null,
    editingCustomerId: null,
    editingPurchaseId: null,
    editingInventoryId: null,
                            editingSaleId: null,
    editingReturnId: null,
    editingRecoveryId: null
};

// Async initializer - loads
function populateRecoveryDropdowns() {
    const batchSelect = document.getElementById('rec-batch-select');
    if(batchSelect) {
        batchSelect.innerHTML = '<option value="">-- Select Batch --</option>';
        State.batches.forEach(b => {
            const opt = document.createElement('option');
            opt.value = b.id;
            opt.textContent = `${b.id} - ${Format.date(b.date)}`;
            batchSelect.appendChild(opt);
        });
    }
}

// Global initialization
async function initApp() {
    try {
        // Show loading indicator
        document.body.style.opacity = '0.6';
        document.body.style.pointerEvents = 'none';
        const [farms, purchases, batches, processingLogs, customers, sales, returnLogs, recoveryLogs] = 
            await Promise.all([
                DB.get('farms'),
                DB.get('purchases'),
                DB.get('batches'),
                DB.get('processingLogs'),
                DB.get('customers'),
                DB.get('sales'),
                DB.get('returnLogs'),
                DB.get('recoveryLogs')
            ]);

        State.farms = farms;
        State.purchases = purchases;
        State.batches = batches;
        State.processingLogs = processingLogs;
        State.customers = customers;
        State.sales = sales;
        State.returnLogs = returnLogs;
        State.recoveryLogs = recoveryLogs;
        State.recoveries = [];

        console.log('✅ State loaded from MySQL:', {
            farms: farms.length, purchases: purchases.length,
            batches: batches.length, customers: customers.length,
            sales: sales.length, returnLogs: returnLogs.length,
            recoveryLogs: recoveryLogs.length
        });
    } catch (err) {
        console.error('Failed to load state from MySQL:', err);
    } finally {
        document.body.style.opacity = '';
        document.body.style.pointerEvents = '';
    }
}

// Save helper — fires async but does not block UI
function saveState(key) {
    DB.set(key, State[key]).catch(err => 
        console.error(`saveState(${key}) error:`, err)
    );
}

// --- Notification UI Helper ---
function showToast(message, type = 'success') {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    
    let icon = '✨';
    if (type === 'success') icon = '✅';
    if (type === 'danger') icon = '❌';
    
    toast.innerHTML = `<span>${icon}</span><span>${message}</span>`;
    container.appendChild(toast);
    
    // Slide out after 3.5s
    setTimeout(() => {
        toast.style.animation = 'slideIn 0.3s reverse forwards';
        setTimeout(() => toast.remove(), 300);
    }, 3500);
}

// --- Formatting Helpers ---
const Format = {
    currency(value) {
        return new Intl.NumberFormat('en-IN', {
            style: 'currency',
            currency: 'INR',
            maximumFractionDigits: 2
        }).format(value);
    },
    number(value) {
        return new Intl.NumberFormat('en-IN').format(value);
    },
    date(dateStr) {
        if (!dateStr) return '-';
        const d = new Date(dateStr);
        return d.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
    },
    dateForInput(dateObj) {
        const d = dateObj instanceof Date ? dateObj : new Date();
        return d.toISOString().split('T')[0];
    }
};

// --- Routing & Tab Management ---
function initNavigation() {
    const navItems = document.querySelectorAll('.nav-item');
    const tabPanels = document.querySelectorAll('.tab-panel');
    const tabTitle = document.getElementById('current-tab-title');
    const tabDesc = document.getElementById('current-tab-desc');
    
    const tabMetaData = {
        farms: { title: 'Farms Master', desc: 'Manage poultry farm directories, owners, and contact details.' },
        purchases: { title: 'Purchases Manager', desc: 'Record farm egg purchases, calculate additional expenses, and track batches.' },
        inventory: { title: 'Inventory & Godowns', desc: 'Move purchased egg items into tracked inventory storage batches.' },
        processing: { title: 'Processing & Sorting', desc: 'Log egg breakage, dirt, damage, and assign grading processing costs.' },
        customers: { title: 'Customers Master', desc: 'Maintain database of commercial hyperpure, grocery, and retail clients.' },
        sales: { title: 'Sales & Dispatch', desc: 'Process customer sales, compute logistics shipping, and track gross profit.' },
        returns: { title: 'Return Management', desc: 'Process customer returns for tracking and stock balancing.' },
        recovery: { title: 'Recovery Sales', desc: 'Sell eggs received from returns. Track recovery revenue separately.' },
        profit: { title: 'Profit Section', desc: 'View overall profit and per-sale profit breakdown based on all financial records.' }
    };

    navItems.forEach(item => {
        item.addEventListener('click', () => {
            const targetTab = item.getAttribute('data-tab');
            
            // Toggle active classes
            navItems.forEach(nav => nav.classList.remove('active'));
            tabPanels.forEach(panel => panel.classList.remove('active'));
            
            item.classList.add('active');
            const targetPanel = document.getElementById(targetTab);
            if (targetPanel) targetPanel.classList.add('active');
            
            // Update Header
            const meta = tabMetaData[targetTab];
            if (meta) {
                tabTitle.textContent = meta.title;
                tabDesc.textContent = meta.desc;
            }
            
            State.currentTab = targetTab;
            
            // Reload tab specifics
            loadTabContent(targetTab);
        });
    });

    // Set header date to today
    document.getElementById('header-date').textContent = Format.date(new Date().toISOString().split('T')[0]);
}

// Router trigger
function loadTabContent(tabName) {
    if (tabName === 'farms') {
        renderFarmsTable();
    } else if (tabName === 'purchases') {
        populateFarmDropdowns();
        renderPurchasesTable();
        resetPurchaseForm();
    } else if (tabName === 'inventory') {
        populatePurchaseDropdown();
        renderInventoryTable();
        resetBatchForm();
    } else if (tabName === 'processing') {
        populateProcessingBatchDropdown();
        renderProcessingTable();
        resetProcessingForm();
    } else if (tabName === 'customers') {
        renderCustomersTable();
    } else if (tabName === 'sales') {
        populateCustomerAndBatchDropdowns();
        renderSalesTable();
        resetSalesForm();
    } else if (tabName === 'returns') {
        populateReturnDropdowns();
        renderReturnTable();
        resetReturnForm();
    } else if (tabName === 'recovery') {
        populateRecoveryDropdowns();
        renderRecoveryStock();
        renderRecoveryTable();
    } else if (tabName === 'profit') {
        renderProfitSection();
    }
}

// --- SECTION 1: Farms Master ---
function handleFarmSubmit(e) {
    e.preventDefault();
    const name = document.getElementById('farm-name').value.trim();
    const ownerName = document.getElementById('farm-owner').value.trim();
    const phone = document.getElementById('farm-phone').value.trim();
    const location = document.getElementById('farm-location').value.trim();
    const status = document.getElementById('farm-status').value;
    const remarks = document.getElementById('farm-remarks').value.trim();

    if (State.editingFarmId) {
        // Edit mode
        const farm = State.farms.find(f => f.id === State.editingFarmId);
        if (farm) {
            farm.name = name;
            farm.ownerName = ownerName;
            farm.phone = phone;
            farm.location = location;
            farm.status = status;
            farm.remarks = remarks;
            saveState('farms');
            showToast(`Farm "${name}" updated successfully!`);
        }
        State.editingFarmId = null;
        document.querySelector('#farm-form button[type="submit"]').textContent = 'Save Farm';
    } else {
        const id = `FARM-${String(State.farms.length + 1).padStart(3, '0')}`;
        const newFarm = { id, name, ownerName, phone, location, status, remarks };
        State.farms.push(newFarm);
        saveState('farms');
        showToast(`Farm "${name}" registered successfully!`);
    }
    document.getElementById('farm-form').reset();
    renderFarmsTable();
}

function renderFarmsTable(filterQuery = '') {
    const tbody = document.getElementById('farms-table-body');
    tbody.innerHTML = '';
    
    const query = filterQuery.toLowerCase();
    const filtered = State.farms.filter(f => 
        f.name.toLowerCase().includes(query) || 
        f.ownerName.toLowerCase().includes(query) ||
        f.location.toLowerCase().includes(query)
    );

    if (filtered.length === 0) {
        tbody.innerHTML = `<tr><td colspan="6" class="empty-state"><div class="empty-state-icon">🚜</div>No farms registered matching search.</td></tr>`;
        return;
    }

    filtered.forEach(f => {
        const tr = document.createElement('tr');
        const badgeClass = f.status === 'Active' ? 'badge-success' : 'badge-danger';
        tr.innerHTML = `
            <td><strong style="color:var(--text-primary);">${f.name}</strong><br><span style="font-size:0.75rem; color:var(--text-muted);">${f.id}</span></td>
            <td>${f.ownerName}</td>
            <td style="font-variant-numeric: tabular-nums;">${f.phone}</td>
            <td>${f.location}</td>
            <td><span class="badge ${badgeClass}">${f.status}</span></td>
            <td>
                <button class="btn btn-secondary btn-icon-only" onclick="editFarm('${f.id}')" title="Edit Farm" style="width:28px; height:28px; padding:0; font-size:0.8rem;">✏️</button>
                <button class="btn btn-secondary btn-icon-only" onclick="toggleFarmStatus('${f.id}')" title="Toggle Active/Inactive" style="width:28px; height:28px; padding:0; font-size:0.8rem;">🔄</button>
                <button class="btn btn-danger btn-icon-only" onclick="deleteFarm('${f.id}')" title="Delete Farm" style="width:28px; height:28px; padding:0; font-size:0.8rem;">🗑️</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

window.editFarm = function(id) {
    const farm = State.farms.find(f => f.id === id);
    if (!farm) return;
    document.getElementById('farm-name').value = farm.name;
    document.getElementById('farm-owner').value = farm.ownerName;
    document.getElementById('farm-phone').value = farm.phone;
    document.getElementById('farm-location').value = farm.location;
    document.getElementById('farm-status').value = farm.status;
    document.getElementById('farm-remarks').value = farm.remarks || '';
    State.editingFarmId = id;
    document.querySelector('#farm-form button[type="submit"]').textContent = 'Update Farm';
    document.getElementById('farm-name').scrollIntoView({ behavior: 'smooth' });
    showToast('Editing farm - make changes and click Update Farm', 'success');
};

window.toggleFarmStatus = function(id) {
    const farm = State.farms.find(f => f.id === id);
    if (farm) {
        farm.status = farm.status === 'Active' ? 'Inactive' : 'Active';
        saveState('farms');
        showToast(`Status updated for "${farm.name}"`);
        renderFarmsTable(document.getElementById('farms-search').value);
    }
};

window.deleteFarm = function(id) {
    if (confirm('Are you sure you want to delete this farm? This will not alter existing transaction records.')) {
        State.farms = State.farms.filter(f => f.id !== id);
        saveState('farms');
        showToast('Farm deleted');
        renderFarmsTable(document.getElementById('farms-search').value);
    }
};


// --- SECTION 2: Purchases ---
function populateFarmDropdowns() {
    const select = document.getElementById('purchase-farm-select');
    select.innerHTML = '<option value="">-- Select Farm --</option>';
    
    // Only Active farms
    State.farms.filter(f => f.status === 'Active').forEach(f => {
        const opt = document.createElement('option');
        opt.value = f.id;
        opt.textContent = f.name;
        select.appendChild(opt);
    });
}

function handlePurchaseFarmSelect() {
    const farmId = this.value;
    const ownerSpan = document.getElementById('p-fetch-owner');
    const phoneSpan = document.getElementById('p-fetch-phone');
    const locSpan = document.getElementById('p-fetch-location');
    
    if (!farmId) {
        ownerSpan.textContent = '-';
        phoneSpan.textContent = '-';
        locSpan.textContent = '-';
        return;
    }

    const farm = State.farms.find(f => f.id === farmId);
    if (farm) {
        ownerSpan.textContent = farm.ownerName;
        phoneSpan.textContent = farm.phone;
        locSpan.textContent = farm.location;
    }
}

function calculateLivePurchase() {
    const trays = parseInt(document.getElementById('purchase-trays').value) || 0;
    const neckPrice = parseFloat(document.getElementById('purchase-neck-price').value) || 0;
    const cuttingPrice = parseFloat(document.getElementById('purchase-cutting-price').value) || 0;
    
    const totalEggs = trays * 30;
    document.getElementById('purchase-total-eggs-display').value = totalEggs;
    
    const actualPurchasePrice = neckPrice - cuttingPrice;
    document.getElementById('purchase-actual-price-display').value = actualPurchasePrice > 0 ? Format.currency(actualPurchasePrice) : '₹0.00';
    
    const purchaseAmount = totalEggs * actualPurchasePrice;
    
    // Additional Costs
    const addCostObj = State.activePurchaseAddCost;
    const additionalCostTotal = addCostObj.total || 0;
    const totalCost = purchaseAmount + additionalCostTotal;
    const averageCost = totalEggs > 0 ? (totalCost / totalEggs) : 0;
    
    // Update live panel
    document.getElementById('calc-p-total-eggs').textContent = Format.number(totalEggs);
    document.getElementById('calc-p-amount').textContent = Format.currency(purchaseAmount);
    document.getElementById('calc-p-additional').textContent = Format.currency(additionalCostTotal);
    document.getElementById('calc-p-total-cost').textContent = Format.currency(totalCost);
    document.getElementById('calc-p-avg-cost').textContent = `${Format.currency(averageCost)}/egg`;

    window.showPurchaseBreakdown = function() {
        let html = `
            <div><strong>1. Total Eggs:</strong> ${trays} Trays &times; 30 = ${Format.number(totalEggs)} eggs</div>
            <div><strong>2. Purchase Price:</strong> ${Format.currency(neckPrice)} (NECC) - ${Format.currency(cuttingPrice)} (Cutting) = ${Format.currency(actualPurchasePrice)} per egg</div>
            <div style="margin-top:8px;"><strong>3. Purchase Amount:</strong> ${Format.number(totalEggs)} eggs &times; ${Format.currency(actualPurchasePrice)} = ${Format.currency(purchaseAmount)}</div>
            <div><strong>4. Additional Expenses (Transport/Packing):</strong> ${Format.currency(additionalCostTotal)}</div>
            <div style="margin-top:8px; border-top:1px solid var(--card-border); padding-top:8px;">
                <strong>Total Landed Cost:</strong> ${Format.currency(purchaseAmount)} + ${Format.currency(additionalCostTotal)} = <span style="font-weight:bold; font-size:1.1rem; color:var(--text-primary);">${Format.currency(totalCost)}</span>
            </div>
            <div><strong>Average Cost Per Egg:</strong> ${Format.currency(totalCost)} / ${Format.number(totalEggs)} = <span style="color:var(--color-primary); font-weight:bold;">${Format.currency(averageCost)}</span></div>
        `;
        openBreakdownModal('Purchase Calculation Details', html);
    };

    return { totalEggs, actualPurchasePrice, purchaseAmount, additionalCostTotal, totalCost, averageCost, neckPrice, cuttingPrice, trays };
}

function resetPurchaseForm() {
    document.getElementById('purchase-form').reset();
    document.getElementById('p-fetch-owner').textContent = '-';
    document.getElementById('p-fetch-phone').textContent = '-';
    document.getElementById('p-fetch-location').textContent = '-';
    document.getElementById('purchase-total-eggs-display').value = '';
    document.getElementById('purchase-actual-price-display').value = '';
    
    State.activePurchaseAddCost = { total: 0, details: {} };
    document.getElementById('purchase-add-cost-summary').textContent = '₹0.00';
    
    // Set default date to today
    State.editingPurchaseId = null;
    document.querySelector('#purchase-form button[type="submit"]').textContent = 'Log Purchase';
    calculateLivePurchase();
}

function handlePurchaseSubmit(e) {
    e.preventDefault();
    const farmId = document.getElementById('purchase-farm-select').value;
    const date = document.getElementById('purchase-date').value;
    
    if (!farmId) {
        showToast('Please select a valid farm!', 'danger');
        return;
    }
    
    const farm = State.farms.find(f => f.id === farmId);
    if (!farm) return;

    const calcs = calculateLivePurchase();
    if (calcs.totalEggs === 0) {
        showToast('Egg count cannot be zero!', 'danger');
        return;
    }

    const id = State.editingPurchaseId || `PUR-${String(State.purchases.length + 1).padStart(3, '0')}`;
    const newPurchase = {
        id,
        farmId,
        farmName: farm.name,
        ownerName: farm.ownerName,
        phone: farm.phone,
        location: farm.location,
        date,
        trays: calcs.trays,
        looseEggs: State.editingPurchaseId ? State.purchases.find(p => p.id === id).looseEggs : 0,
        totalEggs: calcs.totalEggs,
        neckPrice: calcs.neckPrice,
        cuttingPrice: calcs.cuttingPrice,
        pricePerEgg: parseFloat(calcs.actualPurchasePrice.toFixed(2)),
        purchaseAmount: calcs.purchaseAmount,
        additionalCost: { ...State.activePurchaseAddCost.details },
        totalAdditionalCost: calcs.additionalCostTotal,
        totalCost: calcs.totalCost,
        averageCost: parseFloat(calcs.averageCost.toFixed(2)),
        isBatched: State.editingPurchaseId ? State.purchases.find(p => p.id === id).isBatched : false
    };

    if (State.editingPurchaseId) {
        const idx = State.purchases.findIndex(p => p.id === State.editingPurchaseId);
        if (idx !== -1) State.purchases[idx] = newPurchase;
        showToast(`Purchase ${id} updated successfully!`);
    } else {
        State.purchases.push(newPurchase);
        showToast(`Purchase ${id} logged successfully!`);
    }
    
    saveState('purchases');
    resetPurchaseForm();
    renderPurchasesTable();
}

window.directDeliveryToCustomer = function(purchaseId) {
    const navItems = document.querySelectorAll('.nav-item');
    const customersTab = Array.from(navItems).find(item => item.getAttribute('data-tab') === 'customers');
    if (customersTab) {
        customersTab.click();
    }
};

function renderPurchasesTable(filterQuery = '') {
    const tbody = document.getElementById('purchases-table-body');
    tbody.innerHTML = '';
    
    const query = filterQuery.toLowerCase();
    const filtered = State.purchases.filter(p => 
        p.id.toLowerCase().includes(query) || 
        p.farmName.toLowerCase().includes(query) ||
        p.location.toLowerCase().includes(query)
    );

    if (filtered.length === 0) {
        tbody.innerHTML = `<tr><td colspan="8" class="empty-state"><div class="empty-state-icon">🛒</div>No purchases logged yet.</td></tr>`;
        return;
    }

    filtered.forEach(p => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td><strong style="color:var(--color-primary);">${p.id}</strong></td>
            <td><strong>${p.farmName}</strong><br><span style="font-size:0.75rem; color:var(--text-muted);">${p.location}</span></td>
            <td style="font-variant-numeric: tabular-nums;">${Format.date(p.date)}</td>
            <td style="font-variant-numeric: tabular-nums;">${Format.number(p.totalEggs)} <span style="font-size:0.75rem; color:var(--text-muted);">(${p.trays}t, ${p.looseEggs}l)</span></td>
            <td style="font-variant-numeric: tabular-nums; color:var(--color-primary); font-weight:500;">${Format.currency(p.totalAdditionalCost)}</td>
            <td style="font-variant-numeric: tabular-nums; font-weight:600;">${Format.currency(p.totalCost)}</td>
            <td style="font-variant-numeric: tabular-nums; color:var(--color-success); font-weight:600;">${Format.currency(p.averageCost)}</td>
            <td>
                <div style="display: flex; gap: 4px; align-items: center; flex-wrap: wrap;">
                    <button class="btn btn-secondary btn-icon-only" onclick="showPurchaseRecordBreakdown('${p.id}')" title="View Calculation" style="width:28px; height:28px; padding:0; font-size:0.8rem;">🔍</button>
                    <button class="btn btn-secondary btn-icon-only" onclick="editPurchase('${p.id}')" title="Edit Purchase" style="width:28px; height:28px; padding:0; font-size:0.8rem;">✏️</button>
                    ${p.isBatched ? 
                        `<span class="badge badge-success">Batched</span>` : 
                        `<button class="btn btn-secondary" onclick="triggerMoveToInventory('${p.id}')" style="padding:4px 8px; font-size:0.75rem;">📦 Batch</button>
                         <button class="btn btn-info" onclick="triggerDirectDelivery('${p.id}')" style="padding:4px 8px; font-size:0.75rem; background-color: var(--color-info); border-color: var(--color-info); color: white;">🚚 Direct Delivery</button>`
                    }
                    <button class="btn btn-danger btn-icon-only" onclick="deletePurchase('${p.id}')" title="Delete Purchase" style="width:28px; height:28px; padding:0; font-size:0.8rem;">🗑️</button>
                </div>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

window.showPurchaseRecordBreakdown = function(id) {
    const p = State.purchases.find(x => x.id === id);
    if (!p) return;
    let html = `
        <div><strong>1. Total Eggs:</strong> ${p.trays} Trays &times; 30 = ${Format.number(p.totalEggs)} eggs</div>
        <div><strong>2. Purchase Price:</strong> ${Format.currency(p.neckPrice)} (NECC) - ${Format.currency(p.cuttingPrice)} (Cutting) = ${Format.currency(p.actualPurchasePrice)} per egg</div>
        <div style="margin-top:8px;"><strong>3. Purchase Amount:</strong> ${Format.number(p.totalEggs)} eggs &times; ${Format.currency(p.actualPurchasePrice)} = ${Format.currency(p.purchaseAmount)}</div>
        <div><strong>4. Additional Expenses (Transport/Packing):</strong> ${Format.currency(p.totalAdditionalCost)}</div>
        <div style="margin-top:8px; border-top:1px solid var(--card-border); padding-top:8px;">
            <strong>Total Landed Cost:</strong> ${Format.currency(p.purchaseAmount)} + ${Format.currency(p.totalAdditionalCost)} = <span style="font-weight:bold; font-size:1.1rem; color:var(--text-primary);">${Format.currency(p.totalCost)}</span>
        </div>
        <div><strong>Average Cost Per Egg:</strong> ${Format.currency(p.totalCost)} / ${Format.number(p.totalEggs)} = <span style="color:var(--color-primary); font-weight:bold;">${Format.currency(p.averageCost)}</span></div>
    `;
    openBreakdownModal(`Purchase Calculation: ${id}`, html);
};

window.deletePurchase = function(id) {
    if (confirm('Delete this purchase? This is only possible if it has not been moved to Inventory.')) {
        const purchase = State.purchases.find(p => p.id === id);
        if (purchase && purchase.isBatched) {
            showToast('Cannot delete purchase that is already linked to inventory!', 'danger');
            return;
        }
        State.purchases = State.purchases.filter(p => p.id !== id);
        saveState('purchases');
        showToast('Purchase deleted');
        renderPurchasesTable(document.getElementById('purchases-search').value);
    }
};

window.triggerDirectDelivery = function(id) {
    const p = State.purchases.find(x => x.id === id);
    if (p) {
        p.isBatched = true; // Prevents it from showing in Inventory Godown dropdown
        saveState('purchases');
        renderPurchasesTable(document.getElementById('purchases-search').value);
        const navItem = document.querySelector('.nav-item[data-tab="customers"]');
        if (navItem) navItem.click();
    }
};

window.editPurchase = function(id) {
    const purchase = State.purchases.find(p => p.id === id);
    if (!purchase) return;

    State.editingPurchaseId = id;
    
    document.getElementById('purchase-farm-select').value = purchase.farmId;
    document.getElementById('purchase-date').value = purchase.date;
    document.getElementById('purchase-trays').value = purchase.trays;
    document.getElementById('purchase-neck-price').value = purchase.neckPrice;
    document.getElementById('purchase-cutting-price').value = purchase.cuttingPrice;

    // Restore additional costs
    State.activePurchaseAddCost.details = { ...purchase.additionalCost };
    renderPurchaseAdditionalCosts();

    document.querySelector('#purchase-form button[type="submit"]').textContent = 'Update Purchase';
    document.getElementById('purchase-form').scrollIntoView({ behavior: 'smooth' });
    showToast('Editing purchase - make changes and click Update', 'success');
};

window.triggerMoveToInventory = function(purchaseId) {
    // Switch to inventory tab
    const navItem = document.querySelector('.nav-item[data-tab="inventory"]');
    if (navItem) {
        navItem.click();
        
        // Auto-select purchase ID
        setTimeout(() => {
            const select = document.getElementById('batch-purchase-select');
            select.value = purchaseId;
            select.dispatchEvent(new Event('change'));
        }, 100);
    }
};

// Expenses Modal functions
function setupExpensesModal() {
    const modal = document.getElementById('expenses-modal');
    const openBtn = document.getElementById('btn-open-expenses-modal');
    const closeBtn = document.getElementById('btn-close-expenses-modal');
    const cancelBtn = document.getElementById('btn-cancel-expenses');
    const saveBtn = document.getElementById('btn-save-expenses');
    
    const deliveryTypeSelect = document.getElementById('exp-delivery-type');
    const rentedFields = document.getElementById('rented-vehicle-fields');
    const ownFields = document.getElementById('own-vehicle-fields');

    const rentedInputs = ['exp-vehicle-rent', 'exp-loading', 'exp-unloading', 'exp-misc'];
    const ownInputs = ['exp-diesel', 'exp-fastag', 'exp-driver-food', 'exp-own-loading', 'exp-own-unloading', 'exp-own-misc'];
    const packagingInputs = ['exp-flipping', 'exp-paper-tray'];

    deliveryTypeSelect.addEventListener('change', (e) => {
        if (e.target.value === 'rented') {
            rentedFields.style.display = 'block';
            ownFields.style.display = 'none';
        } else {
            rentedFields.style.display = 'none';
            ownFields.style.display = 'block';
        }
        updateModalTotal();
    });
    
    function getTotals() {
        let transportTotal = 0;
        let packagingTotal = 0;
        
        if (deliveryTypeSelect.value === 'rented') {
            rentedInputs.forEach(id => {
                transportTotal += parseFloat(document.getElementById(id).value) || 0;
            });
        } else {
            ownInputs.forEach(id => {
                transportTotal += parseFloat(document.getElementById(id).value) || 0;
            });
        }
        
        packagingInputs.forEach(id => {
            packagingTotal += parseFloat(document.getElementById(id).value) || 0;
        });
        
        return { transportTotal, packagingTotal, total: transportTotal + packagingTotal };
    }
    
    function updateModalTotal() {
        const totals = getTotals();
        document.getElementById('calc-exp-transport').textContent = Format.currency(totals.transportTotal);
        document.getElementById('calc-exp-packaging').textContent = Format.currency(totals.packagingTotal);
        document.getElementById('calc-exp-total').textContent = Format.currency(totals.total);
    }

    [...rentedInputs, ...ownInputs, ...packagingInputs].forEach(id => {
        document.getElementById(id).addEventListener('input', updateModalTotal);
    });

    openBtn.addEventListener('click', () => {
        updateModalTotal();
        modal.classList.add('active');
    });

    function closeModal() {
        modal.classList.remove('active');
    }

    closeBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);

    saveBtn.addEventListener('click', () => {
        const totals = getTotals();
        const details = {
            deliveryType: deliveryTypeSelect.value,
            transportTotal: totals.transportTotal,
            packagingTotal: totals.packagingTotal
        };
        
        [...rentedInputs, ...ownInputs, ...packagingInputs].forEach(id => {
            details[id] = parseFloat(document.getElementById(id).value) || 0;
        });

        State.activePurchaseAddCost = {
            total: totals.total,
            details: details
        };
        
        document.getElementById('purchase-add-cost-summary').textContent = Format.currency(totals.total);
        calculateLivePurchase();
        closeModal();
        showToast('Additional expenses applied.');
    });
}

function setupSalesChargesModal() {
    const modal = document.getElementById('sales-charges-modal');
    const openBtn = document.getElementById('btn-open-sales-charges-modal');
    const closeBtn = document.getElementById('btn-close-sales-charges-modal');
    const cancelBtn = document.getElementById('btn-cancel-sales-charges-modal');

    if(!modal || !openBtn) return;

    openBtn.addEventListener('click', () => {
        modal.classList.add('active');
    });

    function closeModal() {
        modal.classList.remove('active');
    }

    if(closeBtn) closeBtn.addEventListener('click', closeModal);
    if(cancelBtn) cancelBtn.addEventListener('click', closeModal);
}

// --- SECTION 3: Godown / Inventory ---
function populatePurchaseDropdown() {
    const select = document.getElementById('batch-purchase-select');
    select.innerHTML = '<option value="">-- Select Purchase ID --</option>';
    
    // Only purchases that are NOT batched yet
    State.purchases.filter(p => !p.isBatched).forEach(p => {
        const opt = document.createElement('option');
        opt.value = p.id;
        opt.textContent = `${p.id} (${p.farmName} - ${p.totalEggs} eggs)`;
        select.appendChild(opt);
    });
}

function handleBatchPurchaseSelect() {
    const purchaseId = this.value;
    const farmSpan = document.getElementById('b-fetch-farm');
    const ownerSpan = document.getElementById('b-fetch-owner');
    const locSpan = document.getElementById('b-fetch-location');
    const eggsSpan = document.getElementById('b-fetch-eggs');
    const costSpan = document.getElementById('b-fetch-avg-cost');
    
    if (!purchaseId) {
        farmSpan.textContent = '-';
        ownerSpan.textContent = '-';
        locSpan.textContent = '-';
        eggsSpan.textContent = '-';
        costSpan.textContent = '-';
        document.getElementById('batch-id-preview').textContent = 'BATCH-2026-XXX';
        return;
    }

    const p = State.purchases.find(item => item.id === purchaseId);
    if (p) {
        farmSpan.textContent = p.farmName;
        ownerSpan.textContent = p.ownerName;
        locSpan.textContent = p.location;
        eggsSpan.textContent = Format.number(p.totalEggs);
        costSpan.textContent = Format.currency(p.averageCost);
        
        // Auto-generate Batch Number preview: BATCH-YYYY-Seq
        const year = p.date ? p.date.substring(0, 4) : '2026';
        const batchSeq = String(State.batches.length + 1).padStart(3, '0');
        document.getElementById('batch-id-preview').textContent = `BATCH-${year}-${batchSeq}`;
    }
}

function resetBatchForm() {
    document.getElementById('batch-form').reset();
    document.getElementById('b-fetch-farm').textContent = '-';
    document.getElementById('b-fetch-owner').textContent = '-';
    document.getElementById('b-fetch-location').textContent = '-';
    document.getElementById('b-fetch-eggs').textContent = '-';
    document.getElementById('b-fetch-avg-cost').textContent = '-';
    document.getElementById('batch-id-preview').textContent = 'BATCH-2026-XXX';
    
    State.editingInventoryId = null;
    document.querySelector('#batch-form button[type="submit"]').textContent = 'Save Batch';
}

function handleBatchSubmit(e) {
    e.preventDefault();
    const purchaseId = document.getElementById('batch-purchase-select').value;
    const godownNumber = document.getElementById('batch-godown').value.trim();
    
    if (!purchaseId) {
        showToast('Please select a purchase!', 'danger');
        return;
    }

    const p = State.purchases.find(item => item.id === purchaseId);
    if (!p || p.isBatched) {
        showToast('Selected purchase has already been batched.', 'danger');
        return;
    }

    if (State.editingInventoryId) {
        const idx = State.batches.findIndex(b => b.id === State.editingInventoryId);
        if (idx !== -1) {
            State.batches[idx].godownNumber = godownNumber;
            // Since we don't allow changing purchaseId, we just update godownNumber
        }
        showToast(`Batch "${State.editingInventoryId}" updated successfully!`);
    } else {
        const year = p.date ? p.date.substring(0, 4) : '2026';
        const batchSeq = String(State.batches.length + 1).padStart(3, '0');
        const batchId = `BATCH-${year}-${batchSeq}`;

        const newBatch = {
            id: batchId,
            purchaseId: p.id,
            farmName: p.farmName,
            ownerName: p.ownerName,
            phone: p.phone,
            location: p.location,
            totalEggs: p.totalEggs,
            availableEggs: p.totalEggs,
            averageCost: p.averageCost,
            godownNumber,
            status: 'Active',
            damagedEggs: 0,
            returnedEggs: 0,
            totalDamagedLogged: 0,
            totalReturnedLogged: 0
        };

        // Save batch
        State.batches.push(newBatch);
        
        // Mark purchase as batched
        p.isBatched = true;
        saveState('purchases');

        showToast(`Batch "${batchId}" stored in inventory successfully!`);
    }
    
    saveState('batches');
    resetBatchForm();
    renderInventoryTable();
}

function renderInventoryTable(filterQuery = '') {
    const tbody = document.getElementById('inventory-table-body');
    tbody.innerHTML = '';
    
    const query = filterQuery.toLowerCase();
    const filtered = State.batches.filter(b => 
        b.id.toLowerCase().includes(query) || 
        b.purchaseId.toLowerCase().includes(query) ||
        b.godownNumber.toLowerCase().includes(query) ||
        b.farmName.toLowerCase().includes(query)
    );

    if (filtered.length === 0) {
        tbody.innerHTML = `<tr><td colspan="8" class="empty-state"><div class="empty-state-icon">📦</div>No inventory batches found.</td></tr>`;
        return;
    }

    filtered.forEach(b => {
        const tr = document.createElement('tr');
        const badgeClass = b.availableEggs > 0 ? 'badge-success' : 'badge-danger';
        tr.innerHTML = `
            <td><strong style="color:var(--color-primary);">${b.id}</strong></td>
            <td>${b.purchaseId}</td>
            <td><span style="font-weight:500;">${b.godownNumber}</span></td>
            <td style="font-variant-numeric: tabular-nums; font-weight:600;">${Format.number(b.availableEggs)} / ${Format.number(b.totalEggs)}</td>
            <td style="font-variant-numeric: tabular-nums; color:var(--color-success); font-weight:500;">${Format.currency(b.averageCost)}</td>
            <td><span class="badge ${badgeClass}">${b.availableEggs > 0 ? 'In Stock' : 'Out of Stock'}</span></td>
            <td>
                <div style="display: flex; gap: 4px; align-items: center; flex-wrap: wrap;">
                    <button class="btn btn-secondary btn-icon-only" onclick="editInventory('${b.id}')" title="Edit Batch" style="width:28px; height:28px; padding:0; font-size:0.8rem;">✏️</button>
                    <button class="btn btn-danger btn-icon-only" onclick="deleteInventory('${b.id}')" title="Delete Batch" style="width:28px; height:28px; padding:0; font-size:0.8rem;">🗑️</button>
                </div>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

window.editInventory = function(id) {
    const batch = State.batches.find(b => b.id === id);
    if (!batch) return;

    State.editingInventoryId = id;

    // We only allow editing the godown number. Changing purchase link is too complex.
    const select = document.getElementById('batch-purchase-select');
    // Ensure the purchase is in the options (it might not be if it's already batched, so we add it temporarily)
    if (!Array.from(select.options).some(opt => opt.value === batch.purchaseId)) {
        const p = State.purchases.find(p => p.id === batch.purchaseId);
        if (p) {
            const opt = document.createElement('option');
            opt.value = p.id;
            opt.textContent = `${p.id} (${p.farmName} - ${p.totalEggs} eggs)`;
            select.appendChild(opt);
        }
    }
    select.value = batch.purchaseId;
    // trigger change to fill preview
    select.dispatchEvent(new Event('change'));
    
    document.getElementById('batch-godown').value = batch.godownNumber;
    
    document.querySelector('#batch-form button[type="submit"]').textContent = 'Update Batch';
    document.getElementById('batch-form').scrollIntoView({ behavior: 'smooth' });
    showToast('Editing batch - make changes and click Update', 'success');
};

window.deleteInventory = function(id) {
    if (confirm('Delete this inventory batch? This will revert the purchase to un-batched state. Warning: only do this if there are no sales tied to this batch!')) {
        const batch = State.batches.find(b => b.id === id);
        if (batch) {
            // Revert the linked purchase
            const p = State.purchases.find(p => p.id === batch.purchaseId);
            if (p) {
                p.isBatched = false;
                saveState('purchases');
            }
        }
        State.batches = State.batches.filter(b => b.id !== id);
        saveState('batches');
        showToast('Inventory batch deleted');
        
        // re-populate the purchase dropdown to show the reverted purchase
        populatePurchaseDropdown();
        
        renderInventoryTable(document.getElementById('inventory-search').value);
    }
};




// --- SECTION 5: Customers Master ---
function handleCustomerSubmit(e) {
    e.preventDefault();
    const type = document.getElementById('customer-type').value;
    const name = document.getElementById('customer-name').value.trim();
    const phone = document.getElementById('customer-phone').value.trim();
    const location = document.getElementById('customer-location').value.trim();

    if (State.editingCustomerId) {
        const customer = State.customers.find(c => c.id === State.editingCustomerId);
        if (customer) {
            customer.type = type;
            customer.name = name;
            customer.phone = phone;
            customer.location = location;
            saveState('customers');
            showToast(`Customer "${name}" updated!`);
        }
        State.editingCustomerId = null;
        document.querySelector('#customer-form button[type="submit"]').textContent = 'Save Customer';
    } else {
        const id = `CUST-${String(State.customers.length + 1).padStart(3, '0')}`;
        const newCustomer = { id, type, name, phone, location };
        State.customers.push(newCustomer);
        saveState('customers');
        showToast(`Customer "${name}" saved!`);
    }
    document.getElementById('customer-form').reset();
    renderCustomersTable();
}

function renderCustomersTable(filterQuery = '') {
    const tbody = document.getElementById('customers-table-body');
    tbody.innerHTML = '';
    
    const query = filterQuery.toLowerCase();
    const filtered = State.customers.filter(c => 
        c.name.toLowerCase().includes(query) || 
        c.type.toLowerCase().includes(query) ||
        c.location.toLowerCase().includes(query)
    );

    if (filtered.length === 0) {
        tbody.innerHTML = `<tr><td colspan="5" class="empty-state"><div class="empty-state-icon">👥</div>No customers registered.</td></tr>`;
        return;
    }

    filtered.forEach(c => {
        const tr = document.createElement('tr');
        let typeBadgeColor = 'badge-primary';
        if (c.type === 'Hyperpure') typeBadgeColor = 'badge-info';
        if (c.type === 'Eggoz') typeBadgeColor = 'badge-success';
        if (c.type === 'Licious') typeBadgeColor = 'badge-danger';
        
        tr.innerHTML = `
            <td><strong style="color:var(--text-primary);">${c.name}</strong><br><span style="font-size:0.75rem; color:var(--text-muted);">${c.id}</span></td>
            <td><span class="badge ${typeBadgeColor}">${c.type}</span></td>
            <td style="font-variant-numeric: tabular-nums;">${c.phone}</td>
            <td>${c.location}</td>
            <td>
                <button class="btn btn-secondary btn-icon-only" onclick="editCustomer('${c.id}')" title="Edit Customer" style="width:28px; height:28px; padding:0; font-size:0.8rem;">✏️</button>
                <button class="btn btn-danger btn-icon-only" onclick="deleteCustomer('${c.id}')" title="Delete Customer" style="width:28px; height:28px; padding:0; font-size:0.8rem;">🗑️</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

window.editCustomer = function(id) {
    const c = State.customers.find(c => c.id === id);
    if (!c) return;
    document.getElementById('customer-type').value = c.type;
    document.getElementById('customer-name').value = c.name;
    document.getElementById('customer-phone').value = c.phone;
    document.getElementById('customer-location').value = c.location;
    State.editingCustomerId = id;
    document.querySelector('#customer-form button[type="submit"]').textContent = 'Update Customer';
    document.getElementById('customer-name').scrollIntoView({ behavior: 'smooth' });
    showToast('Editing customer - make changes and click Update Customer', 'success');
};

window.deleteCustomer = function(id) {
    if (confirm('Are you sure you want to delete this customer? This will not affect prior invoice logs.')) {
        State.customers = State.customers.filter(c => c.id !== id);
        saveState('customers');
        showToast('Customer deleted');
        renderCustomersTable(document.getElementById('customers-search').value);
    }
};


// --- SECTION 6: Sales Management ---
window.updateDynamicSalesFields = function() {
    const customer = document.getElementById('sales-customer-select').value;
    const delType = document.getElementById('sales-delivery-type').value;

    const btnModal = document.getElementById('btn-open-sales-charges-modal');
    const delTypeGroup = document.getElementById('sales-delivery-type-group');

    const groups = ['labour', 'rent', 'diesel', 'loading', 'unloading', 'food', 'fastag', 'paper', 'misc', 'cleaning'].map(g => `charge-${g}-group`);
    groups.forEach(id => {
        if(document.getElementById(id)) document.getElementById(id).style.display = 'none';
    });

    if (!customer) {
        if(btnModal) btnModal.style.display = 'none';
        calculateLiveSales();
        return;
    }

    if(btnModal) btnModal.style.display = 'flex';

    if (customer === 'Eggoz') {
        if(delTypeGroup) delTypeGroup.style.display = 'none';
        if(document.getElementById('charge-labour-group')) document.getElementById('charge-labour-group').style.display = 'block';
    } else if (customer === 'Hyperpure') {
        if(delTypeGroup) delTypeGroup.style.display = 'block';
        if (delType === 'rented') {
            ['rent', 'loading', 'unloading', 'paper'].forEach(g => {
                if(document.getElementById(`charge-${g}-group`)) document.getElementById(`charge-${g}-group`).style.display = 'block';
            });
        } else if (delType === 'own') {
            ['diesel', 'food', 'fastag', 'misc', 'loading', 'unloading', 'paper'].forEach(g => {
                if(document.getElementById(`charge-${g}-group`)) document.getElementById(`charge-${g}-group`).style.display = 'block';
            });
        }
    } else if (customer === 'Licious') {
        if(delTypeGroup) delTypeGroup.style.display = 'block';
        if (delType === 'rented') {
            ['rent', 'loading', 'unloading', 'cleaning'].forEach(g => {
                if(document.getElementById(`charge-${g}-group`)) document.getElementById(`charge-${g}-group`).style.display = 'block';
            });
        } else if (delType === 'own') {
            ['diesel', 'food', 'fastag', 'misc', 'loading', 'unloading', 'cleaning'].forEach(g => {
                if(document.getElementById(`charge-${g}-group`)) document.getElementById(`charge-${g}-group`).style.display = 'block';
            });
        }
    }

    calculateLiveSales();
};

function populateCustomerAndBatchDropdowns() {
    // Batches
    const batchSelect = document.getElementById('sales-batch-select');
    batchSelect.innerHTML = '<option value="">-- Select Batch --</option>';
    State.batches.filter(b => b.availableEggs > 0).forEach(b => {
        const opt = document.createElement('option');
        opt.value = b.id;
        const trays = Math.floor(b.availableEggs / 30);
        opt.textContent = `${b.id} (${trays} Trays / ${b.availableEggs} Eggs)`;
        batchSelect.appendChild(opt);
    });
}

function handleSalesBatchSelect() {
    const batchId = this.value;
    const stockSpan = document.getElementById('s-fetch-stock');
    const costSpan = document.getElementById('s-fetch-cost');
    
    if (!batchId) {
        stockSpan.textContent = '-';
        costSpan.textContent = '-';
        return;
    }

    const b = State.batches.find(item => item.id === batchId);
    if (b) {
        stockSpan.textContent = Format.number(b.availableEggs);
        costSpan.textContent = Format.currency(b.averageCost);
        calculateLiveSales();
    }
}

function calculateLiveSales() {
    const batchId = document.getElementById('sales-batch-select').value;
    if (!batchId) return null;
    
    const b = State.batches.find(item => item.id === batchId);
    if (!b) return null;

    const trays = parseInt(document.getElementById('sales-trays').value) || 0;
    const price = parseFloat(document.getElementById('sales-selling-price').value) || 0;

    const totalEggs = (trays * 30);
    const salesRevenue = totalEggs * price;
    
    let customerCharges = 0;
    const chargeGroups = ['labour', 'rent', 'diesel', 'loading', 'unloading', 'food', 'fastag', 'paper', 'misc', 'cleaning'];
    const chargesBreakdown = {};
    
    chargeGroups.forEach(key => {
        const groupEl = document.getElementById(`charge-${key}-group`);
        if (groupEl && groupEl.style.display !== 'none') {
            const val = parseFloat(document.getElementById(`s-charge-${key}`).value) || 0;
            customerCharges += val;
            chargesBreakdown[key] = val;
        }
    });

    const productCost = totalEggs * b.averageCost;
    const actualCost = productCost + customerCharges;
    const netProfit = salesRevenue - actualCost;
    const profitPerEgg = totalEggs > 0 ? (netProfit / totalEggs) : 0;

    // Update UI elements
    document.getElementById('calc-s-total-eggs').textContent = Format.number(totalEggs);
    const inlineEggs = document.getElementById('calc-s-total-eggs-inline');
    if(inlineEggs) inlineEggs.textContent = Format.number(totalEggs);
    document.getElementById('calc-s-customer-charges').textContent = Format.currency(customerCharges);
    document.getElementById('calc-s-revenue').textContent = Format.currency(salesRevenue);
    document.getElementById('calc-s-actual-cost').textContent = Format.currency(actualCost);
    
    const gpLabel = document.getElementById('calc-s-gross-profit');
    gpLabel.textContent = Format.currency(netProfit);
    if (netProfit >= 0) {
        gpLabel.style.color = 'var(--color-success)';
    } else {
        gpLabel.style.color = 'var(--color-danger)';
    }

    const profitEggLabel = document.getElementById('calc-s-profit-egg');
    if(profitEggLabel) profitEggLabel.textContent = Format.currency(profitPerEgg);

    const landedPricePerEgg = totalEggs > 0 ? (actualCost / totalEggs) : 0;
    const landedPriceLabel = document.getElementById('calc-s-landed-price');
    if(landedPriceLabel) landedPriceLabel.textContent = Format.currency(landedPricePerEgg);

    window.showSalesBreakdown = function() {
        let html = `
            <div><strong>1. Total Eggs Sold:</strong> ${trays} Trays &times; 30 = ${Format.number(totalEggs)} eggs</div>
            <div><strong>2. Sales Revenue:</strong> ${Format.number(totalEggs)} eggs &times; ${Format.currency(price)} = <span style="color:var(--color-success); font-weight:bold;">${Format.currency(salesRevenue)}</span></div>
            <div style="margin-top:8px;"><strong>3. Product Cost (from Batch):</strong> ${Format.number(totalEggs)} eggs &times; ${Format.currency(b.averageCost)} = ${Format.currency(productCost)}</div>
            <div><strong>4. Customer Charges (Transport/Misc):</strong> ${Format.currency(customerCharges)}</div>
            <div><strong>5. Actual Sales Cost:</strong> ${Format.currency(productCost)} + ${Format.currency(customerCharges)} = <span style="color:var(--color-danger); font-weight:bold;">${Format.currency(actualCost)}</span></div>
            <div style="margin-top:8px;"><strong>Landed Price Per Egg:</strong> ${Format.currency(actualCost)} / ${Format.number(totalEggs)} = ${Format.currency(landedPricePerEgg)}</div>
            <div style="margin-top:8px; border-top:1px solid var(--card-border); padding-top:8px;">
                <strong>Net Profit:</strong> ${Format.currency(salesRevenue)} (Revenue) - ${Format.currency(actualCost)} (Cost) = <span style="color:${netProfit>=0?'var(--color-success)':'var(--color-danger)'}; font-weight:bold; font-size:1.1rem;">${Format.currency(netProfit)}</span>
            </div>
        `;
        openBreakdownModal('Sales Calculation Details', html);
    };

    return { totalEggs, customerCharges, chargesBreakdown, salesRevenue, productCost, actualCost, netProfit, profitPerEgg, price };
}

function resetSalesForm() {
    document.getElementById('sales-form').reset();
    document.getElementById('s-fetch-stock').textContent = '-';
    document.getElementById('s-fetch-cost').textContent = '-';
    
    document.getElementById('calc-s-total-eggs').textContent = '0';
    const inlineEggs = document.getElementById('calc-s-total-eggs-inline');
    if(inlineEggs) inlineEggs.textContent = '0';
    document.getElementById('calc-s-customer-charges').textContent = '₹0.00';
    document.getElementById('calc-s-revenue').textContent = '₹0.00';
    document.getElementById('calc-s-actual-cost').textContent = '₹0.00';
    document.getElementById('calc-s-gross-profit').textContent = '₹0.00';
    document.getElementById('calc-s-gross-profit').style.color = '';
    const profitEggLabel = document.getElementById('calc-s-profit-egg');
    if(profitEggLabel) profitEggLabel.textContent = '₹0.00';
    
    State.editingSaleId = null;
    document.querySelector('#sales-form button[type="submit"]').textContent = 'Confirm Sale';
    updateDynamicSalesFields();
}

function handleSalesSubmit(e) {
    e.preventDefault();
    const customerName = document.getElementById('sales-customer-select').value;
    const batchId = document.getElementById('sales-batch-select').value;

    if (!customerName || !batchId) {
        showToast('Please specify customer and inventory batch!', 'danger');
        return;
    }

    const b = State.batches.find(item => item.id === batchId);
    if (!b) return;

    const calcs = calculateLiveSales();
    if (!calcs) return;

    if (calcs.totalEggs === 0) {
        showToast('Sales volume cannot be zero!', 'danger');
        return;
    }

    let requiredEggs = calcs.totalEggs;
    if (State.editingSaleId) {
        const oldSale = State.sales.find(s => s.id === State.editingSaleId);
        if (oldSale && oldSale.batchId === batchId) {
            requiredEggs -= oldSale.totalEggsSold;
        }
    }

    if (requiredEggs > b.availableEggs) {
        showToast('Insufficient batch stock for this sale!', 'danger');
        return;
    }

    // Deduct stock
    if (State.editingSaleId) {
        const oldSale = State.sales.find(s => s.id === State.editingSaleId);
        if (oldSale && oldSale.batchId !== batchId) {
            const oldBatch = State.batches.find(ob => ob.id === oldSale.batchId);
            if (oldBatch) oldBatch.availableEggs += oldSale.totalEggsSold;
            b.availableEggs -= calcs.totalEggs;
        } else {
            b.availableEggs -= requiredEggs;
        }
    } else {
        b.availableEggs -= calcs.totalEggs;
    }
    saveState('batches');
    saveState('sales');

    const delType = document.getElementById('sales-delivery-type').value;

    const saleId = State.editingSaleId || `SAL-${String(State.sales.length + 1).padStart(3, '0')}`;
    const newSale = {
        id: saleId,
        customerName: customerName,
        batchId,
        traysSold: parseInt(document.getElementById('sales-trays').value) || 0,
        totalEggsSold: calcs.totalEggs,
        deliveryType: delType,
        customerCharges: calcs.customerCharges,
        chargesBreakdown: calcs.chargesBreakdown,
        sellingPricePerEgg: calcs.price,
        salesRevenue: calcs.salesRevenue,
        productCost: calcs.productCost,
        actualCost: calcs.actualCost,
        netProfit: calcs.netProfit,
        profitPerEgg: calcs.profitPerEgg,
        date: State.editingSaleId ? State.sales.find(s => s.id === saleId).date : new Date().toISOString().split('T')[0]
    };

    if (State.editingSaleId) {
        const idx = State.sales.findIndex(s => s.id === State.editingSaleId);
        if (idx !== -1) State.sales[idx] = newSale;
        showToast(`Invoice ${saleId} updated. Inventory adjusted.`);
    } else {
        State.sales.push(newSale);
        showToast(`Invoice ${saleId} recorded. Inventory updated.`);
    }
    saveState('sales');

    resetSalesForm();
    populateCustomerAndBatchDropdowns();
    populateReturnDropdowns();
    renderSalesTable();
}

function renderSalesTable(filterQuery = '') {
    const tbody = document.getElementById('sales-table-body');
    tbody.innerHTML = '';
    
    const query = filterQuery.toLowerCase();
    const filtered = State.sales.filter(s => 
        s.id.toLowerCase().includes(query) || 
        s.customerName.toLowerCase().includes(query) ||
        s.batchId.toLowerCase().includes(query)
    );

    if (filtered.length === 0) {
        tbody.innerHTML = `<tr><td colspan="9" class="empty-state"><div class="empty-state-icon">💰</div>No sales recorded yet.</td></tr>`;
        return;
    }

    

    filtered.forEach(s => {
        const tr = document.createElement('tr');
        const netProfit = s.netProfit !== undefined ? s.netProfit : (s.grossProfit || 0);
        
        let sellingPrice = s.sellingPricePerEgg !== undefined ? s.sellingPricePerEgg : (s.sellingPrice || 0);
        if (sellingPrice === 0 && s.totalEggsSold > 0) {
            sellingPrice = s.salesRevenue / s.totalEggsSold;
        }

        let customerCharges = s.customerCharges !== undefined ? s.customerCharges : (s.transportationCost || 0);
        if (customerCharges === 0 && s.salesRevenue > 0) {
            const b = State.batches.find(item => item.id === s.batchId);
            const avgCost = b ? b.averageCost : 0;
            const productCost = s.totalEggsSold * avgCost;
            const actualCost = s.salesRevenue - netProfit;
            const derivedCharges = actualCost - productCost;
            if (derivedCharges > 0.01) {
                customerCharges = derivedCharges;
            }
        }
        
        const gpColor = netProfit >= 0 ? 'var(--color-success)' : 'var(--color-danger)';
        tr.innerHTML = `
            <td><strong style="color:var(--color-primary);">${s.id}</strong></td>
            <td><strong>${s.customerName}</strong></td>
            <td>${s.batchId}</td>
            <td style="font-variant-numeric: tabular-nums;">${Format.number(s.totalEggsSold)}</td>
            <td style="font-variant-numeric: tabular-nums;">${Format.currency(sellingPrice)}</td>
            <td style="font-variant-numeric: tabular-nums;">${Format.currency(customerCharges)}</td>
            <td style="font-variant-numeric: tabular-nums; font-weight:600;">${Format.currency(s.salesRevenue)}</td>
            <td style="font-variant-numeric: tabular-nums; font-weight:700; color:${gpColor};">${Format.currency(netProfit)}</td>
            <td>
                <div style="display: flex; gap: 4px; align-items: center; flex-wrap: wrap;">
                    <button class="btn btn-secondary btn-icon-only" onclick="showSalesRecordBreakdown('${s.id}')" title="View Calculation" style="width:28px; height:28px; padding:0; font-size:0.8rem;">🔍</button>
                    <button class="btn btn-secondary btn-icon-only" onclick="editSale('${s.id}')" title="Edit Sale" style="width:28px; height:28px; padding:0; font-size:0.8rem;">✏️</button>
                    <button class="btn btn-danger btn-icon-only" onclick="deleteSale('${s.id}')" title="Delete Sale" style="width:28px; height:28px; padding:0; font-size:0.8rem;">🗑️</button>
                </div>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

window.showSalesRecordBreakdown = function(id) {
    const s = State.sales.find(x => x.id === id);
    if (!s) return;
    const b = State.batches.find(item => item.id === s.batchId);
    const avgCost = b ? b.averageCost : 0;
    const trays = s.traysSold !== undefined ? s.traysSold : Math.floor((s.totalEggsSold || 0) / 30);
    const productCost = s.productCost !== undefined ? s.productCost : ((s.totalEggsSold || 0) * avgCost);
    const customerCharges = s.customerCharges !== undefined ? s.customerCharges : (s.transportationCost || 0);
    const actualCost = s.actualCost !== undefined ? s.actualCost : (productCost + customerCharges);
    const landedPricePerEgg = s.totalEggsSold > 0 ? (actualCost / s.totalEggsSold) : 0;
    const netProfit = s.netProfit !== undefined ? s.netProfit : ((s.salesRevenue || 0) - actualCost);
    const sellingPrice = s.sellingPricePerEgg !== undefined ? s.sellingPricePerEgg : (s.sellingPrice || 0);
    
    let html = `
        <div><strong>1. Total Eggs Sold:</strong> ${trays} Trays &times; 30 = ${Format.number(s.totalEggsSold || 0)} eggs</div>
        <div><strong>2. Sales Revenue:</strong> ${Format.number(s.totalEggsSold || 0)} eggs &times; ${Format.currency(sellingPrice)} = <span style="color:var(--color-success); font-weight:bold;">${Format.currency(s.salesRevenue || 0)}</span></div>
        <div style="margin-top:8px;"><strong>3. Product Cost (from Batch):</strong> ${Format.number(s.totalEggsSold || 0)} eggs &times; ${Format.currency(avgCost)} = ${Format.currency(productCost)}</div>
        <div><strong>4. Customer Charges (Transport/Misc):</strong> ${Format.currency(customerCharges)}</div>
        <div><strong>5. Actual Sales Cost:</strong> ${Format.currency(productCost)} + ${Format.currency(customerCharges)} = <span style="color:var(--color-danger); font-weight:bold;">${Format.currency(actualCost)}</span></div>
        <div style="margin-top:8px;"><strong>Landed Price Per Egg:</strong> ${Format.currency(actualCost)} / ${Format.number(s.totalEggsSold || 0)} = ${Format.currency(landedPricePerEgg)}</div>
        <div style="margin-top:8px; border-top:1px solid var(--card-border); padding-top:8px;">
            <strong>Net Profit:</strong> ${Format.currency(s.salesRevenue || 0)} (Revenue) - ${Format.currency(actualCost)} (Cost) = <span style="color:${netProfit>=0?'var(--color-success)':'var(--color-danger)'}; font-weight:bold; font-size:1.1rem;">${Format.currency(netProfit)}</span>
        </div>
    `;
    openBreakdownModal(`Sales Calculation: ${id}`, html);
};

window.deleteSale = function(id) {
    if (confirm('Delete this sale? The eggs will be restored to the batch inventory.')) {
        const sale = State.sales.find(s => s.id === id);
        if (!sale) return;
        // Restore eggs to batch
        const batch = State.batches.find(b => b.id === sale.batchId);
        if (batch) {
            batch.availableEggs += sale.totalEggsSold;
            saveState('batches');
        }
        State.sales = State.sales.filter(s => s.id !== id);
        saveState('sales');
        showToast('Sale deleted and stock restored');
        populateCustomerAndBatchDropdowns();
        populateReturnDropdowns();
        renderSalesTable(document.getElementById('sales-search').value);
    }
};

window.editSale = function(id) {
    const sale = State.sales.find(s => s.id === id);
    if (!sale) return;

    State.editingSaleId = id;
    
    document.getElementById('sales-customer-select').value = sale.customerName;
    document.getElementById('sales-batch-select').value = sale.batchId;
    
    updateDynamicSalesFields();

    document.getElementById('sales-trays').value = sale.traysSold;
    document.getElementById('sales-selling-price').value = sale.sellingPricePerEgg;
    
    if (sale.deliveryType) {
        const dtSelect = document.getElementById('sales-delivery-type');
        if (dtSelect) dtSelect.value = sale.deliveryType;
        updateDynamicSalesFields();
    }

    // Restore charges
    if (sale.chargesBreakdown) {
        Object.keys(sale.chargesBreakdown).forEach(key => {
            const el = document.getElementById(`s-charge-${key}`);
            if (el) el.value = sale.chargesBreakdown[key];
        });
    }

    calculateLiveSales();

    document.querySelector('#sales-form button[type="submit"]').textContent = 'Update Sale';
    document.getElementById('sales-form').scrollIntoView({ behavior: 'smooth' });
    showToast('Editing sale - make changes and click Update', 'success');
};

// --- SECTION 7: Return Management ---
function populateReturnDropdowns() {
    const customer = document.getElementById('ret-customer-select').value;
    const batchSelect = document.getElementById('ret-batch-select');
    batchSelect.innerHTML = '<option value="">-- Select Sales Batch --</option>';
    
    // Populate with Sales IDs (or Batch Numbers from sales) matching the customer (if selected)
    State.sales.forEach(s => {
        if (!customer || s.customerName === customer) {
            const opt = document.createElement('option');
            opt.value = s.id;
            opt.textContent = `${s.id} (Batch: ${s.batchId}) - ${s.customerName}`;
            // Store sale details in dataset for easy retrieval
            opt.dataset.date = s.date || '-';
            opt.dataset.trays = s.traysSold !== undefined ? s.traysSold : Math.floor((s.totalEggsSold || 0) / 30);
            opt.dataset.eggs = s.totalEggsSold || 0;
            opt.dataset.price = s.sellingPricePerEgg !== undefined ? s.sellingPricePerEgg : (s.sellingPrice || 0);
            opt.dataset.revenue = s.salesRevenue || 0;
            batchSelect.appendChild(opt);
        }
    });
}

function handleReturnSalesSelect() {
    const select = document.getElementById('ret-batch-select');
    const saleId = select.value;
    const infoGroup = document.getElementById('ret-sales-info');
    
    if (!saleId) {
        infoGroup.style.display = 'none';
        return;
    }

    const opt = select.options[select.selectedIndex];
    document.getElementById('r-fetch-date').textContent = Format.date(opt.dataset.date === '-' ? new Date().toISOString() : opt.dataset.date);
    document.getElementById('r-fetch-trays').textContent = Format.number(opt.dataset.trays || 0);
    document.getElementById('r-fetch-eggs').textContent = Format.number(opt.dataset.eggs || 0);
    
    const priceEl = document.getElementById('r-fetch-price');
    if (priceEl) priceEl.textContent = Format.currency(parseFloat(opt.dataset.price) || 0);
    const revenueEl = document.getElementById('r-fetch-revenue');
    if (revenueEl) revenueEl.textContent = Format.currency(parseFloat(opt.dataset.revenue) || 0);
    
    infoGroup.style.display = 'block';
    calculateLiveReturns();
}

function updateDynamicReturnFields() {
    const customer = document.getElementById('ret-customer-select').value;
    
    ['ret-hyperpure-fields', 'ret-eggoz-fields', 'ret-licious-fields'].forEach(id => {
        document.getElementById(id).style.display = 'none';
    });

    if (customer === 'Hyperpure') {
        document.getElementById('ret-hyperpure-fields').style.display = 'block';
    } else if (customer === 'Eggoz') {
        document.getElementById('ret-eggoz-fields').style.display = 'block';
    } else if (customer === 'Licious') {
        document.getElementById('ret-licious-fields').style.display = 'block';
    }
    
    // Repopulate filtered batch select and reset sales info display
    populateReturnDropdowns();
    document.getElementById('ret-sales-info').style.display = 'none';
    
    calculateLiveReturns();
}

function calculateLiveReturns() {
    const customer = document.getElementById('ret-customer-select').value;
    let totalEggs = 0;

    if (customer === 'Hyperpure') {
        const fields = ['ret-h-damaged', 'ret-h-scrap', 'ret-h-dirty', 'ret-h-small', 'ret-h-big', 'ret-h-airline'];
        fields.forEach(f => {
            totalEggs += parseInt(document.getElementById(f).value) || 0;
        });
    } else if (customer === 'Eggoz') {
        totalEggs += (parseInt(document.getElementById('ret-e-damaged').value) || 0) + (parseInt(document.getElementById('ret-e-scrap').value) || 0);
    } else if (customer === 'Licious') {
        totalEggs += parseInt(document.getElementById('ret-l-returned').value) || 0;
    }

    const trays = Math.floor(totalEggs / 30);
    const loose = totalEggs % 30;

    const select = document.getElementById('ret-batch-select');
    let price = 0;
    let revenue = 0;
    let netAmount = 0;
    let returnedValue = 0;
    if (select && select.selectedIndex > 0) {
        const opt = select.options[select.selectedIndex];
        price = parseFloat(opt.dataset.price) || 0;
        revenue = parseFloat(opt.dataset.revenue) || 0;
        returnedValue = totalEggs * price;
        netAmount = revenue - returnedValue;
    }

    document.getElementById('calc-ret-total-eggs').textContent = Format.number(totalEggs);
    document.getElementById('calc-ret-trays').textContent = Format.number(trays);
    document.getElementById('calc-ret-loose').textContent = Format.number(loose);
    const netAmountEl = document.getElementById('calc-ret-net-amount');
    if(netAmountEl) netAmountEl.textContent = Format.currency(netAmount);

    window.showReturnBreakdown = function() {
        let html = `
            <div><strong>1. Original Sales Amount:</strong> <span style="color:var(--color-success); font-weight:bold;">${Format.currency(revenue)}</span></div>
            <div><strong>2. Per Egg Selling Price:</strong> ${Format.currency(price)}</div>
            <div style="margin-top:8px;"><strong>3. Value of Returned Eggs:</strong> ${Format.number(totalEggs)} returned eggs &times; ${Format.currency(price)} = <span style="color:var(--color-danger); font-weight:bold;">${Format.currency(returnedValue)}</span></div>
            <div style="margin-top:8px; border-top:1px solid var(--card-border); padding-top:8px;">
                <strong>Net Amount After Return:</strong> ${Format.currency(revenue)} - ${Format.currency(returnedValue)} = <span style="font-weight:bold; font-size:1.1rem; color:var(--color-primary);">${Format.currency(netAmount)}</span>
            </div>
        `;
        openBreakdownModal('Return Calculation Details', html);
    };

    return { totalEggs, trays, loose, returnedValue, netAmount };
}

function resetReturnForm() {
    document.getElementById('recovery-form').reset();
    document.getElementById('ret-sales-info').style.display = 'none';
    updateDynamicReturnFields();
    State.editingReturnId = null;
    document.querySelector('#recovery-form button[type="submit"]').textContent = 'Save Return Record';
}

function handleReturnSubmit(e) {
    e.preventDefault();
    const customer = document.getElementById('ret-customer-select').value;
    const saleId = document.getElementById('ret-batch-select').value;

    if (!customer || !saleId) {
        showToast('Please select Customer and Sales Batch!', 'danger');
        return;
    }

    const sale = State.sales.find(s => s.id === saleId);
    if (!sale) return;

    const calcs = calculateLiveReturns();
    if (calcs.totalEggs === 0) {
        showToast('Returned eggs cannot be zero!', 'danger');
        return;
    }

    const record = {
        id: State.editingReturnId || `RET-${String(State.returnLogs.length + 1).padStart(3, '0')}`,
        date: new Date().toISOString().split('T')[0],
        customer: customer,
        batchNo: sale.batchId,
        saleId: sale.id,
        salesDate: sale.date,
        soldTrays: sale.traysSold,
        soldEggs: sale.totalEggsSold,
        damaged: customer === 'Hyperpure' || customer === 'Eggoz' ? parseInt(document.getElementById(`ret-${customer.charAt(0).toLowerCase()}-damaged`).value) || 0 : null,
        scrap: customer === 'Hyperpure' || customer === 'Eggoz' ? parseInt(document.getElementById(`ret-${customer.charAt(0).toLowerCase()}-scrap`).value) || 0 : null,
        dirty: customer === 'Hyperpure' ? parseInt(document.getElementById('ret-h-dirty').value) || 0 : null,
        small: customer === 'Hyperpure' ? parseInt(document.getElementById('ret-h-small').value) || 0 : null,
        big: customer === 'Hyperpure' ? parseInt(document.getElementById('ret-h-big').value) || 0 : null,
        airline: customer === 'Hyperpure' ? parseInt(document.getElementById('ret-h-airline').value) || 0 : null,
        totalReturned: calcs.totalEggs,
        returnedTrays: calcs.trays,
        looseEggs: calcs.loose,
        netAmount: calcs.netAmount
    };

    if (State.editingReturnId) {
        const idx = State.returnLogs.findIndex(r => r.id === State.editingReturnId);
        if (idx !== -1) State.returnLogs[idx] = record;
        showToast('Return record updated successfully.');
    } else {
        State.returnLogs.push(record);
        showToast('Return record saved successfully.');
    }
    
    saveState('returnLogs');
    resetReturnForm();
    renderReturnTable();
}

function renderReturnTable(filterQuery = '') {
    const tbody = document.getElementById('recovery-table-body');
    tbody.innerHTML = '';
    
    const query = filterQuery.toLowerCase();
    const filtered = State.returnLogs.filter(r => 
        r.id.toLowerCase().includes(query) || 
        r.batchNo.toLowerCase().includes(query) ||
        r.customer.toLowerCase().includes(query)
    );

    if (filtered.length === 0) {
        tbody.innerHTML = `<tr><td colspan="16" class="empty-state"><div class="empty-state-icon">♻️</div>No return records found.</td></tr>`;
        return;
    }

    filtered.forEach(r => {
        const sale = State.sales.find(s => s.id === r.saleId);
        const price = sale ? (sale.sellingPricePerEgg !== undefined ? sale.sellingPricePerEgg : (sale.sellingPrice || 0)) : 0;
        const revenue = sale ? (sale.salesRevenue || 0) : 0;
        const returnedValue = (r.totalReturned || 0) * price;
        const netAmt = r.netAmount !== undefined ? r.netAmount : (revenue - returnedValue);

        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td style="font-variant-numeric: tabular-nums;">${Format.date(r.date)}</td>
            <td>${r.customer}</td>
            <td><strong>${r.batchNo}</strong></td>
            <td style="font-variant-numeric: tabular-nums;">${Format.date(r.salesDate)}</td>
            <td style="font-variant-numeric: tabular-nums;">${Format.number(r.soldTrays)}</td>
            <td style="font-variant-numeric: tabular-nums;">${Format.number(r.soldEggs)}</td>
            <td style="font-variant-numeric: tabular-nums;">${r.damaged !== null ? Format.number(r.damaged) : '-'}</td>
            <td style="font-variant-numeric: tabular-nums;">${r.scrap !== null ? Format.number(r.scrap) : '-'}</td>
            <td style="font-variant-numeric: tabular-nums;">${r.dirty !== null ? Format.number(r.dirty) : '-'}</td>
            <td style="font-variant-numeric: tabular-nums;">${r.small !== null ? Format.number(r.small) : '-'}</td>
            <td style="font-variant-numeric: tabular-nums;">${r.big !== null ? Format.number(r.big) : '-'}</td>
            <td style="font-variant-numeric: tabular-nums;">${r.airline !== null ? Format.number(r.airline) : '-'}</td>
            <td style="font-variant-numeric: tabular-nums; font-weight:600; color:var(--color-danger);">${Format.number(r.totalReturned)}</td>
            <td style="font-variant-numeric: tabular-nums;">${Format.number(r.returnedTrays)}</td>
            <td style="font-variant-numeric: tabular-nums;">${Format.number(r.looseEggs)}</td>
            <td style="font-variant-numeric: tabular-nums; font-weight:600; color:var(--color-primary);">${Format.currency(netAmt)}</td>
            <td>
                <div style="display: flex; gap: 4px; align-items: center; flex-wrap: wrap;">
                    <button class="btn btn-secondary btn-icon-only" onclick="showReturnRecordBreakdown('${r.id}')" title="View Calculation" style="width:28px; height:28px; padding:0; font-size:0.8rem; margin-right:4px;">🔍</button>
                    <button class="btn btn-secondary btn-icon-only" onclick="editReturn('${r.id}')" title="Edit Return" style="width:28px; height:28px; padding:0; font-size:0.8rem; margin-right:4px;">✏️</button>
                    <button class="btn btn-danger btn-icon-only" onclick="deleteReturn('${r.id}')" title="Delete Return" style="width:28px; height:28px; padding:0; font-size:0.8rem;">🗑️</button>
                </div>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

window.showReturnRecordBreakdown = function(id) {
    const r = State.returnLogs.find(x => x.id === id);
    if (!r) return;
    const sale = State.sales.find(s => s.id === r.saleId);
    const price = sale ? (sale.sellingPricePerEgg !== undefined ? sale.sellingPricePerEgg : (sale.sellingPrice || 0)) : 0;
    const revenue = sale ? (sale.salesRevenue || 0) : 0;
    const returnedValue = (r.totalReturned || 0) * price;
    const netAmount = r.netAmount !== undefined ? r.netAmount : (revenue - returnedValue);
    
    let html = `
        <div><strong>1. Original Sales Amount:</strong> <span style="color:var(--color-success); font-weight:bold;">${Format.currency(revenue)}</span></div>
        <div><strong>2. Per Egg Selling Price:</strong> ${Format.currency(price)}</div>
        <div style="margin-top:8px;"><strong>3. Value of Returned Eggs:</strong> ${Format.number(r.totalReturned || 0)} returned eggs &times; ${Format.currency(price)} = <span style="color:var(--color-danger); font-weight:bold;">${Format.currency(returnedValue)}</span></div>
        <div style="margin-top:8px; border-top:1px solid var(--card-border); padding-top:8px;">
            <strong>Net Amount After Return:</strong> ${Format.currency(revenue)} - ${Format.currency(returnedValue)} = <span style="font-weight:bold; font-size:1.1rem; color:var(--color-primary);">${Format.currency(netAmount)}</span>
        </div>
    `;
    openBreakdownModal(`Return Calculation: ${id}`, html);
};

window.editReturn = function(id) {
    const r = State.returnLogs.find(x => x.id === id);
    if (!r) return;
    State.editingReturnId = id;
    
    document.getElementById('ret-customer-select').value = r.customer;
    // trigger customer select update first to filter batch select and update dynamic fields
    document.getElementById('ret-customer-select').dispatchEvent(new Event('change'));
    
    // now we can safely set and trigger the batch select
    document.getElementById('ret-batch-select').value = r.saleId;
    document.getElementById('ret-batch-select').dispatchEvent(new Event('change'));

    // fill fields based on customer
    if (r.customer === 'Hyperpure') {
        document.getElementById('ret-h-damaged').value = r.damaged || 0;
        document.getElementById('ret-h-scrap').value = r.scrap || 0;
        document.getElementById('ret-h-dirty').value = r.dirty || 0;
        document.getElementById('ret-h-small').value = r.small || 0;
        document.getElementById('ret-h-big').value = r.big || 0;
        document.getElementById('ret-h-airline').value = r.airline || 0;
    } else if (r.customer === 'Eggoz') {
        document.getElementById('ret-e-damaged').value = r.damaged || 0;
        document.getElementById('ret-e-scrap').value = r.scrap || 0;
    } else if (r.customer === 'Licious') {
        document.getElementById('ret-l-returned').value = r.totalReturned || 0;
    }

    calculateLiveReturns();
    
    document.querySelector('#recovery-form button[type="submit"]').textContent = 'Update Return Record';
    document.getElementById('recovery-form').scrollIntoView({ behavior: 'smooth' });
    showToast('Editing return - make changes and click Update', 'success');
};

window.deleteReturn = function(id) {
    if (confirm('Delete this return record?')) {
        State.returnLogs = State.returnLogs.filter(r => r.id !== id);
        saveState('returnLogs');
        showToast('Return record deleted');
        renderReturnTable(document.getElementById('recovery-search').value);
    }
};


// --- SECTION: Processing & Sorting ---

let _procSelectedBatch = null;

function populateProcessingBatchDropdown() {
    const sel = document.getElementById('proc-batch-select');
    if (!sel) return;
    const current = sel.value;
    sel.innerHTML = '<option value="">-- Select Lot --</option>';
    State.batches
        .filter(b => b.availableEggs > 0)
        .forEach(b => {
            const opt = document.createElement('option');
            opt.value = b.id;
            opt.textContent = `${b.id} — ${b.godownNumber || 'N/A'} (${Format.number(b.availableEggs)} eggs avail.)`;
            sel.appendChild(opt);
        });
    if (current) sel.value = current;
}

function handleProcessingBatchSelect() {
    const batchId = document.getElementById('proc-batch-select').value;
    const detailsDiv = document.getElementById('proc-batch-details');
    if (!batchId) {
        detailsDiv.style.display = 'none';
        _procSelectedBatch = null;
        resetProcessingCalc();
        return;
    }
    const b = State.batches.find(x => x.id === batchId);
    if (!b) return;
    _procSelectedBatch = { ...b };
    document.getElementById('proc-fetch-id').textContent = b.id;
    document.getElementById('proc-fetch-farm').textContent = b.farmName || '-';
    document.getElementById('proc-fetch-godown').textContent = b.godownNumber || '-';
    document.getElementById('proc-fetch-eggs').textContent = Format.number(b.availableEggs);
    document.getElementById('proc-fetch-cost').textContent = `₹${parseFloat(b.averageCost || 0).toFixed(4)}`;
    detailsDiv.style.display = 'block';
    calculateLiveProcessing();
}

function resetProcessingCalc() {
    const zeros = ['calc-proc-total-defective','calc-proc-defective-trays','calc-proc-good-eggs','calc-proc-good-trays'];
    zeros.forEach(id => { const el = document.getElementById(id); if (el) el.textContent = id.includes('trays') ? '0.00' : '0'; });
    ['calc-proc-original-cost','calc-proc-cleaning','calc-proc-paper'].forEach(id => { const el = document.getElementById(id); if (el) el.textContent = '₹0.00'; });
    const nce = document.getElementById('calc-proc-new-cost-per-egg'); if (nce) nce.textContent = '₹0.0000';
}

function calculateLiveProcessing() {
    if (!_procSelectedBatch) return;
    const small   = parseInt(document.getElementById('proc-small').value) || 0;
    const damaged = parseInt(document.getElementById('proc-damaged').value) || 0;
    const dirty   = parseInt(document.getElementById('proc-dirty').value) || 0;
    const big     = parseInt(document.getElementById('proc-big').value) || 0;
    const scrap   = parseInt(document.getElementById('proc-scrap').value) || 0;
    const airline = parseInt(document.getElementById('proc-airline').value) || 0;
    const cleaningCost   = parseFloat(document.getElementById('proc-cleaning-cost').value) || 0;
    const paperTrayCost  = parseFloat(document.getElementById('proc-paper-tray-cost').value) || 0;

    const totalDefective = small + damaged + dirty + big + scrap + airline;
    const availableEggs  = _procSelectedBatch.availableEggs;
    const avgCost        = parseFloat(_procSelectedBatch.averageCost) || 0;
    const goodEggs       = Math.max(0, availableEggs - totalDefective);

    const originalBatchCost = availableEggs * avgCost;
    const totalNewCost      = originalBatchCost + cleaningCost + paperTrayCost;
    const newCostPerEgg     = goodEggs > 0 ? totalNewCost / goodEggs : 0;

    document.getElementById('calc-proc-total-defective').textContent = Format.number(totalDefective);
    document.getElementById('calc-proc-defective-trays').textContent = (totalDefective / 30).toFixed(2);
    document.getElementById('calc-proc-good-eggs').textContent = Format.number(goodEggs);
    document.getElementById('calc-proc-good-trays').textContent = (goodEggs / 30).toFixed(2);
    document.getElementById('calc-proc-original-cost').textContent = Format.currency(originalBatchCost);
    document.getElementById('calc-proc-cleaning').textContent = Format.currency(cleaningCost);
    document.getElementById('calc-proc-paper').textContent = Format.currency(paperTrayCost);
    document.getElementById('calc-proc-new-cost-per-egg').textContent = `₹${newCostPerEgg.toFixed(4)}`;
}

window.showProcessingBreakdown = function() {
    if (!_procSelectedBatch) { showToast('Please select a batch first', 'danger'); return; }
    const small   = parseInt(document.getElementById('proc-small').value) || 0;
    const damaged = parseInt(document.getElementById('proc-damaged').value) || 0;
    const dirty   = parseInt(document.getElementById('proc-dirty').value) || 0;
    const big     = parseInt(document.getElementById('proc-big').value) || 0;
    const scrap   = parseInt(document.getElementById('proc-scrap').value) || 0;
    const airline = parseInt(document.getElementById('proc-airline').value) || 0;
    const cleaningCost  = parseFloat(document.getElementById('proc-cleaning-cost').value) || 0;
    const paperTrayCost = parseFloat(document.getElementById('proc-paper-tray-cost').value) || 0;
    const totalDefective = small + damaged + dirty + big + scrap + airline;
    const availableEggs  = _procSelectedBatch.availableEggs;
    const avgCost        = parseFloat(_procSelectedBatch.averageCost) || 0;
    const goodEggs       = Math.max(0, availableEggs - totalDefective);
    const originalBatchCost = availableEggs * avgCost;
    const totalNewCost      = originalBatchCost + cleaningCost + paperTrayCost;
    const newCostPerEgg     = goodEggs > 0 ? totalNewCost / goodEggs : 0;

    const html = `
        <div><strong>Batch:</strong> ${_procSelectedBatch.id} &mdash; ${_procSelectedBatch.godownNumber || 'N/A'}</div>
        <div style="margin-top:6px;"><strong>Available Eggs (before processing):</strong> ${Format.number(availableEggs)}</div>
        <div style="margin-top:12px; padding-top:8px; border-top:1px solid var(--card-border);"><strong>Defective Breakdown:</strong></div>
        <div style="margin-left:8px;">- Small: ${Format.number(small)} eggs</div>
        <div style="margin-left:8px;">- Damaged: ${Format.number(damaged)} eggs</div>
        <div style="margin-left:8px;">- Dirty: ${Format.number(dirty)} eggs</div>
        <div style="margin-left:8px;">- Big: ${Format.number(big)} eggs</div>
        <div style="margin-left:8px;">- Scrap: ${Format.number(scrap)} eggs</div>
        <div style="margin-left:8px;">- Airline: ${Format.number(airline)} eggs</div>
        <div style="margin-left:8px; margin-top:6px; font-weight:600; color:var(--color-danger);">Total Defective: ${Format.number(totalDefective)} eggs = ${(totalDefective/30).toFixed(2)} trays</div>
        <div style="margin-top:8px; font-weight:600; color:var(--color-success);">✅ Good Eggs Remaining: ${Format.number(goodEggs)} eggs = ${(goodEggs/30).toFixed(2)} trays</div>
        <div style="margin-top:12px; padding-top:8px; border-top:1px solid var(--card-border);"><strong>Landed Cost Calculation:</strong></div>
        <div style="margin-left:8px;">Original Batch Cost: ${Format.number(availableEggs)} × ₹${avgCost.toFixed(4)} = ${Format.currency(originalBatchCost)}</div>
        <div style="margin-left:8px;">+ Cleaning Cost: ${Format.currency(cleaningCost)}</div>
        <div style="margin-left:8px;">+ Paper Tray Cost: ${Format.currency(paperTrayCost)}</div>
        <div style="margin-left:8px; margin-top:6px; padding-top:6px; border-top:1px dashed var(--card-border);">New Total Cost: ${Format.currency(totalNewCost)}</div>
        <div style="margin-top:8px; padding-top:8px; border-top:1px solid var(--card-border);">
            <strong>New Landed Price Per Egg:</strong> ${Format.currency(totalNewCost)} &divide; ${Format.number(goodEggs)} = <span style="color:var(--color-primary); font-weight:bold; font-size:1.1rem;">&#8377;${newCostPerEgg.toFixed(4)}</span>
        </div>
        <div style="margin-top:10px; padding:8px; background:rgba(225,29,72,0.06); border-radius:6px; font-size:0.85rem; color:var(--color-danger);">⚠️ ${Format.number(totalDefective)} defective eggs will be added to Recovery Sales stock.</div>
    `;
    openBreakdownModal('Processing Calculation Details', html);
};

window.showProcessingRecordBreakdown = function(id) {
    const pl = State.processingLogs.find(x => x.id === id);
    if (!pl) return;
    const b = State.batches.find(x => x.id === pl.batchId);

    const small       = pl.expenses?.small       ?? pl.broken ?? 0;
    const damaged     = pl.damaged || 0;
    const dirty       = pl.dirty || 0;
    const big         = pl.expenses?.big         ?? 0;
    const scrap       = pl.scrap || 0;
    const airline     = pl.expenses?.airline     ?? 0;
    const cleaningCost   = pl.expenses?.cleaningCost   ?? 0;
    const paperTrayCost  = pl.expenses?.paperTrayCost  ?? 0;
    const previousCostPerEgg = pl.expenses?.previousCostPerEgg ?? 0;
    const previousEggs   = pl.previousEggs || 0;
    const totalDefective = pl.totalLossEggs || (small + damaged + dirty + big + scrap + airline);
    const goodEggs       = pl.goodEggs || 0;
    const originalBatchCost = previousEggs * previousCostPerEgg;
    const totalNewCost      = pl.newBatchCost || (originalBatchCost + cleaningCost + paperTrayCost);
    const newCostPerEgg     = pl.newCostPerEgg || 0;

    const html = `
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <div><strong>Record:</strong> ${pl.id}</div>
            <div style="font-size:0.8rem; color:var(--text-muted);">${Format.date(pl.date)}</div>
        </div>
        <div style="margin-top:4px;"><strong>Batch:</strong> ${pl.batchId} &mdash; ${b?.godownNumber || 'N/A'}</div>
        <div style="margin-top:6px;"><strong>Eggs Before Processing:</strong> ${Format.number(previousEggs)} &nbsp;|&nbsp; <strong>Cost/Egg:</strong> &#8377;${previousCostPerEgg.toFixed(4)}</div>

        <div style="margin-top:12px; padding-top:8px; border-top:1px solid var(--card-border);"><strong>Defective Breakdown:</strong></div>
        <div style="margin-left:8px; display:grid; grid-template-columns:1fr 1fr; gap:2px 16px; margin-top:4px; font-size:0.9rem;">
            <div style="color:var(--color-danger);">Small: <strong>${Format.number(small)}</strong></div>
            <div style="color:var(--color-danger);">Damaged: <strong>${Format.number(damaged)}</strong></div>
            <div style="color:var(--color-danger);">Dirty: <strong>${Format.number(dirty)}</strong></div>
            <div style="color:var(--color-danger);">Big: <strong>${Format.number(big)}</strong></div>
            <div style="color:var(--color-danger);">Scrap: <strong>${Format.number(scrap)}</strong></div>
            <div style="color:var(--color-danger);">Airline: <strong>${Format.number(airline)}</strong></div>
        </div>
        <div style="margin-top:8px; font-weight:600; color:var(--color-danger);">Total Defective: ${Format.number(totalDefective)} eggs = ${(totalDefective/30).toFixed(2)} trays</div>
        <div style="margin-top:4px; font-weight:600; color:var(--color-success);">✅ Good Eggs: ${Format.number(goodEggs)} eggs = ${(goodEggs/30).toFixed(2)} trays</div>

        <div style="margin-top:12px; padding-top:8px; border-top:1px solid var(--card-border);"><strong>Landed Cost Calculation:</strong></div>
        <div style="margin-left:8px; font-size:0.9rem;">
            <div>Original Batch Cost: ${Format.number(previousEggs)} &times; &#8377;${previousCostPerEgg.toFixed(4)} = ${Format.currency(originalBatchCost)}</div>
            <div>+ Cleaning Cost: ${Format.currency(cleaningCost)}</div>
            <div>+ Paper Tray Cost: ${Format.currency(paperTrayCost)}</div>
            <div style="margin-top:6px; padding-top:6px; border-top:1px dashed var(--card-border);">New Total Cost: ${Format.currency(totalNewCost)}</div>
        </div>
        <div style="margin-top:10px; padding:10px; background:rgba(217,119,6,0.06); border-radius:8px; border:1px dashed rgba(217,119,6,0.3); text-align:center;">
            <div style="font-size:0.85rem; color:var(--text-secondary);">New Landed Price Per Egg</div>
            <div style="font-size:1.3rem; font-weight:800; color:var(--color-primary);">&#8377;${newCostPerEgg.toFixed(4)}</div>
            <div style="font-size:0.8rem; color:var(--text-muted);">${Format.currency(totalNewCost)} &divide; ${Format.number(goodEggs)} good eggs</div>
        </div>
        <div style="margin-top:10px; padding:8px; background:rgba(225,29,72,0.06); border-radius:6px; font-size:0.85rem; color:var(--color-danger);">⚠️ ${Format.number(totalDefective)} defective eggs added to Recovery Sales stock.</div>
    `;
    openBreakdownModal('Processing Calculation Details', html);
};


function buildProcessingLog(id, batchId, small, damaged, dirty, big, scrap, airline, cleaningCost, paperTrayCost, totalDefective, goodEggs, previousEggs, previousCostPerEgg, totalProcessingExpense, newBatchCost, newCostPerEgg, date) {
    return {
        id, batchId,
        previousEggs,
        broken: small,   // mapped to 'broken' DB column for backend compatibility
        damaged, dirty, scrap,
        totalLossEggs: totalDefective,
        goodEggs,
        expenses: { small, big, airline, cleaningCost, paperTrayCost, previousCostPerEgg },
        totalProcessingExpense,
        newBatchCost,
        newCostPerEgg,
        date
    };
}

function handleProcessingSubmit(e) {
    e.preventDefault();
    if (!_procSelectedBatch) { showToast('Please select a batch first', 'danger'); return; }

    const batchId     = document.getElementById('proc-batch-select').value;
    const small       = parseInt(document.getElementById('proc-small').value) || 0;
    const damaged     = parseInt(document.getElementById('proc-damaged').value) || 0;
    const dirty       = parseInt(document.getElementById('proc-dirty').value) || 0;
    const big         = parseInt(document.getElementById('proc-big').value) || 0;
    const scrap       = parseInt(document.getElementById('proc-scrap').value) || 0;
    const airline     = parseInt(document.getElementById('proc-airline').value) || 0;
    const cleaningCost   = parseFloat(document.getElementById('proc-cleaning-cost').value) || 0;
    const paperTrayCost  = parseFloat(document.getElementById('proc-paper-tray-cost').value) || 0;
    const date           = document.getElementById('proc-date').value;

    if (!date) { showToast('Please enter the processing date', 'danger'); return; }

    const totalDefective = small + damaged + dirty + big + scrap + airline;
    const availableEggs  = _procSelectedBatch.availableEggs;
    const avgCost        = parseFloat(_procSelectedBatch.averageCost) || 0;
    const goodEggs       = Math.max(0, availableEggs - totalDefective);

    if (totalDefective >= availableEggs) {
        showToast('Total defective eggs cannot exceed or equal available eggs!', 'danger');
        return;
    }

    const originalBatchCost      = availableEggs * avgCost;
    const totalProcessingExpense = cleaningCost + paperTrayCost;
    const newBatchCost           = originalBatchCost + totalProcessingExpense;
    const newCostPerEgg          = goodEggs > 0 ? newBatchCost / goodEggs : 0;

    const existingId = document.getElementById('proc-id').value;

    if (existingId) {
        const idx = State.processingLogs.findIndex(pl => pl.id === existingId);
        if (idx !== -1) {
            const oldLog = State.processingLogs[idx];
            // Restore batch to pre-log state first
            const batchIdx = State.batches.findIndex(b => b.id === oldLog.batchId);
            if (batchIdx !== -1) {
                State.batches[batchIdx].availableEggs = oldLog.previousEggs;
                State.batches[batchIdx].averageCost   = oldLog.expenses?.previousCostPerEgg || State.batches[batchIdx].averageCost;
            }
            State.processingLogs[idx] = buildProcessingLog(existingId, batchId, small, damaged, dirty, big, scrap, airline, cleaningCost, paperTrayCost, totalDefective, goodEggs, oldLog.previousEggs, oldLog.expenses?.previousCostPerEgg || avgCost, totalProcessingExpense, newBatchCost, newCostPerEgg, date);
        }
    } else {
        const newId = `PROC-${String(State.processingLogs.length + 1).padStart(3,'0')}-${Date.now().toString().slice(-4)}`;
        State.processingLogs.push(buildProcessingLog(newId, batchId, small, damaged, dirty, big, scrap, airline, cleaningCost, paperTrayCost, totalDefective, goodEggs, availableEggs, avgCost, totalProcessingExpense, newBatchCost, newCostPerEgg, date));
    }

    // Update the batch available eggs and landed cost
    const batchIdx = State.batches.findIndex(b => b.id === batchId);
    if (batchIdx !== -1) {
        State.batches[batchIdx].availableEggs = goodEggs;
        State.batches[batchIdx].averageCost   = newCostPerEgg;
    }

    saveState('processingLogs');
    saveState('batches');
    showToast(`✅ Processing saved! ${Format.number(goodEggs)} good eggs. ${Format.number(totalDefective)} defectives → Recovery Stock.`);
    resetProcessingForm();
    renderProcessingTable();
    populateProcessingBatchDropdown();
}

function renderProcessingTable(filterQuery = '') {
    const tbody = document.getElementById('processing-table-body');
    if (!tbody) return;
    tbody.innerHTML = '';
    const query = (filterQuery || '').toLowerCase();
    const filtered = State.processingLogs.filter(pl => {
        const b = State.batches.find(x => x.id === pl.batchId);
        return !query ||
            (pl.id || '').toLowerCase().includes(query) ||
            (pl.batchId || '').toLowerCase().includes(query) ||
            (b?.godownNumber || '').toLowerCase().includes(query) ||
            (b?.farmName || '').toLowerCase().includes(query);
    });
    if (filtered.length === 0) {
        tbody.innerHTML = `<tr><td colspan="15" class="empty-state"><div class="empty-state-icon">⚙️</div>No processing logs yet.</td></tr>`;
        return;
    }
    [...filtered].reverse().forEach(pl => {
        const b = State.batches.find(x => x.id === pl.batchId);
        const small       = pl.expenses?.small       ?? pl.broken ?? 0;
        const big         = pl.expenses?.big         ?? 0;
        const airline     = pl.expenses?.airline     ?? 0;
        const cleaningCost   = pl.expenses?.cleaningCost   ?? 0;
        const paperTrayCost  = pl.expenses?.paperTrayCost  ?? 0;
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${Format.date(pl.date)}</td>
            <td><strong style="color:var(--color-primary);">${pl.batchId}</strong><br><span style="font-size:0.75rem;color:var(--text-muted);">${b?.godownNumber || '-'}</span></td>
            <td style="font-variant-numeric:tabular-nums;">${Format.number(pl.previousEggs || 0)}</td>
            <td style="color:var(--color-danger);">${Format.number(small)}</td>
            <td style="color:var(--color-danger);">${Format.number(pl.damaged || 0)}</td>
            <td style="color:var(--color-danger);">${Format.number(pl.dirty || 0)}</td>
            <td style="color:var(--color-danger);">${Format.number(big)}</td>
            <td style="color:var(--color-danger);">${Format.number(pl.scrap || 0)}</td>
            <td style="color:var(--color-danger);">${Format.number(airline)}</td>
            <td><span class="badge badge-danger">${Format.number(pl.totalLossEggs || 0)}</span></td>
            <td><span class="badge badge-success">${Format.number(pl.goodEggs || 0)}</span></td>
            <td style="font-variant-numeric:tabular-nums;">${Format.currency(cleaningCost)}</td>
            <td style="font-variant-numeric:tabular-nums;">${Format.currency(paperTrayCost)}</td>
            <td style="color:var(--color-primary);font-weight:600;">&#8377;${parseFloat(pl.newCostPerEgg || 0).toFixed(4)}</td>
            <td>
                <button class="btn btn-secondary btn-icon-only" onclick="showProcessingRecordBreakdown('${pl.id}')" title="View Calculation" style="width:28px;height:28px;padding:0;font-size:0.8rem;">🔍</button>
                <button class="btn btn-secondary btn-icon-only" onclick="editProcessingLog('${pl.id}')" title="Edit" style="width:28px;height:28px;padding:0;font-size:0.8rem;">✏️</button>
                <button class="btn btn-danger btn-icon-only" onclick="deleteProcessingLog('${pl.id}')" title="Delete" style="width:28px;height:28px;padding:0;font-size:0.8rem;">🗑️</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

function resetProcessingForm() {
    document.getElementById('proc-id').value = '';
    const sel = document.getElementById('proc-batch-select');
    if (sel) sel.value = '';
    document.getElementById('proc-batch-details').style.display = 'none';
    ['proc-small','proc-damaged','proc-dirty','proc-big','proc-scrap','proc-airline'].forEach(id => {
        const el = document.getElementById(id); if (el) el.value = 0;
    });
    document.getElementById('proc-cleaning-cost').value  = 0;
    document.getElementById('proc-paper-tray-cost').value = 0;
    document.getElementById('proc-date').value = Format.dateForInput(new Date());
    _procSelectedBatch = null;
    resetProcessingCalc();
    const submitBtn = document.querySelector('#processing-form button[type="submit"]');
    if (submitBtn) submitBtn.textContent = '💾 Save Processing Log';
}

window.editProcessingLog = function(id) {
    const pl = State.processingLogs.find(x => x.id === id);
    if (!pl) return;
    const b = State.batches.find(x => x.id === pl.batchId);
    if (!b) { showToast('Batch not found', 'danger'); return; }

    document.getElementById('proc-id').value = pl.id;

    // Set _procSelectedBatch to pre-processing state for correct calculations
    const prevCost = pl.expenses?.previousCostPerEgg || parseFloat(b.averageCost) || 0;
    _procSelectedBatch = { ...b, availableEggs: pl.previousEggs, averageCost: prevCost };

    // Update dropdown (add batch if not listed)
    const sel = document.getElementById('proc-batch-select');
    let opt = sel.querySelector(`option[value="${pl.batchId}"]`);
    if (!opt) { opt = document.createElement('option'); opt.value = pl.batchId; sel.appendChild(opt); }
    opt.textContent = `${pl.batchId} — ${b.godownNumber || 'N/A'} (${Format.number(pl.previousEggs)} eggs [edit mode])`;
    sel.value = pl.batchId;

    // Fill details panel
    document.getElementById('proc-fetch-id').textContent     = b.id;
    document.getElementById('proc-fetch-farm').textContent   = b.farmName || '-';
    document.getElementById('proc-fetch-godown').textContent = b.godownNumber || '-';
    document.getElementById('proc-fetch-eggs').textContent   = Format.number(pl.previousEggs);
    document.getElementById('proc-fetch-cost').textContent   = `₹${prevCost.toFixed(4)}`;
    document.getElementById('proc-batch-details').style.display = 'block';

    const small      = pl.expenses?.small      ?? pl.broken ?? 0;
    const big        = pl.expenses?.big        ?? 0;
    const airline    = pl.expenses?.airline    ?? 0;
    const cleaningCost  = pl.expenses?.cleaningCost  ?? 0;
    const paperTrayCost = pl.expenses?.paperTrayCost ?? 0;

    document.getElementById('proc-small').value          = small;
    document.getElementById('proc-damaged').value        = pl.damaged || 0;
    document.getElementById('proc-dirty').value          = pl.dirty || 0;
    document.getElementById('proc-big').value            = big;
    document.getElementById('proc-scrap').value          = pl.scrap || 0;
    document.getElementById('proc-airline').value        = airline;
    document.getElementById('proc-cleaning-cost').value  = cleaningCost;
    document.getElementById('proc-paper-tray-cost').value = paperTrayCost;
    document.getElementById('proc-date').value           = pl.date || Format.dateForInput(new Date());

    calculateLiveProcessing();
    const submitBtn = document.querySelector('#processing-form button[type="submit"]');
    if (submitBtn) submitBtn.textContent = '💾 Update Processing Log';
    document.getElementById('processing-form').scrollIntoView({ behavior: 'smooth' });
    showToast('Editing processing log — make changes and save', 'success');
};

window.deleteProcessingLog = function(id) {
    if (!confirm('Delete this processing log? The batch egg count and cost will be restored to pre-processing values.')) return;
    const pl = State.processingLogs.find(x => x.id === id);
    if (pl) {
        const batchIdx = State.batches.findIndex(b => b.id === pl.batchId);
        if (batchIdx !== -1 && pl.previousEggs !== undefined) {
            State.batches[batchIdx].availableEggs = pl.previousEggs;
            State.batches[batchIdx].averageCost   = pl.expenses?.previousCostPerEgg || State.batches[batchIdx].averageCost;
        }
    }
    State.processingLogs = State.processingLogs.filter(x => x.id !== id);
    saveState('processingLogs');
    saveState('batches');
    showToast('Processing log deleted. Batch restored.');
    renderProcessingTable();
    populateProcessingBatchDropdown();
};

// --- RECOVERY SALES MANAGEMENT ---

function calculateAvailableRecoveryStock() {
    let stock = { damaged: 0, scrap: 0, dirty: 0, small: 0, big: 0, airline: 0, licious: 0 };
    
    // Add all returns
    State.returnLogs.forEach(r => {
        stock.damaged += (r.damaged || 0);
        stock.scrap += (r.scrap || 0);
        stock.dirty += (r.dirty || 0);
        stock.small += (r.small || 0);
        stock.big += (r.big || 0);
        stock.airline += (r.airline || 0);
        stock.licious += (r.totalReturned || 0); // Licious returns only have totalReturned
    });

    // Add defective eggs from Processing logs (combined total into damaged bucket)
    State.processingLogs.forEach(pl => {
        const small   = pl.expenses?.small   ?? pl.broken ?? 0;
        const big     = pl.expenses?.big     ?? 0;
        const airline = pl.expenses?.airline ?? 0;
        const totalDefective = (pl.damaged || 0) + (pl.dirty || 0) + (pl.scrap || 0) + small + big + airline;
        stock.damaged += totalDefective;
    });

    // Subtract all sold recovery
    State.recoveryLogs.forEach(rec => {
        if (rec.sales) {
            stock.damaged -= (rec.sales.damaged?.qty || 0);
            stock.scrap -= (rec.sales.scrap?.qty || 0);
            stock.dirty -= (rec.sales.dirty?.qty || 0);
            stock.small -= (rec.sales.small?.qty || 0);
            stock.big -= (rec.sales.big?.qty || 0);
            stock.airline -= (rec.sales.airline?.qty || 0);
            stock.licious -= (rec.sales.licious?.qty || 0);
        }
    });

    // Handle floating point inaccuracies or negative stock
    Object.keys(stock).forEach(k => {
        stock[k] = Math.max(0, stock[k]);
    });

    return stock;
}

function renderRecoveryStock() {
    const stock = calculateAvailableRecoveryStock();
    document.getElementById('avail-damaged').textContent = stock.damaged;
    document.getElementById('avail-scrap').textContent = stock.scrap;
    document.getElementById('avail-dirty').textContent = stock.dirty;
    document.getElementById('avail-small').textContent = stock.small;
    document.getElementById('avail-big').textContent = stock.big;
    document.getElementById('avail-airline').textContent = stock.airline;
    document.getElementById('avail-licious').textContent = stock.licious;
    
    // Set max on inputs
    const types = ['damaged', 'scrap', 'dirty', 'small', 'big', 'airline', 'licious'];
    types.forEach(type => {
        const input = document.querySelector(`.rec-qty-input[data-type="${type}"]`);
        if (input) {
            // Allow editing up to available + what's currently being edited (if editing)
            let maxVal = stock[type];
            if (State.editingRecoveryId) {
                const existing = State.recoveryLogs.find(r => r.id === State.editingRecoveryId);
                if (existing && existing.sales && existing.sales[type]) {
                    maxVal += existing.sales[type].qty;
                }
            }
            input.setAttribute('max', maxVal);
        }
    });
}

function calculateLiveRecoverySales() {
    let totalRevenue = 0;
    const types = ['damaged', 'scrap', 'dirty', 'small', 'big', 'airline', 'licious'];
    
    types.forEach(type => {
        const qtyInput = document.querySelector(`.rec-qty-input[data-type="${type}"]`);
        const priceInput = document.querySelector(`.rec-price-input[data-type="${type}"]`);
        const amountVal = document.querySelector(`.rec-amount-val[data-type="${type}"]`);
        
        if(!qtyInput) return;

        let qty = parseInt(qtyInput.value) || 0;
        const maxQty = parseInt(qtyInput.getAttribute('max')) || 0;
        
        if (qty > maxQty) {
            qty = maxQty;
            qtyInput.value = maxQty;
            showToast(`Not enough available stock for ${type}! Maximum available: ${maxQty}`, 'error');
        } else if (qty < 0) {
            qty = 0;
            qtyInput.value = 0;
        }

        const price = parseFloat(priceInput.value) || 0;
        const amount = qty * price;
        
        amountVal.textContent = Format.currency(amount);
        totalRevenue += amount;
    });

    document.getElementById('calc-rec-total-revenue').textContent = Format.currency(totalRevenue);

    window.showRecoveryBreakdown = function() {
        let html = `<div><strong>Revenue Breakdown by Type:</strong></div>`;
        types.forEach(type => {
            const qtyInput = document.querySelector(`.rec-qty-input[data-type="${type}"]`);
            const priceInput = document.querySelector(`.rec-price-input[data-type="${type}"]`);
            if (!qtyInput) return;
            const qty = parseInt(qtyInput.value) || 0;
            const price = parseFloat(priceInput.value) || 0;
            const amount = qty * price;
            if (qty > 0) {
                html += `<div style="margin-left:8px;">- ${type.charAt(0).toUpperCase() + type.slice(1)}: ${Format.number(qty)} eggs &times; ${Format.currency(price)} = ${Format.currency(amount)}</div>`;
            }
        });
        if (totalRevenue === 0) {
            html += `<div style="margin-left:8px; color:var(--text-muted);">No items selected.</div>`;
        }
        html += `<div style="margin-top:8px; border-top:1px solid var(--card-border); padding-top:8px;">
            <strong>Total Revenue:</strong> <span style="font-weight:bold; font-size:1.1rem; color:var(--color-success);">${Format.currency(totalRevenue)}</span>
        </div>`;
        openBreakdownModal('Recovery Sales Calculation Details', html);
    };
}

// Live calculation via event delegation - safe to register at module level
document.addEventListener('input', function(e) {
    if (e.target.matches('.rec-qty-input, .rec-price-input')) {
        calculateLiveRecoverySales();
    }
});

document.addEventListener('input', function(e) {
    if (e.target.id === 'actual-recovery-search') {
        renderRecoveryTable(e.target.value);
    }
});

// Recovery sales form - registered via event delegation
document.addEventListener('submit', function(e) {
    if (!e.target.id || e.target.id !== 'recovery-sales-form') return;
    e.preventDefault();
    
    const id = document.getElementById('rec-id').value;
    const batchId = document.getElementById('rec-batch-select').value;
    const customerName = document.getElementById('rec-customer').value;
    const phone = document.getElementById('rec-phone').value;
    const location = document.getElementById('rec-location').value;

    const sales = {};
    let totalRevenue = 0;
    let hasSales = false;

    const types = ['damaged', 'scrap', 'dirty', 'small', 'big', 'airline', 'licious'];
    types.forEach(type => {
        const qty = parseInt(document.querySelector(`.rec-qty-input[data-type="${type}"]`).value) || 0;
        const price = parseFloat(document.querySelector(`.rec-price-input[data-type="${type}"]`).value) || 0;
        const amount = qty * price;
        
        sales[type] = { qty, price, amount };
        totalRevenue += amount;
        if (qty > 0) hasSales = true;
    });

    if (!hasSales) {
        showToast('Please enter at least one quantity to sell.', 'error');
        return;
    }

    if (State.editingRecoveryId) {
        const idx = State.recoveryLogs.findIndex(r => r.id === State.editingRecoveryId);
        if (idx > -1) {
            State.recoveryLogs[idx] = {
                ...State.recoveryLogs[idx],
                batchId,
                customerName,
                phone,
                location,
                sales,
                totalRevenue
            };
        }
        State.editingRecoveryId = null;
        showToast('Recovery sale updated');
    } else {
        const newRecord = {
            id: 'REC-' + Date.now(),
            batchId,
            customerName,
            phone,
            location,
            sales,
            totalRevenue,
            date: Format.dateForInput(new Date())
        };
        State.recoveryLogs.push(newRecord);
        showToast('Recovery sale saved');
    }

    saveState('recoveryLogs');
    e.target.reset();
    document.getElementById('rec-id').value = '';
    document.getElementById('rec-batch-select').value = '';
    
    // Reset inputs
    types.forEach(type => {
        document.querySelector(`.rec-amount-val[data-type="${type}"]`).textContent = '₹0';
    });
    document.getElementById('calc-rec-total-revenue').textContent = '₹0.00';
    
    renderRecoveryStock();
    renderRecoveryTable();
});

function renderRecoveryTable(filterQuery = '') {
    const tbody = document.getElementById('actual-recovery-table-body');
    if (!tbody) return;
    const query = filterQuery.toLowerCase();

    let filtered = State.recoveryLogs.filter(r => 
        (r.customerName || '').toLowerCase().includes(query) ||
        (r.location || '').toLowerCase().includes(query)
    );

    filtered.sort((a, b) => new Date(b.date) - new Date(a.date));

    if (filtered.length === 0) {
        tbody.innerHTML = `<tr><td colspan="12" class="empty-state">No recovery records found.</td></tr>`;
        return;
    }

    tbody.innerHTML = filtered.map(r => `
        <tr>
            <td>${Format.date(r.date)}</td>
            <td><strong>${r.batchId || '-'}</strong></td>
            <td style="font-weight: 500;">${r.customerName}</td>
            <td>${r.location || '-'}</td>
            <td>${r.sales?.damaged?.qty || 0}</td>
            <td>${r.sales?.scrap?.qty || 0}</td>
            <td>${r.sales?.dirty?.qty || 0}</td>
            <td>${r.sales?.small?.qty || 0}</td>
            <td>${r.sales?.big?.qty || 0}</td>
            <td>${r.sales?.airline?.qty || 0}</td>
            <td>${r.sales?.licious?.qty || 0}</td>
            <td style="font-weight: bold; color: var(--color-success);">${Format.currency(r.totalRevenue)}</td>
            <td>
                <div style="display: flex; gap: 4px; align-items: center; flex-wrap: wrap;">
                    <button class="btn btn-sm btn-secondary btn-icon-only" onclick="showRecoveryRecordBreakdown('${r.id}')" title="View Calculation" style="width:28px; height:28px; padding:0; font-size:0.8rem;">🔍</button>
                    <button class="btn btn-sm btn-secondary" onclick="editRecoverySale('${r.id}')">✏️ Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteRecoverySale('${r.id}')">🗑️ Del</button>
                </div>
            </td>
        </tr>
    `).join('');
}

window.showRecoveryRecordBreakdown = function(id) {
    const r = State.recoveryLogs.find(x => x.id === id);
    if (!r || !r.sales) return;
    const types = ['damaged', 'scrap', 'dirty', 'small', 'big', 'airline', 'licious'];
    let html = `<div><strong>Revenue Breakdown by Type:</strong></div>`;
    types.forEach(type => {
        if (r.sales[type] && r.sales[type].qty > 0) {
            const qty = r.sales[type].qty;
            const price = r.sales[type].price;
            const amount = qty * price;
            html += `<div style="margin-left:8px;">- ${type.charAt(0).toUpperCase() + type.slice(1)}: ${Format.number(qty)} eggs &times; ${Format.currency(price)} = ${Format.currency(amount)}</div>`;
        }
    });
    if (r.totalRevenue === 0) {
        html += `<div style="margin-left:8px; color:var(--text-muted);">No items sold.</div>`;
    }
    html += `<div style="margin-top:8px; border-top:1px solid var(--card-border); padding-top:8px;">
        <strong>Total Revenue:</strong> <span style="font-weight:bold; font-size:1.1rem; color:var(--color-success);">${Format.currency(r.totalRevenue)}</span>
    </div>`;
    openBreakdownModal(`Recovery Sales Calculation: ${id}`, html);
};

window.editRecoverySale = function(id) {
    const r = State.recoveryLogs.find(x => x.id === id);
    if (!r) return;

    State.editingRecoveryId = id;
    document.getElementById('rec-id').value = r.id;
    document.getElementById('rec-batch-select').value = r.batchId || '';
    document.getElementById('rec-customer').value = r.customerName || '';
    document.getElementById('rec-phone').value = r.phone || '';
    document.getElementById('rec-location').value = r.location || '';

    // Re-render stock so max input limits include the current editing record
    renderRecoveryStock();

    const types = ['damaged', 'scrap', 'dirty', 'small', 'big', 'airline', 'licious'];
    types.forEach(type => {
        if (r.sales && r.sales[type]) {
            document.querySelector(`.rec-qty-input[data-type="${type}"]`).value = r.sales[type].qty || 0;
            document.querySelector(`.rec-price-input[data-type="${type}"]`).value = r.sales[type].price || 0;
        } else {
            document.querySelector(`.rec-qty-input[data-type="${type}"]`).value = 0;
            document.querySelector(`.rec-price-input[data-type="${type}"]`).value = 0;
        }
    });

    calculateLiveRecoverySales();
    document.getElementById('recovery-sales-form').scrollIntoView({ behavior: 'smooth' });
    showToast('Editing recovery sale', 'success');
};

window.deleteRecoverySale = function(id) {
    if (confirm('Delete this recovery sale record? This will return the stock to available.')) {
        State.recoveryLogs = State.recoveryLogs.filter(r => r.id !== id);
        saveState('recoveryLogs');
        showToast('Recovery sale deleted');
        renderRecoveryStock();
        renderRecoveryTable(document.getElementById('actual-recovery-search')?.value || '');
    }
};

// --- SECTION 8b: Profit Section Rendering ---
function renderProfitSection(filterQuery = '') {
    const stats = calculateAnalytics();

    // Update summary cards
    document.getElementById('profit-total-sales').textContent = Format.currency(stats.totalSalesRevenue);
    
    const recEl = document.getElementById('profit-total-recovery');
    if (recEl) recEl.textContent = Format.currency(stats.totalRecoveryRevenue);

    const purchaseEl = document.getElementById('profit-total-purchase');
    if (purchaseEl) purchaseEl.textContent = Format.currency(stats.totalPurchaseCost);

    document.getElementById('profit-total-expenses').textContent = Format.currency(stats.totalExpense);
    
    // Expense breakdown sub-label
    const expBreakdown = document.getElementById('profit-expense-breakdown');
    if (expBreakdown) {
        expBreakdown.textContent = `Purchase Extras ₹${Math.round(stats.totalPurchaseAdditional).toLocaleString('en-IN')} + Processing ₹${Math.round(stats.totalProcessingCost).toLocaleString('en-IN')} + Transport ₹${Math.round(stats.totalSalesTransport).toLocaleString('en-IN')}`;
    }

    const revEl = document.getElementById('profit-total-revenue');
    if (revEl) revEl.textContent = Format.currency(stats.totalRevenue);

    const npEl = document.getElementById('profit-net-profit');
    npEl.textContent = Format.currency(stats.netProfit);
    npEl.style.color = stats.netProfit >= 0 ? 'var(--color-success)' : 'var(--color-danger)';

    // Update Profit Analysis By Purchase Table
    const tpaBody = document.getElementById('total-profit-analysis-body');
    if (tpaBody) {
        let htmlRows = '';
        
        State.purchases.forEach(purchase => {
            const batch = State.batches.find(b => b.purchaseId === purchase.id);
            if (!batch) return; 
            
            const batchSales = State.sales.filter(s => s.batchId === batch.id);
            const pGrossSales = batchSales.reduce((sum, s) => sum + (parseFloat(s.salesRevenue) || 0), 0);
            
            let pReturnsValue = 0;
            const batchReturns = State.returnLogs.filter(r => r.batchNo === batch.id);
            batchReturns.forEach(r => {
                const sale = State.sales.find(s => s.id === r.saleId);
                const price = sale ? (parseFloat(sale.sellingPrice) || parseFloat(sale.sellingPricePerEgg) || 0) : 0;
                pReturnsValue += (parseInt(r.totalReturned) || 0) * price;
            });
            const pNetSales = pGrossSales - pReturnsValue;

            const pBaseCost = parseFloat(purchase.purchaseAmount) || 0;
            
            const pPurchaseExtras = parseFloat(purchase.totalAdditionalCost) || 0;
            const pProcessingCost = State.processingLogs.filter(pl => pl.batchId === batch.id).reduce((sum, pl) => sum + (parseFloat(pl.totalProcessingExpense) || 0), 0);
            const pSalesTransport = batchSales.reduce((sum, s) => sum + (parseFloat(s.transportationCost) || 0), 0);
            const pTotalExpenses = pPurchaseExtras + pProcessingCost + pSalesTransport;
            
            const pRecoveryRev = State.recoveryLogs.filter(r => r.batchId === batch.id).reduce((sum, r) => sum + (parseFloat(r.totalRevenue) || 0), 0);
            
            const pNetProfit = pNetSales + pRecoveryRev - pBaseCost - pTotalExpenses;
            const pTotalEggs = parseFloat(purchase.totalEggs) || 1;
            const pProfitPerEgg = pNetProfit / pTotalEggs;

            htmlRows += `
                <tr>
                    <td style="font-weight:bold;">${purchase.id}</td>
                    <td style="font-variant-numeric: tabular-nums; color:var(--color-success); font-weight:bold;">${Format.currency(pNetSales)}</td>
                    <td style="font-variant-numeric: tabular-nums; color:var(--color-info);">${Format.currency(pRecoveryRev)}</td>
                    <td style="font-variant-numeric: tabular-nums;">${Format.currency(pBaseCost)}</td>
                    <td style="font-variant-numeric: tabular-nums; color:var(--color-warning);">${Format.currency(pTotalExpenses)}</td>
                    <td style="font-variant-numeric: tabular-nums; font-weight:bold; font-size:1.1rem; color:${pNetProfit >= 0 ? 'var(--color-success)' : 'var(--color-danger)'};">${Format.currency(pNetProfit)}</td>
                    <td style="font-variant-numeric: tabular-nums; font-weight:bold; color:var(--color-primary);">${Format.currency(pProfitPerEgg)}/egg</td>
                </tr>
            `;
        });
        
        if (htmlRows === '') {
            htmlRows = `<tr><td colspan="7" class="text-center">No purchases batched yet.</td></tr>`;
        }
        tpaBody.innerHTML = htmlRows;
    }

    window.showGlobalProfitBreakdown = function() {
        const netSales = stats.totalSalesRevenue - stats.totalReturnsValue;
        let html = `
            <div><strong>1. Gross Sales Revenue:</strong> ${Format.currency(stats.totalSalesRevenue)}</div>
            <div><strong>2. Value of Returned Eggs:</strong> <span style="color:var(--color-danger);">- ${Format.currency(stats.totalReturnsValue)}</span></div>
            <div style="margin-top:8px;"><strong>Net Sales Revenue (1 - 2):</strong> <span style="color:var(--color-success); font-weight:bold;">${Format.currency(netSales)}</span></div>
            <div style="margin-top:8px;"><strong>3. Total Recovery Revenue:</strong> <span style="color:var(--color-info); font-weight:bold;">${Format.currency(stats.totalRecoveryRevenue)}</span></div>
            <div style="margin-top:8px; padding-bottom:8px; border-bottom:1px solid var(--card-border);"><strong>Total Actual Inflows (Net Sales + Recovery):</strong> <span style="font-weight:bold;">${Format.currency(stats.totalRevenue)}</span></div>
            
            <div style="margin-top:16px;"><strong>4. Total Purchase Cost (Base):</strong> <span style="color:var(--color-danger);">${Format.currency(stats.totalPurchaseCost)}</span></div>
            <div><strong>5. Total Expenses (Addl Purchase + Processing + Transport):</strong> <span style="color:var(--color-warning);">${Format.currency(stats.totalExpense)}</span></div>
            <div style="margin-top:8px; padding-bottom:8px; border-bottom:1px solid var(--card-border);"><strong>Total Outflows (4 + 5):</strong> <span style="font-weight:bold;">${Format.currency(stats.totalPurchaseCost + stats.totalExpense)}</span></div>
            
            <div style="margin-top:16px;">
                <strong>NET PROFIT (Inflows - Outflows):</strong> 
                <div style="font-size: 1.25rem; font-weight: bold; color: ${stats.netProfit >= 0 ? 'var(--color-success)' : 'var(--color-danger)'}; margin-top: 4px;">
                    ${Format.currency(stats.totalRevenue)} - ${Format.currency(stats.totalPurchaseCost + stats.totalExpense)} = ${Format.currency(stats.netProfit)}
                </div>
            </div>
        `;
        openBreakdownModal('Global Profit Calculation', html);
    };

    // ---- TABLE 1: Sales Profit Records ----
    const tbody = document.getElementById('profit-table-body');
    tbody.innerHTML = '';

    const query = (filterQuery || document.getElementById('profit-search').value || '').toLowerCase();
    const filtered = State.sales.filter(s =>
        s.id.toLowerCase().includes(query) ||
        s.customerName.toLowerCase().includes(query) ||
        s.batchId.toLowerCase().includes(query)
    );

    if (filtered.length === 0) {
        tbody.innerHTML = `<tr><td colspan="9" class="empty-state"><div class="empty-state-icon">💰</div>No sales records found.</td></tr>`;
    } else {
        filtered.forEach(s => {
            const tr = document.createElement('tr');
            const batch = State.batches.find(b => b.id === s.batchId);
            const purchase = batch ? State.purchases.find(p => p.id === batch.purchaseId) : null;

            const sellingRevenue = s.salesRevenue;
            const purchaseAmount = purchase ? purchase.totalCost : 0;
            const totalBatchEggs = batch ? batch.totalEggs : 1;
            const proportionalPurchaseCost = s.totalEggsSold > 0 ? (purchaseAmount * s.totalEggsSold / totalBatchEggs) : 0;

            const batchProcessingCost = State.processingLogs
                .filter(pl => pl.batchId === s.batchId)
                .reduce((sum, pl) => sum + pl.totalProcessingExpense, 0);
            const proportionalProcessing = s.totalEggsSold > 0 ? (batchProcessingCost * s.totalEggsSold / totalBatchEggs) : 0;

            const deliveryCost = s.transportationCost || 0;
            const totalExpenses = proportionalPurchaseCost + proportionalProcessing + deliveryCost;
            const netProfit = sellingRevenue - totalExpenses;
            const profitColor = netProfit >= 0 ? 'var(--color-success)' : 'var(--color-danger)';

            tr.innerHTML = `
                <td><strong style="color:var(--color-primary);">${s.id}</strong></td>
                <td>${s.customerName}</td>
                <td>${s.batchId}</td>
                <td style="font-variant-numeric: tabular-nums;">${Format.number(s.totalEggsSold)}</td>
                <td style="font-variant-numeric: tabular-nums; color:var(--color-success); font-weight:600;">${Format.currency(sellingRevenue)}</td>
                <td style="font-variant-numeric: tabular-nums;">${Format.currency(proportionalPurchaseCost)}</td>
                <td style="font-variant-numeric: tabular-nums; color:var(--color-danger);">${Format.currency(totalExpenses)}</td>
                <td style="font-variant-numeric: tabular-nums; font-weight:700; color:${profitColor};">${Format.currency(netProfit)}</td>
                <td>
                    <button class="btn btn-sm btn-secondary btn-icon-only" onclick="showProfitRecordBreakdown('${s.id}')" title="View Calculation" style="width:28px; height:28px; padding:0; font-size:0.8rem;">🔍</button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    // ---- TABLE 2: Recovery Sales Profit Records ----
    const recTbody = document.getElementById('profit-recovery-table-body');
    if (recTbody) {
        recTbody.innerHTML = '';
        const recQuery = (document.getElementById('recovery-profit-search')?.value || '').toLowerCase();
        const filteredRec = (State.recoveryLogs || []).filter(r =>
            r.id.toLowerCase().includes(recQuery) ||
            (r.customerName || '').toLowerCase().includes(recQuery) ||
            (r.batchId || '').toLowerCase().includes(recQuery)
        );

        if (filteredRec.length === 0) {
            recTbody.innerHTML = `<tr><td colspan="6" class="empty-state"><div class="empty-state-icon">🔄</div>No recovery sales records found.</td></tr>`;
        } else {
            filteredRec.forEach(r => {
                const tr = document.createElement('tr');
                const recoveryRevenue = parseFloat(r.totalRevenue) || 0;
                const totalEggs = r.sales ? Object.values(r.sales).reduce((sum, item) => sum + (item.qty || 0), 0) : 0;
                const linkedBatch = r.batchId || '<span style="color:var(--text-muted);">—</span>';

                tr.innerHTML = `
                    <td><strong style="color:var(--color-primary);">${r.id}</strong></td>
                    <td>${r.customerName || 'N/A'}</td>
                    <td>${linkedBatch}</td>
                    <td style="font-variant-numeric: tabular-nums;">${Format.number(totalEggs)}</td>
                    <td style="font-variant-numeric: tabular-nums; color:var(--color-success); font-weight:600;">${Format.currency(recoveryRevenue)}</td>
                    <td>
                        <button class="btn btn-sm btn-secondary btn-icon-only" onclick="showRecoveryProfitBreakdown('${r.id}')" title="View Calculation" style="width:28px; height:28px; padding:0; font-size:0.8rem;">🔍</button>
                    </td>
                `;
                recTbody.appendChild(tr);
            });
        }
    }
}

window.showProfitRecordBreakdown = function(id) {
    const s = State.sales.find(x => x.id === id);
    if (!s) return;
    const batch = State.batches.find(b => b.id === s.batchId);
    const purchase = batch ? State.purchases.find(p => p.id === batch.purchaseId) : null;
    
    const sellingRevenue = s.salesRevenue;
    const purchaseAmount = purchase ? purchase.totalCost : 0;
    const totalBatchEggs = batch ? batch.totalEggs : 1;
    const proportionalPurchaseCost = s.totalEggsSold > 0 ? (purchaseAmount * s.totalEggsSold / totalBatchEggs) : 0;
    const batchProcessingCost = State.processingLogs
        .filter(pl => pl.batchId === s.batchId)
        .reduce((sum, pl) => sum + pl.totalProcessingExpense, 0);
    const proportionalProcessing = s.totalEggsSold > 0 ? (batchProcessingCost * s.totalEggsSold / totalBatchEggs) : 0;
    const deliveryCost = s.transportationCost || 0;
    const totalExpenses = proportionalPurchaseCost + proportionalProcessing + deliveryCost;
    const netProfit = sellingRevenue - totalExpenses;

    let html = `
        <div><strong>1. Sales Revenue:</strong> <span style="color:var(--color-success); font-weight:bold;">${Format.currency(sellingRevenue)}</span></div>
        <div style="margin-top:8px;"><strong>2. Recovery Revenue:</strong> ${Format.currency(0)} <span style="font-size:0.85rem; color:var(--text-muted);">(Recovery tracked separately)</span></div>
        <div style="margin-top:8px;"><strong>3. Proportional Purchase Cost:</strong> ${Format.currency(proportionalPurchaseCost)}</div>
        <div style="font-size:0.85rem; color:var(--text-muted); margin-left:8px;">(Batch Total Cost: ${Format.currency(purchaseAmount)} &times; ${s.totalEggsSold} / ${totalBatchEggs} eggs)</div>
        <div style="margin-top:8px;"><strong>4. Proportional Processing Cost:</strong> ${Format.currency(proportionalProcessing)}</div>
        <div style="margin-top:8px;"><strong>5. Delivery Cost:</strong> ${Format.currency(deliveryCost)}</div>
        <div style="margin-top:8px;"><strong>Total Expenses (3 + 4 + 5):</strong> <span style="color:var(--color-danger);">${Format.currency(totalExpenses)}</span></div>
        <div style="margin-top:8px; border-top:1px solid var(--card-border); padding-top:8px;">
            <strong>Net Profit:</strong> ${Format.currency(sellingRevenue)} + ${Format.currency(0)} - ${Format.currency(totalExpenses)} = <span style="color:${netProfit>=0?'var(--color-success)':'var(--color-danger)'}; font-weight:bold; font-size:1.1rem;">${Format.currency(netProfit)}</span>
        </div>
    `;
    openBreakdownModal(`Profit Calculation: ${id}`, html);
};

window.showRecoveryProfitBreakdown = function(id) {
    const r = State.recoveryLogs.find(x => x.id === id);
    if (!r) return;
    const recoveryRevenue = r.totalRevenue || 0;
    
    let html = `
        <div><strong>1. Sales Revenue:</strong> ${Format.currency(0)}</div>
        <div style="margin-top:8px;"><strong>2. Recovery Revenue:</strong> <span style="color:var(--color-success); font-weight:bold;">${Format.currency(recoveryRevenue)}</span></div>
        <div style="margin-top:8px;"><strong>3. Purchase Cost:</strong> ${Format.currency(0)} <span style="font-size:0.85rem; color:var(--text-muted);">(Accounted for in primary batch sales)</span></div>
        <div style="margin-top:8px;"><strong>4. Expenses:</strong> ${Format.currency(0)}</div>
        <div style="margin-top:8px; border-top:1px solid var(--card-border); padding-top:8px;">
            <strong>Net Profit:</strong> ${Format.currency(0)} + ${Format.currency(recoveryRevenue)} - ${Format.currency(0)} - ${Format.currency(0)} = <span style="color:var(--color-success); font-weight:bold; font-size:1.1rem;">${Format.currency(recoveryRevenue)}</span>
        </div>
    `;
    openBreakdownModal(`Profit Calculation: ${id}`, html);
};

// --- SECTION 8: Profit Analytics ---
function calculateAnalytics() {
    // Purchase Cost = Eggs × Price per Egg (base purchase amount)
    const totalPurchaseCost = State.purchases.reduce((sum, p) => sum + p.purchaseAmount, 0);
    
    // Additional purchase costs (loading, unloading, packing, misc per purchase)
    const totalPurchaseAdditional = State.purchases.reduce((sum, p) => sum + (p.totalAdditionalCost || 0), 0);

    // Processing / Sorting Expenses
    const totalProcessingCost = State.processingLogs.reduce((sum, pr) => sum + pr.totalProcessingExpense, 0);

    // Sales Transport / Delivery Costs
    const totalSalesTransport = State.sales.reduce((sum, s) => sum + (s.transportationCost || 0), 0);

    // All Expenses = purchase additional + processing + sales transport
    const totalExpense = totalPurchaseAdditional + totalProcessingCost + totalSalesTransport;

    // Revenues
    const totalSalesRevenue = State.sales.reduce((sum, s) => sum + s.salesRevenue, 0);
    
    // Returns Deduction
    let totalReturnsValue = 0;
    (State.returnLogs || []).forEach(r => {
        const sale = State.sales.find(s => s.id === r.saleId);
        if (sale) {
            const price = sale.sellingPrice || sale.sellingPricePerEgg || 0;
            totalReturnsValue += (r.totalReturned || 0) * price;
        }
    });

    const netSalesRevenue = totalSalesRevenue - totalReturnsValue;
    const totalRecoveryRevenue = (State.recoveryLogs || []).reduce((sum, r) => sum + (r.totalRevenue || 0), 0);
    const totalRevenue = netSalesRevenue + totalRecoveryRevenue;

    // Net Profit = (Net Sales + Recovery) - Purchase Cost - All Expenses
    const netProfit = totalRevenue - totalPurchaseCost - totalExpense;

    // Total eggs sold
    const totalEggsSold = State.sales.reduce((sum, s) => sum + s.totalEggsSold, 0);
    const profitPerEgg = totalEggsSold > 0 ? (netProfit / totalEggsSold) : 0;

    return {
        totalPurchaseCost,
        totalPurchaseAdditional,
        totalProcessingCost,
        totalSalesTransport,
        totalExpense,
        totalSalesRevenue,
        totalReturnsValue,
        totalRecoveryRevenue,
        totalRevenue,
        netProfit,
        totalEggsSold,
        profitPerEgg,
        avgTransportCostPerEgg: totalEggsSold > 0 ? (totalSalesTransport / totalEggsSold) : 0
    };
}

// --- Dynamic Input Calculations Binding ---
function setupLiveCalculations() {
    // Purchases Tab
    document.getElementById('purchase-trays').addEventListener('input', calculateLivePurchase);
    document.getElementById('purchase-neck-price').addEventListener('input', calculateLivePurchase);
    document.getElementById('purchase-cutting-price').addEventListener('input', calculateLivePurchase);

    // Sales Tab
    const salesInputs = ['sales-trays', 'sales-selling-price', 's-charge-labour', 's-charge-rent', 's-charge-diesel', 's-charge-loading', 's-charge-unloading', 's-charge-food', 's-charge-fastag', 's-charge-paper', 's-charge-misc', 's-charge-cleaning'];
    salesInputs.forEach(id => {
        const el = document.getElementById(id);
        if(el) el.addEventListener('input', calculateLiveSales);
    });

    // Return Management Tab
    const retInputs = ['ret-h-damaged', 'ret-h-scrap', 'ret-h-dirty', 'ret-h-small', 'ret-h-big', 'ret-h-airline', 'ret-e-damaged', 'ret-e-scrap', 'ret-l-returned'];
    retInputs.forEach(id => {
        const el = document.getElementById(id);
        if(el) el.addEventListener('input', calculateLiveReturns);
    });

    // Processing Tab
    const procInputs = ['proc-small','proc-damaged','proc-dirty','proc-big','proc-scrap','proc-airline','proc-cleaning-cost','proc-paper-tray-cost'];
    procInputs.forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('input', calculateLiveProcessing);
    });
}

// --- Search / Filters Bindings ---
function setupSearchFilters() {
    document.getElementById('farms-search').addEventListener('input', (e) => {
        renderFarmsTable(e.target.value);
    });
    
    document.getElementById('purchases-search').addEventListener('input', (e) => {
        renderPurchasesTable(e.target.value);
    });
    
    document.getElementById('inventory-search').addEventListener('input', (e) => {
        renderInventoryTable(e.target.value);
    });
    
    document.getElementById('customers-search').addEventListener('input', (e) => {
        renderCustomersTable(e.target.value);
    });
    
    document.getElementById('sales-search').addEventListener('input', (e) => {
        renderSalesTable(e.target.value);
    });
    
    document.getElementById('recovery-search').addEventListener('input', (e) => {
        renderReturnTable(e.target.value);
    });

    document.getElementById('processing-search').addEventListener('input', (e) => {
        renderProcessingTable(e.target.value);
    });

    document.getElementById('profit-search').addEventListener('input', (e) => {
        renderProfitSection(e.target.value);
    });

    document.getElementById('recovery-profit-search').addEventListener('input', () => {
        renderProfitSection();
    });
}

// --- Main Init Event ---
document.addEventListener('DOMContentLoaded', async () => {
    // Nav Routing
    // Mobile Sidebar Toggle
    const sidebarToggle  = document.getElementById('sidebar-toggle');
    const sidebarEl      = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebar-overlay');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', () => {
            sidebarEl.classList.toggle('open');
            sidebarOverlay.classList.toggle('open');
        });
        sidebarOverlay.addEventListener('click', () => {
            sidebarEl.classList.remove('open');
            sidebarOverlay.classList.remove('open');
        });
        // Close sidebar when a nav item is clicked on mobile
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', () => {
                if (window.innerWidth <= 767) {
                    sidebarEl.classList.remove('open');
                    sidebarOverlay.classList.remove('open');
                }
            });
        });
    }

    initNavigation();
    
    // Form Submits
    document.getElementById('farm-form').addEventListener('submit', handleFarmSubmit);
    document.getElementById('purchase-form').addEventListener('submit', handlePurchaseSubmit);
    document.getElementById('batch-form').addEventListener('submit', handleBatchSubmit);
    document.getElementById('processing-form').addEventListener('submit', handleProcessingSubmit);
    document.getElementById('customer-form').addEventListener('submit', handleCustomerSubmit);
    document.getElementById('sales-form').addEventListener('submit', handleSalesSubmit);
    document.getElementById('recovery-form').addEventListener('submit', handleReturnSubmit);
    
    // Autofetch/Dropdown change listeners
    document.getElementById('purchase-farm-select').addEventListener('change', handlePurchaseFarmSelect);
    document.getElementById('batch-purchase-select').addEventListener('change', handleBatchPurchaseSelect);
    document.getElementById('proc-batch-select').addEventListener('change', handleProcessingBatchSelect);
    document.getElementById('sales-batch-select').addEventListener('change', handleSalesBatchSelect);
    document.getElementById('sales-customer-select').addEventListener('change', updateDynamicSalesFields);
    document.getElementById('sales-delivery-type').addEventListener('change', updateDynamicSalesFields);
    document.getElementById('ret-batch-select').addEventListener('change', handleReturnSalesSelect);
    document.getElementById('ret-customer-select').addEventListener('change', updateDynamicReturnFields);
    
    // Modal Setup
    setupExpensesModal();
    setupSalesChargesModal();
    setupBreakdownModal();
    
    // Live Cost Calcs Bindings
    setupLiveCalculations();
    
    // Search bindings
    setupSearchFilters();
    
    // Load app state from MySQL database
    await initApp();
    
    // Initial Load - Farms Tab
    loadTabContent('farms');
});
  
  
</script>
</body>
</html>

