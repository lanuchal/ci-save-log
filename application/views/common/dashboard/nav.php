<?php
$name_ot = '64027';
// $name_ot = $this->session->userdata('req_NUM_OT');
$uri = '/employee/images/person/' . $name_ot . '.png';
// https://excellent.med.cmu.ac.th/employee/images/person/64027.png

$uri_img = "";
// if (file_exists($uri)) {
//     // echo 'File found!';
//     $uri_img = $uri;
// } else {
//     echo 'File not found.';
//     $uri_img = 'https://excellent.med.cmu.ac.th/cmex_system/common/assets/images/person_img.png';
// }

$ch = curl_init($uri);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($status == 200) {
    // echo 'Image found!';
    $uri_img = $uri;
} else {
    // echo 'Image not found.';
    $uri_img = 'https://excellent.med.cmu.ac.th/cmex_system/common/assets/images/person_img.png';
}

?>
<!-- Layout container -->
<div class="layout-page">
    <!-- Navbar -->

    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

            <?php echo $uri; ?>
            <?php echo $uri_img; ?>

            <!-- Search -->
            <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                </div>
            </div>
            <!-- /Search -->


            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                    <a class="github-button" href="https://github.com/themeselection/sneat-html-admin-template-free" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <!-- <img src="<?php echo base_url(); ?>assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" /> -->
                            <img src="<?php echo $uri_img ?>" alt class="w-px-40 rounded-circle object-fit-none" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <!-- https://excellent.med.cmu.ac.th/employee/images/person/64027.png -->
                                            <!-- <img src="<?php echo base_url(); ?>assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" /> -->
                                            <img src="<?php echo $uri_img ?>" alt class="w-px-40  rounded-circle object-fit-none" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block"><?php echo $this->session->userdata('req_Fname') . " " . $this->session->userdata('req_Lname'); ?></span>
                                        <small class="text-muted"><?php echo $this->session->userdata('req_permission_name'); ?></small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="https://excellent.med.cmu.ac.th/employee/<?php echo $this->session->userdata('req_NUM_OT') ?>" target="_blank">
                                <i class="bx bx-user me-2"></i>
                                <span class="align-middle">ข้อมูลส่วนตัว</span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?php echo base_url('logout'); ?>" class="menu-link" data-bs-toggle="modal" data-bs-target="#modalToggle_logout">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">ออกจากระบบ</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
    </nav>

    <!-- / Navbar -->

    <!-- Modal 1-->
    <div class="modal fade" id="modalToggle_logout" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalToggleLabel"><b>ออกจากระบบ</b> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cancel_modal"></button>
                </div>
                <div class="modal-body p-0 m-0">
                    <div class="d-flex justify-content-center mt-3">
                        <input type="hidden" id="delete_num_ot">
                        <p>ยืนยันที่จะออกจากระบบ &nbsp;</p>
                        <b>ผู้ใช้งาน </b>
                        :
                        <p class="text-primary mx-2"><?php echo $this->session->userdata('req_Fname') . " " . $this->session->userdata('req_Lname'); ?> </p>
                        <p> ?</p>
                    </div>
                </div>
                <div class="modal-footer" style="margin-top: -1rem;">

                    <form id="formAuthentication" class="mb-3" action="<?php echo base_url('auth/auth/logout'); ?>" method="POST">
                        <button class="btn btn-danger " type="submit">
                            ยืนยัน
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">