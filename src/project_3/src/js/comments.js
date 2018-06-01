// let attachIcon = document.getElementById("attach-icon");
// let avatarInput = document.getElementById("avatar-input-field");

// attachIcon.addEventListener("click", function(){
//     attachIcon.style.display = 'none';
//     avatarInput.style.display = 'block';
// });


$("#submit-comment-button").click(function(){

    var myData = {
        commentAuthor: $('#comment-author-input-field').val(),
        // commentAuthor: "AUTHOR",
        commentTitle: $('#comment-author-input-field').val(),
        commentText: $('#comment-text-area').val(),
        captcha: "123"
    };

    $.ajax({
        url: "../php/database_utilities/submit_comment.php",
        type: 'POST',
        dataType: 'json',
        data: myData,
        success: function( obj, textstatus ) {
            if( !('error' in obj) ) {
                // yourVariable = obj.result;
                console.log("all correct");
            }
            else {

                console.log(obj["error"]);
            }
        }
    });
});
