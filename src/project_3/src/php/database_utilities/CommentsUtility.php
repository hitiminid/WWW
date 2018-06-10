<?php

    use MyPage\Comment;
    use MyPage\CommentQuery;
    use MyPage\Captcha;
    use MyPage\CaptchaQuery;

    class CommentsUtility {
        
        /**
         * Method used for getting comments out of DataBase via passed PageID 
         * @param {String} author : comment's author
         * @param {String} title : comment's title
         * @param {String} text : comment's content 
         * @param {Integer} pageId : ID of Page (where comment is located)
        */
        public function saveComment($author, $title, $text, $email, $avatarLink, $pageId) {
            $comment = new Comment();
            $comment->setAuthorName($author);
            $comment->setCommentText($text);
            $comment->setCommentTitle($title);
            $comment->setAuthorEmail($email);
            $comment->setAvatarLink($avatarLink);
            $comment->setPageId($pageId);
            $comment->setCommentDate(gmdate('h:m d-m-Y \C\E\S\T', time())); 
            $comment->save();
        }
        
        /**
         * Method used for getting comments out of DataBase via passed PageID 
         * @param {integer} pageId : ID of Page 
         * @return {Objects' array} comments' objects
        */
        public function getComments($pageId) {
            return CommentQuery::create()->filterByPageId($pageId)->find();
        }  
    }
?>