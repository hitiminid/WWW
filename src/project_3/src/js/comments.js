let attachIcon = document.getElementById("attach-icon");
let avatarInput = document.getElementById("avatar-input-field");

if (attachIcon != null) {
    attachIcon.addEventListener("click", function(){
        attachIcon.style.display = 'none';
        avatarInput.style.display = 'block';
    });
}

validateData = () => {
    let author = document.getElementById("comment-author-input-field").value;
    let title  = document.getElementById("comment-title-input-field").value;
    let text   = document.getElementById("comment-text-area").value;
    return author != "" && title != "" && text != "";
}

hideNoCommentsSection = () => {
    let noCommentsSection = document.getElementById('no-comments-info');
    if (noCommentsSection != null) {
        noCommentsSection.style.display = 'none';
    }
}

getAuthorField = (author, email) => {
    if (email != null || email != "") {
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
    if (avatar === "") {
        avatar = '../../img/avatar_placeholder.png';
    }
    //todo: render title
    let commentStart_1 = "<div class='comment'><div class='comment-header'><div class='children'>";
    let commentStart_2 = `<div class='image-panel'><img src='${avatar}'></div>`;
    let commentStart_3 = `<div class='comment-info'>` + getAuthorField(author, email);
    let dateField = `<h6 class='comment-date'>${date}</h6></div></div></div>`;
    let commentBody = getCommentBody(title, text);
    let comment = commentStart_1 + commentStart_2 + commentStart_3 + dateField + commentBody;
    console.log(comment);
    $("#comment-section-body").append(comment);
}

clearInputFields = () => {
    document.getElementById("comment-author-input-field").value = '';
    document.getElementById("comment-title-input-field").value = '';
    document.getElementById("comment-text-area").value = '';
    document.getElementById('avatar-input-field').value = '';
    document.getElementById('email-input-field').value = '';
    document.getElementById('captcha-answer').value = '';
}

function sendComment(event) {
    if (validateData()) {

        let author   = document.getElementById('comment-author-input-field').value;
        let avatar   = document.getElementById('avatar-input-field').value;
        let title    = document.getElementById('comment-title-input-field').value;
        let text     = document.getElementById('comment-text-area').value;
        let email    = document.getElementById('email-input-field').value;
        let date     = "";
        let question = document.getElementById('captcha-question').innerHTML;
        let answer   = document.getElementById('captcha-answer').value;

        var myData = {
            commentAuthor: author,
            commentTitle: title,
            commentText: text,
            authorEmail: email, 
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