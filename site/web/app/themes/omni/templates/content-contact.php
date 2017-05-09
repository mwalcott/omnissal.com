<div class="row contact-info-wrap">
	<div class="col-sm-4">
		<h2>Main Office</h2>
		<address><?php the_field('address', 'option'); ?></address>
		<div class="phone">
			<a href="tel:<?php the_field('phone_number', 'option'); ?>">
				<i class="fa fa-mobile" aria-hidden="true"></i> <?php the_field('phone_number', 'option'); ?>
			</a>
		</div>
	</div>
	<div class="col-sm-8">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3071.775483004626!2d-105.0147296845739!3d39.65476710954964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x876c7fe1d0205b2b%3A0xc07a6b908a1399ad!2s2049+W+Hamilton+Pl%2C+Englewood%2C+CO+80110!5e0!3m2!1sen!2sus!4v1494360324687" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>		
	</div>
</div>
<?php the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
