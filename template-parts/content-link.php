<?php 


/**********************************************
	Link Post Format
*********************************************/
?>

<article id="post-<?php the_ID(); ?>"  <?php post_class('sunset-format-link'); ?> >
	<header class="entry-header text-center">
		<?php 
			$link = sunset_grab_url();
			the_title('<h2 class="entry-title"><a href="' . $link . '">','<div class="link-icon"><span class="icon sunset-link"></span></div></a></h2>'); ?>
	</header>

</article>