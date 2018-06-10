// inputs are used in many places - assign them once
var attachIcon = document.getElementById("attach-icon");
var avatarInput = document.getElementById("avatar-input-field");
var commentAuthorInputField = document.getElementById("comment-author-input-field");
var avatarInputField = document.getElementById('avatar-input-field');
var commentTitleInputField = document.getElementById("comment-title-input-field");
var commentTextArea = document.getElementById("comment-text-area");
var captchaQuestion = document.getElementById('captcha-question');
var captchaAnswer = document.getElementById('captcha-answer');
var emailInputField = document.getElementById('email-input-field');
var noCommentsInfo = document.getElementById('no-comments-info');

if (attachIcon != null) {
    attachIcon.addEventListener("click", function(){
        attachIcon.style.display = 'none';
        avatarInput.style.display = 'block';
    });
}

validateData = () => {
    let text   = commentTextArea.value;
    return text != "";
}

hideNoCommentsSection = () => {
    if (noCommentsInfo != null) {
        noCommentsInfo.style.display = 'none';
    }
}

getAuthorField = (author, email) => {
    if (email != "") {
        return `<h6 class='comment-author'>${author} (${email})</h6>`;
    } else {
        return `<h6 class='comment-author'>${author}</h6>`;
    }
}

getCommentBody = (title, text) => {
    if (title != null || title != "") {
        return `<div class='comment-body'><p class='comment-title'>${title}</p><p class='comment-text'>${text}</p></div></div>`;
    } else {
        return `<div class='comment-body'><p class='comment-text'>${text}</p></div></div>`;
    }
}

appendCurrentlyCreatedComment = (author, email, avatar, date, title, text) => {
    hideNoCommentsSection(); 
    let comment = createNewComment(author, email, avatar, date, title, text);
    $("#comment-section-body").append(comment);
}

createNewComment = (author, email, avatar, date, title, text) => {
    if (avatar === "") {
        avatar = '../../img/avatar_placeholder.png';
    }
    let commentStart_1 = "<div class='comment'><div class='comment-header'><div class='children'>";
    let commentStart_2 = `<div class='image-panel'><img src='${avatar}'></div>`;
    let commentStart_3 = `<div class='comment-info'>` + getAuthorField(author, email);
    let dateField = `<h6 class='comment-date'>${date}</h6></div></div></div>`;
    let commentBody = getCommentBody(title, text);
    let comment = commentStart_1 + commentStart_2 + commentStart_3 + dateField + commentBody;
    return comment;
}

clearInputFields = () => {
    commentAuthorInputField.value = '';
    commentTitleInputField.value = '';
    commentTextArea.value = '';
    avatarInputField.value = '';
    emailInputField.value = '';
    captchaAnswer.value = '';
}

function sendComment(event) {
    if (validateData()) {

        let author     = commentAuthorInputField.value;
        if (author === "") {
            author = "Anonim";
        }
        let avatar     = avatarInputField.value;
        let title      = commentTitleInputField.value;
        let text       = commentTextArea.value;
        let email      = emailInputField.value;
        let date       = "";
        
        let question   = captchaQuestion.innerHTML;
        let answer     = captchaAnswer.value;

        var myData = {
            commentAuthor: author,
            commentTitle: title,
            commentText: text,
            authorEmail: email, 
            avatarLink: avatar, 
            pageId: event.data.pageId,
            captchaQuestion: question,
            captchaAnswer: answer
        };

        const phpScriptURL = "../../php/database_utilities/submit_comment.php";

        $.ajax({
            url: phpScriptURL,
            type: 'POST',
            dataType: 'json',
            data: myData,
            success: function( obj, textstatus ) {
                if( !('error' in obj) ) {
                    console.log("all correct");
                    appendCurrentlyCreatedComment(author, email, avatar, obj['creationDate'], title, text);        
                    clearInputFields();
                } else {
                    alert(obj["error"]);
                }
            }
        });
    }
}