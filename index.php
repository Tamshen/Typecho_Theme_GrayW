<?php
/**
 * GrayW
 * 
 * @package GrayW Theme 
 * @author TAMSHEN
 * @version 1.0
 * @link http://tamshen.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<div class="w3-col l9 s12">
     <div class="w3-margin-top w3-white">
		<?php while($this->next()): ?>
		<div class="w3-white">
			<?php $diythumb = $this->fields->diythumb; if($diythumb == 'no') : ?>
			<?php else : ?>
				<img src="<?php echo showThumb($this,true); ?>" alt="<?php $this->title() ?>" style="width:100%">
			<?php endif ; ?>
    		<div class="w3-container w3-padding-8">
        		<h3><b><?php $this->title() ?></b></h3>
				<div class="post-info">
					<span class="author">
						<?php $iforiginal = $this->fields->iforiginal; if(!$iforiginal): ?>
						<?php echo $this->author->gravatar(22);?><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
						<?php else : ?>
						
						<span class="w3-opacity ico_box">
							<svg t="1557023615706" class="icon" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6897"><path d="M514.512 582.128c-142.848 0-259.064-116.216-259.064-259.064S371.664 64 514.512 64s259.064 116.216 259.064 259.064c0 142.84-116.216 259.064-259.064 259.064z m0-466.928c-114.616 0-207.864 93.248-207.864 207.856 0 114.616 93.248 207.848 207.864 207.848s207.864-93.224 207.864-207.84S629.144 115.2 514.512 115.2zM316.088 552.44a11.704 11.704 0 0 0-0.592 0.36 305.192 305.192 0 0 0 46.456 33.232l0.72-0.368a304.92 304.92 0 0 1-46.584-33.224zM666.36 585.664c0.232 0.12 0.488 0.24 0.72 0.368a307.264 307.264 0 0 0 46.456-33.232 11.52 11.52 0 0 0-0.584-0.36 305.784 305.784 0 0 1-46.592 33.224z" fill="#000000" p-id="6898"></path><path d="M754.984 580a403.256 403.256 0 0 0-41.456-27.2 304.864 304.864 0 0 1-46.464 33.232 350.304 350.304 0 0 1 46.64 27.232c91.824 63.44 152.12 170.16 152.12 289.952 0 2.672-0.152 0.784-0.2 8.784H163.408c-0.056-8-0.2-6.112-0.2-8.784 0-119.8 60.304-226.128 152.112-289.56 14.776-10.2 30.344-19.544 46.64-27.44a305.616 305.616 0 0 1-46.456-33.328 399.832 399.832 0 0 0-41.456 27.16C175.776 653.504 112 770.616 112 902.472c0 2.672 0.152 6.096 0.2 8.768a421.68 421.68 0 0 0 3.776 48.776h797.064c2.192-16 3.464-32.52 3.792-48.792 0.048-2.672 0.192-5.704 0.192-8.392 0.008-131.848-63.776-249.376-162.04-322.832z" fill="#000000" p-id="6899"></path><path d="M514.512 582.128c142.848 0 259.064-116.224 259.064-259.064C773.576 180.216 657.36 64 514.512 64S255.448 180.216 255.448 323.064s116.216 259.064 259.064 259.064z m0-466.928c114.632 0 207.864 93.248 207.864 207.864s-93.248 207.84-207.864 207.84-207.864-93.232-207.864-207.848c0-114.608 93.248-207.856 207.864-207.856z" fill="#000000" p-id="6900"></path></svg>
							<span class="text"><?php $this->fields->iforiginal(); ?></span>
						</span>

						<?php endif; ?>
					</span>
					<span class="w3-opacity ico_box">
						<svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="675"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64z m0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z" p-id="676"></path><path d="M686.7 638.6L544.1 535.5V288c0-4.4-3.6-8-8-8H488c-4.4 0-8 3.6-8 8v275.4c0 2.6 1.2 5 3.3 6.5l165.4 120.6c3.6 2.6 8.6 1.8 11.2-1.7l28.6-39c2.6-3.7 1.8-8.7-1.8-11.2z" p-id="677"></path></svg>
						<time class="text"><?php $this->date("Y-m-d"); ?></time>
					</span>
					<span class="views w3-opacity">
						<span class="ico_box">
						<svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="888"><path d="M942.2 486.2C847.4 286.5 704.1 186 512 186c-192.2 0-335.4 100.5-430.2 300.3-7.7 16.2-7.7 35.2 0 51.5C176.6 737.5 319.9 838 512 838c192.2 0 335.4-100.5 430.2-300.3 7.7-16.2 7.7-35 0-51.5zM512 766c-161.3 0-279.4-81.8-362.7-254C232.6 339.8 350.7 258 512 258c161.3 0 279.4 81.8 362.7 254C791.5 684.2 673.4 766 512 766zM508 336c-97.2 0-176 78.8-176 176s78.8 176 176 176 176-78.8 176-176-78.8-176-176-176z m0 288c-61.9 0-112-50.1-112-112s50.1-112 112-112 112 50.1 112 112-50.1 112-112 112z" p-id="889"></path></svg>
						<span class="text"><?php _e(getViewsStr($this));?> </span>
						</span>
					</span>

					<a href="<?php $this->permalink() ?>#comments">
						<span class="ico_box  w3-opacity">		
							<svg class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6327"><path d="M573 421c-23.1 0-41 17.9-41 40s17.9 40 41 40c21.1 0 39-17.9 39-40s-17.9-40-39-40zM293 421c-23.1 0-41 17.9-41 40s17.9 40 41 40c21.1 0 39-17.9 39-40s-17.9-40-39-40zM894 345c-48.1-66-115.3-110.1-189-130v0.1c-17.1-19-36.4-36.5-58-52.1-163.7-119-393.5-82.7-513 81-96.3 133-92.2 311.9 6 439l0.8 132.6c0 3.2 0.5 6.4 1.5 9.4 5.3 16.9 23.3 26.2 40.1 20.9L309 806c33.5 11.9 68.1 18.7 102.5 20.6l-0.5 0.4c89.1 64.9 205.9 84.4 313 49l127.1 41.4c3.2 1 6.5 1.6 9.9 1.6 17.7 0 32-14.3 32-32V753c88.1-119.6 90.4-284.9 1-408zM323 735l-12-5-99 31-1-104-8-9c-84.6-103.2-90.2-251.9-11-361 96.4-132.2 281.2-161.4 413-66 132.2 96.1 161.5 280.6 66 412-80.1 109.9-223.5 150.5-348 102z m505-17l-8 10 1 104-98-33-12 5c-56 20.8-115.7 22.5-171 7l-0.2-0.1C613.7 788.2 680.7 742.2 729 676c76.4-105.3 88.8-237.6 44.4-350.4l0.6 0.4c23 16.5 44.1 37.1 62 62 72.6 99.6 68.5 235.2-8 330zM433 421c-23.1 0-41 17.9-41 40s17.9 40 41 40c21.1 0 39-17.9 39-40s-17.9-40-39-40z" p-id="6328"></path></svg>
							<span class="text"><?php $this->commentsNum('%d'); ?></span>
						</span>
					</a>
				</div>
    		</div>
            <div class="w3-container">
                <div class="article post-list"><?php $this->content(); ?></div>
                <div class="w3-row">
                    <div class="w3-col m8 s12">
                        <p><a class="w3-btn w3-padding-large w3-white w3-border w3-hover-border-black" href="<?php $this->permalink() ?>">READ MORE »</a></p>
                    </div>
                </div>
            </div>
        </div><hr>
		<?php endwhile; ?>
		<div class="w3-center w3-padding-jumbo">
    		<ul class="w3-pagination">
				<li><?php $this->pageLink('<x aria-label="Previous" >«</x>'); ?></li>
				<li><a><?php if($this->_currentPage>1) echo $this->_currentPage;  else echo 1;?> / <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?></a></li>
				<li><?php $this->pageLink('<x aria-label="Next" >»</x>','next'); ?></li>
    		</ul>
		</div>
	</div>
</div>

<?php echo '<div class="w3-col l3 w3-hide-medium w3-hide-small sidebar">'; $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
