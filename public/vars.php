<?php

echo "<pre>all<br>";
var_dump(array_keys(get_defined_vars()));

  $attributes = compact(array_keys(get_defined_vars()));
echo "<br>compact<br>";
  var_dump($attributes);



  // Parse without sections
$ini_array = parse_ini_file("sample.ini.php");
print_r($ini_array);
echo "\n\nwithout\n\n";
// Parse with sections
$ini_array = parse_ini_file("sample.ini.php", true);
print_r($ini_array);


echo "\n".$_SERVER['PATH_TRANSLATED'];