<script>
    var uri = '<?php echo base_url(); ?>'

    const msg_error = (num_ot, permission_id) => {
        var msg_error = "";
        if (!num_ot && permission_id) {
            msg_error = "ข้อมูลผู้ใช้งาน ไม่ถูกต้องกรุณากรอกข้อมูลและทำรายการใหม่อีกครั้ง";
        } else if (num_ot && !permission_id) {
            msg_error = "ข้อมูลสิทธ์การใช้งาน ไม่ถูกต้องกรุณากรอกข้อมูลและทำรายการใหม่อีกครั้ง";
        } else if (!num_ot && !permission_id) {
            msg_error = "ข้อมูลผู้ใช้งานและสิทธ์การใช้งาน ไม่ถูกต้องกรุณากรอกข้อมูลและทำรายการใหม่อีกครั้ง";
        }
        return msg_error;
    }

    const user_changes = (id) => {
        // console.log("id = ", id);
        // return;
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/ma_user/get_user_permission',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                // document.getElementById("close_edit_all").click();
                console.log(response)
                $('#change_id').val(id);
                var select = document.getElementById("change_permission");
                for (var i = 0; i < select.options.length; i++) {
                    if (select.options[i].value == response[0].permission_id + " - " + response[0].permission_name) {
                        select.options[i].selected = true;
                        break;
                    }
                }

                // $('#change_permission').val(response[0].permission_id + " - " + response[0].permission_name);

            }
        });
    }
    const user_changed = () => {

        const change_permission = document.getElementById("change_permission").value;
        const id_user = document.getElementById("change_id").value;

        const permission_id = change_permission.slice(0, change_permission.indexOf("-") - 1);
        const permission_name = change_permission.slice(change_permission.indexOf("-") + 1, change_permission.lenght);


        if (!change_permission) {
            document.getElementById("ma_user_err_title").innerHTML = "เกิดข้อผิดพลาด!!";
            document.getElementById("ma_user_err_detail").innerHTML = "กรุณากรอกข้อมูลให้ครบถ้วน";
            document.getElementById("ma_user_toast").classList.add("show", "bg-danger");
            setTimeout(() => {
                document.getElementById("ma_user_toast_close").click();
            }, 3000);
            return;
        }

        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/ma_user/update_user_permission',
            data: {
                id: id_user,
                permission_id: permission_id,
                permission_name: permission_name
            },
            dataType: 'json',
            success: (response) => {
                // console.log(response.result_permission_id)

                if (response.status == '0') {
                    var msg = msg_error(1, response.result_permission_id);
                    $("#ma_user_err_title").html("เกิดข้อผิดพลาด!!");
                    $("#ma_user_toast").addClass("show bg-danger");
                    $("#ma_user_err_detail").html(msg);

                    setTimeout(() => {
                        document.getElementById("ma_user_toast_close").click();
                    }, 3000);
                } else {
                    document.getElementById("cancel_change").click();
                    var id = response.id;
                    $('#user_permissions' + id).text(response.permission_name);
                    $('#update_times' + id).text(response.update_time);
                }

            }
        });
    }
    // insert node
    const user_create = () => {

        const create_name = document.getElementById("create_name").value;
        const create_permission = document.getElementById("create_permission").value;

        const permission_id = create_permission.slice(0, create_permission.indexOf("-") - 1);
        const permission_name = create_permission.slice(create_permission.indexOf("-") + 1, create_permission.lenght);
        const num_ot = create_name.slice(0, create_name.indexOf("-") - 1);
        const user_name = create_name.slice(create_name.indexOf("-") + 1, create_name.lenght);

        if (!create_name || !create_permission) {
            document.getElementById("ma_user_err_title").innerHTML = "เกิดข้อผิดพลาด!!";
            document.getElementById("ma_user_err_detail").innerHTML = "กรุณากรอกข้อมูลให้ครบถ้วน";
            document.getElementById("ma_user_toast").classList.add("show", "bg-danger");
            setTimeout(() => {
                document.getElementById("ma_user_toast_close").click();
            }, 3000);
            return;
        }
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/ma_user/create_ma_user',
            data: {
                num_ot: num_ot,
                user_name: user_name,
                permission_id: permission_id,
                permission_name: permission_name
            },
            dataType: 'json',
            success: (response) => {
                // console.log(response)
                if (response.status == '0') {
                    var msg = msg_error(response.result_num_ot, response.result_permission_id);
                    $("#ma_user_err_title").html("เกิดข้อผิดพลาด!!");
                    $("#ma_user_toast").addClass("show bg-danger");
                    $("#ma_user_err_detail").html(msg);

                    setTimeout(() => {
                        document.getElementById("ma_user_toast_close").click();
                    }, 3000);
                } else {
                    document.getElementById("cancel_create").click();
                    var new_row = ` <tr id='td_user${response.num_ot}'>
                                        <td>${response.lenght_row}</td>
                                        <td id='user_ids${response.num_ot}'>${response.num_ot}</td>
                                        <td id='user_names${response.num_ot}'><i class='bx bx-user'></i> &nbsp; ${response.name}</td>
                                        <td id='user_permissions${response.num_ot}'> ${response.permission_name}</td>
                                        <td id='update_times${response.num_ot}'>${response.user_time}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item" onclick="user_changes('${response.num_ot}')" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth_change" aria-controls="offcanvasBoth">
                                                        <span class="badge bg-label-warning w-100">
                                                            <i class="bx bx-edit-alt me-1"></i>&nbsp; Edit SERVER
                                                        </span>
                                                    </button>
                                                    <button class="dropdown-item" type="button" data-bs-toggle="modal" onclick="sent_id(${response.num_ot})" data-bs-target="#modalToggle">
                                                        <span class="badge bg-label-danger w-100">
                                                            <i class="bx bx-trash me-1"></i>&nbsp; Delete SERVER
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>`;

                    $('#row_user').append(new_row);
                }


            }
        });
    }
    // sent data to modal
    const sent_id = (id) => {
        // console.log("id", id)
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/ma_user/get_ma_user_id',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                $('#delete_num_ot').val(response[0].NUM_OT);
                $('#delete_permission').html(response[0].permission_name);
                $('#delete_name').html(response[0].Fname + " " + response[0].Lname);
            }
        });
    }

    // delete node 
    const user_delete = () => {
        const id = document.getElementById("delete_num_ot").value;
        // console.log("node_delete (id) ", id)
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/ma_user/delete_user',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                // console.log(response)
                document.getElementById("cancel_modal").click();
                document.getElementById("td_user" + response.id).remove();
            }
        });
    }

    function convertDate(inputFormat) {
        function pad(s) {
            return (s < 10) ? '0' + s : s;
        }
        var d = new Date(inputFormat)
        var c_mount = pad(d.getMonth() + 1);
        var r_mount = "";
        if (c_mount == "01") {
            r_mount = "มกราคม";
        }
        if (c_mount == "02") {
            r_mount = "กุมภาพันธ์";
        }
        if (c_mount == "03") {
            r_mount = "มีนาคม";
        }
        if (c_mount == "04") {
            r_mount = "เมษายน";
        }
        if (c_mount == "05") {
            r_mount = "พฤษภาคม";
        }
        if (c_mount == "06") {
            r_mount = "มิถุนายน";
        }
        if (c_mount == "07") {
            r_mount = "กรกฎาคม";
        }
        if (c_mount == "08") {
            r_mount = "สิงหาคม";
        }
        if (c_mount == "09") {
            r_mount = "กันยายน";
        }
        if (c_mount == "10") {
            r_mount = "ตุลาคม";
        }
        if (c_mount == "11") {
            r_mount = "พฤศจิกายน";
        }
        if (c_mount == "12") {
            r_mount = "ธันวาคม";
        }

        return [pad(d.getDate()), r_mount, d.getFullYear() + 543].join(' ')
    }
</script>