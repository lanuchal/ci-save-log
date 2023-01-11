<div class="row">
    <!-- Bootstrap Table with Header - Light -->
    <div class="col-12">
        <div class="card p-5">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 h3">
                    <div class="d-flex"><i class='bx-lg bx bxs-lock-open'></i> <span class="mt-3 ms-2">สิทธิ์ในการใช้งาน</span></div>
                </div>


                <div class="col-12 col-md-6 col-lg-6 text-end">
                    <div class="mt-3">
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth">
                            <i class='bx bxs-plus-circle'></i>
                            เพิ่มสิทธิ์ในการใช้งาน
                        </button>
                        <!-- offcanvas create -->
                        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBoth" aria-labelledby="offcanvasBothLabel">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasBothLabel" class="offcanvas-title">

                                </h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body my-top mx-0 flex-grow-0 text-start">
                                <div class="row mb-5 p-2">
                                    <div class="text-center d-flex justify-content-center">
                                        <div style="width: 6rem; height: 6rem; color:#fff" class=" rounded-circle d-flex justify-content-center align-items-center bg-primary btn-icon">
                                            <span class=" tf-icons bx bxs-lock-open bx-lg bx-lg"></span>
                                        </div>
                                    </div>
                                    <h5 class="mb-5 mt-2 offcanvas-title text-center">เพิ่มสิทธิ์ในการใช้งาน</h5>

                                    <div class="col-12 mt-2">
                                        <label for="defaultFormControlInput2" class="form-label ps-2">ชื่อ</label>
                                        <input type="text" class="form-control" id="create_name" placeholder="เช่น server database" aria-describedby="defaultFormControlHelp" />
                                    </div>
                                    <div class="col-12 mt-2">

                                        <label for="exampleFormControlTextarea1" class="form-label ps-2">รายละเอียด</label>
                                        <textarea class="form-control" id="create_detail" rows="3"></textarea>

                                    </div>
                                    <div class="col-12 mt-2 pt-2 text-start">
                                        สถานะ server
                                    </div>
                                    <div class="col-md">
                                        <div class="form-check form-check-inline mt-3">
                                            <input class="form-check-input" type="radio" name="create_status" id="inlineRadio1" value="0" checked />
                                            <label class="form-check-label" for="inlineRadio1">ปิดใช้งาน</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="create_status" id="inlineRadio2" value="1" />
                                            <label class="form-check-label" for="inlineRadio2">เปิดใช้งาน</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" onclick="permission_create()" class="btn btn-primary mt-4 mb-2 d-grid w-100">บันทึก</button>
                                <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas" id="cancel_create">
                                    ยกเลิก
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- offcanvas edit -->
                <div class="col-12 col-md-6 col-lg-6 text-end">
                    <div class="mt-3">
                        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBoth_change" aria-labelledby="offcanvasBothLabel">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasBothLabel" class="offcanvas-title">

                                </h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body my-top mx-0 flex-grow-0 text-start">
                                <div class="row mb-5 p-2">
                                    <div class="text-center d-flex justify-content-center">
                                        <div style="width: 6rem; height: 6rem; color:#fff" class=" rounded-circle d-flex justify-content-center align-items-center bg-primary btn-icon">
                                            <span class=" tf-icons bx bxs-lock-open bx-lg bx-lg"></span>
                                        </div>
                                    </div>
                                    <h5 class="mb-5 mt-2 offcanvas-title text-center">แก้ไขสิทธิ์ในการใช้งาน</h5>
                                    <input type="hidden" id="id_permission">
                                    <div class="col-12 mt-2">
                                        <label for="name_changed" class="form-label ps-2">ชื่อ</label>
                                        <input type="text" class="form-control" id="name_changed" placeholder="เช่น SP ADMIN,ADMIN,USER" aria-describedby="defaultFormControlHelp" required />
                                    </div>
                                    <div class="col-12 mt-2">

                                        <label for="detail_changed" class="form-label ps-2">รายละเอียด</label>
                                        <textarea class="form-control" id="detail_changed" rows="3"></textarea>

                                    </div>
                                    <div class="col-12 mt-2 pt-2 text-start">
                                        สถานะ server
                                    </div>
                                    <div class="col-md">
                                        <div class="form-check form-check-inline mt-3">
                                            <input class="form-check-input" type="radio" name="status_changed" id="status_changed1" value="0" />
                                            <label class="form-check-label" for="status_changed1">ปิดใช้งาน</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status_changed" id="status_changed2" value="1" />
                                            <label class="form-check-label" for="status_changed2">เปิดใช้งาน</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary mt-4 mb-2 d-grid w-100" onclick="permission_changed()">บันทึก</button>
                                <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas" id="cancel_change">
                                    ยกเลิก
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- permission data -->
                <div class="mt-2 col-12 col-md-12 col-lg-12 order-3 order-md-2">
                    <div class="table-responsive">
                        <table id="example" class="table border-top" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">ลำดับ</th>
                                    <th style="width: 20%;">ชื่อ</th>
                                    <th>รายละเอียด</th>
                                    <th style="width: 10%;">สถานะ</th>
                                    <th style="width: 15%;">วันที่</th>
                                    <th style="width: 5%;">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody id="row_permission">
                                <?php foreach ($row_permission as $key => $row) {
                                    $status_permission = ($row['permission_status'] == 1) ? "เปิดใช้งาน" : "ปิดใช้งาน";
                                    $label_color = ($row['permission_status'] == 1) ? "bg-label-success" : "bg-label-secondary";
                                ?>
                                    <tr id='td_permission<?php echo $row['permission_id'] ?>'>
                                        <td><?php echo $key + 1; ?></td>
                                        <td id='permission_names<?php echo $row['permission_id'] ?>'><?php echo $row['permission_name']; ?></td>
                                        <td id='permission_details<?php echo $row['permission_id'] ?>'><?php echo $row['permission_detail']; ?></td>
                                        <td id='permission_statuss<?php echo $row['permission_id'] ?>'>
                                            <span class="badge me-1 <?php echo $label_color; ?>">
                                                <?php echo $status_permission; ?>
                                            </span>
                                        </td>
                                        <td id='update_times<?php echo $row['permission_id'] ?>'><?php echo ($row['update_time'] == null) ? $row['create_time'] : $row['update_time']; ?></td>
                                        <td class="text-center">
                                            <?php if ($row['permission_id'] == '1') { ?>
                                                <i class='bx bx-check'></i>
                                            <?php  } else { ?>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <button class="dropdown-item" onclick="permission_change(<?php echo $row['permission_id']; ?>)" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth_change" aria-controls="offcanvasBoth">
                                                            <span class="badge bg-label-warning w-100">
                                                                <i class="bx bx-edit-alt me-1"></i>&nbsp; Edit SERVER
                                                            </span>
                                                        </button>
                                                        <button class="dropdown-item" type="button" data-bs-toggle="modal" onclick="sent_id(<?php echo $row['permission_id']; ?>)" data-bs-target="#modalToggle">
                                                            <span class="badge bg-label-danger w-100">
                                                                <i class="bx bx-trash me-1"></i>&nbsp; Delete SERVER
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php  } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal 1-->
<div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel"><b>ลบสิทธิ์ในการใช้งาน</b> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cancel_permission"></button>
            </div>
            <div class="modal-body p-0 m-0">
                <div class="d-flex justify-content-center mt-3">
                    <input type="hidden" id="permission_id_modal">
                    <p>ยืนยันที่จะลบ &nbsp;</p>
                    <b class="ms-4">PERMISSIONTION : </b>
                    <p class="text-primary mx-2" id="name_permission_title"> </p>
                    <p> ?</p>
                </div>
            </div>
            <div class="modal-footer" style="margin-top: -1rem;">
                <button class="btn btn-danger " onclick="permission_delete()">
                    ยืนยัน
                </button>
            </div>
        </div>
    </div>
</div>

<div class="bs-toast toast toast-placement-ex m-2 top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" id="permission_toast">
    <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold" id="permission_err_permission"></div>
        <small><?php date("Y-m-d"); ?></small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" id="permission_toast_close"></button>
    </div>
    <div class="toast-body" id="permission_err_detail"></div>
</div>
<!-- Toast with Placements -->


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
                console.log(response)
                document.getElementById("cancel_create").click();

                const status_permission = (response.permission_status == 1) ? "เปิดใช้งาน" : "ปิดใช้งาน";
                const label_color = (response.permission_status == 1) ? "bg-label-success" : "bg-label-secondary";

                var new_row = ` <tr id='td_permission${response.id}'>
                                        <td>${response.lenght_row}</td>
                                        <td id='permission_names${response.id}'>${response.permission_name}</td>
                                        <td id='permission_details${response.id}'>${response.permission_detail}</td>
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
                console.log(response)
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