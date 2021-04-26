<?php
include ('dataSource.php');  
include ('Result.php');  
include ('ResultDao.php'); 
include ('MathUtil.php'); 

$shortops = "";
$longopts  = array(
    "file:",  
    "out:"
);
$options = getopt($shortops, $longopts);
$file = $options["file"];
$out = $options["out"];

$resultDao = new ResultDao();
$obj = new GiantTest($file, $out, $resultDao);
$obj->go();
