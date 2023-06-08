<?php
    //produce the email detail
    require_once "config.php" ;
    require_once "utility.php" ;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    function makemail($email , $username , $password , $register_or_modify) {
        //$register_or_modify 預設為註冊(註冊為0，修改密碼為1)
        if($register_or_modify == 0)
            $url = "http://localhost/Shrimp_Project-main/register_email.php?email=" .$email. "&username=" .$username. "&password=" .$password; //構造URL
        else
            $url = "http://localhost/Shrimp_Project-main/reset_password.php?email=" .$email. "&username=" .$username. "&password=" .$password; //構造URL
        
            // Get the current date and time in the Taiwan time zone
        $now = new DateTime();
        $now->setTimeZone(new DateTimeZone('Asia/Taipei'));
        $time = $now->format('Y/m/d H:i');

        $result = sendmail($time,$email,$username,$url,$register_or_modify);
        if ($result==true){ //郵件發送成功
            $msg = '系統已向您的郵箱發送了一封郵件，請登錄到您的郵箱以收取信件！' ;
            if($register_or_modify == 1) utility_window_msg($msg, "modify_password");
            else utility_window_msg($msg, "register");
        }
        else {
            if($register_or_modify == 1) utility_window_msg("發送郵件未成功", "modify_password");
            else utility_window_msg("發送郵件未成功" , "register");
        }
    }
    
    //發送郵件
    function sendmail ($time,$email,$username,$url,$register_or_modify) {
        require 'vendor/autoload.php' ;
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->CharSet = "utf-8";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = 'shrimpicdsa@gmail.com';
        $mail->Password = 'xstmmbsboafgflyh';
        $mail->setFrom('shrimpicdsa@gmail.com', 'shrimpshrimp');
        $mail->addAddress($email);
        if($register_or_modify == 1) {
            $mail->Subject = 'modify password';
            $mail->msgHTML("
            <html>
                <body>
                    <div> 
                        <p> 親愛的 $username <br> 您在 $time 提交了修改密碼請求。請點擊下面的連結重置密碼。</br> </p>
                        <a href=$url>點此修改密碼</a>
                    </div>
                </body>
            </html>" , __DIR__) ;
        }
        else {
            $mail->Subject = 'register';
            $mail->msgHTML("
            <html>
                <body>
                    <div> 
                        <p> 親愛的 $username <br> 您在 $time 提交了註冊請求。請點擊下面的連結來繼續註冊。</br> </p>
                        <a href=$url>點此繼續註冊</a>
                    </div>
                </body>
            </html>" , __DIR__) ;
        }
        if (!$mail->send()) return false ;
        else return true ;
        
    }
?>