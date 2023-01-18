<script>
    var uri = '<?php echo base_url(); ?>'

    // handleChange functions
    function handleChange_req(checkbox) {
        const check = checkbox.checked;
        if (!check) {
            $('#req_create').prop('checked', false);
            $('#req_change').prop('checked', false);
            $('#req_access').prop('checked', false);
            $('#req_cancel').prop('checked', false);
            $('#req_delete').prop('checked', false);

            $('#req_create').prop('disabled', true);
            $('#req_change').prop('disabled', true);
            $('#req_access').prop('disabled', true);
            $('#req_access').prop('disabled', true);
            $('#req_cancel').prop('disabled', true);
            $('#req_delete').prop('disabled', true);

        } else {
            $('#req_create').prop('disabled', false);
            $('#req_change').prop('disabled', false);
            $('#req_access').prop('disabled', false);
            $('#req_access').prop('disabled', false);
            $('#req_cancel').prop('disabled', false);
            $('#req_delete').prop('disabled', false);

        }
    }

    function handleChange_server(checkbox) {
        const check = checkbox.checked;
        if (!check) {
            $('#server_create').prop('checked', false);
            $('#server_change').prop('checked', false);
            $('#server_delete').prop('checked', false);

            $('#server_create').prop('disabled', true);
            $('#server_change').prop('disabled', true);
            $('#server_delete').prop('disabled', true);

        } else {
            $('#server_create').prop('disabled', false);
            $('#server_change').prop('disabled', false);
            $('#server_delete').prop('disabled', false);

        }
    }

    function handleChange_title(checkbox) {
        const check = checkbox.checked;
        if (!check) {
            $('#title_create').prop('checked', false);
            $('#title_change').prop('checked', false);
            $('#title_delete').prop('checked', false);

            $('#title_create').prop('disabled', true);
            $('#title_change').prop('disabled', true);
            $('#title_delete').prop('disabled', true);

        } else {
            $('#title_create').prop('disabled', false);
            $('#title_change').prop('disabled', false);
            $('#title_delete').prop('disabled', false);

        }
    }

    function handleChange_user(checkbox) {
        const check = checkbox.checked;
        if (!check) {
            $('#user_create').prop('checked', false);
            $('#user_change').prop('checked', false);
            $('#user_delete').prop('checked', false);

            $('#user_create').prop('disabled', true);
            $('#user_change').prop('disabled', true);
            $('#user_delete').prop('disabled', true);
        } else {
            $('#user_create').prop('disabled', false);
            $('#user_change').prop('disabled', false);
            $('#user_delete').prop('disabled', false);

        }
    }

    // change node 
    const permission_change = (id) => {

        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/ma_permission/get_permission_set',
            data: {
                id: id
            },
            dataType: 'json',
            success: (response) => {
                // close_edit_all
                var json_psermission_set = JSON.parse(response[0].permission_set);
                $('#id_permission').val(id);
                $('#req_menu').prop('checked', json_psermission_set.req_menu == '0' ? false : true);
                $('#req_create').prop('checked', json_psermission_set.req_create == '0' ? false : true);
                $('#req_change').prop('checked', json_psermission_set.req_change == '0' ? false : true);
                $('#req_access').prop('checked', json_psermission_set.req_access == '0' ? false : true);
                $('#req_cancel').prop('checked', json_psermission_set.req_cancel == '0' ? false : true);
                $('#req_delete').prop('checked', json_psermission_set.req_delete == '0' ? false : true);
                $('#server_menu').prop('checked', json_psermission_set.server_menu == '0' ? false : true);
                $('#server_create').prop('checked', json_psermission_set.server_create == '0' ? false : true);
                $('#server_change').prop('checked', json_psermission_set.server_change == '0' ? false : true);
                $('#server_delete').prop('checked', json_psermission_set.server_delete == '0' ? false : true);
                $('#title_menu').prop('checked', json_psermission_set.title_menu == '0' ? false : true);
                $('#title_create').prop('checked', json_psermission_set.title_create == '0' ? false : true);
                $('#title_change').prop('checked', json_psermission_set.title_change == '0' ? false : true);
                $('#title_delete').prop('checked', json_psermission_set.title_delete == '0' ? false : true);
                $('#permission_menu').prop('checked', json_psermission_set.permission_menu == '0' ? false : true);
                $('#user_menu').prop('checked', json_psermission_set.user_menu == '0' ? false : true);
                $('#user_create').prop('checked', json_psermission_set.user_create == '0' ? false : true);
                $('#user_change').prop('checked', json_psermission_set.user_change == '0' ? false : true);
                $('#user_delete').prop('checked', json_psermission_set.user_delete == '0' ? false : true);
                // document.getElementById("close_edit_all").click();
            }
        });
    }
    // change node action
    const manage_changed = () => {

        const id = document.getElementById("id_permission").value;
        var req_menu = (document.getElementById("req_menu").checked) ? '1' : '0';
        var req_create = (document.getElementById("req_create").checked) ? '1' : '0';
        var req_change = (document.getElementById("req_change").checked) ? '1' : '0';
        var req_access = (document.getElementById("req_access").checked) ? '1' : '0';
        var req_cancel = (document.getElementById("req_cancel").checked) ? '1' : '0';
        var req_delete = (document.getElementById("req_delete").checked) ? '1' : '0';


        var server_menu = (document.getElementById("server_menu").checked) ? '1' : '0';
        var server_create = (document.getElementById("server_create").checked) ? '1' : '0';
        var server_change = (document.getElementById("server_change").checked) ? '1' : '0';
        var server_delete = (document.getElementById("server_delete").checked) ? '1' : '0';

        var title_menu = (document.getElementById("title_menu").checked) ? '1' : '0';
        var title_create = (document.getElementById("title_create").checked) ? '1' : '0';
        var title_change = (document.getElementById("title_change").checked) ? '1' : '0';
        var title_delete = (document.getElementById("title_delete").checked) ? '1' : '0';

        var permission_menu = (document.getElementById("permission_menu").checked) ? '1' : '0';

        var user_menu = (document.getElementById("user_menu").checked) ? '1' : '0';
        var user_create = (document.getElementById("user_create").checked) ? '1' : '0';
        var user_change = (document.getElementById("user_change").checked) ? '1' : '0';
        var user_delete = (document.getElementById("user_delete").checked) ? '1' : '0';

        const permission_set = {
            req_menu: req_menu,
            req_create: req_create,
            req_change: req_change,
            req_access: req_access,
            req_cancel: req_cancel,
            req_delete: req_delete,
            server_menu: server_menu,
            server_create: server_create,
            server_change: server_change,
            server_delete: server_delete,
            title_menu: title_menu,
            title_create: title_create,
            title_change: title_change,
            title_delete: title_delete,
            permission_menu: permission_menu,
            user_menu: user_menu,
            user_create: user_create,
            user_change: user_change,
            user_delete: user_delete
        }

        // console.log(JSON.stringify(permission_set))

        $.ajax({
            type: 'POST',
            url: uri + 'dashboards/manage/ma_permission/change_permission_set',
            data: {
                id: id,
                data: JSON.stringify(permission_set)
            },
            dataType: 'json',
            success: (response) => {
                var json_psermission_set = JSON.parse(response[0].permission_set);
                var label_psermission_set = "";
                const keys = Object.keys(json_psermission_set);
                const values = Object.values(json_psermission_set);
                for (let i = 0; i < keys.length; i++) {
                    if (values[i] == '1')
                        label_psermission_set = label_psermission_set + `<span class='badge me-1 bg-label-primary'>${keys[i]}</span>`;
                }
                document.getElementById("cancel_change").click();
                $('#permission_details' + id).html(label_psermission_set);
            }
        });
    }

    // const checkbox = document.getElementById('req_menu').checked;
    // console.log(checkbox);
</script>