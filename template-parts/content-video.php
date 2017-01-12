<?php 


/**********************************************
	Video Post Format
*********************************************/
?>

<article id="post-<?php the_ID(); ?>"  <?php post_class('sunset-format-video'); ?> >

	<header class="entry-header text-center">
		<div class="embed-responsive embed-responsive-16by9">
			<?php 
				echo sunset_get_embedded_media(array('video','iframe'));
			 ?>
		</div>
		<?php the_title('<h2 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h2>'); ?>
		<div class="entry-meta">
			<?php echo sunset_posted_meta(); ?>
		</div>
	</header>

	<div class="entry-content">
		<?php if( sunset_get_attachment() ): ?>
			
			<a href="the_permalink();" class="standart-featured-link">
				<div class="standart-featured background-image" style="background-image: url(<?php echo sunset_get_attachment(); ?>);"></div>
			</a>
			
		<?php endif; ?>
		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
		<div class="button-container text-center">
			<a href="<?php the_permalink(); ?>" class="btn btn-sunset"><?php _e('Read more'); ?></a>
		</div>
	</div>

	<footer class="entry-footer">
		<?php echo sunset_posted_footer(); ?>
	</footer>

</article>