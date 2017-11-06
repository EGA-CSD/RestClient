<?php
    $myfile = fopen("data.tsv", "w") or die("Unable to open file!");
    $txt = "letter\tfrequency\n";
    $var1 = rand();
    $var2 = rand();
    $var3 = rand();
    fwrite($myfile, $txt);
    $txt = "2557\t$var1\n";
    fwrite($myfile, $txt);
    $txt = "2558\t$var2\n";
    fwrite($myfile, $txt);
    $txt = "2559\t$var3\n";
    fwrite($myfile, $txt);
    var_dump($myfile);
    fclose($myfile);
?>