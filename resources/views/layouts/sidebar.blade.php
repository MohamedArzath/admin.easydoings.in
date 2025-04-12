<div class="sidebar sidebar-fixed sidebar-dark bg-dark-gradient border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
        <div class="sidebar-brand">
            <img src="/assets/logo/Easydoings_full_crop-removebg-preview.png" class="sidebar-brand-full" width="110" height="32" alt="CoreUI Logo"/>
            <img src="/assets/logo/Easydoings__2_-removebg-preview.png" class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo"/>
        </div>
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
        <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <svg class="nav-icon">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                </svg>
                <span data-coreui-i18n="Dashboard">Dashboard</span>
            </a>
        </li>
        <li class="nav-title" data-coreui-i18n="Blogs">Blogs</li>
        <li class="nav-item">
            <a class="nav-link" href="/my-articles">
                <svg class="nav-icon">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
                </svg>
                <span data-coreui-i18n="Articles">Articles</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/add-article">
                <svg class="nav-icon">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                </svg>
                <span data-coreui-i18n="Add Article">Add Article</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/categories">
                <svg class="nav-icon">
                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-calculator"></use>
                </svg>
                <span data-coreui-i18n="Categories">Categories</span>
            </a>
        </li>

    </ul>
</div>