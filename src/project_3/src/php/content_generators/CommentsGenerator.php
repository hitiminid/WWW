<?php

    require_once(__DIR__. DIRECTORY_SEPARATOR . "Utility.php");
    $dirname = realpath(__DIR__ . '/../database_utilities');
    require_once($dirname . DIRECTORY_SEPARATOR . "CommentsUtility.php");

    class CommentsGenerator 
    {
        private $utilityManager;
        private $commentsUtility;
        private $mainPagePath = "../index.php";
        private $imagePath = "../../img/logo.png";
        private $semestersPrefix = "";
        private $hobbyPath = "../hobbies/hobbies.php";

        public function __construct() {
            $this->utilityManager = new Utility();
            $this->commentsUtility = new CommentsUtility();
        }

        public function generateCommentsSection($pageId) {
            // echo $comments;            
            // echo $pageId;            
            $comments = $this->commentsUtility->getComments($pageId);
            return $this->generateContent($comments);
        }
        
        private function generateContent($comments) {
            $header = $this->generateCommentsSectionHeader();
            $comments = $this->generateCommentsSectionBody($comments);
            $commentsSection = "";
            $commentsSection .= $header;
            $commentsSection .= $comments;
            return $commentsSection;
        }

        private function generateCommentsSectionHeader() {
            $content = "<div id='comment-section-header'>
                            <div class='left-element'><p>Comments:</p></div>
                            <div class='right-element'></div>
                        </div>";
            return $content;
        }

        private function generateCommentsSectionBody(/*objects' array*/$comments) {
            $generatedComments = "";
            foreach ($comments as $comment) {
                $generatedComments .= $this->generateComment(
                                        $comment->getAuthorName(),
                                        $comment->getCommentText(), 
                                        $comment->getCommentDate(),
                                        $comment->getAvatarLink());
            }
            return $this->utilityManager->appendElements("<div id='comment-section-body'>", $generatedComments, "</div>");
        }

        private function generateComment($author, $text, $date, $avatar) {
            if ($avatar == NULL) {
                $avatar = "../img/avatar_placeholder.png";
            }
            $commentDate = "";
            if ($date != NULL) {
                $commentDate = $date->format('h:m d-m-Y');
            }

            $header = "<div class='comment-header'>
                        <div class='children'>
                            <div class='image-panel'>
                                <img src='$avatar'>
                            </div>
                            <div class='comment-info'>
                                <h6 class='comment-author'>$author</h6>
                                <h6 class='comment-date'>$commentDate</h6>
                            </div>
                        </div>
                    </div>";
            $body = "<div class='comment-body'><p class='comment-text'>$text</p></div>";
            $commentContent = $header . $body;
            $comment = "<div class='comment'>$commentContent</div>";
            return $comment;
        }

        private function generateCaptcha() { 
            
        }
    }
?>