<?php 
    
    require_once("../../setup.php");
    require 'CommentsUtility.php';
    require 'CaptchaUtility.php';


    use MyPage\Comment;
    use MyPage\CommentQuery;
    use MyPage\Captcha;
    use MyPage\CaptchaQuery;

    // CommentQuery::create()
    // ->filterByCommentText('')
    // ->delete();

    $author   = $_POST['commentAuthor'];
    $title    = $_POST['commentTitle'];
    $text     = $_POST['commentText'];
    $pageId   = $_POST['pageId'];
    $question = $_POST['captchaQuestion'];
    $answer   = $_POST['captchaAnswer'];

    $commentsUtility = new CommentsUtility();
    // $pageId = $p;
    
    $captchaUtility = new CaptchaUtility();
    $response = array();
    
    if ($captchaUtility->validateCaptcha($question, $answer)) {
        // doesnt work because captcha doesnt have a question !!!!!!!!!!
        // $response['error'] = 'Wrong Captcha';
    // if (true) {
        $commentsUtility->saveComment($author, $text, $pageId);  
    } else {
        $response['error'] = 'Wrong Captcha';
    }
    

    // if( !isset($_POST['commentAuthor']) ) { 
    //     $aResult['error'] = '1!'; 
    // }

    // if (!isset($_POST['commentTitle'])) {
    //     $aResult['error'] = '2'; 
    // }

    // if (!isset($_POST['commentText'])) {
    //     $aResult['error'] = 'No comment text!'; 
    // }

    // if (!isset($_POST['captcha'])) {
    //     $aResult['error'] = 'No comment text!'; 
    // }
    
    echo json_encode($response);
?>
