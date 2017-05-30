function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 9,
        center: {lat: -27.470125, lng: 153.021072}
    });

    // i have hidden inputs for each result containing the URL and geo location
    var urls = [];
    var locations = [];
    // select all table rows
    var children = document.querySelectorAll('tbody tr')
    // iterate through table rows
    for (var i = 1; i < children.length; i++) {
        // get the url and locations from hidden inputs
        var url = children[i].querySelector("input[name='url']").value
        var lat = children[i].querySelector("input[name='location_lat']").value
        var long = children[i].querySelector("input[name='location_long']").value
        urls.push(url);
        locations.push({ lat: parseFloat(lat), lng: parseFloat(long) })
    }

    // create markers given the array of locations, as created above
    var markers = locations.map(function(location, i) {
        var marker = new google.maps.Marker({
            position: location,
            url: urls[i]
        });

        // add listener to marker to redirect to park URL
        google.maps.event.addListener(marker, 'click', function() {
            window.location.href = marker.url;
        });
        return marker;
    });
    // cluster markers
    var markerCluster = new MarkerClusterer(map, markers, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
}