<header class="banner">
  <a class="brand" href="<?= esc_url(home_url('/')); ?>">
  	<img class="img-fluid" src="<?php the_field('logo', 'option'); ?>"/>
    <?php the_field('logo_heading', 'option'); ?>
    <span><?php the_field('logo_sub_heading', 'option'); ?></span>
  </a>
  <nav class="nav-primary">
    <?php
    if (has_nav_menu('primary_navigation')) :
      wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
    endif;
    ?>
  </nav>
	<div class="social">
		<address><?php the_field('address', 'option'); ?></address>
		<div class="phone"><a href="tel:<?php the_field('phone_number', 'option'); ?>"><?php the_field('phone_number', 'option'); ?></a></div>
		<?php
			if( have_rows('social_accounts', 'option') ):
				echo '<ul>';
				while ( have_rows('social_accounts', 'option') ) : the_row(); ?>
					<li>
						<a href="<?php the_sub_field('account_url'); ?>" class="" rel="nofollow" target="_blank">
							<i class="fa fa-<?php the_sub_field('account_provider'); ?>" aria-hidden="true"></i>
						</a>
					</li>
				<?php endwhile;
				echo '</ul>';
			else :
			
			endif;
		
		?>		
	</div>
</header>
