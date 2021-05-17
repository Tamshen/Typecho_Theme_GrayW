<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;error_reporting(E_ALL^E_NOTICE); ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="<?php $this->options->charset(); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--<meta name="referrer" content="never"> -->
<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
<?php $this->header(); ?>
<!-- CSS -->
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/w3.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/viewer.min.css'); ?>">
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/tamshen.css?v=1.1'); ?>">
<link href="<?php $this->options->icoUrl() ?>" mce_href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>
<body class="w3-light-grey">
    <nav class="w3-sidenav w3-black w3-card-2 w3-animate-top w3-center w3-xxlarge" style="display:none;padding-top:25%;width: 100%;">
        <a href="javascript:void(0)" onclick="nav_close()" class="w3-closenav w3-jumbo w3-right w3-display-topright w3-padding-xxlarge">×</a>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
        <a class="w3-text-grey w3-hover-black" href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
        <?php endwhile; ?>                     
    </nav>
    <!-- Header -->
    <header class="w3-white" >
        <div class="w3-content tsw">
            <div class="w3-row">
                <div class="w3-col" style="width:150px">
                    <div class="w3-hover-opacity" title="<?php $this->options->title(); ?>">
                      <a class="logol" href="<?php $this->options->siteUrl(); ?>">
                      	<?php if ($this->options->logoUrl): ?>
                          	<img height="66px" src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
            			<?php else: ?>
                        	<img height="66px" src="<?php $this->options->themeUrl(); ?>img/logo.png" />
            			<?php endif; ?>
                        </a>
                    </div>
                </div>
                <div class=" w3-right w3-padding-right">
                    <div class="w3-right w3-margin w3-hide-large w3-hover-opacity">
                        <span class="w3-opennav w3-xxlarge" onclick="nav_open()">&#9776;</span>
                    </div>
                    <div class="w3-section w3-hide-medium w3-hide-small">
                        <?php 
                        //单链接
                        if ($this->options->memuqadd){
                            $memuqaddarr = json_decode($this->options->memuqadd, true);
                            foreach($memuqaddarr as $value)
                            { 
                              if($link[2]){
                                      $linklink = $link[1];
                                      $linkc = 'target="_blank"';
                                    }else{
                                      $linklink = $link[1];
                                      $linkc = '';
                                    }
                              
                                if($value[2]){
                                  $linklink = $value[1];
                                  $linkc = 'target="_blank"';
                                }else{
                                  $linklink = $value[1];
                                  $linkc = '';
                                }
                                echo '<a class="w3-btn w3-white" '.$linkc.' href="'.$linklink.'">'.$value[0].'</a>';
                                $linkc = '';
                            }
                        }?>
                        <?php if (!empty($this->options->memunav) && in_array('Showyemian', $this->options->memunav)): ?>
                        <div class="w3-dropdown-hover">
                            <button class="w3-btn w3-white">页面 <span style="font-size:.5rem;padding-left:10px">▼</span></button>
                            <div class="w3-dropdown-content w3-border menu_link">
                                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                                <?php while($pages->next()): ?>
                                <a  href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (!empty($this->options->memunav) && in_array('Showfenlei', $this->options->memunav)): ?>
                        <div class="w3-dropdown-hover">
                            <button class="w3-btn w3-white">分类 <span style="font-size:.5rem;padding-left:10px">▼</span></button>
                            <div class="w3-dropdown-content w3-border menu_link">
                            <?php $this->widget('Widget_Metas_Category_List')->parse('<a  href="{permalink}" title="{name}">{name}({count})</a>'); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (!empty($this->options->memunav) && in_array('Showguidang', $this->options->memunav)): ?>
                        <div class="w3-dropdown-hover">
                            <button class="w3-btn w3-white">归档 <span style="font-size:.5rem;padding-left:10px">▼</span></button>
                            <div class="w3-dropdown-content w3-border menu_link">
                            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y年m月')->parse('<a href="{permalink}">{date}</a>'); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php 
                        //多级链接
                        if ($this->options->memuhadd){
                            $memuhaddarr = json_decode($this->options->memuhadd, true);
                            //print_r($memuhaddarr);
                            foreach($memuhaddarr as $value)
                            { 
                                echo '<div class="w3-dropdown-hover"><button class="w3-btn w3-white">';
                                echo $value[0][0];
                                echo ' <span style="font-size:.5rem;padding-left:10px">▼</span></button><div class="w3-dropdown-content w3-border menu_link">';
                                foreach($value[1] as $link)
                                {
                                    if($link[2]){
                                      $linklink = $link[1];
                                      $linkc = 'target="_blank"';
                                    }else{
                                      $linklink = $this->options->siteUrl.$link[1];
                                      $linkc = '';
                                    }
                                    echo '<a href="'.$linklink.'" '.$linkc.'>'.$link[0].'</a>';
                                    //重置
                                    $linkc = '';
                                }
                                echo '</div></div>';
                            }
                        }?>
                        <?php if($this->user->hasLogin()): ?>
						<a class="w3-btn w3-white" target="_blank" href="<?php $this->options->adminUrl(); ?>"><?php _e('管理员：'); ?><?php $this->user->screenName(); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="w3-content tsw">
        <!-- Grid -->
        <div class="w3-row">
            <!-- Blog entries -->
           