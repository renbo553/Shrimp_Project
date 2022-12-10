<?php
/*** function definition ***/

/* password_strong:
 * 		check strong
 * param:
 * 		msg: input password
 */

function password_strong ($password) {
    //大寫
    $uppercase = preg_match('@[A-Z]@', $password);
    //小寫
    $lowercase = preg_match('@[a-z]@', $password);
    //數字
    $number    = preg_match('@[0-9]@', $password);
    //其餘符號
    $specialChars = preg_match('@[^\w]@', $password);
    //計算含有幾種
    $count = 0 ;
    if($uppercase) $count ++ ;
    if($lowercase) $count ++ ;
    if($number) $count ++ ;
    if($specialChars) $count ++ ;
    return $count ;
}
