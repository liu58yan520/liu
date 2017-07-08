<div class="item worker_list">
	<include file="Item/list_title" tit1='能工' tit2='巧匠' sub='Skillful craftsman'/>
	<volist name='worker' id='data' offset="0" length='4'> 
		<figure>
			<img src='__IMG__/worker/{$data.id}.jpg'>
			<figcaption>{$data.name}</figcaption>
		</figure>
	</volist>
	<div class="more">查看更多</div>
	
</div>	