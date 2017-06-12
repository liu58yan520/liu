<style type="text/css">
#list{
padding: 8px 10px 40px;
}
#list ul .one{
	margin:5px 0 0 0;
	width: 100%;
	min-height: 80px;
	border-bottom: 1px solid #ccc;
	position: relative;
}
#list ul .one:last-child{
	border-bottom:none;
}
#list ul .one img{
	width: 40px;
	height: auto;
	border-radius: 50%;
	float: left;

}
#list ul .one .name,#list ul .one .money{
	margin: 0 0 0 15px; 
	font-size: 15px;
	height: 40px;
	line-height: 40px;
	display: inline-block;
}
#list ul .one .money{
	margin: 0 10px 0 0; 
	float: right;
}
#list ul .one .text{
	padding: 8px;
	clear: left;
}
#list ul .one .time{
	position: absolute;
	right: 3px;
	bottom: 3px;
	font-size: 12px;
	color:#999;
}
#list ul .one .rep_text{
	font-size: 14px;
	height: 30px;
	line-height: 30px;
	color: #DBB227;
	margin:0 0 5px;
	clear: block
}
#list ul .one .rep_text input{
	width: 55%;
	border: none;
	outline: 1px dashed #f60;
	border-right: 3px;
	height: 25px;
	line-height: 25px;
	font-size: 12px;
	padding: 0 0 0 6px;
	box-sizing: border-box;
}
#list ul .one .rep_text button{
	width: 50px;
	height: 30px;
	border: none;
	border-radius: 5px;
	background: #8BCB2E;
	float: right;
}
#list ul .one ol li{
	display: block;
	min-height: 30px;
	line-height: 30px;
	font-size: 14px;
	margin:3px auto  ;
	padding: 3px 0;
	border-top: 1px solid #e9e9e9;
	width: 80%;
}
#list ul .one ol li .er{
	display: none;
}
#list ul .one ol li .rep_face{
	width: 35px;
}
#list ul .one ol li .rep_text_con{
	font-size: 15px;
	margin:0 0 0 8px;
	line-height: 35px;
	white-space:nowrap; 
}

</style>

<div id="list" url="{:U('Player/rep_inset')}">
	<ul>
		<if condition="$fans EQ null">
			<p>快点邀请小伙伴来筹款吧</p>
		<else />

			<volist name='fans' id='arr'>
				<li class='one'>
					<img src="__IMG__/face/{$arr.openid}.jpg" class='face'>
					<span class="name">{$arr.name}</span>
					<span class="money">{$arr.pay} 块</span>
					<p class="time">{$arr.createAT}</p>
					<if condition="$arr.reply NEQ null">
					<ol>
					<volist name='arr.reply' id='rep_num'>	
						<li>
							<p>
								<img class="rep_face" src='__IMG__/face/{$rep_num.openid}.jpg'></img>
								<span class="rep_text_con"> : {$rep_num.text}</span>
							</p>
							<p class="rep_text er">回复：
								<input type="text" name="rec_text">
								<button class='rep_er_sub' rid="{$arr.id}">提交</button>
							</p>
						</li>		
					</volist>
					</ol>
					</if>
					<p class="rep_text">回复：
						<input type="text" name="rec_text">
						<button class='rep_sub' rid="{$arr.id}">提交</button>
					</p>
				</li>
			</volist>	
		</if>
	</ul>
</div>
<script type="text/javascript">
$(function(){
	$('#list .rep_sub').on('tap',function(){
		var id=	$(this).attr('rid');
		var text=$(this).prev('input').val();
		var url=$('#list').attr('url');
		if(text=='') return false;
		if(text.lenth>15){
			alert('字太多啦,最多能写15个');
			return false;
		}
		_this=$(this);
		$.post(url,{rid:id,text:text}, function(data) {
			var dom=$("<li>\n<p>\n"+
				"<img class='rep_face' src='__IMG__/face/"+data+".jpg'>\n"+
				"<span class='rep_text_con'>"+text+"</span>\n"+
				"</li>\n</p>\n");
			_this.parent().prev('ol').append(dom);
			_this.prev('input').val('');
		});
	});

	$('#list ol li').tap(function(){
		$(this).siblings().find('.rep_text').hide();
		$(this).find('.er').show();
	});
	
	

});

</script>