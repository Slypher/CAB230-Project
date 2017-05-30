function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 9,
        center: {lat: -27.470125, lng: 153.021072}
    });

    // i have hidden inputs for each result containing the URL and geo location
    var parks = [];
    var locations = [];
    // select all table rows
    var children = document.querySelectorAll('tbody tr')
    // iterate through table rows
    for (var i = 1; i < children.length; i++) {
        // get the url and locations from hidden inputs
        var url = children[i].querySelector("input[name='url']").value
        var name = children[i].querySelector("input[name='name']").value
        var suburb = children[i].querySelector("input[name='suburb']").value
        var street = children[i].querySelector("input[name='street']").value
        var rating = children[i].querySelector("input[name='rating']").value
        var distance = children[i].querySelector("input[name='distance']").value
        var lat = children[i].querySelector("input[name='location_lat']").value
        var long = children[i].querySelector("input[name='location_long']").value
        parks.push({'name': name, 'suburb': suburb, 'street': street, 'rating': rating, 'distance': distance, 'url': url});
        locations.push({ lat: parseFloat(lat), lng: parseFloat(long) })
    }

    // create markers given the array of locations, as created above
    var markers = locations.map(function(location, i) {
        var marker = new google.maps.Marker({
            position: location,
            title: parks[i]['name']
        });

        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">'+parks[i]['name']+'</h1>'+
            '<div id="bodyContent">'+
            '<p>'+parks[i]['suburb']+' '+parks[i]['street']+'</p>';
        
        if (parks[i]['rating'] != null && parks[i]['rating'] != '') contentString += '<p>Average Rating: '+parks[i]['rating']+'</p>';
        if (parks[i]['distance'] != null && parks[i]['distance'] != '') contentString += '<p>Distance from you: '+parks[i]['distance']+'</p>';

        contentString += '<p><a href="'+parks[i]['url']+'">'+
            parks[i]['url']+'</a></p>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        // add listener to marker to redirect to park URL
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
        return marker;
    });
    // cluster markers
    var markerCluster = new MarkerClusterer(map, markers, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
}