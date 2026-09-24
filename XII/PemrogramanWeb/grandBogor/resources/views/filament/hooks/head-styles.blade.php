<style>
    /* ==========================================================================
       Grand Bogor Resort & Botanical Sanctuary — Filament v5 Theme (Page 6 PDF)
       ========================================================================== */

    /* Global SVG size guard to prevent unconstrained icon blowout */
    svg {
        max-width: 100%;
    }
    aside.fi-sidebar svg,
    header.fi-topbar svg {
        max-width: 22px;
        max-height: 22px;
    }

    /* 1. SIDEBAR (Deep Forest Pine Green #082622) */
    aside.fi-sidebar {
        background-color: #082622 !important;
        border-right: 1px solid #0d3832 !important;
    }
    aside.fi-sidebar .fi-sidebar-header {
        border-bottom: 1px solid #0d3832 !important;
        padding-top: 1rem !important;
        padding-bottom: 1rem !important;
    }
    aside.fi-sidebar .fi-sidebar-header a span {
        font-family: Georgia, Cambria, 'Times New Roman', serif !important;
        font-weight: 700 !important;
        color: #f0d68a !important;
        letter-spacing: 0.02em !important;
    }
    aside.fi-sidebar .fi-sidebar-group-label {
        color: #6ee7b7 !important;
        letter-spacing: 0.1em;
        font-weight: 700;
        font-size: 0.65rem;
        text-transform: uppercase;
        margin-top: 0.5rem;
    }
    aside.fi-sidebar .fi-sidebar-item-button {
        color: #d1fae5 !important;
        border-radius: 0.5rem !important;
        transition: all 0.2s ease;
    }
    aside.fi-sidebar .fi-sidebar-item-button:hover {
        background-color: #0d3832 !important;
        color: #ffffff !important;
    }
    aside.fi-sidebar .fi-sidebar-item-button.fi-active {
        background-color: #11453e !important;
        color: #fef08a !important;
        font-weight: 700 !important;
        border-left: 3px solid #fbbf24 !important;
    }
    aside.fi-sidebar .fi-sidebar-item-button.fi-active svg {
        color: #fbbf24 !important;
    }

    /* 2. TOPBAR (Crisp White #FFFFFF, Light Border) */
    header.fi-topbar {
        background-color: #ffffff !important;
        border-bottom: 1px solid #e5e7eb !important;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.03) !important;
    }
    header.fi-topbar .fi-topbar-item {
        color: #374151 !important;
    }
    header.fi-topbar input[type="search"] {
        background-color: #f9fafb !important;
        border: 1px solid #e5e7eb !important;
        border-radius: 9999px !important;
        font-size: 0.8125rem !important;
    }

    /* 3. MAIN CONTENT BACKGROUND (#F8F9FA) */
    main.fi-main,
    .fi-page {
        background-color: #f8f9fa !important;
    }
    .fi-header-heading {
        font-family: Georgia, Cambria, 'Times New Roman', serif !important;
        font-weight: 700 !important;
        color: #111827 !important;
        font-size: 1.75rem !important;
    }
    .fi-header-subheading {
        color: #4b5563 !important;
        font-size: 0.875rem !important;
    }

    /* 4. STAT CARDS (Matching Page 6 PDF) */
    .fi-wi-stats-overview-stat {
        background-color: #ffffff !important;
        border: 1px solid #e5e7eb !important;
        border-radius: 1rem !important;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.04) !important;
        padding: 1.25rem !important;
    }
    .fi-wi-stats-overview-stat-label {
        font-size: 0.7rem !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.06em !important;
        color: #6b7280 !important;
    }
    .fi-wi-stats-overview-stat-value {
        font-size: 2rem !important;
        font-weight: 800 !important;
        color: #111827 !important;
        margin-top: 0.25rem !important;
        margin-bottom: 0.25rem !important;
    }
    .fi-wi-stats-overview-stat-description {
        font-size: 0.75rem !important;
        color: #4b5563 !important;
    }

    /* Card 4: Average Daily Rate (ADR) - Authentic Dark Slate Card from PDF */
    .fi-wi-stats-overview-stat:nth-child(4) {
        background-color: #1f2937 !important;
        border-color: #374151 !important;
        color: #ffffff !important;
        position: relative;
        overflow: hidden;
    }
    .fi-wi-stats-overview-stat:nth-child(4) .fi-wi-stats-overview-stat-label {
        color: #9ca3af !important;
    }
    .fi-wi-stats-overview-stat:nth-child(4) .fi-wi-stats-overview-stat-value {
        color: #ffffff !important;
    }
    .fi-wi-stats-overview-stat:nth-child(4) .fi-wi-stats-overview-stat-description {
        color: #d1d5db !important;
    }
    .fi-wi-stats-overview-stat:nth-child(4)::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #f59e0b, #d97706);
    }

    /* 5. TABLE STYLING */
    .fi-ta-content {
        background-color: #ffffff !important;
        border: 1px solid #e5e7eb !important;
        border-radius: 1rem !important;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.04) !important;
        overflow: hidden !important;
    }
    .fi-ta-header-cell {
        background-color: #f9fafb !important;
        font-size: 0.6875rem !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.06em !important;
        color: #6b7280 !important;
        border-bottom: 1px solid #e5e7eb !important;
    }
    .fi-ta-row:hover {
        background-color: #f9fafb !important;
    }

    /* 6. PRIMARY & SECONDARY BUTTONS (Olive Gold & Light Blue) */
    .fi-btn-primary,
    button[type="submit"].fi-btn-primary,
    a.fi-btn-primary {
        background-color: #745711 !important;
        color: #ffffff !important;
        border: 1px solid #634a0e !important;
        border-radius: 0.5rem !important;
        font-weight: 600 !important;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.08) !important;
    }
    .fi-btn-primary:hover {
        background-color: #5d460e !important;
    }
</style>
