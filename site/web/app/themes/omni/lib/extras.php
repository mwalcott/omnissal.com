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
<div class="hero-wrapper">
	<div class="owl-carousel">
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
		
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="owl-image" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
				  <a href="<?php the_permalink(); ?>" class="btn btn-secondary btn-lg view-project">View Project</a>
				</div>
			<?php endwhile; ?>
		
			<?php wp_reset_postdata(); ?>
		
		<?php endif; ?>
	  		  
	</div>
  <div class="triangle-l"></div>
  <div class="triangle-r"></div>
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

			if( get_row_layout() == 'columns' ) {
				get_template_part('templates/acf/columns');
			}
									
		endwhile;
	
	else :
	
		// no layouts found
	
endif;

}
add_action('content_builder', __NAMESPACE__ . '\\content_acf');

function before_after() { ?>
	<div id="project-image-wrap">
		<?php if( get_field('before_image') && get_field('after_image') ) { ?>
			<div id="container1" class="twentytwenty-container">
				<img class="img-fluid" src="<?php the_field('before_image'); ?>"/>
				<img class="img-fluid" src="<?php the_field('after_image'); ?>"/>
			</div>
	
			<?php 
			$i = 0;
			$images = get_field('gallery');
			
			if( $images ): ?>
			<div class="owl-carousel " id="project-gallery">
				<div class="owl-image" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);"></div>
				<?php foreach( $images as $image ): $i++ ?>
					<div class="owl-image" style="background-image: url(<?php echo $image['url']; ?>);"></div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>			  
			
	
		<?php } else { ?>
	
			<?php 
			$i = 0;
			$images = get_field('gallery');
			
			if( $images ): ?>
			<div class="owl-carousel" id="project-gallery">
				<div class="owl-image" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);"></div>
				<?php foreach( $images as $image ): $i++ ?>
					<div class="owl-image" style="background-image: url(<?php echo $image['url']; ?>);"></div>
				<?php endforeach; ?>
			</div>
	
			<?php endif; ?>			  
		<?php } ?>
	</div>
<?php }