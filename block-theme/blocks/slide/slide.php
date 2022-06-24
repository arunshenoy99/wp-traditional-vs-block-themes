<?php
if ( $attributes['themeimage'] ) {
	 $attributes['imgURL'] = get_theme_file_uri( '/images/' . $attributes['themeimage'] );
}

if ( ! $attributes['imgURL'] ) {
	 $attributes['imgURL'] = get_theme_file_uri( '/img/img1.jpg' );
}
?>
<div class="carousel-item">
	 <img src="<?php echo $attributes['imgURL']; ?>" alt="Jar" class="img-fluid" width="100%">
	 <div class="carousel-caption" style="margin-bottom: 200px;">
		  <?php echo $content; ?>
	 </div>
</div>
