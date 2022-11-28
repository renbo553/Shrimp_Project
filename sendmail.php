<?php
    require_once "utility.php" ;
    require("smtp.php") ;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    //include_once ( "connect.php" ); //連接數據庫
    $email = stripslashes(trim($_POST[ 'email' ]));
    //$sql = "select id,username,password from `t_user` where `email`='$email'" ;
    //$query = mysql_query($sql);
    //$num = mysql_num_rows($query);
    //if ($num== 0 ){ //該郵箱尚未註冊！
    //    echo  'noreg' ;
    //    exit ;
    //} 
    //else {
    //    $row = mysql_fetch_array($query);
    //    $getpasstime = time();
    //    $uid = $row[ 'id' ];
    //    $token = md5($uid.$row[ 'username' ].$row[ 'password' ]); //組合驗證碼
    //    $url = "http://localhost/Shrimp_Project-main/reset.php?email=" .$email. "&token=" .$token; //構造URL
    //    $url = "http://localhost/Shrimp_Project-main/modify_password" .$email; //構造URL
        $url = "http://localhost/Shrimp_Project-main/login"; //構造URL 
        $time = date( 'Ymd H:i' );
        $result = sendmail($time,$email,$url);
        if ($result==true){ //郵件發送成功
            $msg = '系統已向您的郵箱發送了一封郵件，請登錄到您的郵箱及時重置您的密碼！' ;
            $url = "modify_password" ;
            utility_window_msg($msg, $url);
            //更新數據發送時間
    //        mysql_query( "update `t_user` set `getpasstime`='$getpasstime' where id='$uid '" );
        }
    //    else {
    //        $msg = $result;
    //    }
    else {
        utility_window_msg("幹", null);
    }
    //}
    //發送郵件
    function sendmail ($time,$email,$url) {
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
        $mail->Password = 'fcggrxtoatilvavd';
        $mail->setFrom('shrimpicdsa@gmail.com', 'shrimp65534');
        $mail->addAddress($email);
        $mail->Subject = 'modify password';
        $mail->msgHTML("
        <html>
            <body>
                <div> 
                    <p> 親愛的 $email <br> 您在 $time 提交了修改密碼請求。請點擊下面的連結重置密碼（按鈕24小時內有效）。</br> </p>
                    <a href=$url>點此修改密碼</a>
                </div>
            </body>
        </html>" , __DIR__) ;
        if (!$mail->send()) return false ;
        else return true ;
        
    }
?>