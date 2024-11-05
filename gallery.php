<?php include('include/currentPage_header.php') ?>

<!-- Dynamically fetching the photos from GALLERY -->
<div class="photo-gallery">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Galeria del Hotel Dash</h2>
            <p class="text-center">Estas son todoas las fotografias tomadas desde nuestro Hotel Dash</p>
        </div>

        <!-- Carrusel -->
        <div id="galleryCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php 
                    $dirname = "assets/picture/gallery/";
                    $images = glob($dirname."*.*");
                    $activeClass = 'active'; // Clase activa para el primer elemento

                    foreach($images as $image) {
                        echo '<div class="carousel-item '.$activeClass.'">';
                        echo '<img class="d-block w-100" src="'.$image.'" alt="Gallery Image">';
                        echo '</div>';
                        $activeClass = ''; // Desactivar para los siguientes elementos
                    }
                ?>
            </div>

            <!-- Controles del carrusel -->
            <a class="carousel-control-prev" href="#galleryCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#galleryCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
        <!-- Fin del carrusel -->

    </div>
</div>

<?php include('include/footer.php')?>