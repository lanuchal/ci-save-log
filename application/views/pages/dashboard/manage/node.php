<div class="row">
    <!-- Bootstrap Table with Header - Light -->

    <div class="card p-5">
        <div class="row">


            <div class="col-12 col-md-6 col-lg-6 h3"><i class='bx-lg bx bxs-server '></i> CMEx SERVER </div>
            <div class="col-12 col-md-6 col-lg-6 text-end">

                <div class="mt-3">
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth">
                        <i class='bx bxs-plus-circle'></i>
                        เพิ่ม SERVER
                    </button>
                    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBoth" aria-labelledby="offcanvasBothLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasBothLabel" class="offcanvas-title">

                            </h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body my-top mx-0 flex-grow-0 text-start">
                            <form action="#">
                                <div class="row mb-5 p-2">
                                    <div class="text-center d-flex justify-content-center">
                                        <div style="width: 6rem; height: 6rem; color:#fff" class=" rounded-circle d-flex justify-content-center align-items-center bg-primary btn-icon">
                                            <span class=" tf-icons bx bxs-server bx-lg bx-lg"></span>
                                        </div>
                                    </div>
                                    <h5 class="mb-5 mt-2 offcanvas-title text-center">เพิ่ม SERVER CMEx</h5>

                                    <div class="col-12">
                                        <label for="defaultFormControlInput" class="form-label ps-2">IP SERVER</label>
                                        <input type="text" class="form-control" id="defaultFormControlInput" placeholder="เช่น 192.158.1.1" aria-describedby="defaultFormControlHelp" required />
                                    </div>
                                    <div class="col-12 mt-2">
                                        <label for="defaultFormControlInput2" class="form-label ps-2">ชื่อ</label>
                                        <input type="text" class="form-control" id="defaultFormControlInput2" placeholder="เช่น server database" aria-describedby="defaultFormControlHelp" required />
                                    </div>
                                    <div class="col-12 mt-2">

                                        <label for="exampleFormControlTextarea1" class="form-label ps-2">รายละเอียด</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

                                    </div>
                                    <div class="col-12 mt-2 pt-2 text-start">
                                        สถานะ server
                                    </div>
                                    <div class="col-md">
                                        <div class="form-check form-check-inline mt-3">
                                            <input class="form-check-input" type="radio" name="inlineRadioStatus" id="inlineRadio1" value="option1" checked />
                                            <label class="form-check-label" for="inlineRadio1">ปิดใช้งาน</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioStatus" id="inlineRadio2" value="option2" />
                                            <label class="form-check-label" for="inlineRadio2">เปิดใช้งาน</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 mb-2 d-grid w-100">บันทึก</button>
                                <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas">
                                    ยกเลิก
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-md-6 col-lg-6 text-end">

                <div class="mt-3">
                    <!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth_change" aria-controls="offcanvasBoth">
                        <i class='bx bxs-plus-circle'></i>
                        เพิ่ม SERVER
                    </button> -->
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
                                <h5 class="mb-5 mt-2 offcanvas-title text-center">เพิ่ม SERVER CMEx</h5>

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
                                        <input class="form-check-input" type="radio" name="status_changed" id="status_changed1" value="0" checked />
                                        <label class="form-check-label" for="status_changed1">ปิดใช้งาน</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_changed" id="status_changed2" value="1" />
                                        <label class="form-check-label" for="status_changed2">เปิดใช้งาน</label>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mt-4 mb-2 d-grid w-100" onclick="node_changed()">บันทึก</button>
                            <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas">
                                ยกเลิก
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-2 col-12 col-md-12 col-lg-12 order-3 order-md-2">
                <div class="table-responsive">
                    <table id="example" class="table border-top nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 5%;">ลำดับ</th>
                                <th style="width: 10%;">IP SERVER</th>
                                <th style="width: 15%;">ชื่อ</th>
                                <th>รายละเอียด</th>
                                <th style="width: 10%;">สถานะ</th>
                                <th style="width: 13%;">วันที่</th>
                                <th style="width: 5%;">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($row_node as $key => $row) {
                                $status_node = ($row['node_status'] == 1) ? "เปิดใช้งาน" : "ปิดใช้งาน";
                                $label_color = ($row['node_status'] == 1) ? "bg-label-success" : "bg-label-secondary";
                            ?>

                                <tr>
                                    <td class="text-center"><?php echo $key + 1; ?></td>
                                    <td><?php echo $row['node_ip']; ?></td>
                                    <td><?php echo $row['node_name']; ?></td>
                                    <td><?php echo $row['node_detail']; ?></td>
                                    <td>
                                        <span class="badge me-1 <?php echo $label_color; ?>">
                                            <?php echo $status_node; ?>
                                        </span>
                                    </td>
                                    <td><?php echo $row['update_time']; ?></td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                <!-- <i class="bx bxs-edit"></i> -->
                                            </button>
                                            <div class="dropdown-menu">
                                                <button class="dropdown-item" onclick="node_change(<?php echo $row['node_id']; ?>)" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth_change" aria-controls="offcanvasBoth">
                                                    <span class="badge bg-label-warning w-100">
                                                        <i class="bx bx-edit-alt me-1"></i>&nbsp; Edit SERVER
                                                    </span>
                                                </button>
                                                <a class="dropdown-item" href="javascript:void(0);">
                                                    <span class="badge bg-label-danger w-100">
                                                        <i class="bx bx-trash me-1"></i>&nbsp; Delete SERVER
                                                    </span>
                                                </a>
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
<script>
    const node_change = (data) => {
        console.log("data", data)
    }
    const node_changed = () => {
        const ip_changed = document.getElementById("ip_changed").value;
        const name_changed = document.getElementById("name_changed").value;
        const detail_changed = document.getElementById("detail_changed").value;
        const status_changed = document.querySelector('input[name="status_changed"]:checked').value;



    }
</script>