<?php

$ex = explode('.', $_SERVER['HTTP_HOST']);

if (in_array($_SERVER['HTTP_HOST'], ['127.0.0.1','localhost']) || in_array(gethostbyaddr($_SERVER['REMOTE_ADDR']), ['192.168.33.1'])) {
    local();
} else {
    prod();
}

// Local connection
function local()
{
    $url = siteURL();
    if (!empty($_SERVER['QUERY_STRING'])) {
        $url = siteURL().$_SERVER['QUERY_STRING'];
    }
    define('_BASE_URL_',$url);

    define('_DB_USERNAME_','root');
    define('_DB_PASSWORD_','');
    define('_DB_HOST_','localhost');
    define('_DB_DATABASE_','ojtpmesda');
    define('_DB_DRIVER_','mysqli');
}

function prod()
{
    define('_BASE_URL_',siteURL());

    define('_DB_USERNAME_',$_SERVER['DB_USERNAME']);
    define('_DB_PASSWORD_',$_SERVER['DB_PASSWORD']);
    define('_DB_HOST_',$_SERVER['DB_HOST']);
    define('_DB_DATABASE_',$_SERVER['DATABASE_NAME']);
    define('_DB_DRIVER_','mysqli');
}

function siteURL()
{
    $url = protocol().$_SERVER['HTTP_HOST'].'/';

    return $url;
}

/**
 * AWS HTTP Protocol Compatibility
 */
function protocol()
{
    $forwarded_proto    =   $_SERVER['HTTP_X_FORWARDED_PROTO']  ?? null;
    $forwaded_port      =   $_SERVER['HTTP_X_FORWARDED_PORT']   ?? null;

    $local = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

    $protocol = false;

    if (!empty($forwarded_proto) && !empty($forwaded_port)) {
        if ($forwarded_proto == 'https' && $forwaded_port == 443 ) {
            $protocol   = true;
        }
    }
    
    return ($protocol ? 'https://' : $local);
}
?>