<div class="item pro_list">
	<include file="Item/list_title" tit1='精益' tit2='工程' sub='Lean project'/>
	<volist name='pro' id='data' offset="0" length='4'> 
		<figure>
			<img src='__IMG__/pro/{$data.id}.jpg'>
			<figcaption>{$data.name}</figcaption>
		</figure>
	</volist>
	<div class="more">查看更多</div>
</div>	