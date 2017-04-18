// Function makes the geolocation request
function getLocation() {
    if (navigator.geolocation) navigator.geolocation.getCurrentPosition(showPosition)
    else alert("Geolocation is not supported by your browser!")
}

// This function receives the geolocation data and uses it
function showPosition(position) {
    alert("Latitude: " + position.coords.latitude + "\nLongitude: " + position.coords.longitude)
}