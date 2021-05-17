<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="w3-col l8 s12">
     <div class="w3-card-4 w3-margin-top w3-white">
        <div class="w3-white"><!--w3-border-bottom-->
        <?php if($this->fields->title){ ?>   
        <div class="w3-container w3-padding-8">
            <h3><b><?php $this->title() ?></b></h3>
            <h5><?php $this->author(); ?>,<span class="w3-opacity"><?php $this->date("D \, m Y"); ?>,<span><?php _e(getViewsStr($this));?> views</span></span></h5>
        </div>
        <?php }?>
    		<?php $diythumb = $this->fields->diythumb; if($diythumb) : ?>
			<img src="<?php echo $diythumb; ?>" draggable="false" style="max-width:100%">	
			<?php endif ; ?>
            <div class="w3-container article">
                <?php $this->content(); ?>
            </div>
        </div>
        <?php $this->need('comments.php'); ?>
    </div>
</div>

 
<?php echo '<div class="w3-col l4 w3-hide-medium w3-hide-small sidebar">'; $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
