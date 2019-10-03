$(document).ready(function() {
  var pointDraw;
  var vectorSource = new ol.source.Vector();
  
  var view = new ol.View({
    center: ol.proj.fromLonLat([-36.6604, -9.75164]),
    zoom: 14
  });

  baseLayer = new ol.layer.Tile({
    source: new ol.source.OSM()
  });

  var map = new ol.Map ({
    target: 'map',
    controls: ol.control.defaults().extend([
      new ol.control.ScaleLine(),
      new ol.control.ZoomSlider()
    ]),
    renderer: 'canvas',
    layers: [baseLayer],
    view: view
  });

  var vectorLayer = new ol.layer.Vector({
    source: vectorSource
  });

  map.addLayer(vectorLayer);

  pointDraw = new ol.interaction.Draw({
    source: vectorSource,
    type: 'Point'
  });

  pointDraw.on('drawend', function(e) {
    feature = e.feature;
    vectorSource.clear();
    vectorSource.addFeature(feature);
    var latLong = feature.getGeometry().getCoordinates();

    coord = ol.proj.transform(latLong, 'EPSG:3857', 'EPSG:4326');
    $(cx).val(coord[1]);
    $(cy).val(coord[0]);
  });

  map.addInteraction(pointDraw);

});
