<?php
    // require_once("../../setup.php");

    use MyPage\Comment;
    use MyPage\CommentQuery;
    use MyPage\Captcha;
    use MyPage\CaptchaQuery;
    
    class DatabaseUtility {

        public function dropDB($dropComment, $dropCaptcha) {
            if ($dropComment) {
                CommentQuery::create()->find()->delete();
            }
            if ($dropCaptcha) {
                CaptchaQuery::create()->find()->delete();
            }
        }
    }
?>