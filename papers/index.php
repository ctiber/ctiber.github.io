<html>
<head>
<title>Chouki TIBERMACINE</title>
<meta name="author" content="Tibermacine, Chouki">
<meta name="description" content="Chouki Tibermacine">
<meta name="keywords" content="software evolution, software
architecture, software quality, model-driven engineering, software
engineering"/>
<link rel="stylesheet" type="text/css" href="perso.css">
</head>
<?php
$clientAddr = $_SERVER['REMOTE_ADDR'];
$clientAddrXML = "<address>".htmlSpecialChars($clientAddr)."</address>";
$clientHost = gethostbyaddr($clientAddr);
$clientHostXML = "<host>".htmlSpecialChars($clientHost)."</host>";
$clientBrowser = $_SERVER['HTTP_USER_AGENT'];
$clientBrowserXML = "<browser>".htmlSpecialChars($clientBrowser)."</browser>";
$date = date("d/m/y"); 
$dateXML = "<date>".htmlSpecialChars($date)."</date>";
$hour = date("H:i:s");
$hourXML = "<hour>".htmlSpecialChars($hour)."</hour>";
define("STATS_FILE","./stats.xml");
$header1 = "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>";
$header2 = "<?xml-stylesheet type=\"application/xml\" href=\"stats.xsl\"?>";
$stats_entry = "\t"."<entry>"."\n"."\t\t".$clientAddrXML."\n"."\t\t".$clientHostXML."\n"."\t\t".$dateXML."\n"."\t\t".$hourXML."\n"."\t"."</entry>"."\n";

// Treating the XML document as a text document
if(file_exists(STATS_FILE)){ // The file already exists, add a stat entry
	$file_desc = fopen(STATS_FILE,"r+");
	fseek($file_desc,-11,SEEK_END);
	fputs($file_desc,$stats_entry."\n"."</entries>");
	fclose($file_desc);
}
else{ // The stats file does not exist, create a new one with the stat entry
	$file_desc = fopen(STATS_FILE,"a");
	$stats_entry = $header1."\n".$header2."\n"."<entries>"."\n".$stats_entry."\n"."</entries>";
	fputs($file_desc,$stats_entry);
}

?>
<body></body>
</html>