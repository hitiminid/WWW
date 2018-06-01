<?php 
    
    require_once("../../setup.php");
    // require 'CommentsUtility.php';


    use MyPage\Comment;
    use MyPage\CommentQuery;
    use MyPage\Captcha;
    use MyPage\CaptchaQuery;

    // CommentQuery::create()
    // ->filterByCommentText('TEXT')
    // ->delete();

    $author = $_POST['commentAuthor'];
    $title  = $_POST['commentTitle'];
    $text  = $_POST['commentText'];
    $captcha  = $_POST['captcha'];

    // $commentsUtility = new CommentsUtility();
    // $pageId = 1;
    // $commentsUtility->saveComment("debug", "AAAAAAAA", "123", 1);  


    $comment = new Comment();
    $comment->setAuthorName($author);
    // $comment->setCommentTitle($title);
    $comment->setCommentText($text);

    // $comment->setCommentText($text);
    $comment->setPageId(1);
    $comment->setCommentDate(gmdate('Y-m-d h:i:s \G\M\T', time()));
    $comment->save();

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
