<?php include('include/header.php') ;

if(!isset($_SESSION['loggedUserId'])) {
 header('Location:../login.php');
}

?>
<section id="roomType" class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-2">
            <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                <h2 class="my-3">Tipos de Habitaciones Disponibes</h2>
            </div>
        </div>
 
 <!-- Filter Drop down  -->
 <div class="float-right ">
<select name="category" id="roomFilter" class="form-control custom-select bg-white border-md filter">
  <option disabled="" selected="">Filtrar por  </option>
  <option value="1">All</option>
  <option value="2">Menos de $500.000</option>
  <option value="3">Cost between 500 and 1000</option>
  <option value="4">Mas de $1.000.000</option>
</select>
</div>

<br>
<br>
<br>
        <div class="row" id="contentArea">
            
           
        </div>

    </div>
</section>

<script src ="js/roomtype.js" ></script>

<?php include('include/footer.php')?>

