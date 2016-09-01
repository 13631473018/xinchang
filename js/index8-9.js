/*滑动导航*/
// $(function(){
// 	var index = 0;
// 	var oSheZhi = $(".shezhi");
// 	var oTwo = $(".two");
//     oSheZhi.hover(function(){
//         $('.bg').stop().animate({
//             height:'145px'
//         });
//         //alert(oTwo.height);
//         $( this ).children(".two").stop().slideDown(600);
//     },function(){
//         $(".bg").stop().animate({
//             height:'30px'
//         });
//         $( this ).children(".two").stop().slideUp(600);
//     });
// });

/*计价二级菜单*/
$(function(){
    var $select_wrapper = $(".select-wrapper:first");
    var $select_wrapper_last = $(".select-wrapper:last");
    var $select_wrapper_1 = $(".select-wrapper-1");
    var $select_wrapper_2 = $(".select-wrapper-2");
    var $select_wrapper_3 = $(".select-wrapper-3");
    var $select_wrapper_4 = $(".select-wrapper-4");
    var $select_list = $(".select-list");
    var $select_list_1 = $(".select-list-1");
    var $select_list_1_even = $(".select-list-1").find("li:first");
    var $select_list_1_odd = $(".select-list-1").find("li:last");;
    var $select_list_2 = $(".select-list-2");
    var $select_list_3 = $(".select-list-3");
    var $select_list_4 = $(".select-list-4");
    var $select_list_5 = $(".select-list-5");
    var $select_list_li = $(".select-list-li");
    var index=0;
    // $select_wrapper.click(function(){
    //     $select_list.eq(index).slideToggle(200);
    // });
    //alert($select_wrapper.length);
    $select_wrapper.click(function(){
            //alert( $select_wrapper.eq(index));
            // var $table =  $(".table");
            // var $table2 =  $(".table2");
            // $table.css("display","none");
            // $table2.css("display","block");
            $select_list.slideToggle(200);
    });
    $select_wrapper_last.click(function(){
            $select_list_5.slideToggle(200);
    });
     $select_wrapper_1.click(function(){
            $select_list_1.slideToggle(200);
    });
      $select_wrapper_2.click(function(){
            $select_list_2.slideToggle(200);
    });
      $select_wrapper_3.click(function(){
            $select_list_3.slideToggle(200);
    });
      $select_wrapper_4.click(function(){
            $select_list_4.slideToggle(200);
    });
    $select_list_li.hover(function(){
        $(this).addClass("on").siblings().removeClass("on");
    });
    $select_list_li.click(function(){
        if( $(this).value() == $(this).parents(".q-left").find("span").value() );
        {
            alert($(this).value());
            alert($(this).parents(".q-left").find("span").value());
        }
    });
    $select_list_1_even.click(function(){
        var $table =  $(".table");
        var $table2 =  $(".table2");
        $table.css("display","block");
        $table2.css("display","none");
    });
     $select_list_1_odd.click(function(){
        var $table =  $(".table");
        var $table2 =  $(".table2");
        $table.css("display","none");
        $table2.css("display","block");
    });

});
/*计价计算旋转*/
// $(function(){
//     var $q_middle = $(".q-middle");
//     var $round = $(".round");
//     $round.mouseenter(function(){
//         $(this).stop().css("transform","rotate(360deg)");
//     });
//     $round.mouseleave(function(){
//         $(this).stop().css("transform","rotate(0deg)");
//     });
// });