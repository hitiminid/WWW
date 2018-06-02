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

appendCurrentlyCreatedComment = (author, avatar, date,text) => {
    
    hideNoCommentsSection(); 
    if (avatar === "") {
        avatar = '../../img/avatar_placeholder.png';
    }
    let commentStart_1 = "<div class='comment'><div class='comment-header'><div class='children'>";
    let commentStart_2 = `<div class='image-panel'><img src='${avatar}'></div>`;
    let commentStart_3 = `<div class='comment-info'><h6 class='comment-author'>${author}</h6><h6 class='comment-date'>${date}</h6></div></div></div>`;
    let commentBody    = `<div class='comment-body'><p class='comment-text'>${text}</p></div></div>`;
    let comment = commentStart_1 + commentStart_2 + commentStart_3 + commentBody;
    console.log(comment);
    $("#comment-section-body").append(comment);
    // todo: append 
}

clearInputFields = () => {
    document.getElementById("comment-author-input-field").value = '';
    document.getElementById("comment-title-input-field").value = '';
    document.getElementById("comment-text-area").value = '';
}

function sendComment(event) {

    //todo: data validation
    //todo: append div

    let isDataValid = validateData();
    // let isDataValid = true;

    if (isDataValid) {
        // console.log(pageId);
        console.log(event.data.pageId);

        let author = document.getElementById('comment-author-input-field').value;
        let avatar = document.getElementById('avatar-input-field').value;
        let title  = document.getElementById('comment-author-input-field').value;
        let text   = document.getElementById('comment-text-area').value;
        let date   = "";

        var myData = {
            commentAuthor: author,
            commentTitle: title,
            commentText: text,
            pageId: event.data.pageId
        };

        appendCurrentlyCreatedComment(author, avatar, date, text);
        phpScriptURL = "../../php/database_utilities/submit_comment.php";

        $.ajax({
            url: phpScriptURL,
            type: 'POST',
            dataType: 'json',
            data: myData,
            success: function( obj, textstatus ) {
                if( !('error' in obj) ) {
                    console.log("all correct");
                    clearInputFields();
                } else {
                    console.log(obj["error"]);
                }
            }
        });
    }
}

getProperPHPFilePath = (pageId) => {
    // switch (pageId) {
        // case 1:
            // return '../../img/avatar_placeholder.png';
    // }
}

// $("#submit-comment-button").click({pageId: 1}, sendComment);
// todo: kazda strona ma miec wlasny skrypt i przekazywac pageId
