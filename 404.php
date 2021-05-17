<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<!-- Container -->
<div class="w3-container w3-padding-64 w3-center ym404">
<h2>404</h2> 
<h3>页面被小怪兽吃了</h3>
<p id="hitokoto"><?php $this->content(); ?></p>
</div>

<?php $this->need('footer.php'); ?>
