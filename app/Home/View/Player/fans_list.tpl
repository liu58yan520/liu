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
#list ul li .rec_text{
	font-size: 14px;
	height: 30px;
	line-height: 30px;
	color: #DBB227;
	margin:0 0 5px;
}
#list ul li .rec_text input{
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
#list ul li .rec_text button{
	width: 50px;
	height: 30px;
	border: none;
	border-radius: 5px;
	background: #8BCB2E;
	float: right;
}
</style>
<div id="list">
	<ul>
		<volist name='fans' id='arr'>
			<li>
				<!-- <img src="__IMG__/face/{$arr.openid}.jpg" class='face'> -->
				<img src="__IMG__/face.jpg" class='face'>
				<span class="name">{$arr.name}</span>
				<span class="money">{$arr.pay} 块</span>
				<p class="time">{$arr.createAT}</p>
				<if condition="$fans eq true ">
					<p class="rec_text">  <!-- 此处应该带上ID，写在button里 -->
						作者回复：
						<input type="text" name="rec_text">
						<button>提交</button>
					</p>
				</if>
			</li>
		</volist>
	</ul>

</div>
