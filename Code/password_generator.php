<?php

   $Alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $NonAlpha = '!@#$%^&*_-/?:;\|=+';
   $Numeric = '0123456789';
   $agpass = str_shuffle(
      substr(str_shuffle($Alpha),0,4) .
      substr(str_shuffle($NonAlpha),0,2).
      substr(str_shuffle($Numeric),0,2));
    
?>


