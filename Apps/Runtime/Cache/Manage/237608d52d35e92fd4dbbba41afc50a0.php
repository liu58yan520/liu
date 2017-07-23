<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
<script>
$(function(){
    $("select[id='selpid']").change(function(){
		$("select[id='selpid'] option").each(function(i,o){
			if($(this).attr("selected")){
				if($(this).val() == 0){
					$("#name").val("");
					$("#url").val("");
					$("#url").removeAttr("readonly");
				} else{
					var textstr = $(this).text();
					for (var i = 1; i <= textstr.length; i++) {
						textstr = textstr.replace("-",'');
					};
					$("#name").val(textstr);
					$("#url").val("@"+$(this).val());
					$("#url").attr("readonly", "readonly");
				}	
			}
		});
	});
});
</script>
</head>
<body>
<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href="<?php echo U(GROUP_NAME. '/Nav/index');?>" class="onloading"><em>导航管理</em></a><span>|</span>
        <a href="<?php echo U(GROUP_NAME. '/Nav/add');?>" class="onloading on"><em>添加导航</em></a>
    </div>
    <div class="bk10"></div>
	<div class="form">
		<form method='post' id="form_do" name="form_do" action="<?php echo U(GROUP_NAME. '/Nav/add');?>">
		<div class="form">
			<dl>
				<dt>导航名称：</dt>
				<dd>
					<input type="text" name="name" class="inp_one" id="name"/> 
					&nbsp;&nbsp;站内栏目：
					<select id="selpid">
						<option value="0">自定义导航</option>
						<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" ><?php echo ($v["delimiter"]); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</dd>
			</dl>
			<dl>
				<dt>导航链接：</dt>
				<dd>
					<input type="text" name="url" class="inp_large" id="url" />
				</dd>
			</dl>
			<dl>
				<dt>上级导航：</dt>
				<dd>
					<select name="pid">
						<option value="0">无</option>
						<?php if(is_array($nav)): foreach($nav as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" ><?php echo ($v["delimiter"]); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</dd>
			</dl>
			<dl>
				<dt>导航类型：</dt>
				<dd>
					<input type="radio" value="1" name="navtype" checked>&nbsp;&nbsp;顶部导航&nbsp;&nbsp;
					<input type="radio" value="2" name="navtype">&nbsp;&nbsp;底部导航&nbsp;&nbsp;
					<input type="radio" value="3" name="navtype">&nbsp;&nbsp;其他位置&nbsp;&nbsp;
				</dd>
			</dl>
			<dl>
	            <dt>排序：</dt>
				<dd>
					<input type="text" name="sort" class="inp_one" value="1" onkeyup="this.value=this.value.replace(/\D/g,'')"  onafterpaste="this.value=this.value.replace(/\D/g,'')" maxlength="3" size="3"/>
				</dd>
	        </dl>
	        <div class="form_b">		
				<input type="submit" class="button" id="submit" value="提 交">
			</div>
		</div>
	   </form>
	</div>
</div>
</body>
</html>