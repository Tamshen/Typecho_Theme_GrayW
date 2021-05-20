


<?php 
/**
 * print_r($this->allow('comment'));
 * 0是关闭评论
 * 1是打开评论
 */
?>


<?php


//头像
global $touxiang;
$touxiang = false;
if (!empty($this->options->ot_set_ckbbtn) && in_array('site_avatar', $this->options->ot_set_ckbbtn)){
    $touxiang = true;
}
//头像


function threadedComments($comments, $options)
    {
        global $touxiang;
        $commentClass = '';
        if ($comments->authorId) {
            if ($comments->authorId == $comments->ownerId) {
                $commentClass .= ' comment-by-author';
            } else {
                $commentClass .= ' comment-by-user';
            }
        }
        $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
        if ($comments->url) {
            $author = '<a href="' . $comments->url . '" target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>';
        } else {
            $author = $comments->author;
        }
        ?>
        <div data-no-instant id="li-<?php $comments->theId(); ?>" class="comment-body<?php
        if ($comments->levels > 0) {
            echo ' comment-child';
            $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
        } else {
            echo ' comment-parent';
        }
        $comments->alt(' comment-odd', ' comment-even');
        echo $commentClass;
        ?>">

        <div class="w3-row c-body" id="<?php $comments->theId(); ?>">
            <div class="w3-col" style="width:62px">
                <?php if ($touxiang): ?>
					<img src="https://q.qlogo.cn/g?b=qq&nk=<?php $comments->mail();?>&s=100" alt="<?php $comments->author(); ?>" width="60" height="60">
				<?php else: ?>
					<?php $comments->gravatar('60', '');?>
				<?php endif; ?>
            </div>
            <div class=" w3-rest w3-container">
                <h4><?php echo $author; ?> <span class="w3-opacity w3-medium w3-hide-small"><?php $comments->date(); ?> <span class="w3-opacity w3-hide r w3-right"><?php $comments->reply('回复'); ?></span></span></h4>
                <p><?php get_comment_at($comments->coid) ?><?php $comments->content(); ?></p><hr>
            </div>
        </div>

        <?php if ($comments->children) { ?>
            <div class="comment-children">
                <?php $comments->threadedComments($options); ?>
            </div>
        <?php } ?>
        </div>
<?php } ?>

<!--展开评论btn-->
<div class="w3-center">
    <a class="w3-btn w3-padding-large w3-white w3-border w3-hover-border-black  w3-margin-48" id="btn_kpl" onClick="ckpl()"><?php $this->commentsNum(_t('没有评论'), _t('1 条评论'), _t('%d 条评论')); ?></a>
</div>

