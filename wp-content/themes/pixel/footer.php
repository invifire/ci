<div id="morefoot">

<div class="col1">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_left') ) : ?>
<h3>Bạn muốn tìm gì nào?</h3>
<p>Sử dụng khung dưới đây để tìm kiếm trong site:</p>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
<p>Bạn vẫn ko tìm thấy thứ mình cần phải ko? Vậy xin hãy để lại lời nhắn hay liên lạc với tôi nhé!</p>
<?php endif; ?>
</div>

<div class="col2">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_middle') ) : ?>
<h3>Danh sách website</h3><p>Những website nên ghé qua	...</p><ul><?php wp_list_bookmarks('title_li=&categorize=0'); ?></ul>
<?php endif; ?>
</div>

<div class="col3">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_right') ) : ?>
<h3>Lưu trữ</h3><p>Lưu trữ tất cả các Entry...</p><ul><?php wp_get_archives('type=monthly&limit=12'); ?> </ul>
<?php endif; ?>
</div>

<div class="cleared"></div>
</div><!-- Closes morefoot -->



<div id="footer">
<div id="footerleft">
<p>Powered by <a href="http://www.wordpress.org/">WordPress</a>. Designer by <a href="http://www.ivioon.com/">ivioonstudio</a>. <a href="#main">Quay lên trên &uarr;</a></p>
</div>

<div id="footerright">
<a href="http://wordpress.org" title="WordPress platform" ><img src="<?php bloginfo('template_directory'); ?>/images/wpfooter-trans.png" alt="WordPress" width="34" height="34" /></a>
</div>

<div class="cleared"></div>
<?php wp_footer(); ?>
</div><!-- Closes footer -->

</div><!-- Closes wrapper -->

</body>
</html>