<?php include('include/currentPage_header.php') ?>

<!-- Dynamically fetching the photos from GALLERY -->

<div class="photo-gallery">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Bienvenido a la Galería de Fotos del Hotel Dash Bogotá</h2>
            <p class="text-nowrap">Descubre la belleza y el confort que nuestro hotel tiene para ofrecerte.</p>
        </div>
        
        <!-- Carrusel de imágenes -->
        <div id="galleryCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php 
                    $dirname = "assets/picture/gallery/";
                    $images = glob($dirname."*.*");
                    $activeClass = 'active'; // Clase activa para la primera imagen

                    foreach($images as $image) {
                        echo '<div class="carousel-item '.$activeClass.'">';
                        echo '<img class="d-block w-100" src="'.$image.'" alt="Gallery Image">';
                        echo '</div>';
                        $activeClass = ''; // Solo la primera imagen debe tener la clase activa
                    }
                ?>
            </div>
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