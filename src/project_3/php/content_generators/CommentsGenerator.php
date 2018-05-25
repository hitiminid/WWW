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

        public function generateCommentHeader() {
            $content = "";
            return $content;
        }

        public function generateComment($avatar, $date, $votes, $title, $text) {
            $header = "";
            $body = "";
            $comment = $header . $body;
            return $comment;
        }

    }
?>