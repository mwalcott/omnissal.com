<article <?php post_class('col-sm-4'); ?>>
  <a href="<?php the_permalink(); ?>">
	  <h2>
		  <?php the_title(); ?>
		  <span>View Project</span>
		</h2>
	  <?php the_post_thumbnail('project-archive', array('class' => 'img-fluid')); ?>
  </a>
</article>
