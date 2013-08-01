<?php get_header(); ?>

<div id="main">

<div id="contentwrapper">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php if (function_exists('wp_list_comments')): ?>
<div <?php post_class(topPost); ?>>

<?php else : ?>
<div class="topPost">
<?php endif; ?>

  <h2 class="topTitle"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
  <p class="topMeta">by <?php the_author_posts_link(); ?> on <?php the_time('M.d, Y') ?>, under <?php the_category(', '); ?></p>
  <div class="topContent"><?php the_content('(continue reading...)'); ?></div>
  <span class="topComments"><?php comments_popup_link('Để lại lời nhắn', '1 Comment', '% Comments'); ?></span>
  <span class="topTags"><?php the_tags('<em>:</em>', ', ', ''); ?></span>
  <span class="topMore"><a href="<?php the_permalink() ?>">Xem thêm...</a></span>
<div class="cleared"></div>
</div> <!-- Closes topPost --><br/>

<?php endwhile; ?>

<?php else : ?>

<div class="topPost">
  <h2 class="topTitle"><a href="<?php the_permalink() ?>">Không tìm thấy >"<</a></h2>
  <div class="topContent"><p>Xin lỗi, trang bạn tìm hiện không tồn tại, bạn thử wa chức năng <a href="#searchform">tìm kiếm</a> xem <img src="http://l.yimg.com/us.yimg.com/i/mesg/emoticons7/1.gif" alt="kiss"></p></div>
</div> <!-- Closes topPost -->

<?php endif; ?>

<div id="nextprevious">
<div class="alignleft"><?php next_posts_link('&laquo; Bài cũ hơn') ?></div>
<div class="alignright"><?php previous_posts_link('Bài viết mới nhất &raquo;') ?></div>
<div class="cleared"></div>
</div>
</div> <!-- Closes contentwrapper-->



<?php get_sidebar(); ?>
<div class="cleared"></div>

</div><!-- Closes Main -->


<?php get_footer(); ?>