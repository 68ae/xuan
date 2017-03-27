<?php
function safeSql($value){
    $a = $value;
    $a=str_replace("'","",$a);
    $a=str_replace("\"","",$a);
    $a=str_replace("=","",$a);
    return $a;
}