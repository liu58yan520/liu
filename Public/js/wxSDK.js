wx.config({ 
   appId: 		sdk.appId,
   timestamp: 	sdk.timestamp,
   nonceStr: 	sdk.nonceStr,
   signature: 	sdk.signature,
   jsApiList: [  
       'onMenuShareTimeline', 
       'onMenuShareAppMessage', 
   ]
 });
 wx.ready(function () {   
	wx.onMenuShareTimeline({  
	   title: sdk.title,
	   link: sdk.link,
	   imgUrl:sdk.img
	});
	wx.onMenuShareAppMessage({
	   title:sdk.title,
	   desc:sdk.desc,
	   link:sdk.link,
	   imgUrl:sdk.img
});
});	
