<?php include('include/currentPage_header.php') ?>
<section id="contact ">
<div class="container-xl mb-5 p-5">
	<div class="row">
		<div class="col-md-8 mx-auto">
		<div class="message"></div>
			<div class="contact-form">
				<h1>Contáctanos</h1>
				<p class="hint-text">Nos encantaría saber de ti, escríbenos si tienes alguna duda.</p>
				<form id="contact-form" action="functions.php" method="post"  autocomplete="off">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputFirstName">Nombres</label>
								<input type="text" class="form-control" id="FirstName" name="FirstName" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="inputLastName">Apellidos</label>
								<input type="text" class="form-control" id="LastName" name="LastName" required>
							</div>
						</div>
					</div>            
					<div class="form-group">
						<label for="inputEmail">Direccion de Correo Electronico</label>
						<input type="email" class="form-control" id="Email" name="Email" required>
					</div>
					<div class="form-group">
						<label for="inputMessage">Mensaje</label>
						<textarea class="form-control" id="Message" name="Message" rows="5" required></textarea>
					</div>
					<button type="submit" class="btn btn-primary" name = "contact" > Enviar </button>
				</form>
			</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function(){
	$('#contact-form').on('submit',function(e){
	  e.preventDefault();
      var formData = new FormData(this);

      $.ajax({
        url:"functions.php",
        type:"POST",
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){      
			console.log("data");
		  console.log(data);
          var json = JSON.parse(data);
          if(json['error']!=""){
             $('.message').html(`<div class="alert alert-danger" role="alert"> ${json['error']}  </div>`);
			 $('#contact-form')[0].reset();
          }else{
			$('.message').html(`<div class="alert alert-success" role="alert"> ${json['msg']}  </div>`);
			$('#contact-form')[0].reset();
          }
          
           
       },
       error: function(data){
           console.log("error");
           console.log(data);
       }
      });
		})
	})
</script>
<?php include('include/footer.php')?>