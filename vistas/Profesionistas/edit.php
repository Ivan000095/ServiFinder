<?php
    require('../../modelos/Profesionista.php');
    $id = $_REQUEST['id'];
    $Profesionista = Profesionista::find($id);
    $servicio = Profesionista::finds();
?>

<html lang="en">
    <?php  include('../../head.php') ?>
    <body>
        <?php  include('../../menu.php') ?>

        <div id="contenido" class="">
            <br>
            <h1 id="titulo">Editar profesionista</h1> 
            <br>
            <form action="actualizar.php?id=<?php echo $Profesionista->id; ?>" method="POST">
                <div class="container">
                    <div class="row">
                        <!-- Primera columna -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $Profesionista->nombre; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $Profesionista->correo; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password" value="<?php echo $Profesionista->password; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $Profesionista->descripcion; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="idiomas" class="form-label">Idiomas</label>
                                <input type="text" class="form-control" name="idiomas" id="idiomas" value="<?php echo $Profesionista->idiomas; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Género</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="genero" id="genero_f" value="F" <?php if ($Profesionista->genero == 'F') echo 'checked'; ?> required>
                                    <label class="form-check-label" for="genero_f">Femenino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="genero" id="genero_m" value="M" <?php if ($Profesionista->genero == 'M') echo 'checked'; ?>>
                                    <label class="form-check-label" for="genero_m">Masculino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="genero" id="genero_nb" value="no binario" <?php if ($Profesionista->genero == 'no binario') echo 'checked'; ?>>
                                    <label class="form-check-label" for="genero_nb">No binario</label>
                                </div>
                            </div>
                        </div>

                        <!-- Segunda columna -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha de nacimiento</label>
                                <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $Profesionista->fecha; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" name="telefono" id="telefono" value="<?php echo $Profesionista->telefono; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="servicio" class="form-label">Seleccione el Servicio</label>
                                <select class="form-control" name="servicio" id="servicio">
                                    <?php foreach($servicio as $s){ ?>
                                        <option value="<?php echo $s->idServicio; ?>" 
                                        <?php $Profesionista->servicio==$s->nomservicio ? "selected" : "" ?>>
                                        <?php echo $s->nomservicio; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="costos" class="form-label">Costos</label>
                                <input type="number" class="form-control" name="costo" id="costos" placeholder="$" value="<?php echo $Profesionista->costo; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="horarios" class="form-label">Horarios</label>
                                <input type="text" class="form-control" name="horario" id="horarios" value="<?php echo $Profesionista->horario; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="diasLab" class="form-label">Días Laborales</label>
                                <input type="text" class="form-control" name="diasLab" id="diasLab" value="<?php echo $Profesionista->diasLab; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="ubicacion" class="form-label">Ubicación</label>
                                <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="<?php echo $Profesionista->ubicacion; ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="row justify-content-center mt-4">
                        <div class="col-md-4 text-center">
                            <input type="reset" value="Limpiar" class="btn btn-outline-success">
                            <input type="submit" value="Guardar" class="btn btn-outline-success">
                        </div>
                    </div>
                </div>
            </form>

        </div>

        <?php  include('../../footer.php') ?>
    </body>
</html>

