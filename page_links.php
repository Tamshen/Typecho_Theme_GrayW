<?php
/**
 * LINKS
 *
 * @package custom
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>


<!-- Container -->
<div class="w3-container w3-padding-64 w3-center">
<h2><?php $this->title() ?></h2> 
<p><?php $this->content(); ?></p>
        
<div class="w3-row"><br>

<?php 
if($this->fields->links){
    $links = explode("\r\n", $this->fields->links);
    foreach( $links as $val ) {
        $Data = explode('$', $val );
        
        echo '
        <div class="w3-quarter">
            <a href="'.$Data["2"].'" target="_blank" title="'.$Data["0"].' - '.$Data["1"].'">
            <img src="'.$Data["3"].'" alt="'.$Data["0"].'" style="width:45%" class="w3-circle w3-hover-opacity">
            <h3>'.$Data["0"].'</h3>
            <p>'.$Data["1"].'</p>
            </a>
        </div>
        ';
    }
} ?>  
</div>

</div>

</div></div>
<div class="w3-container w3-white w3-padding-jumbo w3-margin-top">
    <div class="w3-content tsw">
<?php $this->need('comments.php'); ?>

<?php $this->need('footer.php'); ?>