Loader.load();

var prodejna;
var mapa;
var layer;
var options = {};
var marker;

$(document).ready(function(){
  prodejna = SMap.Coords.fromWGS84(14.9170808, 50.4165231);
  mapa = new SMap(JAK.gel("mapa"), prodejna, 16);
  mapa.addDefaultLayer(SMap.DEF_BASE).enable();
  mapa.addDefaultControls();
  
  layer = new SMap.Layer.Marker();
  mapa.addLayer(layer);
  layer.enable();
  
  marker = new SMap.Marker(prodejna, "myMarker", options);
  layer.addMarker(marker);
});