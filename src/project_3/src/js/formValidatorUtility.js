setCustomRequiredFormMessage = (elementID, customMessage) => {
    let element = document.getElementById(elementID);
    element.oninvalid = function(e) {
        e.target.setCustomValidity("");
        if (!e.target.validity.valid) {
            e.target.setCustomValidity(customMessage);
        }
    };
    element.oninput = function(e) {
        e.target.setCustomValidity("");
    };
}

setCustomRequiredFormMessage("comment-text-area", "Uzupełnij treść komentarza!");
setCustomRequiredFormMessage("captcha-answer", "Udowodnij, że nie jesteś robotem!");
