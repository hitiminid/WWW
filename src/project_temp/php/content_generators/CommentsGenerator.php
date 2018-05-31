<?php

    require_once(__DIR__. DIRECTORY_SEPARATOR . "Utility.php");

    class CommentsGenerator 
    {
        private $utilityManager;
        private $mainPagePath = "../index.php";
        private $imagePath = "../../img/logo.png";
        private $semestersPrefix = "";
        private $hobbyPath = "../hobbies/hobbies.php";

        public function __construct() {
            $this->utilityManager = new Utility();
        }

        public function generateCommentsSection($data) {
            $header = $this->generateCommentsSectionHeader();
            $comments = $this->generateCommentsSectionBody($comments);
            $commentsSection = "";
            $commentsSection .= $header;
            $commentsSection .= $comments;
            return $commentSection;
        }

        public function generateCommentsSectionHeader() {
            $content = "<div id='comment-section-header'>
                            <div class='left-element'><p>Comments:</p></div>
                            <div class='right-element'></div>
                        </div>";
            return $content;
        }

        public function generateCommentsSectionBody(/*objects' array*/$comments) {
            $generatedComments = "";
            foreach ($comments as $comment) {
                $generatedComments .= $this->generateComment(
                                        $comment->getAuthor(),
                                        $comment->getTitle(), 
                                        $comment->getText(), 
                                        $comment->getPageId());
            }
            return $this->utilityManager->appendElements("<div id='comment-section-body'>", $generatedComments, "</div>");
        }

        public function generateComment($user, $title, $text, $avatar, $date, $votes) {
            if ($avatar == NULL) {
                $avatar = "./img/avatar_placeholder.png";
            }
            $header = "<div class='comment-header'>
                            <div class='children'>
                                <div class='image-panel'>
                                    <img src='$avatar'>
                                </div>
                                <div class='comment-info'>
                                    <h6 class='comment-author'>$user</h6>
                                    <h6 class='comment-date'>$date</h6>
                                </div>
                                <div class='votes right-element'>+1</div>
                            </div>
                        </div>";
            $body = "<div class='comment-body'><p class='comment-text'>$text</p></div>";
            $commentContent = $header . $body;
            $comment = "<div class='comment'>$commentContent</div>";
            return $comment;
        }

        public function generateCaptcha() { 
            
        }
    }
?>