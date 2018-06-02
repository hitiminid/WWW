<?php
    use MyPage\Captcha;
    use MyPage\CaptchaQuery;
    
    class CaptchaUtility {
        
        public function getCaptcha() {
            $query = new CaptchaQuery();
            $result = $query->find();
            $numberOfCaptchas = sizeof($result);

            if ($numberOfCaptchas > 0) { //todo: repair!!!
                $captchaNumber = rand(0, $numberOfCaptchas-1);
            } else {

            }
            return $result[$captchaNumber];
        }

        public function validateCaptcha($question, $answer) {
            $query    = new CaptchaQuery();
            $result   = $query->filterByQuestion($question)->filterByAnswer($answer)->find();
            return (sizeof($result) > 0);
        }

        public function mockCaptchas() {
            $captcha1 = new Captcha();
            $captcha1->setQuestion("5*5=");
            $captcha1->setAnswer("25");
            $captcha1->save();
            
            $captcha2 = new Captcha();
            $captcha2->setQuestion("1+1=");
            $captcha2->setAnswer("2");
            $captcha2->save();
        }
    }
?>