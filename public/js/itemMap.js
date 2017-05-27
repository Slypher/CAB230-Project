function initMap() {
    var lat = document.getElementsByName('location_lat')[0].value
    var long = document.getElementsByName('location_long')[0].value

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: {lat: parseFloat(lat), lng: parseFloat(long)}
    });

    var marker = new google.maps.Marker({
        position: {lat: parseFloat(lat), lng: parseFloat(long)},
        map: map
    });
}