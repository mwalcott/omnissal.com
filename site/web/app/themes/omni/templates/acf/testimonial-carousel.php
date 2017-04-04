<div class="testimonials-carousel-wrap">
	<h2><?php the_sub_field('heading'); ?></h2>
	<div id="testimonials-carousel" class="carousel slide" data-ride="false">
		<ol class="carousel-indicators">
			<?php
				$inav = -1; 
				$active = '';
				$args = array(
					'post_type' => 'testimonials',
					'posts_per_page' => 5				
				);
				
				// the query
				$the_query = new \WP_Query( $args ); 
			?>
		
			<?php if ( $the_query->have_posts() ) : ?>
			
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); $inav++; ?>
					<?php 
						if($inav == 0) { 
							$active = 'active'; 
						} else {
							$active = '';
						}  
					?>
					<li data-target="#testimonials-carousel" data-slide-to="<?php echo $inav; ?>" class="<?php echo $active; ?>"></li>
				<?php endwhile; ?>
			
				<?php wp_reset_postdata(); ?>
			
			<?php endif; ?>
			
			
		</ol>
	  <div class="carousel-inner" role="listbox">
		  
			<?php
				$i = 0; 
				$active = '';
				$args = array(
					'post_type' => 'testimonials',
					'posts_per_page' => 6
				);
				
				// the query
				$the_query = new \WP_Query( $args ); 
			?>
		
			<?php if ( $the_query->have_posts() ) : ?>
			
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); $i++; ?>
					<?php 
						if($i == 1) { 
							$active = 'active'; 
						} else {
							$active = '';
						}  
					?>
					<div class="carousel-item <?php echo $active; ?>">
						<div class="row">
							<div class="col-sm-6">
								<?php the_post_thumbnail('hero', array('class' => 'img-fluid')); ?>
							</div>
							<div class="col-sm-6">
								<div class="test-content"><?php the_excerpt(); ?></div>
								<h4 class="float-left"><?php the_title(); ?></h4>
								<a href="<?php the_field('select_project'); ?>" class="btn btn-primary float-right">View Project</a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			
				<?php wp_reset_postdata(); ?>
			
			<?php endif; ?>
		  		  
	  </div>
	</div>
</div>
