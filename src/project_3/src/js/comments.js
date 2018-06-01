let attachIcon = document.getElementById("attach-icon");
let avatarInput = document.getElementById("avatar-input-field");

attachIcon.addEventListener("click", function(){
    attachIcon.style.display = 'none';
    avatarInput.style.display = 'block';
});


function sendComment(){

    //todo: data validation
    //todo: append div

    let isDataValid = validateData();
    // let isDataValid = true;

    if (isDataValid) {
    
        var myData = {
            commentAuthor: $('#comment-author-input-field').val(),
            commentTitle: $('#comment-author-input-field').val(),
            commentText: $('#comment-text-area').val(),
        };
    
        //todo: parametryzacja ścieżki
        $.ajax({
            url: "../../php/database_utilities/submit_comment.php",
            type: 'POST',
            dataType: 'json',
            data: myData,
            success: function( obj, textstatus ) {
                if( !('error' in obj) ) {
                    console.log("all correct");
                }
                else {
    
                    console.log(obj["error"]);
                }
            }
        });
    }
}

validateData = () => {

    let author = $('#comment-author-input-field').val();
    let title  = $('#comment-title-input-field').val();
    let text   = $('#comment-text-area').val();

    return author != "" && title != "" && text != "";
}

appendCurrentlyCreatedComment = (author, avatar, date,text) => {
    let commentStart_1 = "<div class='comment'></div><div class='comment-header'><div class='children'>";
    let commentStart_2 = "<div class='image-panel'><img src='${avatar}'></div>";
    let commentStart_3 = "<div class='comment-info'><h6 class='comment-author'>$author</h6><h6 class='comment-date'>${date}</h6></div>"

    let commentBody = "<div class='comment-body'><p class='comment-text'>${ text }</p></div>";

    // todo: append 

}

$("#submit-comment-button").click(sendComment);
