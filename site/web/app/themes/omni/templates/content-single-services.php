<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="service-heading-single" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
	    <div class="row">
		    <div class="col-sm-8">
			    <header>
			      <h1 class="entry-title"><?php the_title(); ?></h1>
			    </header>
			    <div class="entry-content">
			      <?php the_content(); ?>
			    </div>
		    </div>
		    <div class="col-sm-4 consultation">
			    <h3>Schedule a Consultation</h3>
		    </div>
	    </div>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
