<?php 
    
    require_once("../../setup.php");
    require 'CommentsUtility.php';
    require 'CaptchaUtility.php';

    use MyPage\Comment;
    use MyPage\CommentQuery;
    use MyPage\Captcha;
    use MyPage\CaptchaQuery;

    $author     = $_POST['commentAuthor'];
    $title      = $_POST['commentTitle'];
    $text       = $_POST['commentText'];
    $email      = $_POST['authorEmail'];
    $avatarLink = $_POST['avatarLink'];
    $pageId     = $_POST['pageId'];
    $question   = $_POST['captchaQuestion'];
    $answer     = $_POST['captchaAnswer'];
    
    $commentsUtility = new CommentsUtility();
    $captchaUtility = new CaptchaUtility();
    $response = array();
    
    if ($captchaUtility->validateCaptcha($question, $answer)) {
        $commentsUtility->saveComment($author, $title, $text, $email, $avatarLink, $pageId);  
        $response['creationDate'] = gmdate('h:m d-m-Y', time());
    } else {
        $response['error'] = 'Wrong Captcha';
    }
    
    echo json_encode($response);
?>
