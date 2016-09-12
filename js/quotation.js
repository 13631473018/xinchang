
/*二级导航滑动显示*/
(function(){
	var $navLi = $(".wrap .nav .nav-list li");
	var $navListSub = $(".wrap .nav .nav-list .nav-list-sub");

	$navLi.mouseenter(function(){
		$(this).find(".nav-list-sub").css("display","block").parent().siblings().find(".nav-list-sub").css("display","none");	
		//alert(1);
	});
	$navLi.mouseleave(function(){
		$(this).find(".nav-list-sub").css("display","none");
		//alert(1);
	});
})();
//点击弹窗
(function(){
	var $addBtn = $(".content-add");
	var $add = $(".con-need-add");
	var $addClose = $(" .con-need-add .con-need-add-close");
	var $save = $(".con-need-add .add-submit");
	var $ediHide = $(".con-edi-hide");
	var $ediBtn = $(".con-need .con-edi");
	var $ediSave = $(".con-edi-hide .add-submit");
	var $ediClose =$(".con-edi-hide .close");
	var $ediFullScreen = $(".edi-fullScreen");
	var $addFullScreen = $(".add-fullScreen");
	var $wrapHeight = $(".wrap").height();
	var $box = $(".box").height();
	//alert( typeof $wrapHeight );
	//alert( typeof $box );
	//增加项目
	$addBtn.click(function(){
		$addFullScreen.css({
			height : $box+$wrapHeight,
			display : "block"
		});
		//$add.css("display","block");
		$add.css("transform","scale(1)");
		//$(this).parent().find(".con-need-add").css("transform","scale(1)");
		//$(this).parent().find(".con-need-add").css("display","block");
	});
	//关闭项目
	$addClose.click(function(){
		$add.css("transform","scale(0)");
		$addFullScreen.css({
			display : "none"
		});
	});
	//保存项目
	$save.click(function(){
		$add.css("transform","scale(0)");
		$addFullScreen.css({
			display : "none"
		});
	});
	//编辑当前项目
	$ediBtn.click(function(){
		$ediFullScreen.css({
			height : $box+$wrapHeight,
			display : "block"
		});
		$(this).parent().find(".con-edi-hide").css("display","block");
		//$(this).parent().attr("className")
		console.log(1)
		//alert($ediFullScreen)
	});
	//保存当前项目
	$ediSave.click(function(){
		$ediHide.css("display","none");
		$ediFullScreen.css({
			display : "none"
		});
	});
	//删除当前项目
	// $ediDel.click(function(){
	// 	$(this).parent().remove();
	// });
	//关闭当前项目
	$ediClose.click(function(){
		$ediHide.css("display","none");
		$ediFullScreen.css({
			display : "none"
		});
	});
	// $savaSuccessEnter.click(function(){
	// 	$saveSuccess.css("transform","scale(0)")
	// });
})();