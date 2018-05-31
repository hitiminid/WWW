<?php
    class CommentValidator
    {
        public function validateAuthor($author) {
            return $author != NULL;
        }

        public function validateTitle($title) {
            return $title != NULL;
        }

        public function validateText($text) {
            return $text != NULL;
        }

        public function validateCaptcha($captcha) {
            return $captcha != NULL;
        }
    }
?>