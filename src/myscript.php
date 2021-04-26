<?php
include ('GiantTest.php');

$shortops = "";
$longopts  = array(
    "file:",  
    "out:"
);
$options = getopt($shortops, $longopts);
$file = $options["file"];
$out = $options["out"];


$obj = new GiantTest($file, $out);
$obj->go();
