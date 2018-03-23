<?php

{
    echo "<pre>Update:<br><br>\n";

    echo shell_exec("/usr/bin/git pull");
    echo "<br><br>";
    echo "log<br><Br>\n";
    echo shell_exec("/usr/bin/git log --oneline");
    echo "</pre>";
}