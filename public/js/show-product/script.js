index();
function index() {
    //@TODO
    //@var change variable
    $.ajax({
        "url" : "/get-package-list",
        "success" : function(response) {
        
            let tr = '';
           

            for (var i = 0; i < response.records.length; i++) 
            {
                let delete_btn = "<button class='btn btn-danger' onclick='destroy(" +response.records[i].id+ ")'><i class='fas fa-trash-alt'></i></button>"
                let edit_btn = " <a href='/show-product/"+ response.records[i].id +"' class='btn btn-success mr-3'><i class='fas fa-edit'></i></a>"
                //@TODO Change display iterations
                //response.records[i].id
                tr += "<tr>" +
                        "<td><img src='../../assets/destination/" + response.records[i].image + "' alt='destination' class='img-thumbnail'></td>" + 
                        "<td><strong>" + response.records[i].destination + "</strong></td>" + 
                        "<td>" + response.records[i].description + "</td>" + 
                        "<td><div class='btn-group'>"+ edit_btn + " " + delete_btn +" </div></td>" + 
                    "</tr>";
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
        package : $("#package").val(),
        package_title : $("#package_title").val(),
        package_description : $("#package_description").val(),
        destination_id : $("#destination_id").val()
	}


    $.ajax({
        "url" : "/store-package",
        "type" : "POST",
        "data" : employeeForm,
        "async":false,
        "dataType": 'JSON',
        "cache" : false,
        "contentType" : false,
        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        "success" : function(response) {

            // let response = JSON.parse(response)

            if(response.code === 200) {

                $('#modal-lg').modal('hide')

                $("#package_title").val('')
                $("#package_description").val('')

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


//Saving a record
function destination_store()
{

     /**
     * Change json collections
     */
    //@TODO change json collection
    let employeeForm = {
        destination : $("#destination").val(),
        file : $("#file").val().replace(/C:\\fakepath\\/i, ''),
		description : $("#description").val(),
        id : $("#user_id").val()
	}


    $.ajax({
        "url" : "/store-product",
        "type" : "POST",
        "data" : employeeForm,
        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        "success" : function(response) {

            if(response.code === 200) {
                $('#modal-lg').modal('hide')

                $("#destination").val('')
                $("#file").val('')
                $("#description").val('')

                alert(response.description)
                destination_index();

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
        "url" : "/delete-product/"+id,
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