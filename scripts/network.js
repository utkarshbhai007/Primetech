$(document).ready(function ()
{
    $(window).resize();

    var objCenterLatLong = new google.maps.LatLng(-37.791902, 145.169180);
    var objMapProperties = {center: objCenterLatLong, zoom: 15, scrollwheel: false, mapTypeControlOptions: {mapTypeIds: []}, mapTypeId: google.maps.MapTypeId.ROADMAP};
    var objMap = new google.maps.Map(document.getElementById('aus-map'), objMapProperties);
    var objMarker = new google.maps.Marker();

    objMarker.setIcon(new google.maps.MarkerImage('images/map-marker.png'));
    objMarker.setTitle('Wales Australia');
    objMarker.setPosition(new google.maps.LatLng(-37.791902, 145.169180));
    objMarker.setMap(objMap);

    var objCenterLatLong = new google.maps.LatLng(29.857135, 121.594892);
    var objMapProperties = {center: objCenterLatLong, zoom: 15, scrollwheel: false, mapTypeControlOptions: {mapTypeIds: []}, mapTypeId: google.maps.MapTypeId.ROADMAP};
    var objMap = new google.maps.Map(document.getElementById('china-map'), objMapProperties);
    var objMarker = new google.maps.Marker();

    objMarker.setIcon(new google.maps.MarkerImage('images/map-marker.png'));
    objMarker.setTitle('Wales China');
    objMarker.setPosition(new google.maps.LatLng(29.857135, 121.594892));
    objMarker.setMap(objMap);
});