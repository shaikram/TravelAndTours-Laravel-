index();
function index() {
    //@TODO
    //@var change variable
    $.ajax({
        "url" : "/get-admin-list",
        "success" : function(response) {
        
            let tr = '';
           

            for (var i = 0; i < response.records.length; i++) 
            {
                // console.log(response.records[i].username)
                 //@TODO Change display iterations
                //response.records[i].id
                let level = response.records[i].level
                let status = response.records[i].status

                let level_sub = "<span class='text-success'>"+level+"</span>"
                let status_sub = "<strong class='text-danger'>Deactivated</strong>"
                let delete_btn = "<button class='btn btn-danger' onclick='destroy(" +response.records[i].id+ ")'><i class='fas fa-trash-alt'></i> DELETE</button>"
                let edit_btn = " <button type='button' class='btn btn-success'><i class='fas fa-user-edit'></i> EDIT</button><button type='button' class='btn btn-success dropdown-toggle dropdown-icon' data-toggle='dropdown'><span class='sr-only'>Toggle Dropdown</span></button><div class='dropdown-menu' role='menu'><a class='dropdown-item' onclick='activate(" +response.records[i].id+ ")' style='cursor: pointer;'>Activate</a><a class='dropdown-item' onclick='deactivate(" +response.records[i].id+ ")' style='cursor: pointer;'>Deactivate</a></div>"

                if(level === 'super admin') {
                    level_sub = "<strong class='text-primary'>"+level+"</strong>"
                    delete_btn = "<button class='btn btn-secondary' disabled><i class='fas fa-trash-alt'></i> DELETE</button>"
                    edit_btn = "<button class='btn btn-dark'disabled><i class='fas fa-user-edit'></i> EDIT</button>"
                }
                if(status === 0) {
                    status_sub = "<strong class='text-success'>Active</strong>"
                }
                //@TODO Change display iterations
                //response.records[i].id
                tr += "<tr>" +
                    "<td>" + response.records[i].first_name +" "+ response.records[i].last_name + "</td>" + 
                    "<td>" + response.records[i].username + "</td>" + 
                    "<td>" + response.records[i].email + "</td>" + 
                    "<td>" + level_sub + "</td>" + 
                    "<td>" + status_sub + "</td>" + 
                    "<td><div class='btn-group'>"+ edit_btn + " " + delete_btn +" </div></td>" + 
                "</tr>";   "</tr>";
            }

            $("#records").html(tr)
        }
    })
}


//Saving a record
function store()
{

    /**
     * Change json collections
     */
    //@TODO change json collection
    let employeeForm = {
        fname : $("#fname").val(),
        mname : $("#mname").val(),
        lname : $("#lname").val(),
        username : $("#username").val(),
        email : $("#email").val(),
        password : $("#password").val(),
		confirm_password : $("#confirm_password").val()
	}


    $.ajax({
        "url" : "/store-admin",
        "type" : "POST",
        "data" : employeeForm,
        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        "success" : function(response) {

            // let responseJSON = JSON.parse(response)

            if(response.code === 200) {

                $('#modal-lg').modal('hide')

                $("#fname").val('')
                $("#mname").val('')
                $("#lname").val('')
                $("#username").val('')
                $("#email").val('')
                $("#password").val('')
                $("#confirm_password").val('')

                alert(response.description)
                index();

                return false;
            } else {
                alert(response.description)

                return false;
            }
            
        }
    })

    return false;
}


function destroy(id)
{

    if (!confirm("Are you sure you want to delete?"))
    {
        return;
    }
    
    $.ajax({
        "url" : "/delete-admin/"+id,
        "type" : "PUT",
        "data" : id,
        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        "success" : function(response) {

            if(response.code === 200) {
                
                alert(response.description)

                index();

                return false;
            } else {
                alert(response.description)

                return false;
            }
        }
    })
}

function activate(id)
{

    if (!confirm("Are you sure you want to update this user?"))
    {
        return;
    }
    
    $.ajax({
        "url" : "/activate-admin/"+id,
        "type" : "PUT",
        "data" : id,
        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        "success" : function(response) {

            if(response.code === 200) {
                
                alert(response.description)

                index();

                return false;
            } else {
                alert(response.description)

                return false;
            }
        }
    })
}

function deactivate(id)
{

    if (!confirm("Are you sure you want to update this user?"))
    {
        return;
    }
    
    $.ajax({
        "url" : "/deactivate-admin/"+id,
        "type" : "PUT",
        "data" : id,
        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        "success" : function(response) {

            if(response.code === 200) {
                
                alert(response.description)

                index();

                return false;
            } else {
                alert(response.description)

                return false;
            }
        }
    })
}