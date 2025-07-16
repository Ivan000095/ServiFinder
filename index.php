<html>
    <?php include ('head.php')?>
    <body>
        <?php include ('menu.php')?>
        <!-- Aquí puede ir una imagen de presentación -->
         <header class="bg-dark py-5" style="background-image: url(../img/different-professions-collage-photos-various-260nw-2501596199.webp); width: 100%;>
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">ServiFinder</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Un lugar para todas tus necesidades</p>
                </div>
            </div>
        </header>

        <section class="py-3 py-md-5" id="quienesomos">
        <div class="container">
            <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
            <div class="col-12 col-lg-6 col-xl-5">
                <img class="img-fluid rounded" loading="lazy" src="img/todos.jpg" alt="About 1">
            </div>
            <div class="col-12 col-lg-6 col-xl-7">
                <div class="row justify-content-xl-center">
                <div class="col-12 col-xl-11">
                    <h2 class="mb-3">¿Quiénes somos?</h2>
                    <p class="lead fs-4 text-secondary mb-3" style="text-align: justify;" >Somos un equipo de desarrolladores de la Universidad Tecnológica de la Selva</p>
                    <p class="mb-5">Además de desarrolladores, somos personas como usted, con la misma necesidad de buscar un mecánico, un eléctrico, un doctor y no sabemos con quien acudir. Pues aquí está Servifinder para ayudarte con eso.</p>
                    <br>
                </div>
            </div>
        </div>


        <div class="row justify-content-center gx-5">
    
            <!-- Misión -->
            <div class="col-12 col-lg-6">
                <h2 class="mb-3">Misión</h2>
                <p style="text-align: justify;">
                Brindar a la comunidad de Ocosingo, Chiapas, una plataforma web accesible, confiable y fácil de usar que permita localizar, comparar y contactar proveedores de servicios médicos y técnicos. Buscamos facilitar la toma de decisiones informadas, mejorar la calidad de vida de los ciudadanos, y apoyar la economía local mediante la visibilización de profesionales de salud y oficios.
                </p>
            </div>

            <!-- Visión -->
            <div class="col-12 col-lg-6">
                <h2 class="mb-3">Visión</h2>
                <p style="text-align: justify;">
                Ser la plataforma de referencia en Ocosingo y la región para la búsqueda y gestión de servicios médicos y técnicos, reconocida por su confiabilidad, facilidad de uso y contribución al desarrollo comunitario. Aspiramos a expandir nuestro alcance a otros municipios, integrando cada vez más servicios y funcionalidades que respondan a las necesidades reales de la población.
                </p>
            </div>
        </div>
        </section>
        
        <section class="py-5" id="contenido">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">   
                 <!--Desarrolladora 1-->   
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="img/Mar.jpg" alt="Margarita" with="120px" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">Margarita Ramirez Perez</h5>
                                    <!-- Descripcion-->
                                    Estudiante de la carrera TSU en Desarrollo de Software, líder del equipo.
                                </div>
                            </div>
                        </div>
                    </div>
            <!--Desarrollador 2-->   
                     
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="img/ivan.jpg" alt="Imagen de fontanero" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">Jose Ivan Lanestosa Pelayo </h5>
                                    <!-- Descripcion-->
                                    Estudiante de la carrera TSU en Desarrollo de Software, desarrollador del equipo.
                                </div>
                            </div>
                        </div>
                    </div>
                     <!--Desarrollador 3-->   
                     <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="img/cesar.jpg" alt="Imagen de fontanero" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">Cesar Ghandi Monterrosa Gomez</h5>
                                    <!-- Descripcion-->
                                    Estudiante de la carrera TSU en Desarrollo de Software, analista del equipo.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Desarrollador 4-->   
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="img/jesus.jpg" alt="Imagen de fontanero" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">Jesus Acacio Perez Jimenez</h5>
                                    <!-- Descripcion-->
                                    Estudiante de la carrera TSU en Desarrollo de Software, diseñador del equipo.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       <div id="Contacto">
            <?php include('footer.php')?>
        </div>
    </body>
</html>