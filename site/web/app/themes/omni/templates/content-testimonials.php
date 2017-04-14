<article <?php post_class(); ?>>
  <div class="test-content">
    <?php the_content(); ?>
  </div>
  <h5>
	  <?php the_title(); ?>
	  <?php if(get_field('select_project')) { ?><br />
	  	<a class="btn btn-link" href="<?php the_field('select_project'); ?>">view project</a>
	  <?php } ?>
  </h5>
</article>
