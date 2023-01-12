<?php
$json_data = $this->session->userdata('req_permission_set');
$num_ot = $this->session->userdata('req_NUM_OT');
$object = json_decode($json_data, true);

?>

<div class="row">
    <!-- Bootstrap Table with Header - Light -->
    <div class="col-12">
        <div class="card p-5">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 h3"><i class='bx-lg bx bxs-save'></i>
                    บันทึกเข้าใช้งาน SERVER </div>
                <div class="col-12 col-md-6 col-lg-6 text-end">
                    <div class="mt-3">
                        <?php if ($object['req_create']) { ?>
                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth">
                                <i class='bx bxs-plus-circle'></i>
                                บันทึก
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
                                            <span class=" tf-icons bx bxs-save bx-lg bx-lg"></span>
                                        </div>
                                    </div>
                                    <h5 class="mb-5 mt-2 offcanvas-title text-center">บันทึก</h5>
                                    <div class="col-12 mt-2">
                                        <label for="create_node" class="form-label ps-2">server</label>
                                        <input class="form-control" list="browsers0" id="create_node">
                                        <datalist id="browsers0">
                                            <?php foreach ($row_node as $key => $row) { ?>
                                                <option value="<?php echo $row['node_id'] . " - " . $row['node_name']; ?>">
                                                <?php } ?>
                                        </datalist>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="create_witness" class="form-label ps-2">พยาน</label>
                                        <input class="form-control" list="browsers1" id="create_witness">
                                        <datalist id="browsers1">
                                            <?php foreach ($row_ma_user as $key => $row) {
                                                if ($row['NUM_OT'] != $num_ot) {
                                            ?>
                                                    <option value="<?php echo $row['NUM_OT'] . " - " . $row['Fname'] . " " . $row['Lname']; ?>">
                                                <?php }
                                            } ?>
                                        </datalist>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <label for="create_title" class="form-label ps-2">รายการ</label>
                                        <input class="form-control" list="browsers2" id="create_title">
                                        <datalist id="browsers2">
                                            <?php foreach ($row_title as $key => $row) { ?>
                                                <option value="<?php echo $row['req_title_id'] . " - " . $row['req_title_name']; ?>">
                                                <?php } ?>
                                        </datalist>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <label for="create_detail" class="form-label ps-2">รายละเอียด</label>
                                        <textarea class="form-control" id="create_detail" rows="3"></textarea>
                                    </div>
                                </div>
                                <button type="button" onclick="req_create()" class="btn btn-primary mt-4 mb-2 d-grid w-100">บันทึก</button>
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
                                            <span class=" tf-icons bx bxs-save bx-lg bx-lg"></span>
                                        </div>
                                    </div>
                                    <h5 class="mb-5 mt-2 offcanvas-title text-center">แก้ไขบันทึก</h5>
                                    <div class="col-12 mt-2">
                                        <input type="hidden" id="id_changed">
                                        <label for="change_node" class="form-label ps-2">server</label>
                                        <input class="form-control" list="browsers0" id="change_node">
                                        <datalist id="browsers0">
                                            <?php foreach ($row_node as $key => $row) { ?>
                                                <option value="<?php echo $row['node_id'] . " - " . $row['node_name']; ?>">
                                                <?php } ?>
                                        </datalist>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="change_witness" class="form-label ps-2">พยาน</label>
                                        <input class="form-control" list="browsers1" id="change_witness">
                                        <datalist id="browsers1">
                                            <?php foreach ($row_ma_user as $key => $row) {

                                                if ($row['NUM_OT'] != $num_ot) { ?>
                                                    <option value="<?php echo $row['NUM_OT'] . " - " . $row['Fname'] . " " . $row['Lname']; ?>">
                                                <?php }
                                            } ?>
                                        </datalist>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <label for="change_title" class="form-label ps-2">รายการ</label>
                                        <input class="form-control" list="browsers2" id="change_title">
                                        <datalist id="browsers2">
                                            <?php foreach ($row_title as $key => $row) { ?>
                                                <option value="<?php echo $row['req_title_id'] . " - " . $row['req_title_name']; ?>">
                                                <?php } ?>
                                        </datalist>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <label for="change_detail" class="form-label ps-2">รายละเอียด</label>
                                        <textarea class="form-control" id="change_detail" rows="3"></textarea>
                                    </div>
                                </div>
                                <button type="button" onclick="req_changed()" class="btn btn-primary mt-4 mb-2 d-grid w-100">บันทึก</button>
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
                                    <th style="width: 2%;">ลำดับ</th>
                                    <th style="width: 12%;">server</th>
                                    <th style="width: 15%;">ผู้บันทึก</th>
                                    <th>รายการและรายละเอียด</th>
                                    <th style="width: 10%;">วันที่</th>
                                    <th style="width: 15%;">พยาน</th>
                                    <th style="width: 5%;">สถานะ</th>
                                    <th style="width: 1%;"><i class="bx bx-edit-alt me-1"></th>
                                </tr>
                            </thead>
                            <tbody id="row_user">
                                <?php foreach ($row_req as $key => $row) {
                                    $name_status = "";
                                    $lable_color = "";
                                    $user_access = $row['Fname'] . " " . $row['Lname'];

                                    $d = ($row['update_time'] == null) ? $row['create_time'] : $row['update_time'];
                                    $date_now = date("Y-m-d", strtotime($d));
                                    if ($row['req_status'] == '0') {
                                        $name_status = "รออนุมัติ";
                                        $lable_color = "bg-label-warning";
                                    } elseif ($row['req_status'] == '1') {
                                        $name_status = "อนุมัติ";
                                        $lable_color = "bg-label-success";
                                    } else {
                                        $name_status = "ยกเลิก";
                                        $lable_color = "bg-label-danger";
                                    }
                                ?>
                                    <tr id='td_req<?php echo $row['req_id'] ?>'>
                                        <td>
                                            <?php echo $key + 1; ?>
                                        </td>
                                        <td id='req_node<?php echo $row['req_id'] ?>'>
                                            <small>
                                                <?php echo $row['node_name']; ?>
                                            </small>
                                        </td>
                                        <td id='req_create<?php echo $row['req_id'] ?>' class="text-primary">
                                            <small>
                                                <?php echo $row['cre_Fname'] . " " . $row['cre_Lname']; ?>
                                            </small>
                                        </td>
                                        <td id='req_title<?php echo $row['req_id'] ?>'>
                                            <strong>
                                                <small>
                                                    <?php echo $row['req_title_name']; ?>
                                                </small>
                                            </strong>
                                            :
                                            <small class="text-break">
                                                <?php echo $row['req_detial']; ?>
                                            </small>
                                        </td>

                                        <td id='update_times<?php echo $row['req_id'] ?>'>
                                            <small>
                                                <?php echo $date_now; ?>
                                            </small>
                                        </td>
                                        <td id='req_witness<?php echo $row['req_id'] ?>'>
                                            <small>
                                                <?php echo $row['wit_Fname'] . " " . $row['wit_Lname']; ?>
                                            </small>
                                        </td>
                                        <td id='req_status<?php echo $row['req_id'] ?>'>
                                            <span class="badge me-1 <?php echo $lable_color; ?>" class="text-start" <?php if ($row['req_status'] == '1' || $row['req_status'] == '2') { ?> data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" title="<?php echo $user_access; ?>" <?php } ?>>
                                                <?php echo $name_status; ?>
                                            </span>
                                        </td>
                                        <td class="text-center" id="manage_req<?php echo $row['req_id'] ?>">
                                            <?php if ($row['req_status'] == '1') { ?>
                                                <i class='bx bx-check'></i>
                                            <?php } elseif ($row['req_status'] == '0') { ?>
                                                <?php if (!($object['req_access'] && $num_ot != $row['create_by']) && !($object['req_change']  && $num_ot == $row['create_by']) && !$object['req_cancel'] && !($object['req_delete'] && $num_ot == $row['create_by'])) { ?>
                                                    <!-- <i class="bx bx-x me-1"></i> -->
                                                    <i class='bx bx-question-mark'></i>
                                                <?php } else { ?>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">

                                                            <?php if ($object['req_access'] && $num_ot != $row['create_by']) { ?>
                                                                <button class="dropdown-item" type="button" data-bs-toggle="modal" onclick="sent_id_access(<?php echo $row['req_id']; ?>)" data-bs-target="#modalToggle_access">
                                                                    <span class="badge bg-label-success w-100">
                                                                        <i class="bx bx-check me-1"></i>&nbsp; อนุญาติบันทึก
                                                                    </span>
                                                                </button>
                                                            <?php } ?>
                                                            <?php if ($object['req_change']  && $num_ot == $row['create_by']) { ?>

                                                                <button class="dropdown-item" onclick="req_change(<?php echo $row['req_id']; ?>)" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth_change" aria-controls="offcanvasBoth">
                                                                    <span class="badge bg-label-warning w-100">
                                                                        <i class="bx bx-edit-alt me-1"></i>&nbsp; แก้ไขบันทึก
                                                                    </span>
                                                                </button>
                                                            <?php } ?>
                                                            <?php if ($object['req_cancel'] && $num_ot != $row['create_by']) { ?>

                                                                <button class="dropdown-item" type="button" data-bs-toggle="modal" onclick="sent_id_cancel(<?php echo $row['req_id']; ?>)" data-bs-target="#modalToggle_cancel">
                                                                    <span class="badge bg-label-danger w-100">
                                                                        <i class="bx bx-x me-1"></i>&nbsp; ยกเลิกบันทึก
                                                                    </span>
                                                                </button>
                                                            <?php } ?>
                                                            <?php if ($object['req_delete'] && $num_ot == $row['create_by']) { ?>

                                                                <button class="dropdown-item" type="button" data-bs-toggle="modal" onclick="sent_id(<?php echo $row['req_id']; ?>)" data-bs-target="#modalToggle">
                                                                    <span class="badge bg-label-danger w-100">
                                                                        <i class="bx bx-trash me-1"></i>&nbsp; ลบบันทึก
                                                                    </span>
                                                                </button>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            <?php } else { ?>

                                                <i class='bx bx-x'></i>

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


<div class="bs-toast toast toast-placement-ex m-2 top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" id="req_toast">
    <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold" id="req_err_title"></div>
        <small><?php date("Y-m-d"); ?></small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" id="req_toast_close"></button>
    </div>
    <div class="toast-body" id="req_err_detail"></div>
</div>
<!-- Toast with Placements -->

<!-- Modal 1-->
<div class="modal fade" id="modalToggle_access" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel"><b>อนุญาติ</b> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cancel_modal_a"></button>
            </div>
            <div class="modal-body p-2 m-0">
                <div class="d-flex justify-content-center mt-3">
                    <input type="hidden" id="delete_id_a">
                    <p>ยืนยันอนุญาติ &nbsp;</p>
                    <b>รายการ : </b>
                    <p class="text-primary mx-2" id="delete_name_a"> </p>
                    <p> ?</p>
                </div>
                <div class="d-flex justify-content-center mb-2 text-primary px-4">
                    <small class="text-break" id="detail_a"></small>
                </div>
            </div>
            <div class="modal-footer" style="margin-top: -1rem;">
                <button class="btn btn-danger " onclick="user_access()">
                    ยืนยัน
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div class="modal fade" id="modalToggle_cancel" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel"><b>ยกลิก</b> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cancel_modal_c"></button>
            </div>
            <div class="modal-body p-2 m-0">
                <div class="d-flex justify-content-center mt-3">
                    <input type="hidden" id="delete_id_c">
                    <p>ยืนยันที่จะยกเลิก &nbsp;</p>
                    <b>รายการ : </b>
                    <p class="text-primary mx-2" id="delete_name_c"> </p>
                    <p> ?</p>
                </div>
                <div class="d-flex justify-content-center mb-2 text-primary px-4">
                    <small class="text-break" id="detail_c"></small>
                </div>
            </div>
            <div class="modal-footer" style="margin-top: -1rem;">
                <button class="btn btn-danger " onclick="user_cancel()">
                    ยืนยัน
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 1-->
<div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel"><b>ลบ</b> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cancel_modal_d"></button>
            </div>
            <div class="modal-body p-2 m-0">
                <div class="d-flex justify-content-center mt-3">
                    <input type="hidden" id="delete_id">
                    <p>ยืนยันที่จะลบ &nbsp;</p>
                    <b>รายการ : </b>
                    <p class="text-primary mx-2" id="delete_name"> </p>
                    <p> ?</p>
                </div>
                <div class="d-flex justify-content-center mb-2 text-primary px-4">
                    <small class="text-break" id="detail"></small>
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
    const msg_error = (node, title, witness) => {
        var msg_error = "";
        if (!node && title && witness) {
            msg_error = "ข้อมูล server ไม่ถูกต้องกรุณากรอกข้อมูลและทำรายการใหม่อีกครั้ง";
        } else if (node && !title && witness) {
            msg_error = "ข้อมูล รายการ ไม่ถูกต้องกรุณากรอกข้อมูลและทำรายการใหม่อีกครั้ง";
        } else if (node && title && !witness) {
            msg_error = "ข้อมูลพยาน ไม่ถูกต้องกรุณากรอกข้อมูลและทำรายการใหม่อีกครั้ง";
        } else if (!node && !title && witness) {
            msg_error = "ข้อมูล server และ รายการ ไม่ถูกต้องกรุณากรอกข้อมูลและทำรายการใหม่อีกครั้ง";
        } else if (node && !title && !witness) {
            msg_error = "ข้อมูล พยาน และ รายการ ไม่ถูกต้องกรุณากรอกข้อมูลและทำรายการใหม่อีกครั้ง";
        } else if (!node && !title && !witness) {
            msg_error = "ข้อมูล server พยาน และ รายการ ไม่ถูกต้องกรุณากรอกข้อมูลและทำรายการใหม่อีกครั้ง";
        }
        return msg_error;
    }
    const req_change = (id) => {
        // console.log(id);
        // return;
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/req/request_server/get_req_id',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                $('#id_changed').val(id);
                $('#change_node').val(response[0].node_id + " - " + response[0].node_name);
                $('#change_witness').val(response[0].wit_id + " - " + response[0].wit_Fname + " " + response[0].wit_Lname);
                $('#change_title').val(response[0].req_title_id + " - " + response[0].req_title_name);
                $('#change_detail').val(response[0].req_detial);

            }
        });
    }
    const req_changed = () => {

        const change_node = document.getElementById("change_node").value;
        const change_witness = document.getElementById("change_witness").value;
        const change_title = document.getElementById("change_title").value;

        const id = document.getElementById("id_changed").value;
        const change_detail = document.getElementById("change_detail").value;
        const node_id = change_node.slice(0, change_node.indexOf("-") - 1);
        const node_name = change_node.slice(change_node.indexOf("-") + 1, change_node.lenght);
        const witness_id = change_witness.slice(0, change_witness.indexOf("-") - 1);
        const witness_name = change_witness.slice(change_witness.indexOf("-") + 1, change_witness.lenght);
        const title_id = change_title.slice(0, change_title.indexOf("-") - 1);
        const title_name = change_title.slice(change_title.indexOf("-") + 1, change_title.lenght);
        // return;

        if (!change_node || !change_title || !change_detail || !change_node) {
            console.log("error create_witness!!");
            document.getElementById("req_err_title").innerHTML = "เกิดข้อผิดพลาด!!";
            document.getElementById("req_err_detail").innerHTML = "กรุณากรอกข้อมูลให้ครบถ้วน";
            document.getElementById("req_toast").classList.add("show", "bg-danger");
            setTimeout(() => {
                document.getElementById("req_toast_close").click();
            }, 3000);
            return;
        }

        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/req/request_server/update_req_id',
            data: {
                id: id,
                change_detail: change_detail,
                node_id: node_id,
                node_name: node_name,
                witness_id: witness_id,
                witness_name: witness_name,
                title_id: title_id,
                title_name: title_name
            },
            dataType: 'json',
            success: (response) => {

                if (response.status == '0') {
                    var msg = msg_error(response.result_node_id, response.result_title_id, response.result_witness_id);
                    $("#req_err_title").html("เกิดข้อผิดพลาด!!");
                    $("#req_toast").addClass("show bg-danger");
                    $("#req_err_detail").html(msg);

                    setTimeout(() => {
                        document.getElementById("req_toast_close").click();
                    }, 3000);
                } else {


                    document.getElementById("cancel_change").click();
                    $('#req_node' + id).html(`<small>${node_name}</small>`);
                    $('#req_title' + id).html(`<strong><small>${title_name}</small></strong>:<small class="text-break">${change_detail}</small>`);
                    $('#req_witness' + id).html(`<small>${witness_name}</small>`);
                    $('#update_times' + id).html(`<small>${response.update_time}</small>`);
                }

            }
        });
    }
    // insert node


    const req_create = () => {
        const create_witness = document.getElementById("create_witness").value;
        const create_title = document.getElementById("create_title").value;
        const create_detail = document.getElementById("create_detail").value;
        const create_node = document.getElementById("create_node").value;

        // create_node
        const node_id = create_node.slice(0, create_node.indexOf("-") - 1);
        const node_name = create_node.slice(create_node.indexOf("-") + 1, create_node.lenght);
        const witness_id = create_witness.slice(0, create_witness.indexOf("-") - 1);
        const witness_name = create_witness.slice(create_witness.indexOf("-") + 1, create_witness.lenght);
        const title_id = create_title.slice(0, create_title.indexOf("-") - 1);
        const title_name = create_title.slice(create_title.indexOf("-") + 1, create_title.lenght);

        if (!create_witness || !create_title || !create_detail || !create_node) {
            console.log("error create_witness!!");
            document.getElementById("req_err_title").innerHTML = "เกิดข้อผิดพลาด!!";
            document.getElementById("req_err_detail").innerHTML = "กรุณากรอกข้อมูลให้ครบถ้วน";
            document.getElementById("req_toast").classList.add("show", "bg-danger");
            setTimeout(() => {
                document.getElementById("req_toast_close").click();
            }, 3000);
            return;
        }

        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/req/request_server/create_req',
            data: {
                node_id: node_id,
                node_name: node_name,
                witness_id: witness_id,
                witness_name: witness_name,
                title_id: title_id,
                title_name: title_name,
                create_detail: create_detail
            },
            dataType: 'json',
            success: (response) => {
                console.log("create_req response = ", response)
                if (response.status == '0') {
                    var msg = msg_error(response.result_node_id, response.result_title_id, response.result_witness_id);
                    $("#req_err_title").html("เกิดข้อผิดพลาด!!");
                    $("#req_toast").addClass("show bg-danger");
                    $("#req_err_detail").html(msg);

                    setTimeout(() => {
                        document.getElementById("req_toast_close").click();
                    }, 3000);
                } else {
                    document.getElementById("cancel_create").click();
                    location.reload();
                }

            }
        });
    }
    // sent data to modal
    const sent_id = (id) => {
        console.log("id", id)
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/req/request_server/get_req_id',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                // console.log(response)
                $('#delete_id').val(response[0].req_id);
                $('#delete_name').html(response[0].req_title_name);
                $('#detail').html(response[0].req_detial);
            }
        });
    }
    const sent_id_access = (id) => {
        console.log("id", id)
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/req/request_server/get_req_id',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                $('#delete_id_a').val(response[0].req_id);
                $('#delete_name_a').html(response[0].req_title_name);
                $('#detail_a').html(response[0].req_detial);
            }
        });
    }
    const sent_id_cancel = (id) => {
        console.log("id", id)
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/req/request_server/get_req_id',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                $('#delete_id_c').val(response[0].req_id);
                $('#delete_name_c').html(response[0].req_title_name);
                $('#detail_c').html(response[0].req_detial);
            }
        });
    }

    // delete node 
    const user_delete = () => {
        const id = document.getElementById("delete_id").value;
        // console.log("node_delete (id) ", id)
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/req/request_server/delete_req',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                console.log(response)
                document.getElementById("cancel_modal_d").click();
                document.getElementById("td_req" + response.id).remove();
            }
        });
    }
    // access node 
    const user_access = () => {
        const id = document.getElementById("delete_id_a").value;
        // console.log("node_delete (id) ", id)
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/req/request_server/access_req',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                document.getElementById("cancel_modal_a").click();
                const name_access = response.user_access[0].Fname + " " + response.user_access[0].Lname;
                console.log(name_access);
                const lable_status = `<span class="badge me-1 bg-label-success" class="text-start" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" title="${name_access}">อนุญาติ</span>`;

                $('#req_status' + id).html(lable_status);
                $('#manage_req' + id).html(`<i class='bx bx-check'></i>`);
            }
        });
    }

    const user_cancel = () => {
        const id = document.getElementById("delete_id_c").value;
        // console.log("node_delete (id) ", id)
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/req/request_server/access_cancel',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                console.log(response)
                document.getElementById("cancel_modal_c").click();
                const name_access = response.user_access[0].Fname + " " + response.user_access[0].Lname;
                const lable_status = `<span class="badge me-1 bg-label-danger" class="text-start" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" title="${name_access}">ยกเลิก</span>`;

                $('#req_status' + id).html(lable_status);
                $('#manage_req' + id).html(`<i class='bx bx-x'></i>`);
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