console.log(sdk);
wx.config({
   debug:  false,  
   appId: 		sdk.appId,
   timestamp: 	sdk.timestamp,
   nonceStr: 	sdk.nonceStr,
   signature: 	sdk.signature,
   jsApiList: [  
       'checkJsApi',  
       'onMenuShareTimeline', 
       'onMenuShareAppMessage', 
   ]
 });
 wx.ready(function () {   

 	var title=sdk.title;
 	var img  =sdk.img;
 	var link =sdk.link;

	wx.onMenuShareTimeline({  
	   title: title,
	   link: link,
	   imgUrl:img,
	});
	wx.onMenuShareAppMessage({
	   title: title,
	   desc: '描述', // 分享描述
	   link:link,
	   imgUrl:img,
    
});
});	
