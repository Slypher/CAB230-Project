function validate() {
    var valid = true;
    valid = (checkSomething(document.getElementsByClassName('')[0]) && valid)
    return valid;
}

function checkSomething(element) { // TODO
    if (element.value == "") return showError('');
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