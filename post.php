<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="w3-col l9 s12">
     <div class="w3-margin-top w3-white">
        <div class="w3-white"><!--w3-border-bottom-->
        
    		<div class="w3-container w3-padding-8">
        		<div class="post-title"><?php $this->title() ?></div>
        		<div class="post-info w3-opacity">
                    <span class="ico_box">
						<svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="675"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64z m0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z" p-id="676"></path><path d="M686.7 638.6L544.1 535.5V288c0-4.4-3.6-8-8-8H488c-4.4 0-8 3.6-8 8v275.4c0 2.6 1.2 5 3.3 6.5l165.4 120.6c3.6 2.6 8.6 1.8 11.2-1.7l28.6-39c2.6-3.7 1.8-8.7-1.8-11.2z" p-id="677"></path></svg>
						<time class="text"><?php $this->date("Y-m-d"); ?></time>
					</span>
					<span class="ico_box">
						<svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1709"><path d="M464 144H160c-8.8 0-16 7.2-16 16v304c0 8.8 7.2 16 16 16h304c8.8 0 16-7.2 16-16V160c0-8.8-7.2-16-16-16z m-52 268H212V212h200v200zM864 144H560c-8.8 0-16 7.2-16 16v304c0 8.8 7.2 16 16 16h304c8.8 0 16-7.2 16-16V160c0-8.8-7.2-16-16-16z m-52 268H612V212h200v200zM464 544H160c-8.8 0-16 7.2-16 16v304c0 8.8 7.2 16 16 16h304c8.8 0 16-7.2 16-16V560c0-8.8-7.2-16-16-16z m-52 268H212V612h200v200zM864 544H560c-8.8 0-16 7.2-16 16v304c0 8.8 7.2 16 16 16h304c8.8 0 16-7.2 16-16V560c0-8.8-7.2-16-16-16z m-52 268H612V612h200v200z" p-id="1710"></path></svg>
                        <span class="text"><?php $this->category(','); ?> </span>
					</span>
					<span class="ico_box">
						<svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="888"><path d="M942.2 486.2C847.4 286.5 704.1 186 512 186c-192.2 0-335.4 100.5-430.2 300.3-7.7 16.2-7.7 35.2 0 51.5C176.6 737.5 319.9 838 512 838c192.2 0 335.4-100.5 430.2-300.3 7.7-16.2 7.7-35 0-51.5zM512 766c-161.3 0-279.4-81.8-362.7-254C232.6 339.8 350.7 258 512 258c161.3 0 279.4 81.8 362.7 254C791.5 684.2 673.4 766 512 766zM508 336c-97.2 0-176 78.8-176 176s78.8 176 176 176 176-78.8 176-176-78.8-176-176-176z m0 288c-61.9 0-112-50.1-112-112s50.1-112 112-112 112 50.1 112 112-50.1 112-112 112z" p-id="889"></path></svg>
						<span class="text"><?php _e(getViewsStr($this));?> </span>
					</span>
				</div>
    		</div>
            <div class="w3-container article">
                <?php _e(showcontent($this->content,$this->user->hasLogin(),$this->cid,$this->user->mail));?>
            </div>
        </div>

        


        

        <?php $this->need('comments.php'); ?>
	</div>
</div>
<div class="w3-col l3 w3-hide-medium w3-hide-small sidebar">


<?php $iforiginal = $this->fields->iforiginal; if(!$iforiginal): ?>
    <div class="w3-margin w3-margin-top post-author w3-white">
        <div class="w3-center avatart">
            <?php if (!empty($this->options->ot_set_ckbbtn) && in_array('site_avatar', $this->options->ot_set_ckbbtn)): ?>
							<img src="https://q.qlogo.cn/g?b=qq&nk=<?php $this->author->mail();?>&s=100" alt="<?php $this->author(); ?>" width="60" height="60">
						<?php else: ?>
							<?php echo $this->author->gravatar(60);?>
						<?php endif; ?>
            <p class="title w3-hover-opacity"><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a></p>
            <p class="w3-center c_p">本文由 <?php $this->author(); ?> 创作，版权所有</p>
            <p class="w3-center c_p">转载前请联系作者</p>

        </div>
    </div>
<?php endif; ?>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
