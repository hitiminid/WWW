<?php 
// https://stackoverflow.com/questions/13447554/how-to-get-input-field-value-using-php
    include 'CommentValidator.php';
    
    if(isset($_POST['createComment'])){ //check if form was submitted
        // $author = $_POST['commentAuthor'];
        // $title = $_POST['commentTitle'];
        // $text = $_POST['commentText'];
        // $captcha = $_POST['captcha'];
        $commentValidator = new CommentValidator(/*$author, $title, $text, $captcha*/);
        
        $authorValid  = $commentValidator->validateAuthor($_POST['commentAuthor']);
        $titleValid   = $commentValidator->validateTitle($_POST['commentTitle']);
        $textValid    = $commentValidator->validateText($_POST['commentText']);
        $captchaValid = $commentValidator->validateCaptcha($_POST['captcha']);

        if ($authorValid && $titleValid && $textValid && $captchaValid) {
            //TODO: send data to DB
        } 
    } 
?>
