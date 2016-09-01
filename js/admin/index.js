/*
* 
* Credits to http://css-tricks.com/long-dropdowns-solution/
*
*/

var maxHeight = 400;

$(function(){

    $(".dropdown > li").hover(function() {
    
         var $container = $(this),
             $list = $container.find("ul"),
             $anchor = $container.find("a"),
             height = $list.height() * 1.1,       // make sure there is enough room at the bottom
             multiplier = height / maxHeight;     // needs to move faster if list is taller
        
        // need to save height here so it can revert on mouseout            
        $container.data("origHeight", $container.height());
        
        // so it can retain it's rollover color all the while the dropdown is open
        $anchor.addClass("hover");
        
        // make sure dropdown appears directly below parent list item    
        $list
            .show()
            .css({
                paddingTop: $container.data("origHeight")
            });
        
        // don't do any animation if list shorter than max
        if (multiplier > 4) {
            $container
                .css({
                    height: maxHeight,
                    overflow: "hidden"
                })
                .mousemove(function(e) {
                    var offset = $container.offset();
                    var relativeY = ((e.pageY - offset.top) * multiplier) - ($container.data("origHeight") * multiplier);
                    if (relativeY > $container.data("origHeight")) {
                        $list.css("top", -relativeY + $container.data("origHeight"));
                    };
                });
        }
        
    }, function() {
    
        var $el = $(this);
        
        // put things back to normal
        $el
            .height($(this).data("origHeight"))
            .find("ul")
            .css({ top: 0 })
            .hide()
            .end()
            .find("a")
            .removeClass("hover");
    
    });  
	
	
	//地区下拉
	$('.selectt').selectlist({
			zIndex: 10,
			width: 200,
			height: 40
	});
	
	//后台页脚在最下
	var docheight=$(document).height();
	var footheight=$('.foot').height();
	var topheight=$('.top-height').height();
	var dd=docheight-topheight-footheight;
	if(dd>0){
		$('.none-height').css("height",dd+"px");
	}
	//alert(topheight);
	//alert(docheight);
	
	

//方案start
    //计算方案的右边宽度
	var schemewidth=$('.scheme-center').width();
	var rightwidth=schemewidth-389;
	$('.lyz_tab_right').css("width",rightwidth+"px");
	$(window).resize(function(){
		//计算方案的右边宽度
        var schemewidth=$('.scheme-center').width();
		var rightwidth0=$('.lyz_tab_right').width();
		if(rightwidth0>=759){
			 var rightwidth=schemewidth-389;
	         $('.lyz_tab_right').css("width",rightwidth+"px");
		}
		
		//页脚
		 var docheight=$(window).height();
		var footheight=$('.foot').height();
		var topheight=$('.top-height').height();
		var dd1=docheight-topheight-footheight;
		 
		if(dd1>0){
			$('.none-height').css("height",dd1+"px");
		}else{
			$('.none-height').css("height","0px");
		}
	   
    });
//方案end
 
 
 //地区添加start
     //显示内部的提交框内容
	 $('.arear-add-sheng-h30').click(function(){
		 if($(this).hasClass("biao-hide")){
			 $(this).removeClass("biao-hide");
			 $(this).addClass("biao-show");
			 $(this).next(".arear-add-sheng-edit").show();
		     //$('.arear-add-sheng-edit')
		 }else{
			 $(this).removeClass("biao-show");
			 $(this).addClass("biao-hide");
			 $(this).next(".arear-add-sheng-edit").hide();			 
		 }
		 var docheight=$(window).height();
		var footheight=$('.foot').height();
		var topheight=$('.top-height').height();
		var dd1=docheight-topheight-footheight;
		 
		if(dd1>0){
			$('.none-height').css("height",dd1+"px");
		}else{
			$('.none-height').css("height","0px");
		}
		 
	 });
 
     //加新的输入框
	 $('.add-inputy').click(function(){
		 //alert(333);
		 var arrt=$(this).attr('attr');
		 var arrt1=$(this).attr('attr1');
		
		 $(this).parent(".arear-add-sheng-edit-p").parent(".input-box").append('<p class="arear-add-sheng-edit-p"><input type="text" name="'+arrt1+'" class="firstarea_name  "  placeholder="'+arrt+'" /></input><span class="del-inputy" style="">x</span> </p>');
	 });
	 $('.add-inputy-1').click(function(){
		 //alert(333);
		 var arrt=$(this).attr('attr');
		 var arrt1=$(this).attr('attr1');
		 var arrt2=$(this).attr('attr2');
		
		 $(this).parent(".arear-add-sheng-edit-p").parent(".input-box").append('<p class="arear-add-sheng-edit-p"><input type="text" name="'+arrt1+'" class="firstarea_name  "  placeholder="'+arrt+'" /></input><input type="text" name="'+arrt2+'" class="base_price"  placeholder="填入基本价格" /></input><span class="del-inputy" style="">x</span> </p>');
	 });
	 
	 //添加面积方案输入框
	 $('.add-inputy-scheme-1').click(function(){
		 //alert(333);
		 var arrt=$(this).attr('attr');
		 var arrt1=$(this).attr('attr1');
		 var arrt2=$(this).attr('attr2');
		 var arrt3=$(this).attr('attr3');
		 var arrt4=$(this).attr('attrclass1');
		 var arrt5=$(this).attr('attrclass2');
		 var h=$(this).parent(".arear-add-sheng-edit-p").find('.selecthtml').html();
		
		
		 $(this).parent(".arear-add-sheng-edit-p").parent(".out-center").append('<p class="arear-add-sheng-edit-p">  '+h+'  <input type="text" name="'+arrt3+'" class="base_price '+arrt5+'"  placeholder="'+arrt1+'" /></input><span class="del-inputy" style="">x</span> </p>');
	 });
	 //删除本输入框
	 $('.del-inputy').live("click",function(){
		 //alert(333);
		 $(this).parent(".arear-add-sheng-edit-p").remove(); 
	 });
	 
	 
	 
	 //装修规格批量增加要素
	 $('.add-standard-span').click(function(){
		 
	 });
 
 //地区添加 end
     //城市获取省id  C:\xampp\htdocs\thinkphp1\Public\js\ht\jquery.selectlist.js   415
	 var firstid = $("#edu").find(".selected").attr('data-value');
	 $('.firsttarea_id').val(firstid);
	 
	 $('#salary').children(".select-list").find("li").hide();
	 $('#salary').children(".select-list").find(".parent_id"+firstid).show();
	 if($('#salary').children(".select-list").find(".parent_id"+firstid).eq(0).length){
		 var vt=$('#salary').children(".select-list").find(".parent_id"+firstid).eq(0).text();
		 $('#salary').children(".select-button").text(vt);
		 $('#salary').children(".select-button").val(vt);
		 $('#salary').children(".select-list").find("li").removeClass('selected');
		 $('#salary').children(".select-list").find(".parent_id"+firstid).eq(0).addClass('selected');
	 }
	 //城市获取住宅类型id  C:\xampp\htdocs\thinkphp1\Public\js\ht\jquery.selectlist.js   415
	 var room_parent_id = $("#salary1").find(".selected").attr('data-value');
	 $('.room_parent_id').val(room_parent_id);
	 
	 $('#salary2').children(".select-list").find("li").hide();
	 $('#salary2').children(".select-list").find(".parent_id"+room_parent_id).show();
	 if($('#salary2').children(".select-list").find(".parent_id"+room_parent_id).eq(0).length){
		 var vtt=$('#salary2').children(".select-list").find(".parent_id"+room_parent_id).eq(0).text();
		 $('#salary2').children(".select-button").text(vtt);
		 $('#salary2').children(".select-button").val(vtt);
		 $('#salary2').children(".select-list").find("li").removeClass('selected');
		 $('#salary2').children(".select-list").find(".parent_id"+room_parent_id).eq(0).addClass('selected');
	 }
	 //alert(firstid);
	 //方案验证start
	$('.room_scheme_submit').live("click",function(){

        var na=$('.scheme_name').val();
		var v0=isNull(na);
			if(v0){
				alert('方案名不能为空');
				$('.scheme_name').val('');
				$('.scheme_name').focus();
				return false;
		}
		/*
		var nam=$('.room_scheme_name');
      	
		jQuery.each(nam, function(i, val) {  
		    var v=$(this).val();
			var v1=isNull(v);
			if(v1){
				alert('房间名不能为空');
				$(this).val('');
				$(this).focus();
				//window.i;
				 window.scheme=1;
				return false;
			}
			
		});
		//alert();
		if(scheme==1){
			scheme=0;
			return false;
		}
		*/
        var nam1=$('.room_scheme_area');  		
 		jQuery.each(nam1, function(i, val) { 

		    var vv=$(this).val();
			var vv1=isNull(vv);
			if(vv1){
				alert('房间面积比不能为空');
				$(this).val('');
				$(this).focus();
				window.scheme1=1;
				return false;
			}else{
				if(check(vv)){
					alert("请输入正确的数字");
					$(this).val('');
		            $(this).focus();
					window.scheme1=1;
				    return false;
				}else{
					
				}
				 
			    
			}
			
			
		});
		if(scheme1==1){
			scheme1=0;
			return false;
		}
		 
 
 
	});
	 
	 //方案验证end
	 
	 
	 
	 //住宅规格
	 var roomval=$('.standard_room_name').val();
	 $('.roomtypeid').val(roomval);
	 $(".standard_room_name").change( function() {
		 var roomname=$(this).find("option:selected").text();
		 var roomval=$(this).val();
	     $('.roomtypeid').val(roomval);
		 
		  var curWwwPath = window.document.location.href;  
		  var newstr=curWwwPath.replace("index","update_roomtype_siesson");  
		 // alert(newstr);
		  //alert(curWwwPath);
		  
		var data;
		    data='roomtypeid='+roomval;
			data+='&roomtypename='+roomname;
		 
		
		var webpath = getwebpath(); //
		var ht=newstr;//webpath+"/admin.php/home/standard/update_roomtype_siesson";
		$.ajax({
		   type: "POST",
		   url: ht,
		   data: data,
		   success: function(msg){
			// var curWwwPath = window.document.location.href;
			 window.location.href=curWwwPath; 
		   }
		});
		 
		 
		 
		 
		 
     });
	 $('.standard-bottom').click(function(){
		 $('#canshu').submit();
	 });
	 $('.add-standard-span').click(function(){
		 var htm='<div class=\"add-standard-div\"> <h3 class=\"out-center-h3 add-standard\"> <span class=\"subtract-standard-span standard-span\">-</sapn></h3><p class=\"standard_p\"><span class=\"standard_p_span\">工程项目</span><input type=\"text\" name=\"element_name[]\" class=\"input_text element_name\"  placeholder=\"填入工程项目\" /></input></p><p class=\"standard_p\"><span class=\"standard_p_span\">工程工艺</span><textarea class="gongyi" name=\"gongyi[]\" cols=60 rows=4 placeholder=\"填入工程工艺标准\"></textarea></p><p class=\"standard_p\"><span class=\"standard_p_span\">工程单价</span><input type=\"text\" name=\"element_price[]\" class=\"input_text element_price\"  placeholder=\"填入工程单价\"   /></input></p></div>';
		$('.standard-center').append(htm);
		
	 });
	 $('.subtract-standard-span').live("click",function(){
		 $(this).parents().parents('.add-standard-div').remove();
	 });
	 
	    //验证
		$('.room_standard_submit').live("click",function(){
			var nam1=$('.element_name');  		
			jQuery.each(nam1, function(i, val) { 

				var vv=$(this).val();
				var vv1=isNull(vv);
				if(vv1){
					alert('工程项目不能为空');
					$(this).val('');
					$(this).focus();
					window.scheme1=1;
					return false;
				} 
				
				
			});
			if(scheme1==1){
				scheme1=0;
				return false;
		    }
			var nam2=$('.gongyi');  		
			jQuery.each(nam2, function(i, val) { 

				var vv=$(this).val();
				var vv1=isNull(vv);
				if(vv1){
					alert('工程工艺不能为空');
					$(this).val('');
					$(this).focus();
					window.scheme1=1;
					return false;
				} 
				
				
			});
			if(scheme1==1){
				scheme1=0;
				return false;
		    }
			var nam3=$('.element_price');  		
			jQuery.each(nam3, function(i, val) { 

				var vv=$(this).val();
				var vv1=isNull(vv);
				if(vv1){
					alert('工程价格不能为空');
					$(this).val('');
					$(this).focus();
					window.scheme1=1;
					return false;
				}else{
					if(check(vv)){
						alert("请输入正确的数字");
						$(this).val('');
						$(this).focus();
						window.scheme1=1;
						return false;
					}else{
						
					}
					 
					
				}
				
				
			});
			if(scheme1==1){
				scheme1=0;
				return false;
		    }
			 
		});
	 
	 
	 
	 
	 //住宅规格end
	 
	 //地区start
	 $('.area-bottom').click(function(){
		 var ur=$(this).attr('attr');
		 window.location.href=ur; 
		 
	 });
	 
	 
	 //地区end
	  
// 
  




 
});

