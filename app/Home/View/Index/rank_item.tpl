<link rel="stylesheet" type="text/css" href="__CSS__/rank_item.css">
<div id="rank">
	<volist name='user' id='user'> 
		<figure>
			<img class="player" src="__IMG__/user/{$user.name}.jpg">
			<figcaption>
				<p class='name'>{$user.name}</p>
				<p class="poll">{$user.poll}票</p>
			</figcaption>
			<p class="rank_txt">
				<switch name="i">
				    <case value="1">
				    	<svg class="icon" aria-hidden="true"> <use xlink:href="#icon-diyi"></use></svg>
				    </case>
				    <case value="2">
				    	<svg class="icon" aria-hidden="true"> <use xlink:href="#icon-dier"></use></svg>
				    </case>
				    <case value="3">
				    	<svg class="icon" aria-hidden="true"> <use xlink:href="#icon-disan"></use></svg>
				    </case>
				    <default />
						<span>{$i}</span>
				</switch>
			</p>
			<p class="uid none">{$user.id}</p>
		</figure>
	</volist>
</div>

<script type="text/javascript">
// $.get('Index/getRank',function(data){
// 	sessionStorage.setItem('rank_all',JSON.stringify(data));
	
// })
// function createNODE(data){
// 	var start=$('#rank figure').length;
// 	var node='';
// 	for (var i=0,len=data.length;i<len;i++) {
// 		node+="<figure>\n";
// 		node+=		"<img class='player' src='__IMG__/user/张楠.jpg'>\n";
// 		node+=		"<figcaption>\n";
// 		node+=			"<p class='name'>萝莉</p>\n";
// 		node+=			"<p class='poll'>122票</p>\n";
// 		node+=		"</figcaption>\n";
// 		node+=			"<p class='rank_txt'>11</p>\n";
// 		node+=			"<p class='uid none'>xx</p>\n";
// 		node+=	"</figure>\n";
// 	}
// }
$('#rank figure').on('tap',function(){
   self:location='Player/index/id/'+$(this).find('.uid').text();
});

</script>