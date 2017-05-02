<div class="row split-column">
	
<?php
	// check if the nested repeater field has rows of data
	if( have_rows('column') ):
		//echo count( get_sub_field('column') );	
		// loop through the rows of data
		while ( have_rows('column') ) : the_row();
			
			$image = get_sub_field('image');
			$heading = get_sub_field('heading');
			$content = get_sub_field('content');
			echo '<div class="col-sm-6">';
			if( $heading ) {
				echo '<h3>'. $heading .'</h3>';
			}
			if( $content ) {
				echo '<p>'. $content .'</p>';
			}
			if( $image ) {
				echo '<img class="img-fluid" src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';	
			}
			if($heading && $content) {
				echo '<p><a href="#FIXME" class="btn btn-primary">Learn More</a></p>';	
			}
			echo '</div>';
		
		endwhile;
			
	endif;

?>

</div>