//
function setLocation(url){
	//alert(aa);
	window.location.href=url; 
}
//验证不能为空
function isNull( str ){
	if ( str == "" ) return true;
	var regu = "^[ ]+$";
	var re = new RegExp(regu);
	return re.test(str);
}

//验证是数字和小数
function check(e){
	var re= /^\d+(?=\.{0,1}\d+$|$)/;
	
	if(!re.test(e)){
		return true;
	}else{
		return false;
	}
	
	
	//var reg = /^[0-9]+.?[0-9]*$/;//用来验证数字，包括小数的正则
    //if(!reg.test(e)){alert("请输入正确的数字格式！");}
	
	
}

function getwebpath() {
            //获取当前网址，如： http://localhost:8083/uimcardprj/share/meun.jsp
            var curWwwPath = window.document.location.href;
            //获取主机地址之后的目录，如： uimcardprj/share/meun.jsp
            var pathName = window.document.location.pathname;
            var pos = curWwwPath.indexOf(pathName);
            //获取主机地址，如： http://localhost:8083
            var localhostPaht = curWwwPath.substring(0, pos);
            //获取带"/"的项目名，如：/uimcardprj
            var projectName = pathName.substring(0, pathName.substr(1).indexOf('/') + 1);
            return (localhostPaht + projectName);
}

function dele(t){

	return confirm("您真的要删除"+t+"吗？");

}
