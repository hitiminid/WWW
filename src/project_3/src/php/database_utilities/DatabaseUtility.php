<?php
    require_once("../../setup.php");

    use MyPage\Comment;
    use MyPage\CommentQuery;
    use MyPage\Captcha;
    use MyPage\CaptchaQuery;
    
    class DatabaseUtility {

        public function mockDataBase() {
            // for ($i = 0; $i < 10; $i++) {
            //     $author = "author" . $i;
            //     $text   = "text" . $i;
            //     $this->saveComment($author, $text, 1);
            // }
        }

        private function mockCaptcha(){
            
        }
        
        private function mockComments(){

        }

        public function dropDB() {
            CommentQuery::create()->find()->delete();
            CaptchaQuery::create()->find()->delete();
            
        }
    }
?>