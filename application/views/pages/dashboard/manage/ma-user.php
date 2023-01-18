<?php
$json_data = $this->session->userdata('req_permission_set');
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
                                        <input class="form-control" list="browsers" name="browser" id="create_name" placeholder="กรุณากรอกรหัสและชื่อพนักงาน">
                                        <datalist id="browsers">
                                            <?php foreach ($row_user as $key => $row) { ?>
                                                <option value="<?php echo $row['NUM_OT'] . " - " . $row['Fname'] . " " . $row['Lname']; ?>">
                                                <?php } ?>
                                        </datalist>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <!-- <label for="defaultFormControlInput2" class="form-label ps-2">กำหนดสิทธิ์</label>
                                        <input class="form-control" list="browsers2" name="browser2" id="create_permission" placeholder="กำหนดสิทธิ์">
                                        <datalist id="browsers2">
                                            <?php foreach ($row_permission as $key => $row) {
                                                if ($this->session->userdata('req_permission_id') != '1' && $row['permission_id'] == '1') {
                                                    continue;
                                                } elseif ($this->session->userdata('req_permission_id') == '1' && $row['permission_id'] == '1') { ?>
                                                    <option value="<?php echo $row['permission_id'] . " - " . $row['permission_name']; ?>">
                                                    <?php    } else {
                                                    ?>
                                                    <option value="<?php echo $row['permission_id'] . " - " . $row['permission_name']; ?>">
                                                <?php }
                                            } ?>
                                        </datalist> -->


                                        <label for="create_permission" class="form-label">กำหนดสิทธิ์</label>
                                        <select id="create_permission" class="form-select">
                                            <?php foreach ($row_permission as $key => $row) {
                                                if ($this->session->userdata('req_permission_id') != '1' && $row['permission_id'] == '1') {
                                                    continue;
                                                } elseif ($this->session->userdata('req_permission_id') == '1' && $row['permission_id'] == '1') { ?>
                                                    <option value="<?php echo $row['permission_id'] . " - " . $row['permission_name']; ?>"><?php echo $row['permission_id'] . " - " . $row['permission_name']; ?> </option>
                                                <?php    } else {
                                                ?>
                                                    <option value="<?php echo $row['permission_id'] . " - " . $row['permission_name']; ?>"><?php echo $row['permission_id'] . " - " . $row['permission_name']; ?> </option>
                                            <?php }
                                            } ?>
                                        </select>

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
                                        <!-- <input class="form-control" list="browsers3" name="browser3" id="change_permission"> -->
                                        <!-- <datalist id="browsers3">

                                            <?php foreach ($row_permission as $key => $row) {
                                                if ($this->session->userdata('req_permission_id') != '1' && $row['permission_id'] == '1') {
                                                    continue;
                                                } elseif ($this->session->userdata('req_permission_id') == '1' && $row['permission_id'] == '1') { ?>
                                                    <option value="<?php echo $row['permission_id'] . " - " . $row['permission_name']; ?>">
                                                    <?php    } else {
                                                    ?>

                                                    <option value="<?php echo $row['permission_id'] . " - " . $row['permission_name']; ?>">
                                                <?php }
                                            } ?>
                                        </datalist> -->


                                        <select id="change_permission" class="form-select">
                                            <?php foreach ($row_permission as $key => $row) {
                                                if ($this->session->userdata('req_permission_id') != '1' && $row['permission_id'] == '1') {
                                                    continue;
                                                } elseif ($this->session->userdata('req_permission_id') == '1' && $row['permission_id'] == '1') { ?>
                                                    <option value="<?php echo $row['permission_id'] . " - " . $row['permission_name']; ?>"><?php echo $row['permission_id'] . " - " . $row['permission_name']; ?> </option>
                                                <?php    } else {
                                                ?>
                                                    <option value="<?php echo $row['permission_id'] . " - " . $row['permission_name']; ?>"><?php echo $row['permission_id'] . " - " . $row['permission_name']; ?> </option>
                                            <?php }
                                            } ?>
                                        </select>


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
                                            <?php if ($row['NUM_OT'] == '65047') { ?>
                                                <i class='bx bx-check'></i>
                                            <?php  } else { ?>
                                                <?php if (!$object['user_change'] && !$object['user_delete']) { ?>
                                                    <i class='bx bx-block'></i>
                                                <?php } else { ?>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>

                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <?php if ($object['user_change']) { ?>
                                                                <button class="dropdown-item" onclick="user_changes('<?php echo strval($row['NUM_OT']); ?>')" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth_change" aria-controls="offcanvasBoth">
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
                                                <?php } ?>
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

<div class="bs-toast toast toast-placement-ex m-2 top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000" id="ma_user_toast">
    <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold" id="ma_user_err_title"></div>
        <small><?php date("Y-m-d"); ?></small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" id="ma_user_toast_close"></button>
    </div>
    <div class="toast-body" id="ma_user_err_detail"></div>
</div>
<!-- Toast with Placements -->