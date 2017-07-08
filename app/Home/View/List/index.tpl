<div class="item">
	<include file="Item/list_title" tit1='案例' tit2='精选' sub='Case selection'/>
	<volist name='data' id='data'> 
		<figure>
			<img src='__IMG__/{$data.img}'>
			<figcaption>{$case.name}</figcaption>
		</figure>
	 </volist>
</div>	