<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
	    <?php if( get_field('before_image') && get_field('after_image') ) { ?>
		    <a href="#FIXME" class="btn btn-primary float-right view-gallery">
			    View Gallery
		    </a>
	    <?php } ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
			<cite><?php the_field('location'); ?></cite>
    </header>
    <div class="row">
	    <div class="col-sm-3">
		    <h3>Location</h3>
		    <p><?php the_field('location'); ?></p>
	    </div>
	    <div class="col-sm-9">
		    <?php the_content(); ?>
	    </div>
      
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
