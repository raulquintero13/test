<?php

    $url ="http://test.local/api/customers";
// function url_exists($url) {
    // Version 4.x supported
    $ch = curl_init();
    $user_agent='Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_USERAGENT, $user_agent);
    curl_setopt ($ch, CURLOPT_HEADER, 0);
    curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch,CURLOPT_CONNECTTIMEOUT,120);
    curl_setopt ($ch,CURLOPT_TIMEOUT,120);
    curl_setopt ($ch,CURLOPT_MAXREDIRS,10);
    curl_setopt ($ch,CURLOPT_COOKIEFILE,"cookie.txt");
    curl_setopt ($ch,CURLOPT_COOKIEJAR,"cookie.txt");
    echo curl_exec ($ch);
// }



// SELECT
//     TABLE_NAME as table_name,
//     COLUMN_NAME as column_name,
//     COLUMN_TYPE as data_type,
//     COLUMN_DEFAULT as default_value,
//     IS_NULLABLE as nullable,
//     COLUMN_KEY as constraints,
//     EXTRA as constraints2,
//     CHARACTER_SET_NAME as charset,
//     COLLATION_NAME as collation
//     FROM INFORMATION_SCHEMA . COLUMNS
//     WHERE table_schema = 'pos'
//     and TABLE_NAME = 'person'
//     ORDER BY table_name, ordinal_position