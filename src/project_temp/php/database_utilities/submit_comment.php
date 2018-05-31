<?php 
    require 'CommentValidator.php';
    require 'DebugUtilities.php';
    
    if(isset($_POST['createComment'])){ //check if form was submitted
        $author = $_POST['commentAuthor'];
        $title = $_POST['commentTitle'];
        $text = $_POST['commentText'];
        $captcha = $_POST['captcha'];

        $commentValidator = new CommentValidator(/*$author, $title, $text, $captcha*/);
        
        $authorValid  = $commentValidator->validateAuthor($author);
        $titleValid   = $commentValidator->validateTitle($title);
        $textValid    = $commentValidator->validateText($text);
        $captchaValid = $commentValidator->validateCaptcha($captcha);

        if ($authorValid && $titleValid && $textValid && $captchaValid) {
            //TODO: send data to DB
        } 
    } 
?>
