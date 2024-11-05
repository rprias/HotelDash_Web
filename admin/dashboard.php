<?php include("include/header.php");
if(!isset($_SESSION['loggedUserId'])) {
  echo "<script> window.location.href = '../login.php';</script>";
}
?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">

<h2 class="mb-4">Cuadro de Mando</h2>
<h6 class="mb-4">Resumen de Reservas</h6>
<div class = "container">
  <canvas id="myChart"></canvas>
</div>
 <br><br>

 
<div class="row ml-4" >

<div class="col-md-6 col-sm-12">
<div class="card border-light mb-3" style="max-width: 36rem;">
  <div class="card-header  font-weight-bold">Estado de la reserva <span class="text-muted">(Año Actual)</span></div>
  <div class="card-body">
<div class="row">
<div class="col-md-6 col-sm-12">
   
   <p class="font-weight-bold">Total Reservas</p>
      <p id="room_total_booking">10</p>
      <p class="font-weight-bold">Reserva Rechazadas</p>
      <p id="room_rejeted_booking">2</p>
      <p class="font-weight-bold">Reserva Cancelada</p>
      <p id="room_cancelled_booking">0</p>
   </div>
   <div class="col-md-6 col-sm-12">
     
   <p class="font-weight-bold">Reservaciones</p>
      <p id="room_booked_booking">8</p>
      <p class="font-weight-bold">Reservas Pagadas</p>
      <p id="room_paid_booking">6</p>
      <p class="font-weight-bold">Reserva Checked Out</p>
      <p id="room_checkedout_booking">2</p>
   </div>
</div>
    
  </div>
</div>
</div>

<div class="col-md-6 col-sm-12">
<div class="card border-light mb-3" style="max-width: 36rem;">
  <div class="card-header  font-weight-bold">Estado de la reserva Eventos <span class="text-muted"> (Año Actual)</span></div>
  <div class="card-body">
<div class="row">
<div class="col-md-6 col-sm-12">
   
   <p class="font-weight-bold">Reservaciones</p>
      <p id="event_total_booking">...</p>
      <p class="font-weight-bold">Reservas Rechazada</p>
      <p id="event_rejeted_booking">...</p>
      <p class="font-weight-bold">Reserva Cancelada</p>
      <p id="event_cancelled_booking">...</p>
   </div>
   <div class="col-md-6 col-sm-12">
     
   <p class="font-weight-bold">Reservaciones</p>
      <p id="event_booked_booking">...</p>
      <p class="font-weight-bold">Reservas Pagadas</p>
      <p id="event_paid_booking">...</p>
      <p class="font-weight-bold">Reservas Checked Out</p>
      <p id="event_checkedout_booking">...</p>
   </div>
</div>
    
  </div>
</div>
</div>

</div>

<div class="row ml-4" >

<div class="col-md-4 col-sm-12">
<div class="card border-light mb-3" style="max-width: 18rem;">
  <div class="card-header  font-weight-bold">Estado de Habitaciones <span class="text-muted"> (Año Actual)</span></div>
  <div class="card-body">
 
    <p class="font-weight-bold">Habitaciones Disponibles por Tipo</p>
    <p id="room_type">...</p>
    <p class="font-weight-bold">Total de Habitaciones</p>
    <p id="rooms">...</p>
    <p class="font-weight-bold">Habitaciones Disponibles</p>
    <p id="avail_room">...</p>
    
  </div>
</div>
</div>

<div class="col-md-4 col-sm-12">
<div class="card border-light mb-3" style="max-width: 18rem;">
  <div class="card-header  font-weight-bold">Detalle de Eventos <span class="text-muted"> (Año Actual)</span></div>
  <div class="card-body">
 
    <p class="font-weight-bold">Salones Disponibles</p>
    <p id="event_type">...</p>
    <p class="font-weight-bold">Total de Salones</p>
    <p id="events">...</p>
    <p class="font-weight-bold">Salones Disponibles</p>
    <p id="avail_event">...</p>
   
  </div>
</div>
</div>

<div class="col-md-4 col-sm-12">
<div class="card border-light mb-3" style="max-width: 18rem;">
  <div class="card-header font-weight-bold">Cantidades <span class="text-muted"> (Año Actual)</span></div>
  <div class="card-body">
 
    <p class="font-weight-bold">Total de Reservas de Habitaciones</p>
    <p id="room_booking">...</p>
    <p class="font-weight-bold">Total Reservas de Eventos</p>
    <p id="event_booking">...</p>
    <p class="font-weight-bold">Total Reservas</p>
    <p id="total_amount">...</p>
   
  </div>
</div>
</div>