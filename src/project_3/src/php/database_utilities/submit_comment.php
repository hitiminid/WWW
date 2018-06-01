<?php 
    require 'CommentValidator.php';
    // include 'DebugUtilities.php';
    // require 'CommentsUtility.php';
    
    if(isset($_POST['createComment'])){ //check if form was submitted
        echo "123123123";
        
        $author = $_POST['commentAuthor'];
        $title = $_POST['commentTitle'];
        $text = $_POST['commentText'];
        $captcha = $_POST['captcha'];

        $commentValidator = new CommentValidator(/*$author, $title, $text, $captcha*/);
        
        $authorValid  = $commentValidator->validateAuthor($author);
        $titleValid   = $commentValidator->validateTitle($title);
        $textValid    = $commentValidator->validateText($text);
        $captchaValid = $commentValidator->validateCaptcha($captcha);

        // if ($authorValid && $titleValid && $textValid && $captchaValid) {    
            //TODO: send data to DB
            $commentsUtility = new CommentsUtility();
            $pageId = 1;
            $commentsUtility->saveComment($author, $title, $text, $pageId);  
            $commentsUtility->saveComment("123", "456", "123", 1);  
        // } 
    } 
?>
