// Entrypoint function called once form is submitted
function validate() {
    var valid = true
    return valid;
}

// Function called to modify CSS properties to display a particular error
function showError(errorName) {
    document.getElementsByClassName('error-message')[0].style.display = 'inline-block'
    document.getElementsByClassName(errorName)[0].style.display = 'inline'
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