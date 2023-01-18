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
                // document.getElementById("close_edit_all").click();
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

        if (!ip_changed || !name_changed || !detail_changed) {
            // console.log("error create_witness!!");
            document.getElementById("serv_err_title").innerHTML = "เกิดข้อผิดพลาด!!";
            document.getElementById("serv_err_detail").innerHTML = "กรุณากรอกข้อมูลให้ครบถ้วน";
            document.getElementById("serv_toast").classList.add("show", "bg-danger");
            setTimeout(() => {
                document.getElementById("serv_toast_close").click();
            }, 3000);
            return;
        }

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

        if (!create_ip || !create_name || !create_detail) {
            // console.log("error create_witness!!");
            document.getElementById("serv_err_title").innerHTML = "เกิดข้อผิดพลาด!!";
            document.getElementById("serv_err_detail").innerHTML = "กรุณากรอกข้อมูลให้ครบถ้วน";
            document.getElementById("serv_toast").classList.add("show", "bg-danger");
            setTimeout(() => {
                document.getElementById("serv_toast_close").click();
            }, 3000);
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
                // console.log(response) 
                // $.ajax({
                //     type: 'GET',
                //     url: uri + 'dashboards/manage/node/get_node',
                //     dataType: 'json',
                //     success: function(response2) {
                //         const jsonData = JSON.parse(response2);
                //         var new_row = "";
                //         var count = 0;
                //         jsonData.forEach(element => {
                //             count++;
                //             const status_node = (element.node_status == 1) ? "เปิดใช้งาน" : "ปิดใช้งาน";
                //             const label_color = (element.node_status == 1) ? "bg-label-success" : "bg-label-secondary";
                //             new_row = new_row + ` <tr id='td_node${element.node_id}'>
                //                         <td>${count}</td>
                //                         <td id='node_ips${element.node_id}'>${element.node_ip}</td>
                //                         <td id='node_names${element.node_id}'>${element.node_name}</td>
                //                         <td id='node_details${element.node_id}'>${element.node_detail}</td>
                //                         <td id='node_statuss${element.node_id}'>
                //                             <span class="badge me-1 ${label_color}">
                //                             ${status_node}
                //                             </span>
                //                         </td>
                //                         <td id='update_times${element.node_id}'>${element.update_time == null?element.create_time:element.update_time}</td>
                //                         <td class="text-center">
                //                             <div class="dropdown">
                //                                 <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                //                                     <i class="bx bx-dots-vertical-rounded"></i>
                //                                 </button>
                //                                 <div class="dropdown-menu">
                //                                     <button class="dropdown-item" onclick="node_change(${element.node_id})" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth_change" aria-controls="offcanvasBoth">
                //                                         <span class="badge bg-label-warning w-100">
                //                                             <i class="bx bx-edit-alt me-1"></i>&nbsp; Edit SERVER
                //                                         </span>
                //                                     </button>
                //                                     <button class="dropdown-item" type="button" data-bs-toggle="modal" onclick="sent_id(${element.node_id})" data-bs-target="#modalToggle">
                //                                         <span class="badge bg-label-danger w-100">
                //                                             <i class="bx bx-trash me-1"></i>&nbsp; Delete SERVER
                //                                         </span>
                //                                     </button>
                //                                 </div>
                //                             </div>
                //                         </td>
                //                     </tr>`;
                //         });
                //         document.getElementById("cancel_create").click();
                //         $('#row_node').html(new_row);
                //         return;
                //     }
                // })


                document.getElementById("cancel_create").click();
                location.reload();
                return;
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
        // console.log("node_delete (id) ", id)
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/node/delete_node',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                // console.log(response)
                document.getElementById("cancel_node").click();
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