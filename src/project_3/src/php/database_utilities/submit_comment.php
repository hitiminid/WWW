<?php 
    
    require_once("../../setup.php");
    require 'CommentsUtility.php';
    require 'CaptchaUtility.php';

    use MyPage\Comment;
    use MyPage\CommentQuery;
    use MyPage\Captcha;
    use MyPage\CaptchaQuery;

    $author   = $_POST['commentAuthor'];
    $title    = $_POST['commentTitle'];
    $text     = $_POST['commentText'];
    $pageId   = $_POST['pageId'];
    $question = $_POST['captchaQuestion'];
    $answer   = $_POST['captchaAnswer'];

    $commentsUtility = new CommentsUtility();
    $captchaUtility = new CaptchaUtility();
    $response = array();
    
    if ($captchaUtility->validateCaptcha($question, $answer)) {
        $commentsUtility->saveComment($author, $text, $pageId);  
        $response['creationDate'] = gmdate('Y-m-d h:m:s \G\M\T', time());
    } else {
        $response['error'] = 'Wrong Captcha';
    }
    
    echo json_encode($response);
?>