<div id="comments" class="cf w3-container w3-animate-opacity">
    <hr>
    <h5><?php $this->commentsNum(_t('添加评论'), _t('1 条评论'), _t('%d 条评论')); ?></h5>
    <?php 
    //评论循环
    $this->comments()->to($comments);$comments->listComments();$comments->pageNav('&laquo;', '&raquo;'); 
    ?>
    <?php if ($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
            <span class="response"><?php _e('添加评论：'); ?></span>
            <span class="cancel-reply"><?php $comments->cancelReply('取消回复'); ?></span>
        </div>
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">

            <?php if ($this->user->hasLogin()): ?>
                <p style="padding-top:10px;">
                    <a href="<?php $this->options->profileUrl(); ?>"><strong><?php $this->user->screenName(); ?></strong></a>
                    <a href="<?php $this->options->logoutUrl(); ?>" title="退出登录">退出登录 &raquo;</a>
                </p>
            <?php else: ?>
                <?php if ($this->remember('author', true) != "" && $this->remember('mail', true) != "") : ?>
                <p style="padding-top:10px;">
                    <span onClick='cr("author_info")' style="cursor:pointer;"><strong><?php $this->remember('author'); ?></strong>，欢迎回来!(点击修改)</span>
                    <span id="cancel-comment-reply"><?php $comments->cancelReply('取消回复'); ?></span>
                </p>
                <div id="author_info" style="display:none;" class="w3-animate-zoom">
                <?php else: ?>
              	<div id="author_info" class="w3-animate-zoom">
              	<?php endif; ?>
                    <div class="w3-third w3-padding-right"> 
                        <input class="w3-input" type="text" name="author" id="author" placeholder="<?php _e('昵称 *'); ?>" value="<?php $this->remember('author'); ?>"> 
                    </div> 
                    <div class="w3-third w3-padding-right"> 
                        <input class="w3-input" type="text" name="mail" id="mail" placeholder="<?php _e('邮箱 *'); ?>" value="<?php $this->remember('mail'); ?>"> 
                    </div> 
                    <div class="w3-third"> 
                        <input class="w3-input" type="text" name="url" id="url" placeholder="<?php _e('Website'); ?>" value="<?php $this->remember('url'); ?>"> 
                    </div> 
                </div>
                
            <?php endif; ?>
                <textarea class="w3-input"  name="text"  id="textarea"  rows="3" style="resize:none" placeholder="<?php _e('你的评论总是一针见血！'); ?>" required><?php $this->remember('text', false); ?></textarea>
                <!--勾选验证提交-->
                <div class="w3-section-12">
                    <input class="w3-check" type="checkbox" value="9" id="comment-sub" name="comment-sub" required="required" autocomplete="on" required title="发表评论，请先勾选！"> 
                    <label class="w3-validate">滴！评论卡~</label>
                    <button type="submit" class="w3-btn w3-dark-grey w3-right" id="misubmit"><?php _e('评论'); ?></button>
                    <a class="w3-btn w3-dark-grey w3-right" onclick="cr('bq')" >插入表情</a>
                </div>
                <div class="w3-row"> 
                    <div class="w3-container w3-half" style="visibility:hidden">占位</div> 
                    <div class="w3-container w3-half plbq w3-card w3-animate-bottom" id="bq" style="display: none;"> 
                        <ul>
                            <li onclick="addbq('（￣▽￣）')">（￣▽￣）</li>
                 	        <li onclick="addbq('(=・ω・=)')">(=・ω・=)</li>
                 	        <li onclick="addbq('(｀・ω・´)')">(｀・ω・´)</li>
                 	        <li onclick="addbq('(〜￣△￣)〜')">(〜￣△￣)〜</li>
                 	        <li onclick="addbq('(°∀°)ﾉ')">(°∀°)ﾉ</li>
                 	        <li onclick="addbq('(ﾟДﾟ≡ﾟдﾟ)!?')">(ﾟДﾟ≡ﾟдﾟ)!?</li>
                 	        <li onclick="addbq('(^・ω・^ )')">(^・ω・^ )</li>
                 	        <li onclick="addbq('ε=ε=(ノ≧∇≦)ノ')">ε=ε=(ノ≧∇≦)ノ</li>
                 	        <li onclick="addbq('(╯°口°)╯(┴—┴')">(╯°口°)╯(┴—┴</li>
                 	        <li onclick="addbq('_(:3」∠)_')">_(:3」∠)_</li>
                        </ul>
                    </div> 
                </div>
                <hr>
                <?php $security = $this->widget('Widget_Security'); ?>
                <input type="hidden" name="_" value="<?php echo $security->getToken($this->request->getReferer()) ?>">
            </form>
    </div>
    <?php else: ?>
    <h6 class="comment-close w3-center w3-margin-bottom">评论已关闭</h6>
    <?php endif; ?>
</div>
    <script>
        (function () {
            window.TypechoComment = {
                dom: function (id) {
                    return document.getElementById(id);
                },
                create: function (tag, attr) {
                    var el = document.createElement(tag);
                    for (var key in attr) {
                        el.setAttribute(key, attr[key]);
                    }
                    return el;
                },
                reply: function (cid, coid) {
                    var comment = this.dom(cid), parent = comment.parentNode,
                        response = this.dom('<?php echo $this->respondId(); ?>'),
                        input = this.dom('comment-parent'),
                        form = 'form' == response.tagName ? response : response.getElementsByTagName('form')[0],
                        textarea = response.getElementsByTagName('textarea')[0];
                    if (null == input) {
                        input = this.create('input', {
                            'type': 'hidden',
                            'name': 'parent',
                            'id': 'comment-parent'
                        });
                        form.appendChild(input);
                    }
                    input.setAttribute('value', coid);
                    if (null == this.dom('comment-form-place-holder')) {
                        var holder = this.create('div', {
                            'id': 'comment-form-place-holder'
                        });
                        response.parentNode.insertBefore(holder, response);
                    }
                    comment.appendChild(response);
                    this.dom('cancel-comment-reply-link').style.display = '';
                    if (null != textarea && 'text' == textarea.name) {
                        textarea.focus();
                    }
                    return false;
                },
                cancelReply: function () {
                    var response = this.dom('<?php echo $this->respondId(); ?>'),
                        holder = this.dom('comment-form-place-holder'),
                        input = this.dom('comment-parent');
                    if (null != input) {
                        input.parentNode.removeChild(input);
                    }
                    if (null == holder) {
                        return true;
                    }
                    this.dom('cancel-comment-reply-link').style.display = 'none';
                    holder.parentNode.insertBefore(response, holder);
                    return false;
                }
            };
        })();
    </script>


    



      


