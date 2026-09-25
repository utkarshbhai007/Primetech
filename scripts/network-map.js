var objMarkers = new Array();

function initialize()
{
    var sf = new Array();
//			var styles = [{ stylers: [{ hue: "#9FCD2F" }, { saturation: -24 }, { lightness: 15 }, { gamma: 0.7 }] }], objPrevInfoWindow;
    var objPrevInfoWindow;
    var objCenterLatLong = new google.maps.LatLng(22.972931, 72.645430);
    var objMapProperties = {center: objCenterLatLong, zoom: 18, mapTypeId: google.maps.MapTypeId.ROADMAP, mapTypeControlOptions: {mapTypeIds: []}};
    objMap = new google.maps.Map(document.getElementById("map"), objMapProperties);

//            objMap.setOptions({styles: styles});

    data = [
        [22.972931, 72.645430, "Primetech Industries"]
    ];

    /*, options:[icon: "http://maps.google.com/mapfiles/marker_green.png"]*/
    console.log(data);

    vLength = data.length;

    for (i = 0; i < vLength; i++)
    {
        var objPosition = new google.maps.LatLng(data[i][0], data[i][1]);
        var objMarker = new google.maps.Marker({map: objMap, position: objPosition});
        //var objMarker = new google.maps.Marker({map: objMap, position: objPosition, icon: 'http://192.168.1.250/john/markers/' + data[i][3]});
//				var objMarker = new google.maps.Marker( { map: objMap, position: objPosition, title: data[i][2] } );
        objMarker.set('name', data[i][2]);

        objMarkers[data[i][2]] = objMarker;

        google.maps.event.addListener(objMarkers[data[i][2]], 'mouseover', function ()
        {
            if (objPrevInfoWindow)
                objPrevInfoWindow.close();
            var objInfoWindow = new InfoBox({content: '<div class="map_locations">' + this.get('name') + '</div>', disableAutoPan: false, maxWidth: 0, pixelOffset: new google.maps.Size(-30, 0), zIndex: null, closeBoxMargin: "0px 0px 0px 0px", closeBoxURL1: "./images/close.png", infoBoxClearance: new google.maps.Size(1, 1), isHidden: false, pane: "floatPane", enableEventPropagation: false});
            objInfoWindow.open(objMap, this);
            objPrevInfoWindow = objInfoWindow;
        });
    }

}
google.maps.event.addDomListener(window, 'load', initialize);