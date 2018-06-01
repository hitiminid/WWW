<?php 
    
    require_once("../../setup.php");
    require 'CommentsUtility.php';


    use MyPage\Comment;
    use MyPage\CommentQuery;
    use MyPage\Captcha;
    use MyPage\CaptchaQuery;

    CommentQuery::create()
    ->filterByCommentText('')
    ->delete();

    $author = $_POST['commentAuthor'];
    $title  = $_POST['commentTitle'];
    $text   = $_POST['commentText'];
    $pageId = $_POST['pageId'];

    $commentsUtility = new CommentsUtility();
    $pageId = 1;
    $commentsUtility->saveComment($author, $text, 1);  

    $aResult = array();

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
    
    echo json_encode($aResult)
?>
