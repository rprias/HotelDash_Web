<?php include('include/currentPage_header.php') ?>

<!-- Dynamically fetching the photos from GALLERY -->

<div class="photo-gallery">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Hotel Elite Gallery</h2>
            <p class="text-center">All of the images are captured inside our Hotel Elite</p>
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
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#galleryCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Fin del carrusel -->

    </div>
</div>


<?php include('include/footer.php')?>