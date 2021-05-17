//手机菜单
function nav_open() {
    document.getElementsByClassName("w3-sidenav")[0].style.display = "block";
}
function nav_close() {
    document.getElementsByClassName("w3-sidenav")[0].style.display = "none";
}
//评论显示隐藏
function ckpl() {
  	$('#btn_kpl').hide();
  	$('#comments').show();
}
//隐藏显示
function cr(str){
	var crmb=document.getElementById(str);
	if(crmb.style.display=="none"){
	crmb.style.display="";
	}else{
	crmb.style.display="none";
	}
}
//插入表情
function addbq(str){
    var obj = document.getElementById("textarea");
     if (document.selection) {  
           var sel = document.selection.createRange();  
           sel.text = str;  
       } else if (typeof obj.selectionStart === 'number' && typeof obj.selectionEnd === 'number') {  
           var startPos = obj.selectionStart;  
           var    endPos = obj.selectionEnd;  
           var    cursorPos = startPos;  
           var    tmpStr = obj.value;  
           obj.value = tmpStr.substring(0, startPos) + str + tmpStr.substring(endPos, tmpStr.length);  
           cursorPos += str.length;  
           obj.selectionStart = obj.selectionEnd = cursorPos;  
       } else {  
           obj.value += str;  
       }  
}
//gotop
$('.goTop').click(function(){
    $(".goTop").hide();
    $('html ,body').animate({scrollTop: 0}, 300);
    return false;
});
//控制台输出
function clog(text){
    console.log('\n' + text + '\n', 'color: #ffffff; background: #282828; padding:5px 0;', 'background:#d6dbdf;color:#282828; padding:5px 0;')
}



//页面加载完毕
$(document).ready(function(){ 
    //图片懒加载
    $(".article img").lazyload({threshold: 100,effect: "fadeIn"});
  	//滚动检测
    var p=0,t=0;
    $(window).scroll(function(e){ 
        p = $(this).scrollTop();
        //返回顶部按钮
        if(p>100){
            $(".goTop").show();
        }else{
            $(".goTop").hide();
        }
        //顶部滚动的玩意
        $('.progress').width(p/($(document).height() - $(window).height())*100 + '%');
        if(p>=0){
            $('.browse_progress').show();
        }else{
            $('.browse_progress').hide();
        }
    });
    //图片放大查看
    $('.article img').viewer({
        url: 'data-original',
        toolbar: false,
        navbar: false
    });
  	//检测是否有评论函数
	if(window.location.hash.indexOf("#comment") > -1){
    	ckpl();
	} 
  	//----
  	//按需加载
  	//----
  	//代码高亮
  	if($('pre').html()){
      	$.getScript("//lib.baomitu.com/highlight.js/9.15.6/highlight.min.js", function () {
          	hljs.initHighlightingOnLoad();
        	clog('%c Highlight %c 代码高亮 ')
    	});
    }
    //表格自适应
    if($("table").html()){
    	$("table").wrap("<div style='overflow-x: auto;'></div>");
	}
  	
}); 