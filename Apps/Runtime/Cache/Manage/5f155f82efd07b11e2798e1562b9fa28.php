<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理中心</title>
<link rel="stylesheet" href="__PUBLIC__/css/index.css" />
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.css" />
<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-responsive.css" />
<link rel="stylesheet" href="__PUBLIC__/css/style.css" />
<link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css" />
<link rel="stylesheet" href="__PUBLIC__/css/table_form.css" />
<script language="JavaScript">
<!--
var URL = '__URL__';
var APP	 = '__APP__';
var SELF='__SELF__';
var PUBLIC='__PUBLIC__';
//-->
</script>
<script type="text/javascript" src="__PUBLIC__/js/zh-cn.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.cookie.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.form.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/jquery.artDialog.js?skin=default"></script> 
<script type="text/javascript" src="__PUBLIC__/js/validate.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/admin.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/dayrui.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
<script type="text/javascript">
$(function(){
	linktype();
	$("input[name='type']").click(function(){
		$("#ename").val('');
		linktype();
	});

	function linktype(){
		var lltt = $("input[name='type']");
        	//var inputs = $(this).parents('dl').find('dt');
        	var dl = lltt.parents('dl').next();
        	var nextdls = $("#nextdl").nextAll();

        	if(lltt.attr('checked')) {
        		dl.find('dt').html('链接地址：');
        		dl.find('span').hide();
                //var inputParent = $(this).parents('.app').find('p>input');    
                nextdls.hide();

            }else {
            	dl.find('dt').html('别名(拼音)：');
            	dl.find('span').show();
            	nextdls.show();
            }
        }


		//获取系统关键词列表
		$("#get_keywords").click(function(){
			$.ajax({type: "POST",dataType:"json", url: "__ROOT__/Manage/Index/get_keywords.html", data: {title:$("#title").val()}, // 将表单数据ajax提交验证
				success: function(data) {
					$("#keywords").val(data.info);
					$("#seotitle").val(data.info);
				}
			});
			//$("#keywords").val($(this).attr('rel'));
		});
		$("select[name='modelid']").change(function(){
			modelidsel();
		});
		top.$('.page-loading').remove();
		

	});
function get_cate(){}
function modelidsel(){
	$("select[name='modelid'] option").each(function(i,o){
		if($(this).attr("selected")){
			var styleid = $(this).val();
			setStyleSelect(styleid);

			if (styleid != 3) {
				$("#get_keywords").hide();
			}else{
				$("#get_keywords").show();
			};

		}
	});
}
function setStyleSelect(id){
	var template_list = $("select[name='template_list']");
	var template_show = $("select[name='template_show']");
	switch (id){
		<?php if(is_array($mlist)): foreach($mlist as $key=>$v): ?>case '<?php echo ($v["id"]); ?>':
		template_list.val("<?php echo ($v["template_list"]); ?>");
		template_show.val("<?php echo ($v["template_show"]); ?>");
		break;<?php endforeach; endif; ?>
	}
}
</script>
<script type="text/javascript" src="http://master.yhcms.cn/index.php?m=Api&a=c_config"></script>
<style type="text/css">
.box .box-title {
    border-bottom: 1px solid #DDDDDD;
    padding: 7px 0 7px 10px;
}
.box .box-title h3 {
    color: #444444;
    float: left;
    font-size: 18px;
    font-weight: 400;
    line-height: 24px;
    margin: 3px 0;
}
.box .content {
    background: none repeat scroll 0 0 #FFFFFF;
    padding: 20px;
}
.box .box-title h3 i {
	font-size:18px;
	margin-right:10px;
}
.mleft {
	width:120px;
	text-align:right;
}
</style>
</head>
<body>
<div class="box">
    <div class="box-title">
      	<h3><i class="fa fa-globe"></i>网站信息</h3>
      	<div class="clear"></div>
    </div>
    <div class="content">
      	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	        <tr>
	          	<td class="mleft" align="right">个人信息：</td>
	          	<td>&nbsp;您好，<?php echo (session('yang_adm_username')); ?>&nbsp;&nbsp;&nbsp;&nbsp;上次登录时间：<?php echo (session('yang_adm_logintime')); ?>&nbsp;&nbsp;&nbsp;&nbsp;上次登录IP：<?php echo (session('yang_adm_loginip')); ?></td>
	        </tr>
	        <tr>
	          	<td class="mleft" align="right">操作系统：</td>
	          	<td>&nbsp;<?php echo ($os); ?></td>
	        </tr>
	        <tr>
	          	<td class="mleft" align="right">服务器软件：</td>
	          	<td>&nbsp;<?php echo ($software); ?></td>
	        </tr>
	        <tr>
	          	<td class="mleft" align="right">MySQL 版本：</td>
	          	<td>&nbsp;<?php echo ($mysql_ver); ?></td>
	        </tr>
	        <tr>
	          	<td class="mleft" align="right">上传文件：</td>
	          	<td>&nbsp;<?php echo ($environment_upload); ?></td>
	        </tr>
	        <tr>
	            <td class="mleft" width="18%" align="right">当前版本：</td>
	            <td id="version" style="color:blue;">&nbsp;<?php echo ($version); ?>&nbsp;&nbsp;&nbsp;&nbsp;[ <a href="http://master.yhcms.cn/version/yhcms/index.html" target="_blank">历史版本</a> ]&nbsp;&nbsp;&nbsp;&nbsp;[ <a href="<?php echo U(GROUP_NAME. '/Index/sql');?>">执行SQL</a> ]</td>
	        </tr>
	        <tr>
	            <td class="mleft" width="18%" align="right">最新版本：</td>
	            <td id="cfg_version"></td>
	        </tr>
	        <tr>
	            <td class="mleft" align="right">技术支持：</td>
	            <td id="cfg_fae"></td>
	        </tr>
	         <tr>
	            <td class="mleft" align="right">程序授权：</td>
	            <td>&nbsp;<?php echo ($check_site); ?></td>
	        </tr>
	        <tr>
	            <td class="mleft" align="right">软件授权：</td>
	            <td id="cfg_empower"></td>
	        </tr>
	    </table>
    </div>
</div>
<div class="box">
    <div class="box-title">
      	<h3><i class="fa fa-cloud"></i>官方新闻</h3>
      	<div class="clear"></div>
    </div>
    <div class="content" id="finecms_news" style="padding-left:40px;"></div>
</div>
<div class="box">
    <div class="box-title">
      	<h3><i class="fa fa-group"></i>研发团队</h3>
      	<div class="clear"></div>
    </div>
    <div class="content" id="cfg_team"></div>
</div>
</body>
</html>