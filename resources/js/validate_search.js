function validate() {
    var valid = true;
    valid = (checkName(document.getElementsByClassName('name-field')[0]) && valid)
    valid = (checkSuburb(document.getElementsByClassName('suburb-picker')[0]) && valid)
    valid = (checkRating(document.getElementsByClassName('rating-picker')[0]) && valid)
    return valid;
}

function checkName(element) {
    if (element.value == "") return showError('name-error');
    return true;
}

function checkSuburb(element) {
    if (element.value == "default") return showError('suburb-error');
    return true;
}

function checkRating(element) {
    if (element.value == null || element.value == "") return showError('rating-error')
    if (element.value > 5 || element.value < 1) return showError('rating-num-error')
    return true;
}

function showError(errorName) {
    document.getElementsByClassName('error-message')[0].style.display = 'block';
    document.getElementsByClassName(errorName)[0].style.display = 'inline';
    return false;
}

function resetError() {
    errorMessageContainer = document.getElementsByClassName('error-message')[0]
    errorMessageContainer.style.display = 'none';
    for (var i = 0; i < errorMessageContainer.children.length; i++) {
        var currentElement = errorMessageContainer.children[i];
        currentElement.style.display = 'none';
    }
}