<?php
    include('../../modelos/Doctor.php');
    $Doctor = Doctor::lista();
?>

<html lang="en">
    <?php  include('../../head.php') ?>
    <style>

    </style>
    <body>
        <?php  include('../../menu.php') ?>

        <div id="contenido" class="">
            <br>
            <h1 id="titulo">Doctores</h1> 
            <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php 
                        foreach ($Doctor as $d){
                    ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="../../uploads/<?= $d->foto ?>" alt="Imagen de: <?= $d->nombre ?>" />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5><?= $d->nombreespe; ?></h5>
                                    <h5 class="fw-bolder"><?= $d->nombre; ?></h5>
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <?php for($i=1; $i<=round($d->puntuacion); $i++) { ?>
                                            <div class="bi-star-fill"></div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <p><?= $d->descripcion ?></p>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <button type="button" class="btn btn-outline-success mt-auto" data-bs-toggle="modal" data-bs-target="#modal<?= $d->idDoctor ?>">
                                        Ver <?php echo $d->nombreespe; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="modal<?=$d->idDoctor ?>" tabindex="-1" aria-labelledby="modalLabel<?= $d->idDoctor ?>" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel<?= $d->id ?>"><?= $d->nombre ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container px-4 px-lg-5 my-5">
                                        <div class="row gx-4 gx-lg-5 align-items-center">
                                            <div class="col-md-6">
                                                <img class="img-fluid rounded mb-4" src="../../uploads/<?= $d->foto ?>" alt="Foto de <?= $d->nombre ?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-unstyled mb-4">
                                                    <li><strong>Edad:</strong> <?= $d->edad ?> años</li>
                                                    <li><strong>Sexo:</strong> <?= $d->genero ?></li>
                                                    <li><strong>Idiomas:</strong> <?= $d->idiomas ?></li>
                                                    <li><strong>Horario y días de atención:</strong> <?= $d->diaslab ?>, <?= $d->horario ?></li>
                                                    <li><strong>Costo del servicio:</strong> $<?= $d->costo ?></li>
                                                    <li><strong>Ubicación:</strong> <?= $d->ubicacion ?></li>
                                                </ul>
                                                <p><?= $d->descripcion ?></p>
                                                <p><i class="bi bi-whatsapp"></i> <strong>Teléfono:</strong> <?= $d->telefono ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Reseñas -->
                                    <h5>Agrega una reseña</h5>
                                    <form action="comentario.php?id=<?php echo $d->idDoctor; ?>" method="POST">
                                        <input type="hidden" name="idDoctor" value="<?= $d->idDoctor ?>">
                                        <div class="star-rating mb-3">
                                            <?php for ($i = 5; $i >= 1; $i--): ?>
                                                <input type="radio" id="estrella<?= $i ?>-<?= $d->idDoctor ?>" name="calificacion" value="<?= $i ?>"/>
                                                <label for="estrella<?= $i ?>-<?= $d->idDoctor ?>" class="bi bi-star-fill" required></label>
                                            <?php endfor; ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nombreusr" class="form-label">Escriba su nombre</label>
                                            <input type="text" class="form-control" name="nombreusr" id="nombreusr" required>
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" name="comentario" rows="3" placeholder="Escribe tu reseña..." required></textarea>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-outline-success">Enviar Reseña</button>
                                        </div>
                                    </form>

                                    <hr>

                                    <!-- Comentarios -->
                                    <?php $resenas = Doctor::findres($d->idDoctor); ?>

                                    <h5>Comentarios recientes</h5>
                                    <?php if ($resenas && $resenas->num_rows > 0): ?>
                                        <?php while ($r = $resenas->fetch_assoc()): ?>
                                            <div class="d-flex flex-start mb-3">
                                                <img class="rounded-circle shadow-1-strong me-3"
                                                    src="../../img/avatar.jpeg" alt="avatar" width="60" height="60" />
                                                <div>
                                                    <h6 class="fw-bold mb-1"><?= htmlspecialchars($r['NombreUsr']) ?></h6>
                                                    <div class="d-flex justify-content-left small text-warning mb-2">
                                                        <?php for ($i = 0; $i < $r['Puntuacion'] ; $i++): ?>
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
