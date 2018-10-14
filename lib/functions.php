<?php

function dd()
{
    echo '<pre>';

    $args = func_get_args();

    foreach ($args as $arg){
        var_dump($arg);
    }

    echo '<pre>';
    exit;
}

function array_get($array,$key,$default=null)
{
    if(is_array($array) &&isset($array[$key])){
        return $array[$key];
    }
    return $default;
}

function request_get($key,$request=null)
{
    if(isset($_POST[$key])){
        return array_get($_POST,$key,$default);
    }

    if(isset($_GET[$key])){
        return array_get($_GET,$key,$default);
    }

    return $default;
}

function h($string)
{
    return htmlspecialchars($string,ENT_QUOTES);
}

function camelize(string $s)
{
    return str_replace(['','-','_'],'',ucwords($s,'-_'));
}

function redirect($url){
    header ('Location:'.$url);
    exit;
}
