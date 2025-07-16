<?php 
    require('../../modelos/Establecimiento.php');
    $Id_Establecimiento = $_REQUEST['Id_Establecimiento'];
    $establecimiento = Establecimiento :: find($Id_Establecimiento);

?>


<html>
   <?php 
    include('../../head.php')
   
   
   
   ?>

    <body>
          <?php include('../../menu.php')?>  
           
        <div id="contenido"> 
        <br>    
        <h1 id="titulo">Editar Establecimiento</h1>
        <br>
        <form action="update.php?Id_Establecimiento=<?php echo $establecimiento -> Id_Establecimiento;?>" method="POST">
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" value="<?php echo $establecimiento -> Nombre; ?>">
            </div>
        </div>

          <div class="row justify-content-center">
            <div class="col-4">
                <label for="Descripcion" class="form-label">Descripcion</label>
                <input type="text" name="Descripcion" id="Descripcion" class="form-control" value="<?php echo $establecimiento -> Descripcion; ?>">
            </div>
        </div>

          <div class="row justify-content-center">
            <div class="col-4">
                <label for="Horario" class="form-label">Horario</label>
                <input type="text" name="Horario" id="Horario" class="form-control" value="<?php echo $establecimiento -> Horario; ?>">
            </div>
        </div>

         <div class="row justify-content-center">
            <div class="col-4">
                <label for="Dias_labo" class="form-label">Dias Laborales</label>
                <input type="text" name="Dias_labo" id="Dias_labo" class="form-control" value="<?php echo $establecimiento -> Dias_labo; ?>">
            </div>
        </div>        

          <div class="row justify-content-center">
            <div class="col-4">
                <label for="Foto" class="form-label">Foto</label>
                <input type="text" name="Foto" id="Foto" class="form-control" value="<?php echo $establecimiento -> Foto; ?>">
            </div>
        </div>

          <div class="row justify-content-center">
            <div class="col-4">
                <label for="DireccionyRef" class="form-label">Direccion y Referencia</label>
                <input type="text" name="DireccionyRef" id="DireccionyRef" class="form-control" value="<?php echo $establecimiento -> DireccionyRef; ?>">
            </div>
        </div>
        
        <br>
        <div class="row justify-content-center">
            <div class="col-4">
                <input type="reset" value="Limpiar" class="btn btn-outline-success">
                <input type="submit" value="Guardar" class="btn btn-outline-success">
            </div>
        </div>
    
            </form>
        </div>
      
        <?php include('../../footer.php')?>
    </body>
</html>