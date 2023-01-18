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
                                        <!-- <input class="form-control" list="browsers0" id="create_node">
                                        <datalist id="browsers0">
                                            <?php foreach ($row_node as $key => $row) { ?>
                                                <option value="<?php echo $row['node_id'] . " - " . $row['node_name']; ?>">
                                                <?php } ?>
                                        </datalist> -->

                                        <select id="create_node" class="form-select">
                                            <?php foreach ($row_node as $key => $row) { ?>
                                                <option value="<?php echo $row['node_id'] . " - " . $row['node_name']; ?>"> <?php echo $row['node_id'] . " - " . $row['node_name']; ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="create_witness" class="form-label ps-2">พยาน</label>
                                        <!-- <input class="form-control" list="browsers1" id="create_witness">
                                        <datalist id="browsers1">
                                            <?php foreach ($row_ma_user as $key => $row) {
                                                if ($row['NUM_OT'] != $num_ot) {
                                            ?>
                                                    <option value="<?php echo $row['NUM_OT'] . " - " . $row['Fname'] . " " . $row['Lname']; ?>">
                                                <?php }
                                            } ?>
                                        </datalist> -->

                                        <select id="create_witness" class="form-select">
                                            <?php foreach ($row_ma_user as $key => $row) {
                                                if ($row['NUM_OT'] != $num_ot) {
                                            ?>
                                                    <option value="<?php echo $row['NUM_OT'] . " - " . $row['Fname'] . " " . $row['Lname']; ?>"><?php echo $row['NUM_OT'] . " - " . $row['Fname'] . " " . $row['Lname']; ?> </option>
                                            <?php }
                                            } ?>
                                        </select>

                                    </div>

                                    <div class="col-12 mt-2">
                                        <label for="create_title" class="form-label ps-2">รายการ</label>
                                        <!-- <input class="form-control" list="browsers2" id="create_title">
                                        <datalist id="browsers2">
                                            <?php foreach ($row_title as $key => $row) { ?>
                                                <option value="<?php echo $row['req_title_id'] . " - " . $row['req_title_name']; ?>">
                                                <?php } ?>
                                        </datalist> -->
                                        <select id="create_title" class="form-select">
                                            <?php foreach ($row_title as $key => $row) { ?>
                                                <option value="<?php echo $row['req_title_id'] . " - " . $row['req_title_name']; ?>"><?php echo $row['req_title_id'] . " - " . $row['req_title_name']; ?> </option>
                                            <?php } ?>
                                        </select>

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
                                        <!-- <input class="form-control" list="browsers0" id="change_node">
                                        <datalist id="browsers0">
                                            <?php foreach ($row_node as $key => $row) { ?>
                                                <option value="<?php echo $row['node_id'] . " - " . $row['node_name']; ?>">
                                                <?php } ?>
                                        </datalist> -->

                                        <select id="change_node" class="form-select">
                                            <?php foreach ($row_node as $key => $row) { ?>
                                                <option value="<?php echo $row['node_id'] . " - " . $row['node_name']; ?>"><?php echo $row['node_id'] . " - " . $row['node_name']; ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="change_witness" class="form-label ps-2">พยาน</label>
                                        <!-- <input class="form-control" list="browsers1" id="change_witness">
                                        <datalist id="browsers1">
                                            <?php foreach ($row_ma_user as $key => $row) {

                                                if ($row['NUM_OT'] != $num_ot) { ?>
                                                    <option value="<?php echo $row['NUM_OT'] . " - " . $row['Fname'] . " " . $row['Lname']; ?>">
                                                <?php }
                                            } ?>
                                        </datalist> -->
                                        <select id="change_witness" class="form-select">
                                            <?php foreach ($row_ma_user as $key => $row) {

                                                if ($row['NUM_OT'] != $num_ot) { ?>
                                                    <option value="<?php echo $row['NUM_OT'] . " - " . $row['Fname'] . " " . $row['Lname']; ?>"><?php echo $row['NUM_OT'] . " - " . $row['Fname'] . " " . $row['Lname']; ?> </option>
                                            <?php }
                                            } ?>
                                        </select>

                                    </div>

                                    <div class="col-12 mt-2">
                                        <label for="change_title" class="form-label ps-2">รายการ</label>
                                        <!-- <input class="form-control" list="browsers2" id="change_title">
                                        <datalist id="browsers2">
                                            <?php foreach ($row_title as $key => $row) { ?>
                                                <option value="<?php echo $row['req_title_id'] . " - " . $row['req_title_name']; ?>">
                                                <?php } ?>
                                        </datalist> -->
                                        <select id="change_title" class="form-select">
                                            <?php foreach ($row_title as $key => $row) { ?>
                                                <option value="<?php echo $row['req_title_id'] . " - " . $row['req_title_name']; ?>"><?php echo $row['req_title_id'] . " - " . $row['req_title_name']; ?></option>
                                            <?php } ?>
                                        </select>
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
                                                    <!-- <i class='bx bx-question-mark'></i> -->
                                                    <i class='bx bx-block'></i>
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