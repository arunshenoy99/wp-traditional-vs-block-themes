<?php get_header(); ?>
<div id="mycarousel" class="carousel slide carousel-fade d-none d-md-block" data-ride="carousel">
    <div class="carousel-inner d-none d-md-block" role="listbox">
        <div class="carousel-item active">
            <img src="<?php echo get_theme_file_uri( '/img/img1.jpg' ); ?>" alt="Jar" class="img-fluid" width="100%">
            <div class="carousel-caption" style="margin-bottom: 200px;">
                <h2 class="carousel-header" data-aos="fade-in" data-aos-duration="3000">Traditional Theme</h2>
                <h3>Does not have any blocks.</h3>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo get_theme_file_uri( '/img/img2.jpg' ); ?>" alt="Jar" class="img-fluid" width="100%">
            <div class="carousel-caption" style="margin-bottom: 200px;">
                <h2 class="carousel-header">Traditional Theme</h2>
                <h3>Made with heart using PHP templates.</h3>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?php echo get_theme_file_uri( '/img/img3.jpg' ); ?>" alt="Jar" class="img-fluid" width="100%">
            <div class="carousel-caption" style="margin-bottom: 200px;">
                <h2 class="carousel-header">Traditional Theme</h2>
                <h3>Check out my block version</h3>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" data-slide="prev" data-target="#mycarousel" href="#mycarousel" role="button">
        <span class="fa fa-arrow-circle-left fa-2x carousel-icon"></span>
    </a>
     <a class="carousel-control-next" data-slide="next" data-target="#mycarousel" href="#mycarousel" role="button">
        <span class="fa fa-arrow-circle-right fa-2x carousel-icon"></span>
    </a>
</div>

<!-- Alternative to carousel for smaller screens -->
<div class="container d-block d-md-none" style="height: 100%; overflow-x: hidden;">
    <div class="row">
        <div class="col-12 text-center" style="position: absolute; bottom: 20vh;" data-aos="zoom-in" data-aos-duration="2000">
                <h2 class="title-main">JARZ</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiumdod tempor incididunt ut labore et dolore magna aliqua. Turpis in eu mi bibendum neque egestas. Imperdiet sed euimdod nisi porta lorem mollis aliquam ut porttitor.</p>
                <a href="/products" class="btn bg-warning rounded-pill" style="color: black; font-size: 1.5em;" role="button">Explore Products</a>
        </div>
    </div>
</div>

<div class="container">

<?php 
     $homepage_posts = new WP_Query(array(
          'posts_per_page' => 2
     ));
     while( $homepage_posts->have_posts() ) {
          $homepage_posts->the_post(); ?>
     <div class="row row-content">
          <div class="col col-12">
               <h4><?php the_title();?></h4>
               <p><?php the_content(); ?></p>
          </div>
     </div>
     <?php } ?>
     </div>
<?php get_footer(); ?>