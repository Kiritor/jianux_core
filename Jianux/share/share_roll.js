/*
	
	author	:	eliteYang
	website	:	http://www.cppfans.org
	desc	:	baidu share tool bar
	date	:	2012/10/20
	Desc	:	百度分享工具条滚动后修改CSS style
	license	:	请尊重原创者,允许转载和修改,但需要保留链接,谢谢合作,祝大家使用愉快,如有疑问,请至 C++爱好者博客(www.cppfans.org) 交流讨论
	
*/
var IO=document.getElementById('share_toolbar_wrapper'),Y=IO,H=0,IE6;
IE6=window.ActiveXObject&&!window.XMLHttpRequest;
while(Y){H+=Y.offsetTop;Y=Y.offsetParent};
if(IE6)
    IO.style.cssText="position:absolute;top:expression(this.fix?(document"+
        ".documentElement.scrollTop-(this.javascript||"+H+")):0)";

window.onscroll=function (){
    var d=document,s=Math.max(d.documentElement.scrollTop,document.body.scrollTop);
    if(s>H&&IO.fix||s<=H&&!IO.fix)return;
    if(!IE6){IO.style.position=IO.fix?"":"fixed";IO.style.top="0px";}        
    IO.fix=!IO.fix;
};

try{document.execCommand("BackgroundImageCache",false,true)}catch(e){};
 //]]>