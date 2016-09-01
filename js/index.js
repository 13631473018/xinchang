
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

/*active内容折叠*/
(function(){
	var index = 0;
	var $titleIcon = $(".wrap .main .main-project-title i")
	var  $listWrap= $(".wrap .main  .main-project-list-wrap");
	var newDate = new Date();
	$titleIcon.click(function(){
		if(new Date()-newDate>500)
		{
			var index1 = 0;
			newDate = new Date();
			index+=180;
			index==180?index = 180 : index=0;
			$listWrap.slideToggle();
			$(this).css({transform:"rotate("+index+"deg)",transition:"all .5s"});
		}	
	})
})();

/*Task 折叠*/
(function(){
	var $open  = $(".wrap .management .management-l .management-l-m .Task .Task-wrap>i");
	var $taskHide  = $(".wrap .management .management-l .management-l-m .Task .Task-hide");
	var newDate = new Date();
	$open.click(function(){
		if(new Date()-newDate>500)
		{
			newDate = new Date();
			$(this).parent().parent().find(".Task-hide").slideToggle();
			//$(this).css({transform:"rotate("+index1+"deg)",transition:"all .5s"});
			//alert( $(this).css("transform") );
		}	
	})
})();

//more点击滑动
(function(){
	var $more = $(".wrap .main .main-project .list #more1");
	var $main = $(".wrap .main");
	var $back = $(".wrap .management .back");
	$more.click(function(){
		$main.css({marginLeft:"-980px",transition:"all .5s"});
	});
	$back.click(function(){
		$main.css({marginLeft:"0px",transition:"all .5s"});
	});
})();

//聊天系统
(function(){
	var $send = $(".wrap .management .management-r .management-r-m .send");
	var $content = $(".wrap .management .management-r .management-r-m .main-right-bottom .m-r-b-content");
	var $contentH = $content.height();
	var index = 0;
	var index1 = 0;
	var h = 0;
	var $comment = $(".wrap .management .management-l .management-l-m .Task .Task-hide .img-wrap .comment");
	var $commentHide = $(".wrap .management .management-r .management-r-m, .wrap .management .management-r .management-r-m1");
	var $commentShow = $(".wrap .management .management-r .management-r-m, .wrap .management .management-r .management-r-m");
	var $close = $(".wrap .management .management-r .management-r-m .main-right-bottom .m-r-b-top .close");
	var $send = $(".wrap .management .management-r .management-r-m .send");
	var $txt = $(".wrap .management .management-r .management-r-m .m-r-b-bottom .txt");
	var $management = $(".wrap .management");
	//alert( $commentShow.css("display") == "none" );



	//点击评论
	$comment.click(function(){
		$commentHide.css("display","none");
		$commentShow.css("display","block");
		$txt.focus();

	});
	$close.click(function(){
		$commentHide.css("display","block");
		$commentShow.css("display","none");
	});
	//alert($contentH);
	//alert($content.width());
	
	
	$send.click(function(){
		if( !$txt.val() )
		{
			alert( "抱歉，请输入内容" );
			$txt.focus();
		}
		else
		{
			send();
		}
	});
	 $(document).keydown(function(e){
	 	var chatShow = ($commentShow.css("display") == "block");
	 	//alert( chatShow );
		if(e.which == 13 && chatShow == true)
		{
			if( !$txt.val() )
			{
				alert( "抱歉，请输入内容" );
				$txt.focus();
			}
			else
			{
				send();
			}
		}
	});
	function send(){
		index1++;
		//alert($txt.val());
		var $createDiv = $("<div style='color:#666;height:30px;text-align:right;padding-right:5px;'>"+"<span style='border:1px solid #333;background:#666;color:#fff;;display:inline-block;border-radius:3px;padding:0 4px;'>"+$txt.val()+"</span>"+"</div>");
		//alert($createDiv.height());
		$txt.val("");
		var nullDiv = $("<div style=';width:100%;'></div>");
		
		
		nullDiv.css("height",$contentH-$createDiv.height()*index1+"px");
		nullDiv.attr("class","nullDiv");
		//alert(nullDiv.height());
		var $nullDiv = $(".wrap .management .management-r .management-r-m .main-right-bottom .m-r-b-content .nullDiv");
		if($nullDiv)
		{
			$nullDiv.remove();
			$content.prepend(nullDiv);
		}
		$content.append($createDiv);
		if($nullDiv.height()<=0){
			$content.css("height","84%");
			h+=30;
		}
		//alert($content.height());
		$content.scrollTop(h);
		$txt.focus();
		//alert($contentH);
		//alert($creatediv.height());
		//creatediv.css("bottom",index+"px");
		//creatediv.attr("class","child"+index1);
		//alert(creatediv.html());
	};
})();