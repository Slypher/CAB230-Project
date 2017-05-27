function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 9,
        center: {lat: -27.470125, lng: 153.021072}
    });

    var urls = [];
    var locations = [];
    var children = document.querySelectorAll('tbody tr')
    for (var i = 1; i < children.length; i++) {
        var url = children[i].querySelector("input[name='url']").value
        var lat = children[i].querySelector("input[name='location_lat']").value
        var long = children[i].querySelector("input[name='location_long']").value
        urls.push(url);
        locations.push({ lat: parseFloat(lat), lng: parseFloat(long) })
    }

    var markers = locations.map(function(location, i) {
        var marker = new google.maps.Marker({
            position: location,
            url: urls[i]
        });

        google.maps.event.addListener(marker, 'click', function() {
            window.location.href = marker.url;
        });
        return marker;
    });
    var markerCluster = new MarkerClusterer(map, markers, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
}