<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
get_header();
?>

<div class="posts left">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
	 <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	 
	 <div class="postinfo">
      <span class="postdate">Posted <?php the_time('F jS, Y') ?></span> . <?php comments_popup_link(__('No Comments'), __('1 Comment'), __('% Comments')); ?> . 
      <span class="posttags"><?php the_category(', ') ?> <?php the_tags(__('Tags: '), ', ', ' '); ?></span>
    </div>

	<div class="postdata">
		<?php the_content(__('(more...)')); ?>
	</div>

	<div class="mentions">
    <div><span class="twitter-small left"></span><a href="" class="twitter-share-button-2 left" data-url="<?php the_permalink() ?>" data-text="<?php the_title(); ?>"></a></div>
  </div>

	<!--<div class="feedback">
		<?php wp_link_pages(); ?>
		<?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?>
	</div>-->

</div>

<?php comments_template(); // Get wp-comments.php template ?>

<div class="clear"></div>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>

</div>

<?php get_footer(); ?>
