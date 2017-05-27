// Entrypoint function called once form is submitted
function validate() {
    var valid = true
    valid = (checkName(document.getElementsByClassName('name-field')[0]) && valid)
    valid = (checkSuburb(document.getElementsByClassName('suburb-picker')[0]) && valid)
    valid = (checkRating(document.getElementsByClassName('rating-picker')[0]) && valid)
    valid = (checkDistance(document.getElementsByClassName('distance-field')[0]) && valid)
    valid = (checkLocationLat(document.getElementsByClassName('location-lat')[0]) && valid)
    valid = (checkLocationLong(document.getElementsByClassName('location-long')[0]) && valid)
    return valid
}

// Check 'name-field' input
function checkName(element) {
    return true
}

// Check 'suburb-picker' input
function checkSuburb(element) {
    return true
}

// Check 'rating-picker' input
function checkRating(element) {
    if ((element.value !== null && element.value !== '') && (element.value > 5 || element.value < 1)) return showError('rating-num-error')
    return true
}

// Check 'distance-field' input
function checkDistance(element) {
    if (element.value !== null && element.value !== '' && !isNumeric(element.value)) return showError('distance-numeric-error')
    return true
}

// Check 'location-lat' hidden input
function checkLocationLat(element) {
    if (element.value !== null && element.value !== '' && !isNumeric(element.value)) return showError('location-lat-numeric-error')
    return true
}

// Check 'location-long' hidden input
function checkLocationLong(element) {
    if (element.value !== null && element.value !== '' && !isNumeric(element.value)) return showError('location-long-numeric-error')
    return true
}

// Function called to modify CSS properties to display a particular error
function showError(errorName) {
    document.getElementsByClassName('error-message')[0].style.display = 'inline-block';
    document.getElementsByClassName(errorName)[0].style.display = 'inline';
    return false
}

// Function resets all errors, called when any input is modified
function resetError() {
    errorMessageContainer = document.getElementsByClassName('error-message')[0]
    errorMessageContainer.style.display = 'none'
    for (var i = 0; i < errorMessageContainer.children.length; i++) {
        var currentElement = errorMessageContainer.children[i]
        currentElement.style.display = 'none'
    }
}

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}