<?php


function strrev_enc_my($str){
    $str = mb_strtolower($str);
    $str = str_replace(' ', '', $str);
    $str = iconv('utf-8', 'windows-1251', $str);
    $str = strrev($str);
    $str = iconv('windows-1251', 'utf-8', $str);
    return $str;
}

function isPalindrome($str) {
   // var_dump($str);

    $resStr = strrev_enc_my($str);
    var_dump($resStr);
    if($resStr == $str){
        return $resStr;
    } else {
        if(isPalindrome($str)) {
            echo "subpolindrome";
        } else {
            return "No polindrome";
        }
    }
}

$str = "Аргентина манит негра";
isPalindrome($str);