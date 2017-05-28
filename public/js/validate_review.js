// Entrypoint function called once form is submitted
function validate() {
    var valid = true
    valid = (checkReview(document.getElementsByClassName('review-textarea')[0]) && valid)
    valid = (checkRating(
        document.getElementsByClassName('star5')[0],
        document.getElementsByClassName('star4')[0],
        document.getElementsByClassName('star3')[0],
        document.getElementsByClassName('star2')[0],
        document.getElementsByClassName('star1')[0])
        && valid)
    return valid;
}

// Check 'email-field' input
function checkReview(element) {
    if (element.value == "") return showError('review-error')
    if (element.value.length > 255) return showError('review-char-error')
    return true
}

// Check 'male-radio', 'female-radio', 'other-radio' inputs
function checkRating(element1, element2, element3, element4, element5) {
    if (element1.checked == false && element2.checked == false && element3.checked == false && element4.checked == false && element5.checked == false) return showError('rating-error')
    return true
}

// Function called to modify CSS properties to display a particular error
function showError(errorName) {
    document.getElementsByClassName('error-message')[0].style.display = 'block'
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