<?php
function secureinputs($input)
{
   if (is_array($input))
   {
       foreach ($input as $word)
       {
           $char = str_split($word);
           $res = ord($char);
           if($res == 96 ||$res ==60 || $res == 61 || $res == 62 || $res == 59 ||$res == 44 || $res == 37 ||$res == 36||$res == 34)
           {
               exit("<body style='background-color: black'><div style=\"text-align: center;\"><img  src=\"https://www.secgeek.net/wp-content/themes/moments/img/logo.png\" /><br><h2 style='color:white;  '>SPECIAL CHARS LIKE (' ` ? $ \" ! < > = ) ARE RESTRICTED</h2> </body>");
           }
       }
       return true;
   }
   else
   {
       $chars = str_split($input);
       foreach ($chars as $char)
       {
           $res = ord($char);
           if ($res == 96 || $res == 60 || $res == 61 || $res == 62 || $res == 59 || $res == 44 ||$res == 47|| $res == 37 || $res == 36 || $res == 34 || $res == 33) {
               exit("<body style='background-color: black ; color:white;font-family: Candara; '><div style=\"text-align: center;\"><img src=\"https://www.secgeek.net/wp-content/themes/moments/img/logo.png\"/><h1>website defence system</h1><br><h2>SPECIAL CHARS LIKE (' ` ? $ \" ! < > = ) ARE RESTRICTED</h2></div> </body>");
           }
           return $input;
       }
   }
}