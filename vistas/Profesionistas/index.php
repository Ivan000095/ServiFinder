<?php
    include('../../modelos/Profesionista.php');
    $profesionista = Profesionista::lista();
?>

<html lang="en">
    <?php  include('../../head.php') ?>
    <body>
        <?php  include('../../menu.php') ?>

        <div id="contenido" class="">
            <br>
            <h1 id="titulo">Profesionistas</h1> 
            <br>
            <a href="create.php" class="btn btn-outline-success" id="btnadd"><i class="bi bi-person-add"></i> Agregar</a>
            <br>
            <table class="table table-responsive table-striped" id="tabla-catalogo">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Foto</th>
                        <th>Descripción</th>
                        <th>Idiomas</th>
                        <th>Género</th>
                        <th>Fecha de nacimiento</th>
                        <th>Teléfono</th>
                        <th>Servicio</th>
                        <th>Costos</th>
                        <th>horarios</th>
                        <th>Días laborales</th>
                        <th>Ubicación</th>
                        <th>Acciones</th>
                    </tr>
                    <?php
                        foreach ($profesionista as $p){
                    ?>
                <tbody>
                    <tr>
                        <td><?php echo $p->nombre; ?></td>
                        <td><?php echo $p->correo; ?></td>
                        <td><img src="../../<?php echo $p->foto; ?>" alt="Foto de <?php echo $p->nombre; ?>" width="100rem"></td>
                        <td><?php echo $p->descripcion; ?></td>
                        <td><?php echo $p->idiomas; ?></td>
                        <td><?php echo $p->genero; ?></td>
                        <td><?php echo $p->fecha; ?></td>
                        <td><?php echo $p->telefono ?></td>
                        <td><?php echo $p->servicio; ?></td>
                        <td>$<?php echo $p->costo; ?></td>
                        <td><?php echo $p->horario; ?></td>
                        <td><?php echo $p->diasLab; ?></td>
                        <td><?php echo $p->ubicacion; ?></td>
                        <td>
                            <div class="row">
                                <div class="col-6">
                                    <a href="edit.php?id=<?php echo $p->id; ?>">
                                        <button style="border: none; background: none;"><i class="bi bi-pencil-fill"></i></button>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <form action="destroy.php?id=<?php echo $p->id; ?>" method="POST" id="form<?php echo $p->id; ?>" class="inline">
                                        <button style="border: none; background: none;" type="button" onclick="borrar(<?php echo $p->id ?>, '<?php echo $p->nombre ?>')"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <br>
        

        <?php  include('../../footer.php') ?>
    </body>

    <script type="text/javascript">
        function borrar(id, nombre) {
            var continuar = confirm('¿Deseas borrar el Registro de: ' + nombre + '?');
            if (continuar) {
                var formulario = document.getElementById('form'+id);
                formulario.submit();
            }
        } 
    </script>
</html>
