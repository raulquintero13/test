<?php

$url = "http://test.dev/api/status";
//  Initiate curl

$result = file_get_contents($url);
// Will dump a beauty json :3
var_dump(json_decode($result, true));