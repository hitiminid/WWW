<?php
    require_once("../../setup.php");

    use MyPage\Comment;
    use MyPage\CommentQuery;
    use MyPage\Captcha;
    use MyPage\CaptchaQuery;
    
    class DatabaseUtility {

        public function mockDataBase() {
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