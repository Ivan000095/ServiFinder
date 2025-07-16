
<?php
    include('../../modelos/Establecimiento.php');
    $establecimiento = Establecimiento::lista();
?>

<html lang="en">
    <?php  include('../../head.php') ?>
    <style>

    </style>
    <body>
        <?php  include('../../menu.php') ?>

        <div id="contenido" class="">
            <br>
            <h1 id="titulo">Establecimientos</h1> 
            <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php 
                        foreach ($establecimiento as $e){
                    ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="../../uploads/<?php echo $e->Foto; ?>" alt="<?php echo $e->Foto; ?>" style="height: 50%; width: 100%;" />
                            <div class="card-body p-4">
                                <div class="text-center">
                                  
                                    <h5 class="fw-bolder"><?= $e->Nombre; ?></h5>
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <?php for($i=1; $i<round($e->Puntuacion); $i++){ ?>
                                            <div class="bi-star-fill"></div>
                                        <?php } ?>
                                    </div>
                                    <p><?= $e->Descripcion ?></p>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <button type="button" class="btn btn-outline-success mt-auto" data-bs-toggle="modal" data-bs-target="#modal<?= $e->Id_Establecimiento ?>">
                                        Ver Establecimiento
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="modal<?= $e->Id_Establecimiento ?>" tabindex="-1" aria-labelledby="modalLabel<?= $e->Id_Establecimiento ?>" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel<?= $e->Id_Establecimiento ?>"><?= $e->Nombre ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container px-4 px-lg-5 my-5">
                                        <div class="row gx-4 gx-lg-5 align-items-center">
                                            <div class="col-md-6">
                                                <img class="img-fluid rounded mb-4" src="../../uploads/<?php echo $e->Foto ?>" alt="Foto de <?= $e->Nombre ?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-unstyled mb-4">
                                                    <li><strong>Horario:</strong> <?= $e->Horario ?></li>
                                                    <li><strong>Dias Laborales:</strong> <?= $e->Dias_labo ?></li>
                                                    <li><strong>Direccion:</strong> <?= $e->DireccionyRef ?></li>
                                                </ul>
                                                <p><?= $e->Descripcion ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Reseñas -->
                                    <h5>Agrega una reseña</h5>
                                    <form action="comentario.php?Id_Establecimiento=<?php echo $e->Id_Establecimiento; ?>" method="POST">
                                        <input type="hidden" name="Id_Establecimiento" value="<?= $e->Id_Establecimiento ?>">
                                        <div class="star-rating mb-3">
                                            <?php for ($i = 5; $i >= 1; $i--): ?>
                                                <input type="radio" id="estrella<?= $i ?>-<?= $e->Id_Establecimiento ?>" name="Puntuacion" value="<?= $i ?>"/>
                                                <label for="estrella<?= $i ?>-<?= $e->Id_Establecimiento ?>" class="bi bi-star-fill" required></label>
                                            <?php endfor; ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="NombreUsr" class="form-label">Escriba su nombre</label>
                                            <input type="text" class="form-control" name="NombreUsr" id="NombreUsr" required>
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" name="Comentario" rows="3" placeholder="Escribe tu reseña..." required></textarea>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-outline-success">Enviar Reseña</button>
                                        </div>
                                    </form>
                                    <hr>

                                    <!-- Comentarios -->
                                    <?php $resenas = Establecimiento::findres($e->Id_Establecimiento); ?>

                                    <h5>Comentarios recientes</h5>
                                    <?php if ($resenas && $resenas->num_rows > 0): ?>
                                        <?php while ($r = $resenas->fetch_assoc()): ?>
                                            <div class="d-flex flex-start mb-3">
                                                <img class="rounded-circle shadow-1-strong me-3"
                                                    src="../../img/avatar.jpeg" alt="avatar" width="60" height="60" />
                                                <div>
                                                    <h6 class="fw-bold mb-1"><?= htmlspecialchars($r['NombreUsr']) ?></h6>
                                                    <div class="d-flex justify-content-left small text-warning mb-2">
                                                        <?php for ($i = 1; $i < $r['Puntuacion'] ; $i++): ?>
                                                            <div class="bi-star-fill"></div>
                                                        <?php endfor; ?>
                                                    </div>
                                                    <p class="mb-0"><?= htmlspecialchars($r['Comentario']) ?></p>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <p class="text-muted">Aún no hay reseñas para este profesionista.</p>
                                    <?php endif; ?>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
            </div>
            <a href="index.php" id="btnmod" class="btn btn-outline-success"><i class="bi bi-person"></i> Administrar</a>
            </section>

        </div>
        <br>

        <?php  include('../../footer.php') ?>
    </body>
</html>
