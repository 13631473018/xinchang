//报价
(function(){
	var $consultWrap = $(".wrap .w-main .consult-wrap");
	var $comment = $(".wrap .w-main .list .list-bottom .icon-wrap1");
	var $close = $(".wrap .w-main .consult-wrap .consult-wrapw-split-line-close");
	var $oImg = $(".wrap .w-main .consult-wrap .price-w-t .price-w-t-img");
	var $projectName = $(".wrap .w-main .consult-wrap .price-w-t>div>span.p-name");
	var $projectTime = $(".wrap .w-main .consult-wrap .price-w-t>div>span.time");
	var $editor = $(".wrap .w-main .editor");
	var $priceWrap = $(".wrap .w-main .price-wrap");
	$comment.click(function(){
		//$consultWrap.addClass("on");
		$(this).parent().parent().find(".consult-wrap").addClass("on");
		var src = $(this).parent().parent().find("img").attr("src");
		var thisName = $(this).parent().parent().find(".projectName").text();
		var thisTime = $(this).parent().parent().find(".list-top .time").text();
		$oImg.prop("src",src);
		$projectName.text( thisName );
		// $projectTime.text( thisTime );
		$editor.removeClass("on");
		$priceWrap.removeClass("on");
	});
	$close.click(function(){
		$consultWrap.removeClass("on");
	});
})();

(function(){
	var $list = $(".wrap .nav .nav-list li a");
	$list.hover(function(){
		$(this).addClass("on").parent().siblings().find("a").removeClass("on");
	});
})();
//评论编辑
(function(){
	var $priceWrap = $(".wrap .w-main .price-wrap");
	var $comment = $(".wrap .w-main .list .list-bottom .icon-wrap2");
	var $close = $(".wrap .w-main .price-wrap .price-wrap-close");
	var $oImg = $(".wrap .w-main .price-wrap .price-w-t .price-w-t-img");
	var $projectName = $(".wrap .w-main .price-wrap .price-w-t>div>span.p-name");
	var $projectTime = $(".wrap .w-main .price-wrap .price-w-t>div>span.time");
	var $input = $(".wrap .w-main .price-wrap .price-w-b-b>input");
	var $editor = $(".wrap .w-main .editor");
	var $consultWrap = $(".wrap .w-main .consult-wrap");
	var $send = $(".wrap .w-main .price-wrap .price-w-b-b>span");
	var $dialogWrap = $(".wrap .w-main .price-wrap .price-w-b-b .dialog-wrap");
	var $dialogTxt = $(".wrap .w-main .price-wrap .price-w-b-b>input");

	//点击发送按钮
	$send.click(function(){
		//$dialogTxt.val().appdendTo( $dialogWrap );
		//alert( $dialogTxt.val() );
		//alert( $dialogWrap )
		var $createDiv = $("<div style='color:#666;height:30px;text-align:right;padding-left:5px;'>"+"<span style='border:1px solid #333;background:#666;color:#fff;;display:inline-block;border-radius:3px;padding:0 4px;'>"+$dialogTxt.val()+"</span>"+"</div>");
		$(this).parent().find(".dialog-wrap").append($createDiv);
		//$dialogTxt.val("");
		//$dialogTxt.val() = "";
	});

	//点击评论按钮
	$comment.click(function(){
		//$priceWrap.addClass("on");
		$(this).parent().parent().find(".price-wrap").addClass("on");
		var src = $(this).parent().parent().find("img").attr("src");
		var thisName = $(this).parent().parent().find(".projectName").text();
		//var thisTime = $(this).parent().parent().find(".list-top .time").text();
		$oImg.prop("src",src);
		$projectName.text( thisName );
		// $projectTime.text( thisTime );
		$input.focus();
		$editor.removeClass("on");
		$consultWrap.removeClass("on");
	});
	//点击评论窗口
	$close.click(function(){
		$priceWrap.removeClass("on");
	});
	//点击编辑
	//var $editor = $(".wrap .w-main .editor");
	var $editorBtn = $(".wrap .w-main .list .list-bottom .icon-wrap3");
	var $close1 = $(".wrap .w-main .editor .price-wrap-close");
	var $oImg1 = $(".wrap .w-main .editor .eidtor-con>img");
	var $projectName1 = $(".wrap .w-main .editor .eidtor-con-change>input.p-name");
	var $projectTime1 = $(".wrap .w-main .editor .eidtor-con-change>span.time");
	var $save = $(".wrap .w-main .editor .editor-save");
	//var $priceWrap = $(".wrap .w-main .price-wrap");
	//var $consultWrap = $(".wrap .w-main .consult-wrap");
	var index = 0;
	var $list = $(".wrap .w-main .list");
	
	$list.mouseenter(function(){
		//var ThisList = $(this) ;
		//console.log( ThisList );
		$editorBtn.click(function(){
			//$editor.addClass("on");
			$(this).parent().parent().find(".editor").addClass("on");
			var src = $(this).parent().parent().find(".list-top>img").attr("src");
			var thisName = $(this).parent().parent().find(".projectName").text();
			var thisTime = $(this).parent().parent().find(".list-top .time").text();
			$oImg1.prop("src",src);
			$projectName1.val( thisName );
			// $projectTime1.text( thisTime );
			$priceWrap.removeClass("on");
			$consultWrap.removeClass("on");
			//console.log( $(this).parent().parent().eq(index) );
			//console.log( ThisList );
			$save.click(function(){
				var describe1 = $(this).parent().find("#eidtor-con-change-bj").val();
				//describe1.appdendTo(ThisList.find(""));
			})
		});
	});
	$close1.click(function(){
		$editor.removeClass("on");
	});
})();

//添加愿望清单
$(function () {
	$('input[name="add_wish_list"]').change(function () {
		$('form[name="add_wish_list"]').submit();
	});
});
