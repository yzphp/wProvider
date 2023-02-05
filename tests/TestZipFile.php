<?php
require '../include.php';


/*
$list=[['path'=>'../Tool/Zip.php','name'=>'zipfile'],['path'=>'../Tool/TimeHelper.php','name'=>'time']];
$archive  = new \Tool\Zip();
$archive->ZipFiles($list,"test.zip");
*/

$archive  = new \wProvider\Tool\HelperZip();
$archive->unZip("./test.zip");
?>