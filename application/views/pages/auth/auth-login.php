<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="http://excellent.med.cmu.ac.th" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="<?php echo base_url(); ?>assets/img/icons/cmex/logo.jpg" width="80rem" alt="">
                            </span>
                        </a>
                    </div>

                    <!-- /Logo -->
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <span><strong>ระบบบันทึกเข้าใช้งาน SERVER </strong> </span> &nbsp; <span class='bx bx-server bx-sm'></span>

                    </div>


                    <form id="formAuthentication" class="mb-3" action="<?php echo base_url('auth/auth/sign_in'); ?>" method="POST">
                        <input type="hidden" name="last_path" id="last_path" value="<?php echo $current_url; ?>">
                        <div class="mb-3">
                            <label for="email" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="กรุณากรอกรหัสพนักงาน" autofocus />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                <!-- <a href="<?php echo base_url('auth_forgot_password_basic'); ?>">
                                    <small>Forgot Password?</small>
                                </a> -->
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit" onclick="valdate()">Sign in</button>
                        </div>
                    </form>

                    <!-- Primary Toast -->

                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>


<div class="bs-toast toast fade  position-absolute top-0 end-0 m-2 bg-danger <?php if ($label_error == 1) {
                                                                                    echo 'show';
                                                                                } ?>" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <i class='bx bx-bell'></i> &nbsp;
        <div>เกิดข้อผิดพลาด <?php echo $label_error; ?></div>
        <small class="ms-auto">11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" id="cancel_toast"></button>
    </div>
    <div class="toast-body p-4">
        &emsp; ข้อผู้ใช้ไม่ถูกต้องไม่ถูกต้อง หรือผู้ใช้งานไม่ได้รับสิทธิ์ในการเข้าใช้งานระบบ
    </div>
</div>
<script>
    setTimeout(() => {
        document.getElementById("cancel_toast").click();
    }, 2000);
</script>