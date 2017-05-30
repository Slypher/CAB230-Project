// Function makes the geolocation request
function getLocation() {
    if (navigator.geolocation) navigator.geolocation.getCurrentPosition(showPosition)
    else alert("Geolocation is not supported by your browser!")
}

// This function receives the geolocation data, adds it to hidden inputs,
// displays a success message and allows the user to input a distance in the form
function showPosition(position) {
    document.getElementsByClassName('location-lat')[0].value = position.coords.latitude
    document.getElementsByClassName('location-long')[0].value = position.coords.longitude
    document.getElementsByClassName('distance-field')[0].disabled = false;
    document.getElementsByClassName('success-message')[0].style.display = 'block';
}