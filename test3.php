<?php

/* Function for correct string reverse */
function strrev_enc_my($str)
{
    $str = mb_strtolower($str);
    $str = str_replace(' ', '', $str);
    $str = iconv('utf-8', 'windows-1251', $str);
    $str = strrev($str);
    $str = iconv('windows-1251', 'utf-8', $str);
    return $str;
}

function palindrome($str)
{
    $str = mb_strtolower($str);
    $str = str_replace(' ', '', $str);
    $isPalindrome = false;
    $isSubpalindrome = false;

    $resStr = strrev_enc_my($str);

    /* if string Palindrome */
    if($resStr == $str)
    {
         $isPalindrome = true;
         echo 'Palindrome: '.$resStr;
    }
    else    // search subpalindrome
    {
        $length = strlen($str);
        for($i=0; $i<=$length-1; $i++)
        {
            for($j=$length; $j>1; $j-- )
            {
                $sub = mb_substr($str, $i, $j);
                $resStr = strrev_enc_my($sub);
                if($resStr == $sub)
                {
                    echo 'Subpolindrome: '.$resStr;
                    $isSubpalindrome = true;
                    return;
                }
            }
        }
    }
    /*if not find palindrome or subpalidrome*/
    if(!($isPalindrome || $isSubpalindrome))
    {
        echo mb_substr($str, 0, 1);
        return;
    }
}

$str = "Аргентина манит негра";
palindrome($str);