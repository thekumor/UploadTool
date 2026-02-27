<?php
// ================================================
// 
//	Project: UploadTool
// 
//	File: search.php
//	Desc: Handles searching for videos.
// 
//	Modified: 2026/02/27 9:52 AM
//	Created: 2026/02/27 8:36 AM
//	Authors: The Kumor
// 
// ================================================

function GetVideoList()
{
	$items = scandir(__DIR__ . "\\videos");

	for ($i = 0; $i < count($items); $i++) {
		$folder = $items[$i];
		if (is_dir($folder))
			continue;

		$json = file_get_contents(__DIR__ . "\\videos\\" . $folder . "\\" . $folder . ".json");
		if (!$json)
			continue;

		$json = json_decode($json);
		//$attr = hash("sha256", $folder);
		$attr = $folder;
		echo "<a href=\"index.php?a=" . $attr . "\">" . $json->title . "</a><br>";
	}
}

function GetCurrentVideoData()
{
	$json = "";

	if (isset($_GET["a"])) {
		$attr = $_GET["a"];
		if (!isset($attr))
			return;

		$folder = __DIR__ . "\\videos\\" . $attr;
		if (!is_dir($folder))
			return;

		$json = file_get_contents(__DIR__ . "\\videos\\" . $attr . "\\" . $attr . ".json");
		if (!$json)
			return;

		$json = json_decode($json);
	}

	return $json;
}

function GetCurrentVideoTitle()
{
	$json = GetCurrentVideoData();
	if ($json == "") return;

	echo "<h1>" . $json->title . "</h1>";
}

function GetCurrentVideoDescription()
{
	$json = GetCurrentVideoData();
	if ($json == "") return;

	echo "<span>" . $json->description . "</span>";
}

function GetCurrentVideoFile()
{
	$json = GetCurrentVideoData();
	if ($json == "") return;
	
	$file = __DIR__ . "\\videos\\" . $_GET["a"] . "\\" . $_GET["a"] . ".mp4";

	echo "<video width=\"640\" height=\"480\" controls><source src=\"" . $file . "\" type=\"video/mp4\">Your browser does not support the video tag.</video>";
}
?>