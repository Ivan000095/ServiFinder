<?php require('../../modelos/Profesionista.php');
$servicio = Profesionista::finds();
?>

<html lang="en">
    <?php  include('../../head.php') ?>
    <body>
        <?php  include('../../menu.php') ?>

        <div id="contenido" class="">
            <br><h1 id="titulo">Nuevo profesionista</h1> 
            <br>
            <form action="guardar.php" method="POST" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <!-- Columna izquierda -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email" class="form-control" name="correo" id="correo">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control" name="foto" id="foto">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion">
                            </div>
                            <div class="mb-3">
                                <label for="idiomas" class="form-label">Idiomas</label>
                                <input type="text" class="form-control" name="idiomas" id="idiomas">
                            </div>
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

                        <!-- Columna derecha -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha de nacimiento</label>
                                <input type="date" class="form-control" name="fecha" id="fecha">
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" name="telefono" id="telefono">
                            </div>
                            <div class="mb-3">
                                <label for="servicio" class="form-label">Servicio</label>
                                <select class="form-control" name="servicio" id="servicio">
                                    <?php foreach($servicio as $s): ?>
                                        <option value="<?= $s->idServicio ?>"><?= $s->nomservicio ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="costos" class="form-label">Costos</label>
                                <input type="number" class="form-control" name="costo" id="costos" placeholder="$">
                            </div>
                            <div class="mb-3">
                                <label for="horarios" class="form-label">Horarios</label>
                                <input type="text" class="form-control" name="horario" id="horarios">
                            </div>
                            <div class="mb-3">
                                <label for="diasLab" class="form-label">Días Laborales</label>
                                <input type="text" class="form-control" name="diasLab" id="diasLab">
                            </div>
                            <div class="mb-3">
                                <label for="ubicacion" class="form-label">Ubicación</label>
                                <input type="text" class="form-control" name="ubicacion" id="ubicacion" placeholder="Barrio, calle y referencias si es posible">
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

        <?php  include('../../footer.php') ?>
    </body>
</html>
