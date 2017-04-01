function getLocation() {
    if (navigator.geolocation) navigator.geolocation.getCurrentPosition(showPosition)
    else alert("Geolocation is not supported by your browser!")
}

function showPosition(position) {
    alert("Latitude: " + position.coords.latitude + "\nLongitude: " + position.coords.longitude)
}