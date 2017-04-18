// Entrypoint function called once form is submitted
function validate() {
    var valid = true
    valid = (checkName(document.getElementsByClassName('name-field')[0]) && valid)
    valid = (checkSuburb(document.getElementsByClassName('suburb-picker')[0]) && valid)
    valid = (checkRating(document.getElementsByClassName('rating-picker')[0]) && valid)
    return valid
}

// Check 'name-field' input
function checkName(element) {
    if (element.value == "") return showError('name-error')
    return true
}

// Check 'suburb-picker' input
function checkSuburb(element) {
    if (element.value == "default") return showError('suburb-error')
    return true
}

// Check 'rating-picker' input
function checkRating(element) {
    if (element.value == null || element.value == "") return showError('rating-error')
    if (element.value > 5 || element.value < 1) return showError('rating-num-error')
    return true
}

// Function called to modify CSS properties to display a particular error
function showError(errorName) {
    document.getElementsByClassName('error-message')[0].style.display = 'block';
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