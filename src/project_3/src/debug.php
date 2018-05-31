<?php
    // setup the autoloading
    require_once 'vendor/autoload.php';
    // // setup Propel
    require_once 'generated-conf/config.php';

    use MyPage\Comment;
    use MyPage\CommentQuery;
    use MyPage\Captcha;
    use MyPage\CaptchaQuery;
    
    // require_once(__DIR__."/../php/content_generators/HomePageGenerator.php");
    // require_once(__DIR__."/../php/content_generators/PageGenerator.php");
    require_once(__DIR__."/php/content_generators/CommentsGenerator.php");
    require_once(__DIR__."/php/database_utilities/CommentsUtility.php");


    // $comment = new Comment();
    // $comment->setAuthorName("pietrek");
    // $comment->setCommentTitle("komentarz");
    // $comment->setCommentText("jego tekst");
    // $comment->setPageId(1);
    // $comment->setCommentDate(gmdate('Y-m-d h:i:s \G\M\T', time()));
    // $comment->save();
    // (new CommentsUtility())->saveComment("Pietrek", "Title", "text", 1);
    // echo $comment->getAuthorName();
    // echo $comment->getId();
    // echo $comment->getPageId();


    // $commentsGenerator = new CommentsGenerator();
    // echo $commentsGenerator->generateCommentsSection(1);

    $commentsSection = (new CommentsGenerator)->generateCommentsSection(1);
    echo $commentsSection;


    // echo CommentQuery::create()->filterByPageId(1)->pageIdfind();





    
?>