<!-- file script -->
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
                // console.log(response)
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