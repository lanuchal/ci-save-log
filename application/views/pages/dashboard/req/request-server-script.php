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
        // //console.log(id);
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
            // //console.log("error create_witness!!");
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
            // //console.log("error create_witness!!");
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
                // //console.log("create_req response = ", response)
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
        //console.log("id", id)
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/req/request_server/get_req_id',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                // //console.log(response)
                $('#delete_id').val(response[0].req_id);
                $('#delete_name').html(response[0].req_title_name);
                $('#detail').html(response[0].req_detial);
            }
        });
    }
    const sent_id_access = (id) => {
        //console.log("id", id)
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
        //console.log("id", id)
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
        // //console.log("node_delete (id) ", id)
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/req/request_server/delete_req',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                //console.log(response)
                document.getElementById("cancel_modal_d").click();
                document.getElementById("td_req" + response.id).remove();
            }
        });
    }
    // access node 
    const user_access = () => {
        const id = document.getElementById("delete_id_a").value;
        // //console.log("node_delete (id) ", id)
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
                //console.log(name_access);
                const lable_status = `<span class="badge me-1 bg-label-success" class="text-start" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" title="${name_access}">อนุญาติ</span>`;

                $('#req_status' + id).html(lable_status);
                $('#manage_req' + id).html(`<i class='bx bx-check'></i>`);
            }
        });
    }

    const user_cancel = () => {
        const id = document.getElementById("delete_id_c").value;
        // //console.log("node_delete (id) ", id)
        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/req/request_server/access_cancel',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                //console.log(response)
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