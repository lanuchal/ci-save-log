<?php
$json_data = $this->session->userdata('permission_set');
$object = json_decode($json_data, true);

?>
<div class="row">
    <!-- Bootstrap Table with Header - Light -->
    <div class="col-12">
        <div class="card p-5">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 h3"><i class='bx-lg bx bxs-user-circle'></i> ผู้ใช้งาน </div>
                <div class="col-12 col-md-6 col-lg-6 text-end">
                    <div class="mt-3">
                        <?php if ($object['user_create']) { ?>
                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth">
                                <i class='bx bxs-plus-circle'></i>
                                เพิ่มผู้ใช้งาน
                            </button>
                        <?php } ?>
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
                                            <span class=" tf-icons bx bxs-user-circle bx-lg bx-lg"></span>
                                        </div>
                                    </div>
                                    <h5 class="mb-5 mt-2 offcanvas-title text-center">เพิ่มผู้ใช้งาน</h5>
                                    <div class="col-12 mt-2">
                                        <label for="defaultFormControlInput2" class="form-label ps-2">ชื่อ</label>
                                        <input class="form-control" list="browsers" name="browser" id="create_name">
                                        <datalist id="browsers">
                                            <?php foreach ($row_user as $key => $row) { ?>
                                                <option value="<?php echo $row['NUM_OT'] . " - " . $row['Fname'] . " " . $row['Lname']; ?>">
                                                <?php } ?>
                                        </datalist>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="defaultFormControlInput2" class="form-label ps-2">กำหนดสิทธิ์</label>
                                        <input class="form-control" list="browsers2" name="browser2" id="create_permission">
                                        <datalist id="browsers2">
                                            <?php foreach ($row_permission as $key => $row) { ?>
                                                <option value="<?php echo $row['permission_id'] . " - " . $row['permission_name']; ?>">
                                                <?php } ?>
                                        </datalist>
                                    </div>
                                </div>
                                <button type="button" onclick="user_create()" class="btn btn-primary mt-4 mb-2 d-grid w-100">บันทึก</button>
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
                                            <span class=" tf-icons bx bxs-user-circle bx-lg bx-lg"></span>
                                        </div>
                                    </div>
                                    <h5 class="mb-5 mt-2 offcanvas-title text-center">แก้ไขผู้ใช้งาน</h5>
                                    <input type="hidden" id="change_id">

                                    <div class="col-12 mt-2">
                                        <label for="defaultFormControlInput2" class="form-label ps-2">กำหนดสิทธิ์</label>
                                        <input class="form-control" list="browsers3" name="browser3" id="change_permission">
                                        <datalist id="browsers3">
                                            <?php foreach ($row_permission as $key => $row) { ?>
                                                <option value="<?php echo $row['permission_id'] . " - " . $row['permission_name']; ?>">
                                                <?php } ?>
                                        </datalist>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary mt-4 mb-2 d-grid w-100" onclick="user_changed()">บันทึก</button>
                                <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas" id="cancel_change">
                                    ยกเลิก
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- node data -->
                <div class="mt-2 col-12 col-md-12 col-lg-12 order-3 order-md-2">
                    <div class="table-responsive">
                        <table id="example" class="table border-top" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">ลำดับ</th>
                                    <th style="width: 20%;">รหัส</th>
                                    <th style="width: 30%;">ชื่อ</th>
                                    <th>สิทธิ์</th>
                                    <th style="width: 15%;">วันที่</th>
                                    <th style="width: 5%;">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody id="row_user">
                                <?php foreach ($row_ma_user as $key => $row) {
                                ?>
                                    <tr id='td_user<?php echo $row['NUM_OT'] ?>'>
                                        <td><?php echo $key + 1; ?></td>
                                        <td id='user_id<?php echo $row['NUM_OT'] ?>'><?php echo $row['NUM_OT']; ?></td>
                                        <td id='user_names<?php echo $row['NUM_OT'] ?>'><i class='bx bx-user'></i> &nbsp; <?php echo $row['Fname'] . " " . $row['Lname']; ?></td>
                                        <td id='user_permissions<?php echo $row['NUM_OT'] ?>'><?php echo $row['permission_name']; ?></td>

                                        <td id='update_times<?php echo $row['NUM_OT'] ?>'><?php echo ($row['update_time'] == null) ? $row['create_time'] : $row['update_time']; ?></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <?php if ($object['user_change']) { ?>
                                                        <button class="dropdown-item" onclick="user_change(<?php echo $row['NUM_OT']; ?>)" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth_change" aria-controls="offcanvasBoth">
                                                            <span class="badge bg-label-warning w-100">
                                                                <i class="bx bx-edit-alt me-1"></i>&nbsp; แก้ไขผู้ใช้งาน
                                                            </span>
                                                        </button><?php } ?>
                                                    <?php if ($object['user_delete']) { ?>
                                                        <button class="dropdown-item" type="button" data-bs-toggle="modal" onclick="sent_id(<?php echo $row['NUM_OT']; ?>)" data-bs-target="#modalToggle">
                                                            <span class="badge bg-label-danger w-100">
                                                                <i class="bx bx-trash me-1"></i>&nbsp; ลบผู้ใช้งาน
                                                            </span>
                                                        </button><?php } ?>
                                                </div>
                                            </div>
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
                <h5 class="modal-title" id="modalToggleLabel"><b>ลบผู้ใช้งาน</b> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cancel_modal"></button>
            </div>
            <div class="modal-body p-0 m-0">
                <div class="d-flex justify-content-center mt-3">
                    <input type="hidden" id="delete_num_ot">
                    <p>ยืนยันที่จะลบ &nbsp;</p>
                    <b>ผู้ใช้งาน : </b>
                    <p class="text-primary mx-2" id="delete_name"> </p>
                    (
                    <p class="text-primary mx-2" id="delete_permission"> </p>
                    )<p> ?</p>
                </div>
            </div>
            <div class="modal-footer" style="margin-top: -1rem;">
                <button class="btn btn-danger " onclick="user_delete()">
                    ยืนยัน
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    var uri = '<?php echo base_url(); ?>'
    const user_change = (id) => {
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/ma_user/get_user_permission',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                $('#change_id').val(id);
                $('#change_permission').val(response[0].permission_id + " - " + response[0].permission_name);
            }
        });
    }
    const user_changed = () => {

        const change_permission = document.getElementById("change_permission").value;
        const id_user = document.getElementById("change_id").value;

        const permission_id = change_permission.slice(0, change_permission.indexOf("-") - 1);
        const permission_name = change_permission.slice(change_permission.indexOf("-") + 1, change_permission.lenght);


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
                console.log(response)
                document.getElementById("cancel_change").click();
                var id = response.id;
                $('#user_permissions' + id).text(response.permission_name);
                $('#update_times' + id).text(response.update_time);
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
            console.log("error !!");
            return;
        }
        // console.log(create_ip)

        console.log(num_ot)
        console.log(user_name)
        console.log(create_permission)
        // return;
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
                console.log(response)
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
                                                    <button class="dropdown-item" onclick="permission_change(${response.num_ot})" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth_change" aria-controls="offcanvasBoth">
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
        });
    }
    // sent data to modal
    const sent_id = (id) => {
        console.log("id", id)
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
                console.log(response)
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