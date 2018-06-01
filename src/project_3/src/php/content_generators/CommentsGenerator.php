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
            $commentsData = $this->commentsUtility->getComments($pageId);
            $commentsSection = $this->generateContent($commentsData);
            return $commentsSection;
        }
        
        private function generateContent($comments) {
            $header = $this->generateCommentsSectionHeader();
            $comments = $this->generateCommentsSectionBody($comments);
            $createComment = $this->generateCreateCommentField("2+2=");            
            $commentsSection = "";
            $commentsSection .= $header;
            $commentsSection .= $comments;
            $commentsSection .= $createComment;

            return "<div id='comment-section'>$commentsSection</div>";
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

        private function generateCreateCommentField($captchaQuestion) {
            $content = " <div id='create-comment-field'>
            <form action='/php/database_utilities/submit_comment.php' method='POST'>
                <div class='row'>
                    <input id='comment-author-input-field' class='comment-input-field' type='text' name='displayName' placeholder='Podpis'>
                    <input id='email-input-field' class='comment-input-field' type='text' name='displayName' placeholder='e-mail'>
                </div>
                <div>
                    <input id='comment-title-input-field' class='comment-input-field' type='text' name='commentName' placeholder='Tytuł Komentarza'>
                </div>
                <div>
                    <textarea id='comment-text-area' placeholder='Miejsce na Twój komentarz' required name='commentText' class='comment-input-field'></textarea>            
                </div>
                <div id='captcha-field' class='row'>
                    <div id='captcha-question-field'>
                        <p id='captcha-question'>\( x^2 + y^2 = \)</p>
                    </div>
                    <div id='captcha-answer-field'>
                        <input id='captcha-answer' type='text' name='captcha'>
                    </div>
                </div>
                <div id='submit-comment-field' style='display:flex;'>
                    <div id='attach-avatar-field'  class='col-3'>
                        <div id='attach-icon'></div>
                        <input type='text' id='avatar-input-field' placeholder='Link do Twojego avatara'/>
                    </div>
                    <div id='submit-comment-button-field' class='col-1'>
                        <div id='submit-comment-button' style='width:100px; height:100px;'>WYŚLIJ</div>
                    </div>
                </div>
            </form>         
        </div>            ";
        return $content;
        }

        // private function 
    }
?>