<script>
    var uri = '<?php echo base_url(); ?>'
    // change node 
    const permission_change = (id) => {
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/permission/get_permission_id',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                var id_status = (response[0].permission_status == '1') ? '2' : '1';
                $('#id_permission').val(id);
                $('#name_changed').val(response[0].permission_name);
                $('#detail_changed').val(response[0].permission_detail);
                $('#status_changed' + id_status).prop('checked', true);
                // document.getElementById("close_edit_all").click();
            }
        });
    }
    // change node action
    const permission_changed = () => {

        const id_permission = document.getElementById("id_permission").value;
        const name_changed = document.getElementById("name_changed").value;
        const detail_changed = document.getElementById("detail_changed").value;
        const status_changed = document.querySelector('input[name="status_changed"]:checked').value;

        if (!name_changed || !detail_changed) {
            // console.log("error !!");
            document.getElementById("permission_err_permission").innerHTML = "เกิดข้อผิดพลาด!!";
            document.getElementById("permission_err_detail").innerHTML = "กรุณากรอกข้อมูลให้ครบถ้วน";
            document.getElementById("permission_toast").classList.add("show", "bg-danger");
            setTimeout(() => {
                document.getElementById("permission_toast_close").click();
            }, 3000);
            return;
        }

        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/permission/update_permission_id',
            data: {
                id: id_permission,
                name_changed: name_changed,
                detail_changed: detail_changed,
                status_changed: status_changed
            },
            dataType: 'json',
            success: (response) => {
                document.getElementById("cancel_change").click();
                var id = response.id;
                var text_status = response.permission_status == 1 ?
                    "<span class='badge me-1 bg-label-success'>เปิดใช้งาน</span>" :
                    "<span class='badge me-1 bg-label-secondary'>ปิดใช้งาน</span>";
                $('#permission_names' + id).text(response.permission_name);
                $('#permission_details' + id).text(response.permission_detail);
                // $('#update_times' + id).text(convertDate(response.update_time));
                $('#update_times' + id).text(response.update_time);
                $('#permission_statuss' + id).html(text_status);
            }
        });
    }
    // insert node
    const permission_create = () => {
        const create_name = document.getElementById("create_name").value;
        const create_detail = document.getElementById("create_detail").value;
        const create_status = document.querySelector('input[name="create_status"]:checked').value;

        if (!create_name || !create_detail) {
            // console.log("error !!");
            document.getElementById("permission_err_permission").innerHTML = "เกิดข้อผิดพลาด!!";
            document.getElementById("permission_err_detail").innerHTML = "กรุณากรอกข้อมูลให้ครบถ้วน";
            document.getElementById("permission_toast").classList.add("show", "bg-danger");
            setTimeout(() => {
                document.getElementById("permission_toast_close").click();
            }, 3000);
            return;
        }


        const permission_set = {
            req_menu: 0,
            req_create: 0,
            req_change: 0,
            req_access: 0,
            req_cancel: 0,
            req_delete: 0,
            server_menu: 0,
            server_create: 0,
            server_change: 0,
            server_delete: 0,
            title_menu: 0,
            title_create: 0,
            title_change: 0,
            title_delete: 0,
            permission_menu: 0,
            user_menu: 0,
            user_create: 0,
            user_change: 0,
            user_delete: 0
        }


        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/permission/create_permission',
            data: {
                create_name: create_name,
                create_detail: create_detail,
                create_status: create_status,
                data: JSON.stringify(permission_set)
            },
            dataType: 'json',
            success: (response) => {
                // console.log(response)
                document.getElementById("cancel_create").click();

                const status_permission = (response.permission_status == 1) ? "เปิดใช้งาน" : "ปิดใช้งาน";
                const label_color = (response.permission_status == 1) ? "bg-label-success" : "bg-label-secondary";

                var new_row = ` <tr id='td_permission${response.id}'>
                                        <td>${response.lenght_row}</td>
                                        <td id='permission_names${response.id}'>${response.permission_name}</td>
                                        <td id='permission_details${response.id}' class="text-break">${response.permission_detail}</td>
                                        <td id='permission_statuss${response.id}'>
                                            <span class="badge me-1 ${label_color}">
                                            ${status_permission}
                                            </span>
                                        </td>
                                        <td id='update_times${response.id}'>${response.permission_time}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item" onclick="permission_change(${response.id})" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth_change" aria-controls="offcanvasBoth">
                                                        <span class="badge bg-label-warning w-100">
                                                            <i class="bx bx-edit-alt me-1"></i>&nbsp; Edit SERVER
                                                        </span>
                                                    </button>
                                                    <button class="dropdown-item" type="button" data-bs-toggle="modal" onclick="sent_id(${response.id})" data-bs-target="#modalToggle">
                                                        <span class="badge bg-label-danger w-100">
                                                            <i class="bx bx-trash me-1"></i>&nbsp; Delete SERVER
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>`;

                $('#row_permission').append(new_row);
            }
        });
    }
    // sent data to modal
    const sent_id = (id) => {
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/permission/get_permission_id',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                $('#permission_id_modal').val(response[0].permission_id);
                $('#name_permission_title').html(response[0].permission_name);
            }
        });
    }

    // delete node 
    const permission_delete = () => {
        const id = document.getElementById("permission_id_modal").value;
        // console.log("node_delete (id) ", id)
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/permission/delete_permission',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                // console.log(response)
                document.getElementById("cancel_permission").click();
                document.getElementById("td_permission" + response.id).remove();
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