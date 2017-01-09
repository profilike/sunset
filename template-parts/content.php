<?php 


/**********************************************
	Standart Post Format
*********************************************/
?>

<article id="post-<?php the_ID(); ?>"  <?php post_class(); ?> >
	<header class="entry-header text-center">
		<?php the_title('<h2 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h2>'); ?>
		<div class="entry-meta">
			<?php echo sunset_posted_meta(); ?>
		</div>
	</header>

	<div class="entry-content">
		<?php if( has_post_thumbnail() ): 
			$featured_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
		?>
			<a href="the_permalink();" class="standart-featured-link">
				<div class="standart-featured background-image" style="background-image: url(<?php echo $featured_image ?>);"></div>
			</a>
			<div class="entry-excerpt">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>
		<div class="button-container text-center">
			<a href="<?php the_permalink(); ?>" class="btn btn-sunset"><?php _e('Read more'); ?></a>
		</div>
	</div>

	<footer class="entry-footer">
		<?php echo sunset_posted_footer(); ?>
	</footer>

</article>