// Entrypoint function called once form is submitted
function validate() {
    var valid = true
    valid = (checkEmail(document.getElementsByClassName('email-field')[0]) && valid)
    valid = (checkUsername(document.getElementsByClassName('username-field')[0]) && valid)
    valid = (checkPassword(document.getElementsByClassName('password-field')[0]) && valid)
    valid = (checkAge(document.getElementsByClassName('birth-picker')[0]) && valid)
    valid = (checkGender(document.getElementsByClassName('male-radio')[0],
        document.getElementsByClassName('female-radio')[0],
        document.getElementsByClassName('other-radio')[0])
        && valid)
    valid = (checkTermsAndConditions(document.getElementsByClassName('agree-checkbox')[0]) && valid)
    return valid;
}

// Check 'email-field' input
function checkEmail(element) {
    var splitWithAt = element.value.split('@')
    if (element.value == "") return showError('email-error')
    if (splitWithAt.length != 2
        || splitWithAt[1].split('.').length < 2
        || splitWithAt[1].split('.')[1].length == 0) showError('email-invalid-error')
    return true
}

// Check 'username-field' input
function checkUsername(element) {
    if (element.value.length < 5) return showError('username-short-error')
    if (element.value.length > 16) return showError('username-long-error')
    return true
}

// Check 'password-field' input
function checkPassword(element) {
    if (element.value.length < 5) return showError('password-short-error')
    if (element.value.length > 22) return showError('password-long-error')
    if (element.value.replace(/[^0-9]/g,"").length < 2) return showError('password-number-error')
    return true
}

// Check 'birth-picker' input
function checkAge(element) {
    var year = parseInt(element.value.split('-')[0])
    if (element.value == "" || element.value == " " || element.value == null) return showError('age-error')
    if (year >= 2010) return showError('age-young-error')
    if (year < 1917) return showError('age-old-error')
    return true
}

// Check 'male-radio', 'female-radio', 'other-radio' inputs
function checkGender(element1, element2, element3) {
    if (element1.checked == false && element2.checked == false && element3.checked == false) return showError('gender-error')
    return true
}

// Check 'agree-checkbox' input
function checkTermsAndConditions(element) {
    if (element.checked == false) return showError('agree-error')
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