<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;


function themeConfig($form) {
    echo '
    <style>
    h3{
        border-left: 4px solid #282828;
        padding-left:6px;
        margin-left:-12px;
    }
    hr{
        border: 0;
    border-bottom: 1px dashed #cfcfcf;
    margin: 30px 0;
    }
    .ts_box{
        display:none;
        background:#e6efc2;
        padding:10px;
    }
    .ts_box .ts_a{
        background:#282828;
        border-radius: 2px;
        color: #FFF;
        padding: 2px 5px;
    }
    .ts_a{
        cursor: pointer;
        font-weight: normal;
        font-szie:0.9rem;
    }
    .ts_box pre{
        font-size: 12px;
        border: 1px dashed #467b96;
    }
    </style>
    <script>
    function showhide(id){
        var btn = document.getElementById(id);
        var box = document.getElementById(id + "_box");
        if(btn.innerHTML.indexOf("显示") != -1){
            btn.innerHTML="隐藏说明";
            box.style.display = "block";
        }else{
            btn.innerHTML="显示说明";
            box.style.display = "none";
        }
        //console.log(box);
    }
    </script>
    <h2>GrayW 主题设置  <a href="https://github.com/Tamshen" target="_blank">TAMSHEN</a></h2>
    

    

    
    
    ';
    $icoUrl = new Typecho_Widget_Helper_Form_Element_Text('icoUrl', NULL, NULL, _t('<hr><h3>站点设置</h3>站点-ICO'), _t('在这里填入一个图片 URL 地址'));
    $form->addInput($icoUrl);
  
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点-LOGO'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);

    //菜单设置
    $memuqadd= new Typecho_Widget_Helper_Form_Element_Text('memuqadd', NULL, NULL, _t('<h3>菜单设置</h3>菜单前面链接 - <span class="ts_a" onclick="showhide(\'memuqadd\')" id="memuqadd">显示说明</span>'), _t('
    链接格式参见说明
    <div class="ts_box" id="memuqadd_box">
    链接数据均为Json，可在下面编辑好复制上去！推荐复制到<a href="https://www.bejson.com/jsoneditoronline/"> Json工具 </a>编辑
    <pre contenteditable="true">
    [
        [
            "分类1链接名字1",
            "链接1",
            "新窗口参数"
        ],
        [
            "分类2链接名字2",
            "链接2"
        ]
    ]
    </pre>
    <span class="ts_a" onclick="showhide(\'memuqadd\')">隐藏说明</span>
    </div>
    
    
    '));
    $form->addInput($memuqadd);
    $memunav = new Typecho_Widget_Helper_Form_Element_Checkbox('memunav', 
    array(
    'Showyemian' => _t('显示页面'),
    'Showfenlei' => _t('显示分类'),
    'Showguidang' => _t('显示归档')),
    array('Showyemian', 'Showfenlei', 'Showguidang'), _t('菜单设置'));
    $form->addInput($memunav->multiMode());
    $memuhadd= new Typecho_Widget_Helper_Form_Element_Text('memuhadd', NULL, NULL, _t('菜单后面多级链接 - <span class="ts_a" onclick="showhide(\'memuhnav\')" id="memuhnav">显示说明</span>'), _t('  
        链接格式参见说明
    
    <div class="ts_box" id="memuhnav_box">
    多级链接数据均为Json，可在下面编辑好复制上去！推荐复制到<a href="https://www.bejson.com/jsoneditoronline/"> Json工具 </a>编辑
    <pre contenteditable="true">
[
    [
        [
            "分类1名字"
        ],
        [
            [
                "分类1链接名字1",
                "链接1",
                "新窗口参数"
            ],
            [
                "分类1链接名字2",
                "链接2",
                "新窗口参数"
            ]
        ]
    ],
    [
        [
            "分类2名字"
        ],
        [
            [
                "分类2链接名字1",
                "链接3"
            ]
        ]
    ]
]
        </pre>
        <span class="ts_a" onclick="showhide(\'memuhnav\')">隐藏说明</span>
        </div>
    '));
    $form->addInput($memuhadd);


    //侧边栏
  	$sidebar_imgUrl = new Typecho_Widget_Helper_Form_Element_Text('sidebar_imgUrl', NULL, NULL, _t('<h3>侧边栏设置</h3>侧边栏-图片'), _t('在这里填入一个图片 URL 地址'));
    $form->addInput($sidebar_imgUrl);

  	$sidebar_title = new Typecho_Widget_Helper_Form_Element_Text('sidebar_title', NULL, NULL, _t('侧边栏-小标题'), _t('Title'));
    $form->addInput($sidebar_title);
  
  	$sidebar_des = new Typecho_Widget_Helper_Form_Element_Text('sidebar_des', NULL, NULL, _t('侧边栏-介绍'), _t('介绍'));
    $form->addInput($sidebar_des);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array(
    'ShowOther' => _t('显示其它'),
    'ShowRecentComments' => _t('显示最新评论'),
    'Showcategories' => _t('显示分类'),
    'Showtags' => _t('显示标签')),
    array('ShowRecentComments', 'Showtags', 'ShowOther', 'Showcategories'), _t('侧边栏-小组件'));
    $form->addInput($sidebarBlock->multiMode());

    




    
}


function themeFields($layout) {
    //自定义略缩图
    $diythumb = new Typecho_Widget_Helper_Form_Element_Text('diythumb', NULL, NULL, _t('自定义缩略图'), _t('<style> input[type=text]{width: 100%;}   </style>输入缩略图地址，输入no（小写）为不显示略缩图(仅文章有效)'));
    $layout->addItem($diythumb);
    //是否原创
    $iforiginal = new Typecho_Widget_Helper_Form_Element_Text('iforiginal', NULL, NULL, _t('是否原创'), _t('填写此项后侧边栏不会显示作者！'));
    $layout->addItem($iforiginal);
    //浏览数
    $views = new Typecho_Widget_Helper_Form_Element_Text('views', NULL, NULL, _t('浏览数'), _t('请填写数字！'));
    $layout->addItem($views);

}



/**
 * Typecho
 * 回复可见、登陆可看文章简介rss输出
 * */
Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('blockdes','one');
Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('blockdes','one');
class blockdes {
    public static function one($con,$obj,$text)
    {
      $text = empty($text)?$con:$text;
      if(!$obj->is('single')){
        //截断登陆可看
        $text = preg_replace("/\[Forlogin\](.*?)\[\/Forlogin\]/sm",'',$text);
        //截断回复可看
        $text = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'',$text);
      }
      return $text;
    }
}

/**
 * 缩略图调用
 * 优先级：自定义图片>附件图片>文章图片>随机图片
 * 自定义图片字段：diythumb
 * 输入no为不显示
 */
function showThumb($obj,$link=false){
    preg_match_all( "/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $obj->content, $matches );
    $thumb = '';
    $options = Typecho_Widget::widget('Widget_Options');
    $attach = $obj->attachments(1)->attachment; 
    if (strlen($obj->fields->diythumb) > 2){
        $thumb = $obj->fields->diythumb;    //自定义图片
    }elseif(isset($attach->isImage) && $attach->isImage == 1){
        $thumb = $attach->url;              //附件是图片 输出附件
    }elseif(isset($matches[1][0])){
        $thumb = $matches[1][0];            //文章内容中抓到了图片 输出链接
    }
    //空的话输出默认随机图
    $thumb = empty($thumb) ? $options->themeUrl.'/img/'.rand(1, 5).'.jpg' : $thumb;
    if($link){
      	//微博图片处理
        $thumb = preg_replace("/\t|ws[1-9].sinaimg.cn/","tvax1.sinaimg.cn",$thumb);
        $thumb = preg_replace("/\t|wx[1-9].sinaimg.cn/","tvax1.sinaimg.cn",$thumb);
        return $thumb;//$thumb
      	 
    }
	else{
		$thumb='<img src="'.$thumb.'">';
		return $thumb;
	}
}


//获取评论的锚点链接
function get_comment_at($coid)
{
    $db = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')
        ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')
            ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href = '<a href="#comment-' . $parent . '">@' . $author . '</a>';
        echo $href;
    } else {
        echo '';
    }
}

//输出评论内容
function get_filtered_comment($coid)
{
    $db = Typecho_Db::get();
    $rs = $db->fetchRow($db->select('text')->from('table.comments')
        ->where('coid = ? AND status = ?', $coid, 'approved'));
    $content = $rs['text'];
    echo $content;
}

/*
 * 获取浏览次数
 */
function getViewsStr($widget, $format = "{views}") {
    $fields = unserialize($widget->fields);
    if (array_key_exists('views', $fields))
        $views = (!empty($fields['views'])) ? intval($fields['views']) : 0;
    else
        $views = 0;
    //增加浏览次数
    if ($widget->is('single')) {
        $vieweds = Typecho_Cookie::get('contents_viewed');
        if (empty($vieweds))
            $vieweds = array();
        else
            $vieweds = explode(',', $vieweds);
        if (!in_array($widget->cid, $vieweds)) {
            $views = $views + 1;
            $widget->setField('views', 'str', strval($views), $widget->cid);
            $vieweds[] = $widget->cid;
            $vieweds = implode(',', $vieweds);
            Typecho_Cookie::set("contents_viewed",$vieweds);
        }
    }
    return str_replace("{views}", $views, $format);
}




