
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
	var $addBtn = $(".content .content-add");
	var $add = $(".content .con-need-add");
	var $addClose = $(".content .con-need-add .con-need-add-close");
	var $save = $(".box .content .con-need-add .add-submit");
	var $saveSuccess = $(".box .content .con-keepSuccess");
	var $savaSuccessEnter = $(".box .content .con-keepSuccess>span");
	var $ediHide = $(".box .content .con-need .con-edi-hide");
	var $ediBtn = $(".box .content .con-need .con-edi");
	var $ediSave = $(".box .content .con-need .con-edi-hide .add-submit");
	var $ediDel = $(".box .content .con-need .con-del");
	var $ediClose =$(".box .content .con-need .con-edi-hide .close");
	//增加项目
	$addBtn.click(function(){
		$add.css("transform","scale(1)");
	});
	//关闭项目
	$addClose.click(function(){
		$add.css("transform","scale(0)");
	});
	//保存项目
	$save.click(function(){
		$add.css("transform","scale(0)");
	});
	//编辑当前项目
	$ediBtn.click(function(){
		$(this).parent().find(".con-edi-hide").css("display","block");
	});
	//保存当前项目
	$ediSave.click(function(){
		$ediHide.css("display","none");
	});
	//删除当前项目
	$ediDel.click(function(){
		$(this).parent().remove();
	});
	//关闭当前项目
	$ediClose.click(function(){
		$ediHide.css("display","none");
	});
	// $savaSuccessEnter.click(function(){
	// 	$saveSuccess.css("transform","scale(0)")
	// });
})();