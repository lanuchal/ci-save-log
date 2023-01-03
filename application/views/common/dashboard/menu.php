<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?php echo base_url('dashboard'); ?>" class="app-brand-link">
            <span class="app-brand-logo demo">

                <img src="<?php echo base_url(); ?>assets/img/icons/cmex/logo.jpg" width="50rem" alt="">
            </span>
            <span class="menu-text fw-bolder ms-2">
                ระบบบันทึก <br>
                เข้าใช้งาน SERVER</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <!-- Dashboard -->
        <li class="menu-item <?php if ($nav_uri == "dashboard") echo "active"; ?>">
            <a href="<?php echo base_url('dashboard'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Request</span>
        </li>

        <li class="menu-item <?php if ($nav_uri == "request_server") echo "active"; ?>">
            <a href="<?php echo base_url('request_server'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-save"></i>
                <div data-i18n="Basic">บันทึกเข้าใช้งาน</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Report</span>
        </li>

        <li class="menu-item <?php if ($nav_uri == "report") echo "active"; ?>">
            <a href="<?php echo base_url('report'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-line-chart"></i>
                <!-- <i class='bx bx-line-chart'></i> -->
                <div data-i18n="Basic">รายงาน</div>
            </a>
        </li>
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Manage</span></li>
        <!-- Cards -->

        <li class="menu-item <?php if ($nav_uri == "mamage_node") echo "active"; ?>">
            <a href="<?php echo base_url('mamage_node'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-server"></i>
                <!-- <i class='bx bx-server' ></i> -->
                <div data-i18n="Basic">server</div>
            </a>
        </li>

        <li class="menu-item <?php if ($nav_uri == "mamage_permission") echo "active"; ?>">
            <a href="<?php echo base_url('mamage_permission'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-lock-open"></i>
                <div data-i18n="Basic">สิทธ์ในการใช้งาน</div>
            </a>
        </li>
        <!-- User interface -->
        <li class="menu-item <?php if (substr($nav_uri, 0, 9) == "mamage_ma") echo "active open"; ?>">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="User interface">จัดการ</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?php if ($nav_uri == "mamage_ma_permission") echo "active"; ?>">
                    <a href="<?php echo base_url('mamage_ma_permission'); ?>" class="menu-link">
                        <div data-i18n="Alerts">จัดการสิทธิ์</div>
                    </a>
                </li>
                <li class="menu-item <?php if ($nav_uri == "mamage_ma_user") echo "active"; ?>">
                    <a href="<?php echo base_url('mamage_ma_user'); ?>" class="menu-link">
                        <div data-i18n="Alerts">จัดการผู้ใช้งาน</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item <?php if ($nav_uri == "cards_basic") echo "active"; ?>">
            <a href="<?php echo base_url('cards_basic'); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Basic">ออกจากระบบ</div>
            </a>
        </li>


    </ul>
</aside>
<!-- / Menu -->