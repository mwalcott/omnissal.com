<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="wrap" role="document">
	    <?php 
		  	if(is_front_page()) {
			  	hero_hook();	
		  	}
		  	$project = '';
		  	if(is_singular( 'projects' )) { ?>
		  		<?php $project = 'project'; ?>
			  	<?= Omni\before_after(); ?>
		  	<?php }
		  ?>
		  
		  <div class="container-wrap">
				<div class="container-fluid <?php echo $project; ?>">
		      <div class="content row">
		        <main class="main">
		          <div class="main-content"><?php include Wrapper\template_path(); ?></div>
		          <?php content_builder(); ?>
		        </main><!-- /.main -->
		        <?php if (Setup\display_sidebar()) : ?>
		          <aside class="sidebar">
		            <?php include Wrapper\sidebar_path(); ?>
		          </aside><!-- /.sidebar -->
		        <?php endif; ?>
		      </div><!-- /.content -->
				</div>
				<?php get_template_part('templates/footer'); ?>
		  </div>
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      
      wp_footer();
    ?>
    <script src="<?= get_template_directory_uri(); ?>/assets/scripts/jquery.event.move.js"></script>
    <script src="<?= get_template_directory_uri(); ?>/assets/scripts/jquery.twentytwenty.js"></script>
    <script src="<?= get_template_directory_uri(); ?>/assets/scripts/owl.carousel.js"></script>
  </body>
</html>
