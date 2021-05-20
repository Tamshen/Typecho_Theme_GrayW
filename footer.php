<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</div></div>
<!-- Footer -->
<footer class="w3-container w3-dark-grey w3-padding-jumbo w3-margin-top w3-center">
    <p>Copyright © <?php echo date('Y'); ?><a href="<?php $this->options->siteUrl(); ?>"> <?php $this->options->title(); ?></a>. All Rights Reserved. 
    

    <?php if (!(!empty($this->options->ot_set_ckbbtn) && in_array('site_hide_cpy', $this->options->ot_set_ckbbtn))): ?>
		  Theme by <a href="https://github.com/Tamshen/Typecho_Theme_GrayW"> GrayW</a>
	  <?php endif; ?>


</p>
</footer>
<!-- Top -->
<div class="goTop"></div>
<div class="browse_progress"><div class="progress"></div></div>
<?php $this->footer(); ?>
<script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>" ></script>
<script src="<?php $this->options->themeUrl('js/jquery.lazyload.min.js'); ?>" ></script>
<script src="<?php $this->options->themeUrl('js/jquery-viewer.min.js'); ?>" ></script>
<script src="<?php $this->options->themeUrl('js/highlight.min.js'); ?>" ></script>
<script src="<?php $this->options->themeUrl('js/grayw.js'); ?>" ></script>




</body>
</html>
