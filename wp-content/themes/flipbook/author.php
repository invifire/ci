<?php  get_header();  ?>


<div id="entry_page">

	<h1 id="page_title"><?php theme_functions('page_title'); ?></h1>
	
	<?php if ( have_posts() ) the_post(); ?>
	

			<div class="author_content" style="width:600px;">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><div class="gravatar"><?php echo get_avatar( get_the_author_meta('email'), '60' ); ?></div></a>
			<div class="author_info">
				<p class="author_desc"><?php the_author_meta('description'); ?></p>
			</div>
			<div class="clearboth"></div>
		</div>

	
	<?php rewind_posts(); ?>

    <?php get_template_part( 'loop' ); ?>
	
</div>






<?php theme_functions('pagination'); ?>




<?php get_footer('loop');?>
	
