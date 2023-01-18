<script>
    var uri = '<?php echo base_url(); ?>'
    // change node 
    const title_change = (id) => {
        // console.log(id);
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
                // document.getElementById("close_edit_all").click();
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
                // console.log(response)
                document.getElementById("cancel_create").click();
                var new_row = ` <tr id='td_title${response.id}'>
                                        <td>${response.lenght_row}</td>
                                        <td id='title_names${response.id}'>${response.req_title_name}</td>
                                        <td id='title_details${response.id}'  class="text-break">${response.req_title_detail}</td>
       
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
                // console.log(response)
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