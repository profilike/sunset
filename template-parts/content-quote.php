<?php 


/**********************************************
	Quote Post Format
*********************************************/
?>

<article id="post-<?php the_ID(); ?>"  <?php post_class('sunset-format-quote'); ?> >
	<header class="entry-header text-center">

		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
				<h2 class="quote-content"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_content(); ?></a></h2>
				<?php the_title('<h3 class="quote-author">-','-</h3>'); ?>
			</div>
		</div>

	</header>

	<footer class="entry-footer">
		<?php echo sunset_posted_footer(); ?>
	</footer>

</article>