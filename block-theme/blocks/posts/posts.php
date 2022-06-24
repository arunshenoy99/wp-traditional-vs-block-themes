<div class="container">

	 <?php
		$homepage_posts = new WP_Query(
			array(
				'posts_per_page' => 2,
			)
		);
		while ( $homepage_posts->have_posts() ) {
			 $homepage_posts->the_post(); ?>
					<div class="row row-content">
						 <div class="col col-12">
							  <h4><?php the_title(); ?></h4>
							  <p><?php the_content(); ?></p>
						 </div>
					</div>
			   <?php } ?>
		  </div>
