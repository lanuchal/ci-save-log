<?php
$json_data = $this->session->userdata('req_permission_set');
$object = json_decode($json_data, true);

?>

<div class="row">
    <!-- Bootstrap Table with Header - Light -->
    <div class="col-12">
        <div class="card p-5">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 h3">
                    <div class="d-flex"><i class='bx-lg bx bx-list-ul'></i> <span class="mt-2 ms-2"> รายการเข้าใช้งาน server</span></div>
                </div>


                <div class="col-12 col-md-6 col-lg-6 text-end">
                    <div class="mt-3">
                        <?php if ($object['title_create']) { ?>
                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth">
                                <i class='bx bxs-plus-circle'></i>
                                เพิ่มรานการ
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
                                            <span class=" tf-icons bx bx-list-ul bx-lg bx-lg"></span>
                                        </div>
                                    </div>
                                    <h5 class="mb-5 mt-2 offcanvas-title text-center">เพิ่มรายการ</h5>
                                    <div class="col-12 mt-2">
                                        <label for="defaultFormControlInput2" class="form-label ps-2">ชื่อ</label>
                                        <input type="text" class="form-control" id="create_name" placeholder="เช่น server database" aria-describedby="defaultFormControlHelp" />
                                    </div>
                                    <div class="col-12 mt-2">

                                        <label for="exampleFormControlTextarea1" class="form-label ps-2">รายละเอียด</label>
                                        <textarea class="form-control" id="create_detail" rows="3"></textarea>

                                    </div>
                                </div>
                                <button type="button" onclick="title_create()" class="btn btn-primary mt-4 mb-2 d-grid w-100">บันทึก</button>
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
                                            <span class=" tf-icons bx bx-list-ul bx-lg bx-lg"></span>
                                        </div>
                                    </div>
                                    <h5 class="mb-5 mt-2 offcanvas-title text-center">แก้ไขเพิ่มรายการ</h5>
                                    <input type="hidden" id="id_title">
                                    <div class="col-12 mt-2">
                                        <label for="name_changed" class="form-label ps-2">ชื่อ</label>
                                        <input type="text" class="form-control" id="name_changed" placeholder="เช่น SP ADMIN,ADMIN,USER" aria-describedby="defaultFormControlHelp" required />
                                    </div>
                                    <div class="col-12 mt-2">

                                        <label for="detail_changed" class="form-label ps-2">รายละเอียด</label>
                                        <textarea class="form-control" id="detail_changed" rows="3"></textarea>

                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary mt-4 mb-2 d-grid w-100" onclick="title_changed()">บันทึก</button>
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
                                    <th style="width: 15%;">วันที่</th>
                                    <th style="width: 5%;">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody id="row_title">
                                <?php foreach ($row_title as $key => $row) {
                                ?>
                                    <tr id='td_title<?php echo $row['req_title_id'] ?>'>
                                        <td><?php echo $key + 1; ?></td>
                                        <td id='title_names<?php echo $row['req_title_id'] ?>'><?php echo $row['req_title_name']; ?></td>
                                        <td id='title_details<?php echo $row['req_title_id'] ?>'><?php echo $row['req_title_detail']; ?></td>

                                        <td id='update_times<?php echo $row['req_title_id'] ?>'><?php echo ($row['update_time'] == null) ? $row['create_time'] : $row['update_time']; ?></td>
                                        <td class="text-center">
                                            <?php if (!$object['title_change'] && !$object['title_delete']) { ?>
                                                <i class="bx bx-x me-1"></i>
                                            <?php } else { ?>

                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <?php if ($object['title_change']) { ?>
                                                            <button class="dropdown-item" onclick="title_change(<?php echo $row['req_title_id']; ?>)" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth_change" aria-controls="offcanvasBoth">
                                                                <span class="badge bg-label-warning w-100">
                                                                    <i class="bx bx-edit-alt me-1"></i>&nbsp; แก้ไขรายการ
                                                                </span>
                                                            </button><?php } ?>
                                                        <?php if ($object['title_delete']) { ?>
                                                            <button class="dropdown-item" type="button" data-bs-toggle="modal" onclick="sent_id(<?php echo $row['req_title_id']; ?>)" data-bs-target="#modalToggle">
                                                                <span class="badge bg-label-danger w-100">
                                                                    <i class="bx bx-trash me-1"></i>&nbsp; ลบรายการ
                                                                </span>
                                                            </button><?php } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
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

<div class="bs-toast toast toast-placement-ex m-2 top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" id="title_toast">
    <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold" id="title_err_title"></div>
        <small><?php date("Y-m-d"); ?></small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" id="title_toast_close"></button>
    </div>
    <div class="toast-body" id="title_err_detail"></div>
</div>
<!-- Toast with Placements -->


<!-- Modal 1-->
<div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel"><b>ลบสิทธิ์ในการใช้งาน</b> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cancel_title"></button>
            </div>
            <div class="modal-body p-0 m-0">
                <div class="d-flex justify-content-center mt-3">
                    <input type="hidden" id="title_id_modal">
                    <p>ยืนยันที่จะลบ &nbsp;</p>
                    <b class="ms-4">รายการ : </b>
                    <p class="text-primary mx-2" id="name_title"> </p>
                    <p> ?</p>
                </div>
            </div>
            <div class="modal-footer" style="margin-top: -1rem;">
                <button class="btn btn-danger " onclick="title_delete()">
                    ยืนยัน
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    var uri = '<?php echo base_url(); ?>'
    // change node 
    const title_change = (id) => {
        console.log(id);
        // return;
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/title/get_title_id',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                $('#id_title').val(id);
                $('#name_changed').val(response[0].req_title_name);
                $('#detail_changed').val(response[0].req_title_detail);
            }
        });
    }
    // change node action
    const title_changed = () => {
        // console.log('removing')
        const id_title = document.getElementById("id_title").value;
        const name_changed = document.getElementById("name_changed").value;
        const detail_changed = document.getElementById("detail_changed").value;

        if (!name_changed || !detail_changed) {
            // console.log('removing')
            document.getElementById("title_err_title").innerHTML = "เกิดข้อผิดพลาด!!";
            document.getElementById("title_err_detail").innerHTML = "กรุณากรอกข้อมูลให้ครบถ้วน";
            document.getElementById("title_toast").classList.add("show", "bg-danger");
            setTimeout(() => {
                document.getElementById("title_toast_close").click();
            }, 3000);
            return;
        }
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/title/update_title_id',
            data: {
                id: id_title,
                name_changed: name_changed,
                detail_changed: detail_changed
            },
            dataType: 'json',
            success: (response) => {
                document.getElementById("cancel_change").click();
                var id = response.id;
                $('#title_names' + id).text(response.req_title_name);
                $('#title_details' + id).text(response.req_title_detail);
                $('#update_times' + id).text(response.update_time);
            }
        });
    }
    // insert node
    const title_create = () => {
        const create_name = document.getElementById("create_name").value;
        const create_detail = document.getElementById("create_detail").value;

        if (!create_name || !create_detail) {
            document.getElementById("title_err_title").innerHTML = "เกิดข้อผิดพลาด!!";
            document.getElementById("title_err_detail").innerHTML = "กรุณากรอกข้อมูลให้ครบถ้วน";
            document.getElementById("title_toast").classList.add("show", "bg-danger");
            setTimeout(() => {
                document.getElementById("title_toast_close").click();
            }, 3000);
            return;
        }

        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/title/create_title',
            data: {
                create_name: create_name,
                create_detail: create_detail
            },
            dataType: 'json',
            success: (response) => {
                console.log(response)
                document.getElementById("cancel_create").click();
                var new_row = ` <tr id='td_title${response.id}'>
                                        <td>${response.lenght_row}</td>
                                        <td id='title_names${response.id}'>${response.req_title_name}</td>
                                        <td id='title_details${response.id}'>${response.req_title_detail}</td>
       
                                        <td id='update_times${response.id}'>${response.title_time}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item" onclick="title_change(${response.id})" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth_change" aria-controls="offcanvasBoth">
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
                $('#row_title').append(new_row);
            }
        });
    }
    // sent data to modal
    const sent_id = (id) => {
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/title/get_title_id',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                $('#title_id_modal').val(response[0].req_title_id);
                $('#name_title').html(response[0].req_title_name);
            }
        });
    }

    // delete node 
    const title_delete = () => {
        const id = document.getElementById("title_id_modal").value;
        // console.log("node_delete (id) ", id)
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/title/delete_title',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                console.log(response)
                document.getElementById("cancel_title").click();
                document.getElementById("td_title" + response.id).remove();
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