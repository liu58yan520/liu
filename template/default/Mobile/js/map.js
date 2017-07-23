$(function(){
var map = new BMap.Map("allmap");
    var point = new BMap.Point(119.470624,32.197735);
    map.centerAndZoom(point, 17);
    var marker = new BMap.Marker(point);  // 创建标注
    map.addOverlay(marker);              // 将标注添加到地图中
    var label = new BMap.Label("我在9号楼",{offset:new BMap.Size(20,-10)});
    marker.setLabel(label);
    map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
    map.setCurrentCity("镇江");
})