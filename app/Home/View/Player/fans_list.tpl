<link rel="stylesheet" type="text/css" href="__CSS__/fans_list.css">
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
							<if condition="$rep_num.fu_id EQ $rep_num.id">
								<p style="margin-left:22px;">
									<span class="rep_text_con">@ <img class="rep_face" src='__IMG__/face/{$rep_num.openid}.jpg'></img> : xxxx</span>
								</p>
							</if>
							<p class="rep_text er">@他：
								<input type="text" name="rec_text">
								<button class='rep_sub' rep_id="{$arr.id}">提交</button>
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