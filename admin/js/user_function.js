
// function to display content of user
function display(value,msg,err){
  var Data = {
    userFilter : value
  }
  if(msg!=""){
    Data.msg = msg;
  }
  if(err!=""){
    Data.error = err;
  }

  $.ajax({
    url:"fetchData.php",
    type:"POST",
    data:Data,
    beforeSend:function(){
      $('#contentArea').html("<br><br><span>Cargando...</span>");
    },
    success:function(data){
      $('#contentArea').html(data);
     // data table from the Jquery dataTable.net
    $('table').DataTable({
      paging:true,
      ordering:true,
      searching:true
    });
    },
    error: function(data){
      console.log("error");
      console.log(data);
  }
  });
}

//function to delete the user 

function deleteUser(UserID){

  console.log(UserID);
  $.ajax({
    url:"admin_functions.php",
    type:"POST",
    data:{
      userId : UserID,
      deleteUser:true
    },
    success:function(data){      
      console.log("success");
      console.log(data);
      var json = JSON.parse(data);
      if(json['error']!=""){
       display("","",json['error']);
      }else{
       display("",json['msg'],"");
      }
      
       
   },
   error: function(data){
       console.log("error");
       console.log(data);
   }
  });
}

//function to Edit the user 
function editUser(UserID){
  $('#userId').val(UserID);
  $.post('admin_functions.php',{userUpdateId: UserID},function(data,status){
    console.log(data);
     userData = JSON.parse(data);
     var path ='../assets/picture/profiles/' +userData.ProfileImage;
     console.log(path);
  
     // Rellenar los campos del modal con los datos del usuario
      $('#updatePicture').attr("src", path);
      $('#updatenombre').val(userData.Nombre);
      $('#updatenoDocu').val(userData.NoDocu);
      $('#updateemail').val(userData.Email);
      $('#updatedcoTipo').val(userData.DcoTipo);
      $('#updatecontactNo').val(userData.ContactNo);
      $('#updategenero').val(userData.Genero);
      $('#updaterol').val(userData.Rol);

  });
  $('#updateModal').modal('show');
}

// Action when the document is ready
$(document).ready(function(){
  //display the data without filter

  display("","","");
  

   
     // onchange event for the filter
     $('#userFilter').on('change',function(){
       var value = $(this).val();
             display(value,"","");
     });

     $('#addUserBtn').on('click',function(){
           $('#addModal').modal('show');
     });

     // Add User Operation From the form
     $('#model-addUser').on('submit',(function(e) {
        e.preventDefault();
       
        var formData = new FormData(this);
        for (var value of formData.values()) {
          console.log(value);
       }
        $.ajax({
            type:"POST",
            url: "admin_functions.php",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
         
            success:function(data){
            
              console.log(data);
               var json = JSON.parse(data);
               if(json['error']!=""){
                display("","",json['error']);
               }else{
                display("",json['msg'],"");
               }
               $('#addModal').modal('hide');
               $('#model-addUser')[0].reset(); 
               $('#wizardPicturePreview').attr('src','../assets/picture/icons/user.png'); 
            },
            error: function(data){
                console.log("error");
                console.log(data);
                $('#addModal').modal('hide');
            }
        });
    }));

//update the content of user
    $('#model-updateUser').on('submit',(function(e) {
        e.preventDefault();
       
        var formData = new FormData(this);
 
        $.ajax({
            type:"POST",
            url: "admin_functions.php",
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
         
            success:function(data){
              console.log("success");
              console.log(data);
              $('#updateModal').modal("hide");
               var json = JSON.parse(data);
               if(json['error']!=""){
                display("","",json['error']);
               }else{
                display("",json['msg'],"");
               }
                
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

});


