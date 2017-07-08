<div class="item case_list">
	<include file="Item/list_title" tit1='案例' tit2='精选' sub='Case selection' />
	<volist name='case' id='data' offset="0" length='4'> 
		<figure>
			<img src='__IMG__/case/{$data.id}.jpg'>
			<figcaption>{$data.name}</figcaption>
		</figure>
	</volist>
	<div class="more">查看更多</div>
</div>	