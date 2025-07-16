<?php
include('../../modelos/Doctor.php');
$especialidad=Doctor::finds();
?>
<html>
  <?php include('../../head.php'); ?>
  <body>
    <?php include('../../menu.php') ?>
    <div id="contenido">
        <h1 id="Titulo">Nuevo Doctor</h1>
        <br>
        <form action="guardar.php" method="POST" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="cedula" class="form-label">Cédula profesional</label>
                            <input type="text" class="form-control" name="cedula" id="cedula" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Inserte una foto del Doctor</label>
                            <input type="file" class="form-control" name="foto" id="foto" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion">
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="idiomas" class="form-label">Idiomas</label>
                            <input type="text" class="form-control" name="idiomas" id="idiomas">
                        </div>
                        <br>
                        <div class="mb-3">
                             <label class="form-label">Género</label><br>
                             <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="genero" id="genero_f" value="F" required>
                                    <label class="form-check-label" for="genero_f">Femenino</label>
                             </div>
                             <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="genero" id="genero_m" value="M">
                                    <label class="form-check-label" for="genero_m">Masculino</label>
                             </div>
                             <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="genero" id="genero_nb" value="no binario">
                                    <label class="form-check-label" for="genero_nb">No binario</label>
                             </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="md-3">
                            <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" name="telefono" id="telefono">
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="idespecialidad" class="form-label">Especialidad</label>
                            <select class="form-control" name="idespecialidad" id="idespecialidad" >
                                <?php foreach($especialidad as $esp): ?>
                                    <option value="<?= $esp->idespecialidad?>"><?= $esp->nombreespe?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="costo" class="form-label">Costo</label>
                            <input type="number" class="form-control" name="costo" id="costo">
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="horario" class="form-label">Horario</label>
                            <input type="text" class="form-control" name="horario" id="horario">
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="diaslab" class="form-label">Días laborales</label>
                            <input type="text" class="form-control" name="diaslab" id="diaslab">
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">Ubicación</label>
                            <input type="text" class="form-control" name="ubicacion" id="ubicacion" placeholder="Barrio,Calle y Referencia">
                        </div>
                        </div>
                    </div>
                </div>
                
                <!-- Botones -->
                    <div class="row justify-content-center">
                        <div class="col-md-4 text-center">
                            <input type="reset" value="Limpiar" class="btn btn-outline-success me-2">
                            <input type="submit" value="Guardar" class="btn btn-outline-success">
                        </div>
                    </div>

            </div>
        </form>
    </div>
    <?php include('../../footer.php') ?>
</body>