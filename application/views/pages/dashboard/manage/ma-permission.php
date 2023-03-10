<div class="row">
    <!-- Bootstrap Table with Header - Light -->
    <div class="col-12">
        <div class="card p-5">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 h3">
                    <div class="d-flex"><i class='bx-lg bx bxs-lock-open'></i> <span class="mt-3 ms-2">กำหนดสิทธิ์ในการใช้งาน</span></div>
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
                                    <div class="text-center d-flex justify-content-center align-items-center">
                                        <div style="width: 2rem; height: 2rem; color:#fff" class="rounded-circle d-flex justify-content-center align-items-center bg-primary">
                                            <span class=" tf-icons bx bxs-lock-open"></span>
                                        </div>
                                        <strong>&emsp; กำหนดสิทธิ์ <span id="permission_set"></span> </strong>
                                    </div>
                                    <input type="hidden" id="id_permission">
                                    <div class="col-6 mt-2">
                                        <small class="text-light fw-semibold">บันทึกเข้าใช้งาน</small>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" id="req_menu" onchange="handleChange_req(this)" />
                                            <label class="form-check-label" for="req_menu">
                                                <strong>เมนู</strong>
                                            </label>
                                        </div>
                                        <div class="ms-3">
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" id="req_create" />
                                                <label class="form-check-label" for="req_create">
                                                    เพิ่มบันทึก
                                                </label>
                                            </div>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" id="req_access" />
                                                <label class="form-check-label" for="req_access">
                                                    อนุญาติบันทึก
                                                </label>
                                            </div>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" id="req_change" />
                                                <label class="form-check-label" for="req_change">
                                                    แก้ไขบันทึก
                                                </label>
                                            </div>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" id="req_cancel" />
                                                <label class="form-check-label" for="req_cancel">
                                                    ยกเลิกบันทึก
                                                </label>
                                            </div>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" id="req_delete" />
                                                <label class="form-check-label" for="req_delete">
                                                    ลบบันทึก
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 mt-2">
                                        <small class="text-light fw-semibold">SERVER</small>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" value="" id="server_menu" onchange="handleChange_server(this)" />
                                            <label class="form-check-label" for="server_menu">
                                                <strong>เมนู</strong>
                                            </label>
                                        </div>
                                        <div class="ms-3">
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" value="" id="server_create" />
                                                <label class="form-check-label" for="server_create">
                                                    เพิ่ม server
                                                </label>
                                            </div>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" value="" id="server_change" />
                                                <label class="form-check-label" for="server_change">
                                                    แก้ไข server
                                                </label>
                                            </div>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" value="" id="server_delete" />
                                                <label class="form-check-label" for="server_delete">
                                                    ลบ server
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 mt-2">
                                        <small class="text-light fw-semibold">รายการ</small>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" value="" id="title_menu" onchange="handleChange_title(this)" />
                                            <label class="form-check-label" for="title_menu">
                                                <strong>เมนู</strong>
                                            </label>
                                        </div>
                                        <div class="ms-3">
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" value="" id="title_create" />
                                                <label class="form-check-label" for="title_create">
                                                    เพิ่มรายการ
                                                </label>
                                            </div>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" value="" id="title_change" />
                                                <label class="form-check-label" for="title_change">
                                                    แก้ไขรายการ
                                                </label>
                                            </div>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" value="" id="title_delete" />
                                                <label class="form-check-label" for="title_delete">
                                                    ลบรายการ
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 mt-2">
                                        <small class="text-light fw-semibold">จัดการสิทธิ์</small>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" value="" id="permission_menu" />
                                            <label class="form-check-label" for="permission_menu">
                                                <strong>จัดการสิทธิ์</strong>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-6 mt-2">
                                        <small class="text-light fw-semibold">จัดการผู้ใช้งาน</small>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" value="" id="user_menu" onchange="handleChange_user(this)" />
                                            <label class="form-check-label" for="user_menu">
                                                <strong>เมนู</strong>
                                            </label>
                                        </div>
                                        <div class="ms-3">
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" value="" id="user_create" />
                                                <label class="form-check-label" for="user_create">
                                                    เพิ่มผู้ใช้งาน
                                                </label>
                                            </div>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" value="" id="user_change" />
                                                <label class="form-check-label" for="user_change">
                                                    แก้ไขผู้ใช้งาน
                                                </label>
                                            </div>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" value="" id="user_delete" />
                                                <label class="form-check-label" for="user_delete">
                                                    ลบผู้ใช้งาน
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary mt-4 mb-2 d-grid w-100" onclick="manage_changed()">บันทึก</button>
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
                                    <th>สิทธฺ์ในการเข้าถึง</th>
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
                                        <td id='permission_names<?php echo $row['permission_id'] ?>'>
                                            <?php echo $row['permission_name']; ?>
                                        </td>
                                        <td id='permission_details<?php echo $row['permission_id'] ?>' class="text-break">

                                            <?php
                                            if ($row['permission_set'] != null) {
                                                $object = json_decode($row['permission_set'], true);
                                                foreach ($object as $key => $value) {
                                                    if ($value == '1') {
                                                        echo "<span class='badge me-1 bg-label-primary'>" . $key . "</span>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td id='update_times<?php echo $row['permission_id'] ?>'>
                                            <?php echo ($row['update_time'] == null) ? $row['create_time'] : $row['update_time']; ?>
                                        </td>
                                        <td class="text-center">

                                            <?php if ($row['permission_id'] == '1') { ?>
                                                <i class='bx bx-check'></i>
                                            <?php  } else { ?>

                                                <button class="btn" onclick="permission_change(<?php echo $row['permission_id']; ?>)" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth_change" aria-controls="offcanvasBoth">
                                                    <i class="bx bx-edit-alt me-1"></i>
                                                </button>
                                            <?php  }  ?>
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cancel_modal"></button>
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
                <button class="btn btn-danger " onclick="node_delete()">
                    ยืนยัน
                </button>
            </div>
        </div>
    </div>
</div>