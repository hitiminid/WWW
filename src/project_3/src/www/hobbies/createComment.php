<?php



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/comments.css">
    <link rel="stylesheet" href="../../css/main_style.css">
    <link rel="stylesheet" href="../../css/grid.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-MML-AM_CHTML' async></script>
    <title>Example</title>
</head>
<body>
    <div id="app">
        <div id="create-comment-field">
            <form action="" method="POST">
                <div class="row">
                    <input id="comment-author-input-field" class="comment-input-field" type="text" name="displayName" placeholder="Podpis">
                    <input id="email-input-field" class="comment-input-field" type="text" name="displayName" placeholder="e-mail">
                </div>
                <div>
                    <input class="comment-input-field" type="text" name="commentName" placeholder="Tytuł Komentarza">
                </div>
                
                <div>
                    <textarea id="comment-text-area" placeholder="Miejsce na Twój komentarz" name="commentText" class="comment-input-field"></textarea>            
                </div>
                <div id="captcha-field" class="row">
                    <div id="captcha-question-field">
                        <p id="captcha-question">\( x^2 + y^2 = \)</p>
                    </div>
                    <div id="captcha-answer-field">
                        <input id="captcha-answer" type="text" name="captcha">
                    </div>
                </div>
                <div id="submit-comment-field" style="display:flex;">
                    <div id="attach-avatar-field"  class="col-3">
                        <div id="attach-icon"></div>
                        <input type="text" id="avatar-input-field" placeholder="Link do Twojego avatara"/>
                    </div>
                    <div id="submit-comment-button-field" class="col-1">
                        <input id="submit-comment-button" type="submit" value="Wyślij">
                    </div>
                </div>
            </form>         
        </div>            
    </div>
</body>
<!-- <script src="js/comments.js"></script> -->

</html>