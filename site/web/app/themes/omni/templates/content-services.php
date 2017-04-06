<article <?php post_class('col-sm-4'); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
	<?php the_post_thumbnail('project-archive', array('class' => 'img-fluid')); ?>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
    <p>
	    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a><br />
    </p>
  </div>
</article>
