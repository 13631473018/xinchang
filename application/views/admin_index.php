<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0052)http://qn.quabuy.com/price/admin.php/home/area/index -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

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

    <script type="text/javascript">
        $(function(){
            var validate = $("#htlogin").validate({
                debug: true, //调试模式取消submit的默认提交功能
                //errorClass: "label.error", //默认为错误的样式类为：error
                focusInvalid: false, //当为false时，验证无效时，没有焦点响应
                onkeyup: false,
                submitHandler: function(form){   //表单提交句柄,为一回调函数，带一个参数：form
                    //alert("提交表单");
                    form.submit();   //提交表单
                },

                rules:{
                    username:{
                        required:true
                    },
                    userpwd:{
                        required:true
                    }
                },
                messages:{
                    username:{
                        required:"<span style=\"color:red;margin:0 0 0 20px;\">必填</span>"
                    },
                    userpwd :{
                        required:"<span style=\"color:red;margin:0 0 0 20px;\">必填</span>"
                    }
                }

            });

        })
    </script>
</head>
<body style="zoom: 1;">
<div class="top-height">
    <div class="index-top"><h3 style="font-size:18px;">装修报价系统管理中心</h3>
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
    <div class="default-state"><span class="state-text"><span class="state-pic">＞</span>报价列表</span></div>
    <!---内容start--->
    <div class="area-center center">

        <!----table  begin--->

        <table width="92%" class="table" style=" ">
            <tbody>
                <tr>
                    <th>报价ID</th>
                    <th>标题</th>
                    <th>内容</th>
                    <th>图片</th>
                    <th>价格</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>

                <!----报价列表 ---->
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="text" name="price" value="" placeholder="请输入价格" size="7">
                    </td>
                    <td></td>
                    <td>
                        <img src="/images/admin/icon_trash.gif" title="删除">
                    </td>
                </tr>

            </tbody>
        </table>
        <!----table end---->
    </div>
    <!---内容end--->


</div>
<div class="none-height" style="height: 1px;"></div>
<div class="foot">
    <p class="foot-p">装修报价系统<span>ver.1.0.0</span></p>
</div>

<div style="clear:both;"></div>

</body></html>