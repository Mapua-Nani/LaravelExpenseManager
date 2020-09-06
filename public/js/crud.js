$(document).ready(function($){
    ////----- Open the modal to CREATE a role -----////
    $('#btn-add').click(function () {
        $('#btn-save').val("add");
        $('#modalFormData').trigger("reset");
        $('#del-role').hide();
        $('#roleEditorModal').modal('show');
    });

    $('#roleEditorModal').on('hidden.bs.modal', function () {
        $('#del-role').show();
    });

    ////----- Open the modal to UPDATE a role -----////
    $('body').on('click', '.open-modal', function () {
        var role_id = $(this).attr("id");
        $.get('roles/' + role_id, function (data) {
            $('#role_id').val(data.id);
            $('#role').val(data.title);
            $('#description').val(data.description);
            $('#btn-save').val("update");
            $('#roleEditorModal').modal('show');
        })
    });

    // Clicking the save button on the open modal for both CREATE and UPDATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            title: $('#role').val(),
            description: $('#description').val(),
        };
        var state = $('#btn-save').val();
        var type = "POST";
        var role_id = $('#role_id').val();
        var ajaxurl = 'roles';
        if (state == "update") {
            type = "PUT";
            ajaxurl = 'roles/' + role_id;
        }
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var role = '<tr id="role' + data.id + '"><td>' + data.title + '</td><td>' + data.description + '</td>';
                role += '</tr>';
                if (state == "add") {
                    $('#roles-list').append(role);
                } else {
                    $("#role" + role_id).replaceWith(role);
                }
                $('#modalFormData').trigger("reset");
                $('#roleEditorModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    ////----- DELETE a role and remove from the page -----////
    $('.delete-role').click(function () {
        var role_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: 'roles/' + role_id,
            success: function (data) {
                console.log(data);
                $("#role" + role_id).remove();
                $('#roleEditorModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    ////----- Open the modal to CREATE USER -----////
    $('#btn-adduser').click(function () {
        $('#userbtn-save').val("add");
        $('#usermodalFormData').trigger("reset");
        $('#del-user').hide();
        $('#userEditorModal').modal('show');
    });

    // Show delete button when editing
    $('#userEditorModal').on('hidden.bs.modal', function () {
        $('#del-user').show();
    });

    //populate select from user view
    $('#btn-adduser').on("click", function(){
        $.get("/getrole",function(data){
            $.each(data,function(i,value){
                console.log(value);
                var option = document.createElement("option");
                option.text = value.title;
                option.value = value.id;
               // $('#role_select' option.attr('label') = value.id;
                var select = document.getElementById("userrole_select");
                select.appendChild(option);
            });
        });
    });

    ////----- Open the modal to UPDATE USER -----////
    $('body').on('click', '.open-modal', function () {
        var user_id = $(this).attr("id");
        $.get('users/' + user_id, function (data) {
            $('#user_id').val(data.id);
            $('#user').val(data.name);
            $('#email').val(data.email);
            console.log('una');
            console.log(data.role_id);
            $('#userrole_select select').val(data.role_id)
            $.get("/getrole",function(data){
                $.each(data,function(i,value){
                    console.log(value);
                    var option = document.createElement("option");
                    option.text = value.title;
                    option.value = value.id;
                   // $('#role_select' option.attr('label') = value.id;
                    var select = document.getElementById("userrole_select");
                    select.appendChild(option);
                    // $('#userrole_select option:selected').val(data.data.)
                });
            });
            console.log('check');
            console.log(data.role_id);
            $('#btn-save').val("update");
            $('#userEditorModal').modal('show');
        })
    });

    // Clicking the save button on the open modal for both CREATE and UPDATE
    $("#userbtn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            name: $('#user').val(),
            email: $('#email').val(),
            role_id: $('#userrole_select option:selected').val(),
            role_title: $("userrole_select :selected").text(),
            password: 'password',
        };
        var state = $('#userbtn-save').val();
        var type = "POST";
        //var role_id = $('#role_id').val();
        var ajaxurl = 'users';
        if (state == "update") {
            type = "PUT";
            ajaxurl = 'users/' + user_id;
        }
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var user = '<tr id="name' + data.id + '"><td>' + data.name +'</td><td>' + data.email + '</td><td>' + data.role_title + '</td><td>' +data.created_at+ '</td></tr>';
                if (state == "add") {
                    $('#users-list').append(user);
                } else {
                    $("#user" + user_id).replaceWith(user);
                }
                $('#usermodalFormData').trigger("reset");
                $('#userEditorModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    ////----- DELETE a user and remove from the page -----////
    $('.delete-user').click(function () {
        var user_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: 'users/' + user_id,
            success: function (data) {
                console.log(data);
                $("#user" + user_id).remove();
                $('#userEditorModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
      } else {
      dropdownContent.style.display = "block";
      }
      });
    }
});
