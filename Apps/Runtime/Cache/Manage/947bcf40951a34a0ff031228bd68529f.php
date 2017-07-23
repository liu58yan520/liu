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
</head>
<body>
<div class="subnav">
    <div class="content-menu ib-a blue line-x">
        <a href="<?php echo U(GROUP_NAME. '/Nav/index');?>" class="onloading on"><em>导航管理</em></a><span>|</span>
        <a href="<?php echo U(GROUP_NAME. '/Nav/add');?>" class="onloading"><em>添加导航</em></a>
    </div>
    <div class="bk10"></div>
    <div class="table-list">    
    <form action="<?php echo U(GROUP_NAME.'/Nav/delAll');?>" method="post" id="form_do" name="form_do">
        <table width="100%">
            <thead>
                <tr>
                    <th width="35px"></th>
                    <th width="50px">编号</th>
                    <th width="200px">导航名称</th>
                    <th>链接地址</th>
                    <th width="150px">导航类型</th>
                    <th width="80px">排序</th>
                    <th width="80px">操作</th>
                </tr>
            </thead>
            <tbody>
    			<?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><tr>
                    <td align="center"><input type="checkbox" name="key[]" value="<?php echo ($v["id"]); ?>"></td>
                    <td align="center"><?php echo ($v["id"]); ?></td>
                    <td class="aleft"><?php echo ($v["delimiter"]); ?><a href="<?php echo ($v["hrefurl"]); ?>" target="_blank"><?php echo ($v["name"]); ?></a></td>
                    <td align="center"><?php echo ($v["url"]); ?></td>
                    <td align="center">
                        <?php if($v['navtype'] == '1'): ?>顶部导航<?php endif; ?>
                        <?php if($v['navtype'] == '2'): ?>底部导航<?php endif; ?>
                        <?php if($v['navtype'] == '3'): ?>其他位置<?php endif; ?>
                    </td>
                    <td align="center">
                        <input type="text" name="<?php echo ($v["id"]); ?>" value="<?php echo ($v["sort"]); ?>" maxlength="3" onkeyup="this.value=this.value.replace(/D/g,'')"  onafterpaste="this.value=this.value.replace(/D/g,'')" maxlength="3" size="4"/>
                    </td>
                    <td align="center">
                        <a href="<?php echo U(GROUP_NAME. '/Nav/edit',array('id' => $v['id']));?>">编辑</a>
                        <a href="javascript:void();" onclick="dr_dialog_del('确定删除', '<?php echo U(GROUP_NAME. '/Nav/del',array('id' => $v['id']));?>')">删除</a>
    				</td>
                </tr><?php endforeach; endif; ?>
            </tbody>
            <tr>
                <td align="center"><input type="checkbox" id="check"></td>
                <td colspan="4">
                    <a href="javascript:void();" onclick="dr_confirm_px_all('确实要更新排序吗？','<?php echo U(GROUP_NAME.'/Nav/sort', array('batchFlag' => 1));?>')" class="onloading"><em>更新排序</em></a>&nbsp;&nbsp;
                    <a href="javascript:void();" onclick="dr_confirm_del_all('确实要删除选择项吗？','<?php echo U(GROUP_NAME.'/Nav/del', array('batchFlag' => 1));?>')" class="onloading"><em>删除</em></a>&nbsp;&nbsp;
                    <div class="onShow">请选中之后再操作，排序按从小到大排列</div>
                </td>
                <td colspan="3" align='right'></td>
            </tr>
        </table>
    </form>
    </div>
</div>
</body>
</html>