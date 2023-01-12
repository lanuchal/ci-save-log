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


                    <!-- <form id="formAuthentication" class="mb-3" action="<?php echo base_url('auth/auth/sign_in'); ?>" method="POST"> -->
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
                        <button class="btn btn-primary d-grid w-100" onclick="valdate()">Sign in</button>
                    </div>

                    <!-- Primary Toast -->

                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>
<div class="bs-toast toast toast-placement-ex m-2 top-0 start-50 translate-middle-x" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" id="login_toast">
    <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold" id="login_err_title"></div>
        <small><?php date("Y-m-d"); ?></small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" id="login_toast_close"></button>
    </div>
    <div class="toast-body" id="login_err_detail"></div>
</div>
<!-- Toast with Placements -->

<script>
    var uri = '<?php echo base_url(); ?>'

    const valdate = () => {
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
        const last_path = document.getElementById("last_path").value;
        // last_path
        if (!username || !password) {
            // console.log('removing')
            document.getElementById("login_err_title").innerHTML = "เกิดข้อผิดพลาด!!";
            document.getElementById("login_err_detail").innerHTML = "กรุณากรอกข้อมูลให้ครบถ้วน";
            document.getElementById("login_toast").classList.add("show", "bg-danger");
            setTimeout(() => {
                document.getElementById("login_toast_close").click();
            }, 3000);
            return;
        }


        $.ajax({
            type: 'POST',
            url: uri + 'auth/auth/sign_in',
            data: {
                username: username,
                password: password,
                last_path: last_path
            },
            dataType: 'json',
            success: (response) => {
                console.log(response)
                // return;
                if (response.status == '1') {
                    window.location.assign(`${uri + response.last_path}`);
                } else {
                    document.getElementById("login_err_title").innerHTML = "เกิดข้อผิดพลาด!!";
                    document.getElementById("login_err_detail").innerHTML = "รหัสผู้ใช้งานหรือรหัสผ่านของผู้ใช้งานไม่ถูกต้อง";
                    document.getElementById("login_toast").classList.add("show", "bg-danger");
                    setTimeout(() => {
                        document.getElementById("login_toast_close").click();
                    }, 3000);
                }
            }
        });
    }
</script>