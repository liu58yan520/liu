<style type="text/css">
#list{
padding: 8px 10px 40px;
}
#list ul li{
	margin:5px 0 0 0;
	width: 100%;
	min-height: 80px;
	border-bottom: 1px solid #ccc;
	position: relative;
}
#list ul li:last-child{
	border-bottom:none;
}
#list ul li img{
	width: 40px;
	height: auto;
	border-radius: 50%;
	float: left;

}
#list ul li .name,#list ul li .money{
	margin: 0 0 0 15px; 
	font-size: 15px;
	height: 40px;
	line-height: 40px;
	display: inline-block;
}
#list ul li .money{
	margin: 0 10px 0 0; 
	float: right;
}
#list ul li .text{
	padding: 8px;
	clear: left;
}
#list ul li .time{
	position: absolute;
	right: 3px;
	bottom: 3px;
	font-size: 12px;
	color:#999;
	
}

</style>
<div id="list">
	<ul>
		<volist name='fans' id='arr'>
			<li>
				<img src="__IMG__/face/{$arr.openid}.jpg" class='face'>
				<span class="name">{$arr.name}</span>
				<span class="money">{$arr.pay} 块</span>
				<p class="text">{$arr.con}</p>
				<p class="time">{$arr.createAT}</p>
			</li>
		</volist>
	</ul>

</div>
