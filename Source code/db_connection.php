<?php
function OpenCon()
 {
 $dbhost = "sql208.epizy.com";
 $dbuser = "epiz_24873785";
 $dbpass = "sa6V7Wd0oKlO";
 $db = "epiz_24873785_ADLA";
 $mysqli = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $mysqli;
 }
 
function CloseCon($mysqli)
 {
 $mysqli -> close();
 }
   
?>