<?php
    use MyPage\Captcha;
    use MyPage\CaptchaQuery;
    
    class CaptchaUtility {
    
        
        public function getCaptcha() {
            // $numberOfCaptchas = ;
            // $this->mockCaptchas();
            $query = new CaptchaQuery();
            $result = $query->find();
            $numberOfCaptchas = sizeof($result);

            if ($numberOfCaptchas > 0) { //todo: repair!!!
                $captchaNumber = rand(0, $numberOfCaptchas-1);
            } else {

            }
            // echo $result[$captchaNumber];//
            return $result[$captchaNumber];
            // echo '213';
            // echo CaptchaQuery::create()->find();            
            // $captchaNumber = rand(1, $numberOfCaptchas);
        }

        private function saveCaptcha() {

        }

        public function mockCaptchas() {
            // $captcha = new Captcha();
            // $captcha->setQuestion("2+2=");
            // $captcha->setAnswer("4");
            // $captcha->save();

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