<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');
/**
 * Omni NameSpace
 */
namespace Omni;

/**
 * Custom image sizes
 */
add_image_size( 'project-archive', 1000, 750, true );
add_image_size( 'hero', 1500, 875, true );

/**
 * Global options pages
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}

/**
 * Hero
 */
function hero() { ?>
	<div class="hero-wrap">
		<div id="hero" class="carousel slide" data-ride="false">
			<ol class="carousel-indicators">
				<?php
					$inav = -1; 
					$active = '';
					$args = array(
						'post_type' => 'projects',
						'posts_per_page' => 6,
						'meta_query' => array(
							array(
								'key' => 'featured',
								'compare' => '==',
								'value' => '1'
							)
						)
					
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
						<li data-target="#hero" data-slide-to="<?php echo $inav; ?>" class="<?php echo $active; ?>">
							<?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid')); ?>
						</li>
					<?php endwhile; ?>
				
					<?php wp_reset_postdata(); ?>
				
				<?php endif; ?>
				
				
			</ol>
		  <div class="carousel-inner" role="listbox">
			  
				<?php
					$i = 0; 
					$active = '';
					$args = array(
						'post_type' => 'projects',
						'posts_per_page' => 6,
						'meta_query' => array(
							array(
								'key' => 'featured',
								'compare' => '==',
								'value' => '1'
							)
						)
					
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
							<?php the_post_thumbnail('hero', array('class' => 'd-block img-fluid')); ?>
							<div class="carousel-caption">
							  <h3><?php the_title(); ?></h3><br />
							  <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-md view-project">View Project</a>
							</div>
						</div>
					<?php endwhile; ?>
				
					<?php wp_reset_postdata(); ?>
				
				<?php endif; ?>
			  		  
		  </div>
			<a class="carousel-control-prev" href="#hero" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#hero" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>		  
		</div>
	</div>
<?php }
add_action('hero_hook', __NAMESPACE__ . '\\hero');

/**
 * Content Builder ACF
 */
function content_acf() { 

	// check if the flexible content field has rows of data
	if( have_rows('sections') ):

		// loop through the rows of data
		while ( have_rows('sections') ) : the_row();
				
			if( get_row_layout() == 'content_block' ) {
				get_template_part('templates/acf/content-block');
			}

			if( get_row_layout() == 'service_block' ) {
				get_template_part('templates/acf/service-block');
			}

			if( get_row_layout() == 'testimonial_carousel' ) {
				get_template_part('templates/acf/testimonial-carousel');
			}
									
		endwhile;
	
	else :
	
		// no layouts found
	
endif;

}
add_action('content_builder', __NAMESPACE__ . '\\content_acf');

function before_after() { ?>
	<?php if( get_field('before_image') && get_field('after_image') ) { ?>
		<div id="container1" class="twentytwenty-container">
			<img class="img-fluid" src="<?php the_field('before_image'); ?>"/>
			<img class="img-fluid" src="<?php the_field('after_image'); ?>"/>
		</div>
	<?php } else { ?>
		<div class="project-featured">
			<?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
		</div>
	<?php } ?>
<?php }