<?php
    use MyPage\Captcha;
    use MyPage\CaptchaQuery;
    
    class CaptchaUtility {
        
        public function getCaptcha() {
            $query = new CaptchaQuery();
            $result = $query->find();
            $numberOfCaptchas = sizeof($result);

            if ($numberOfCaptchas > 0) { 
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
            $captcha = new Captcha();
            $captcha->setQuestion("O(n) QuickSort:");
            $captcha->setAnswer("nlogn");
            $captcha->save();
            
            $captcha2 = new Captcha();
            $captcha2->setQuestion("1+1=");
            $captcha2->setAnswer("2");
            $captcha2->save();
        
            $captcha5 = new Captcha();
            $captcha5->setQuestion("(1+8i) / (2+3i)");
            $captcha5->setAnswer("2+i");
            $captcha5->save();
            
            $captcha3 = new Captcha();
            $captcha3->setQuestion("(1+2i)*(3+i)​");
            $captcha3->setAnswer("1+7i");
            $captcha3->save();
            
            $captcha4 = new Captcha();
            $captcha4->setQuestion("Ile bitów ma bajt?");
            $captcha4->setAnswer("8");
            $captcha4->save();
        }
    }
?>