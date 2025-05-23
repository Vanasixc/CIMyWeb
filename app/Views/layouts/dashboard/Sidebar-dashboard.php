<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="<?= base_url('pages/home') ?>" class="brand-link">
            <!--begin::Brand Image-->
            <img src="<?= base_url('assets/img/Ave_Mujica_logo.png') ?>" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Ave Mujica</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <!-- Sidebar but welcome -->
                <a href="<?= base_url('dashboard') ?>" class="nav-link active">
                    <i class="nav-icon bi bi-emoji-smile"></i>
                    <p>
                        Welcome
                    </p>
                </a>
                <!-- Sidebar but dashboard -->
                <a href="<?= base_url('dashboard/account_setting') ?>" class="nav-link active">
                    <i class="nav-icon bi bi-speedometer"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
                <!-- Sidebar but dashboard -->
                <a href="<?= base_url('dashboard/account_setting') ?>" class="nav-link active">
                    <i class="nav-icon bi bi-person-circle"></i>
                    <p class="text-danger">
                        Account Settings
                    </p>
                </a>
                <!-- Sidebar but Home -->
                <a href="<?= base_url('pages/home') ?>" class="nav-link active">
                    <i class="nav-icon bi bi-house"></i>
                    <p>
                        Home
                    </p>
                </a>
                <!-- Sidebar but logout -->
                <a href="auth/logout" class="nav-link active">
                    <i class="nav-icon bi bi-person-slash"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->