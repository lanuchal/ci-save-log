<div class="row">
    <!-- Bootstrap Table with Header - Light -->
    <div class="col-12">
        <div class="card p-5">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 h3"><i class='bx-lg bx bxs-server '></i> CMEx SERVER </div>


                <div class="col-12 col-md-6 col-lg-6 text-end">
                    <div class="mt-3">
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth">
                            <i class='bx bxs-plus-circle'></i>
                            เพิ่ม SERVER
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
                                            <span class=" tf-icons bx bxs-server bx-lg bx-lg"></span>
                                        </div>
                                    </div>
                                    <h5 class="mb-5 mt-2 offcanvas-title text-center">เพิ่ม SERVER CMEx</h5>

                                    <div class="col-12">
                                        <label for="defaultFormControlInput" class="form-label ps-2">IP SERVER</label>
                                        <input type="text" class="form-control" id="create_ip" placeholder="เช่น 192.158.1.1" aria-describedby="defaultFormControlHelp" />
                                    </div>
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
                                <button type="button" onclick="node_create()" class="btn btn-primary mt-4 mb-2 d-grid w-100">บันทึก</button>
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
                                            <span class=" tf-icons bx bxs-server bx-lg bx-lg"></span>
                                        </div>
                                    </div>
                                    <h5 class="mb-5 mt-2 offcanvas-title text-center">แก้ไข SERVER CMEx</h5>
                                    <input type="hidden" id="id_node">
                                    <div class="col-12">
                                        <label for="ip_changed" class="form-label ps-2">IP SERVER</label>
                                        <input type="text" class="form-control" id="ip_changed" placeholder="เช่น 192.158.1.1" aria-describedby="defaultFormControlHelp" required />
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="name_changed" class="form-label ps-2">ชื่อ</label>
                                        <input type="text" class="form-control" id="name_changed" placeholder="เช่น server database" aria-describedby="defaultFormControlHelp" required />
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
                                <button type="button" class="btn btn-primary mt-4 mb-2 d-grid w-100" onclick="node_changed()">บันทึก</button>
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
                                    <th style="width: 10%;">IP SERVER</th>
                                    <th style="width: 15%;">ชื่อ</th>
                                    <th>รายละเอียด</th>
                                    <th style="width: 10%;">สถานะ</th>
                                    <th style="width: 15%;">วันที่</th>
                                    <th style="width: 5%;">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody id="row_node">
                                <?php foreach ($row_node as $key => $row) {
                                    $status_node = ($row['node_status'] == 1) ? "เปิดใช้งาน" : "ปิดใช้งาน";
                                    $label_color = ($row['node_status'] == 1) ? "bg-label-success" : "bg-label-secondary";
                                ?>
                                    <tr id='td_node<?php echo $row['node_id'] ?>'>
                                        <td><?php echo $key + 1; ?></td>
                                        <td id='node_ips<?php echo $row['node_id'] ?>'><?php echo $row['node_ip']; ?></td>
                                        <td id='node_names<?php echo $row['node_id'] ?>'><?php echo $row['node_name']; ?></td>
                                        <td id='node_details<?php echo $row['node_id'] ?>'><?php echo $row['node_detail']; ?></td>
                                        <td id='node_statuss<?php echo $row['node_id'] ?>'>
                                            <span class="badge me-1 <?php echo $label_color; ?>">
                                                <?php echo $status_node; ?>
                                            </span>
                                        </td>
                                        <td id='update_times<?php echo $row['node_id'] ?>'><?php echo ($row['update_time'] == null) ? $row['create_time'] : $row['update_time']; ?></td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item" onclick="node_change(<?php echo $row['node_id']; ?>)" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth_change" aria-controls="offcanvasBoth">
                                                        <span class="badge bg-label-warning w-100">
                                                            <i class="bx bx-edit-alt me-1"></i>&nbsp; Edit SERVER
                                                        </span>
                                                    </button>
                                                    <button class="dropdown-item" type="button" data-bs-toggle="modal" onclick="sent_id(<?php echo $row['node_id']; ?>)" data-bs-target="#modalToggle">
                                                        <span class="badge bg-label-danger w-100">
                                                            <i class="bx bx-trash me-1"></i>&nbsp; Delete SERVER
                                                        </span>
                                                    </button>
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
                <h5 class="modal-title" id="modalToggleLabel"><b>ลบ SERVER</b> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cancel_modal"></button>
            </div>
            <div class="modal-body p-0 m-0">
                <div class="d-flex justify-content-center mt-3">
                    <input type="hidden" id="node_id_modal">
                    <p>ยืนยันที่จะลบ &nbsp;</p>
                    <b>IP : </b>
                    <p class="text-primary mx-2" id="name_server_ip"> </p>
                    <b class="ms-4">SERVER : </b>
                    <p class="text-primary mx-2" id="name_server_title"> </p>
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

<script>
    var uri = '<?php echo base_url(); ?>'
    // change node 
    const node_change = (id) => {
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/node/get_node_id',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                var id_status = (response[0].node_status == '1') ? '2' : '1';
                $('#id_node').val(id);
                $('#ip_changed').val(response[0].node_ip);
                $('#name_changed').val(response[0].node_name);
                $('#detail_changed').val(response[0].node_detail);
                $('#status_changed' + id_status).prop('checked', true);
            }
        });
    }
    // change node action
    const node_changed = () => {

        const id_node = document.getElementById("id_node").value;
        const ip_changed = document.getElementById("ip_changed").value;
        const name_changed = document.getElementById("name_changed").value;
        const detail_changed = document.getElementById("detail_changed").value;
        const status_changed = document.querySelector('input[name="status_changed"]:checked').value;

        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/node/update_node_id',
            data: {
                id: id_node,
                ip_changed: ip_changed,
                name_changed: name_changed,
                detail_changed: detail_changed,
                status_changed: status_changed
            },
            dataType: 'json',
            success: (response) => {
                document.getElementById("cancel_change").click();
                var id = response.id;
                var text_status = response.node_status == 1 ?
                    "<span class='badge me-1 bg-label-success'>เปิดใช้งาน</span>" :
                    "<span class='badge me-1 bg-label-secondary'>ปิดใช้งาน</span>";
                $('#node_ips' + id).text(response.node_ip);
                $('#node_names' + id).text(response.node_name);
                $('#node_details' + id).text(response.node_detail);
                // $('#update_times' + id).text(convertDate(response.update_time));
                $('#update_times' + id).text(response.update_time);
                $('#node_statuss' + id).html(text_status);
            }
        });
    }
    // insert node
    const node_create = () => {

        const create_ip = document.getElementById("create_ip").value;
        const create_name = document.getElementById("create_name").value;
        const create_detail = document.getElementById("create_detail").value;
        const create_status = document.querySelector('input[name="create_status"]:checked').value;

        if (!create_ip || !create_name || !create_detail || !create_status) {
            console.log("error !!");
            return;
        }

        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/node/create_node',
            data: {
                create_ip: create_ip,
                create_name: create_name,
                create_detail: create_detail,
                create_status: create_status
            },
            dataType: 'json',
            success: (response) => {
                console.log(response)
                document.getElementById("cancel_create").click();

                const status_node = (response.node_status == 1) ? "เปิดใช้งาน" : "ปิดใช้งาน";
                const label_color = (response.node_status == 1) ? "bg-label-success" : "bg-label-secondary";

                var new_row = ` <tr id='td_node${response.id}'>
                                        <td>${response.lenght_row}</td>
                                        <td id='node_ips${response.id}'>${response.node_ip}</td>
                                        <td id='node_names${response.id}'>${response.node_name}</td>
                                        <td id='node_details${response.id}'>${response.node_detail}</td>
                                        <td id='node_statuss${response.id}'>
                                            <span class="badge me-1 ${label_color}">
                                            ${status_node}
                                            </span>
                                        </td>
                                        <td id='update_times${response.id}'>${response.node_time}</td>
                                        <td class="text-center">
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item" onclick="node_change(${response.id})" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth_change" aria-controls="offcanvasBoth">
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

                $('#row_node').append(new_row);
            }
        });
    }
    // sent data to modal
    const sent_id = (id) => {
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/node/get_node_id',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                $('#node_id_modal').val(response[0].node_id);
                $('#name_server_ip').html(response[0].node_ip);
                $('#name_server_title').html(response[0].node_name);
            }
        });
    }

    // delete node 
    const node_delete = () => {
        const id = document.getElementById("node_id_modal").value;
        console.log("node_delete (id) ", id)
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/node/delete_node',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                console.log(response)
                document.getElementById("cancel_modal").click();
                document.getElementById("td_node" + response.id).remove();
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