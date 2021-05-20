
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
    <div class="w3-margin w3-margin-top">
        <a href="<?php if($this->options->sidebar_title){$this->options->sidebar_title();}else{echo '#请到控制台-设置外观修改';} ?>">
        <img src="<?php if($this->options->sidebar_imgUrl){$this->options->sidebar_imgUrl();}else{$this->options->themeUrl('img/2.jpg');} ?>" style="width:100%">
        <div class="w3-container w3-white">
            <div class="w3-padding-16">
            <div class="w3-medium">
                <b><?php if($this->options->sidebar_title){$this->options->sidebar_title();}else{echo '请到控制台-设置外观修改';} ?></b>
            </div>
            <div class="w3-hide w3-small" style="padding-top: 6px">
            <?php if($this->options->sidebar_des){$this->options->sidebar_des();}else{echo '请到控制台-设置外观修改';} ?>
            </div>
            </div>
        </div>
        </a>
    </div>
    <?php endif; ?>

    <!-- Comments -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <div class="w3-margin netcomment w3-white">
        <div class="w3-container w3-padding">
            <h4>最新评论</h4>
            </div>
        <ul class="w3-ul w3-hoverable " style="padding-bottom: 16px;">
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
            <a href="<?php $comments->permalink(); ?>">
            <li class="w3-border-0">
               
                <span><strong><?php $comments->author(false); ?>:</strong></span>
                <br>
                <span>
                <?php $comments->excerpt(16, '...'); ?>&nbsp;</span>
                
            </li>
            </a>
        <?php endwhile; ?>
        </ul>
      
    </div>
    <?php endif; ?>
    <!-- Categories -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('Showcategories', $this->options->sidebarBlock)): ?>
    <div class="w3-margin netcomment w3-white">
        <div class="w3-container w3-padding">
            <h4>分类</h4>
        </div>
        <div class="w3-white" style="padding-bottom: 16px;">
            <ul class="w3-ul w3-hoverable">
                <?php $this->widget('Widget_Metas_Category_List')->parse('<a  href="{permalink}" title="{name}"><li class="w3-hover-opacity">{name}({count})</li></a>'); ?>
            </ul>
        </div> 
    </div>
    <?php endif; ?>
    <!-- tags -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('Showtags', $this->options->sidebarBlock)): ?>
  
    <div class="w3-margin w3-white">
        <div class="w3-container w3-padding">
            <h4>标签</h4>
        </div>
        <div class="w3-container w3-white">
                <!--<span class="w3-tag w3-black w3-margin-bottom">标签</span>-->
                <?php $this->widget('Widget_Metas_Tag_Cloud')->to($taglist); ?>
                <?php while($taglist->next()): ?>
                <a href="<?php $taglist->permalink(); ?>" title="<?php $taglist->name(); ?>">
                    <span class="w3-tag w3-light-grey w3-small w3-margin-bottom w3-hover-opacity">
                        <?php $taglist->name(); ?>
                    </span>
                </a>
                <?php endwhile; ?>
        </div>
    </div>
    <?php endif; ?>
</div>