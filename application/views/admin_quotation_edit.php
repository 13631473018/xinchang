
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>装修报价系统</title>
    <link rel="stylesheet" href="/css/admin/ht.css">
    <link rel="icon" href="/images/admin/favicon.ico" type="image/x-icon">
    <script src="/js/admin/jquery-1.9.0.min.js"></script>
    <script src="/js/admin/jquery-migrate-1.1.0.min.js"></script>
    <script src="/js/admin/jquery.validate.js"></script>
    <script src="/js/admin/jquery.selectlist.js"></script>
    <script src="/js/admin/index.js"></script>

    <style type="text/css">
        .*{margin:0; padding:0;}
        .login-top{ width:500px;margin:100px auto 0 auto;border:1px solid #ccc;}
        .login-top-h2{ text-align:center;letter-spacing: 2px;}
        .login-p{text-align:center;margin:40px 0;}
        .login-p1{margin:40px 0 40px 130px;}
        .login-span{margin:0 20px 0 0;}
        .inputtext{background: #fff none repeat scroll 0 0;border-color: #aaa #c8c8c8 #c8c8c8 #aaa;border-style: solid;border-width: 1px;font: 12px;padding:2px 3px;}
        .login-p-submit{margin:0 0 30px 0;}
        .login-p-submit .form-submit{border:1px solid #ccc;padding:3px 20px;margin:0 0 0 290px; cursor:pointer;}
        .login-p-submit .form-submit:hover{background:#666;color:#fff;}
    </style>


</head>
<body style="zoom: 1;">
<div class="top-height">
    <div class="index-top">
        <h3 style="font-size:18px;">装修计价系统管理中心</h3>
        <p style="width:30%;float:right;line-height:30px;text-align:right;padding-right:20px;">欢迎您 quabuy<a style="margin:0 0 0 20px;" href="http://qn.quabuy.com/price/admin.php/home/login/logout">退出</a></p>
        <div style="clear:both;"></div>
    </div>

    <!---导航start--->
    <div class="index-meu">
        <nav>
            <ul class="dropdown">
                <li class="drop "><a class="hover0" href="">报价管理</a>
                    <ul class="sub_menu">
                        <li><a href="/admin/quotation_list">报价列表</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div style="clear:both;"></div>
    </div>

    <!---导航end--->
    <div class="default-state"><span class="state-text"><span class="state-pic">＞</span>编辑报价</span>
        <a class="goback-a" href="" onclick="javascript:window.history.back('-1');">返回</a>
    </div>
    <!---内容start--->
    <div class="scheme-center center">

        <form action="" method="post" enctype="multipart/form-data" id="myform">
            <div class="out-center">
                <table width="92%" class="table" style="">
                    <tbody>
                        <tr>
                            <td>报价ID:<?=$quo['quotation_id']?></td>
                        </tr>
                        <tr>
                            <td>报价标题:<?=$quo['enquiry_title']?></td>
                        </tr>
                        <tr>
                            <td>报价内容:<?=$quo['enquiry_content']?></td>
                        </tr>
                        <tr>
                            <td>报价图片:</td>
                        </tr>
                        <tr>
                            <td>报价附件:</td>
                        </tr>
                        <tr>
                            <td>价格:<input type="text" name="reply_price" value="<?=$quo['reply_price']?>" placeholder="请输入价格" class="number"></td>
                        </tr>
                        <tr>
                            <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>回复内容:</td>
                                            <td>
                                                <textarea name="reply_content" cols="160" rows="20"><?=$quo['reply_content']?></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                复价附件:
                                <input type="file" name="reply_attach">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div style="clear:both;"></div>
            </div>
            <p class="arear-add-sheng-edit-p"><input type="submit" name="secondarea_name_submit" class="firstarea_name_submit room_scheme_submit" value="保存"></p>
        </form>






    </div>
    <!---内容end--->

</div>
<div class="none-height" style="height: 38px;"></div>
<div class="foot">
    <p class="foot-p">装修报价系统<span>ver.1.0.0</span></p>

</div>

<div style="clear:both;"></div>

<div id="qq-sendUrl-btn"></div>
<div id="qb-sougou-search" style="display: none; opacity: 0;"><p>搜索</p><p class="last-btn">复制</p><iframe src=""></iframe></div></body></html>
<script type="text/javascript">
    $(function(){
        $("#myform").validate();
    });
    $.extend($.validator.messages, {
        required: "必选字段",
        remote: "请修正该字段",
        email: "请输入正确格式的电子邮件",
        url: "请输入合法的网址",
        date: "请输入合法的日期",
        dateISO: "请输入合法的日期 (ISO).",
        number: "请输入合法的数字",
        digits: "只能输入整数",
        creditcard: "请输入合法的信用卡号",
        equalTo: "请再次输入相同的值",
        accept: "请输入拥有合法后缀名的字符串",
        maxlength: $.validator.format("请输入一个长度最多是 {0} 的字符串"),
        minlength: $.validator.format("请输入一个长度最少是 {0} 的字符串"),
        rangelength: $.validator.format("请输入一个长度介于 {0} 和 {1} 之间的字符串"),
        range: $.validator.format("请输入一个介于 {0} 和 {1} 之间的值"),
        max: $.validator.format("请输入一个最大为 {0} 的值"),
        min: $.validator.format("请输入一个最小为 {0} 的值")
    });
</script>