(function ($) {


    L.mapbox.accessToken = 'pk.eyJ1IjoiYnBlcmljayIsImEiOiJrT2xBSUNzIn0.n-CVAwFlqHGqkiDUxsIdSQ';
    var map = L.mapbox.map('map', 'bperick.d9650d93', {
        tileLayer : {
                    continuousWorld: false,        
                    noWrap: true
                    }
       
    });
    map.setView([39.833333, -98.583333], 4);



    //TODO Single Origin Policy, and abstract.  
    var markerLayer = L.mapbox.featureLayer().addTo(map);

    // markerLayer.on('layeradd', function(e) {
    //     var marker = e.layer,
    //         feature = marker.feature;

    //     //Template for Custom Tooltip        
    //     var popupContent = '<a href="' + feature.properties.link + '">' +
    //                         '<p class="map-title">' + feature.properties.title +  '</p></a>' +
    //                         '<p class="map-excerpt">' + feature.properties.excerpt + '</p>' +
    //                         '<a class="map-link" href="' + feature.properties.link + '">' +
    //                         'Learn More' +
    //                     '</a>'; 

    //     marker.bindPopup(popupContent,{
    //     closeButton: true,
    //     minWidth: 320
    // });
    //
    // });

    markerLayer.on('mouseover', function(e) {
    e.layer.openPopup();
    });
    
    // markerLayer.on('mouseout', function(e) {
    // e.layer.closePopup();
    // });

//Janky Test Stuff, but necessary for getting this working.
var host = window.location.hostname;

// switch (host) {
//     case "dev.alumni.washington.edu" : 
//     markerLayer.loadURL('http://dev.alumni.washington.edu/wordpress/api/tours/geojson');
//     break;

//     case "54.69.164.216" :
//     markerLayer.loadURL('http://54.69.164.216/uwaa_test/api/tours/geojson');
//     break;

//     case "local.wordpress.dev" :
//     markerLayer.loadURL('http://local.wordpress.dev/api/tours/geojson');
//     break;

//     default: 
//     console.log ("Error Getting GEOJSON.  Host: "+host+"");

// }





    
 

}(jQuery)); 