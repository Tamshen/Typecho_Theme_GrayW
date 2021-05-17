<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


<div class="w3-container w3-white w3-section" style="min-height:40rem;">
    <div class="w3-row-padding">
        <h1 class="w3-margin"><b>
        <?php $this->archiveTitle(array('category'  =>  
        _t('分类 %s 下的文章'),'search'    =>  
        _t('包含关键字 %s 的文章'),'tag'       =>  
        _t('标签 %s 下的文章'),'author'    =>  
        _t('%s 发布的文章')), '', ''); ?>
        </b></h1>
   
        <hr>
        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
        <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
            <div class="w3-third w3-container w3-margin-bottom w3-hover-opacity archive_item" title="<?php $this->title() ?>">
                <div class="w3-container w3-light-grey">
                    <p class="title"><?php $this->title() ?></p>
                    <p class="textb w3-opacity"><?php $this->excerpt(140,'....'); ?></p>
                    <p class="w3-right-align"><time class="w3-opacity"><?php $this->date("Y-m-d"); ?></time></p>
                    
                    
                </div>
            </div>
        </a>
        <?php endwhile; ?>
        
        <?php else: ?>
        <div class="w3-container w3-padding-64 w3-center ym404">
            <h2>没有找到内容</h2> 
            <h3>内容被小怪兽吃了</h3>
        </div>
        <?php endif; ?>
    </div>
</div>
   
<?php $this->pageNav('&laquo;', '&raquo;'); ?>
<?php $this->need('footer.php'); ?>
