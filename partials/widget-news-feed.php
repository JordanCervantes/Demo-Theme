<?php

$args = array(
	'numberposts' => 5,
	'offset' => 0,
	'category' => 0,
	'orderby' => 'post_date',
	'order' => 'DESC',
	'post_type' => 'post',
	'post_status' => 'publish',
	'suppress_filters' => true
);

// the query
$the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) : ?>
	<!-- pagination here -->
	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
		<h2><a href="<?php get_permalink(); ?>"><?php the_title();?></a></h2>
		<?php if(has_post_thumbnail()){
			echo "<a href='".get_permalink()."'>";
			echo get_the_post_thumbnail();
			echo "</a>";
		}?>
		<?php the_excerpt(); ?>
	<?php endwhile; ?>
	<!-- end of the loop -->
	<!-- pagination here -->
	<?php wp_reset_postdata(); ?>
<?php else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>