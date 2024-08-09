<!-- Mensaje de Error -->
<div class="container mt-0 mb-0">
<div class= "card-header text-justify">
    <div class="row d-flex justify-content-center">
        <div class="card col-lg-3" style="width: 50%;" >
<?php if(session()->getFlashdata('msg')):?>
    <div class="alert alert-warning">
        <?= session()->getFlashdata('msg')?>
    </div>
<?php endif;?>

<!-- Inicio del formulario de login-->
<form method="post" action="<?php echo base_url('/enviarlogin') ?>">
  <div class="card-body" media="(max-width:768px)">
    <div class="mb-2">
      <label for="exampleFormControlInput1" class="form-label">Correo</label>
      <input name="email" type="text" class="form-control" placeholder="Correo" >
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input name="password" type="password" class="form-control" placeholder="contraseña">

  <input type="submit" value="Ingresar" class="btn btn-succes">
  <a href="<?php echo base_url('login'); ?>" class="btn btn-danger">Cancelar</a>
  <br><span>¿Aún no se registró? <a href="<?php echo base_url('/registro'); ?>">
  Registrarse aquí</a></span>
</div>
</form>
</div>
</div>