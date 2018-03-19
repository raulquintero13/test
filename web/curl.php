<?php
$url = "http://localhost/api/customers";
// $handle   = curl_init($url);
//     if (false === $handle) {
//         die('error');
//     }
//     curl_setopt($handle, CURLOPT_HEADER, false);
//     curl_setopt($handle, CURLOPT_FAILONERROR, true);  // this works
//     curl_setopt($handle, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") ); // request as if Firefox
//     curl_setopt($handle, CURLOPT_NOBODY, true);
//     curl_setopt($handle, CURLOPT_RETURNTRANSFER, false);
//     $connectable = curl_exec($handle);
//     curl_close($handle);
//     var_dump($connectable);


    

 //  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);
// Closing
curl_close($ch);

// Will dump a beauty json :3
var_dump(json_decode($result, true));