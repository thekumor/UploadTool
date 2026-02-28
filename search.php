<?php
// ================================================
// 
//	Project: UploadTool
// 
//	File: search.php
//	Desc: Handles searching for videos.
// 
//	Modified: 2026/02/28 6:05 PM
//	Created: 2026/02/27 8:36 AM
//	Authors: The Kumor
// 
// ================================================

function GetVideoList()
{
	$items = scandir("videos");
	chdir("videos");

	for ($i = 0; $i < count($items); $i++) {
		$folder = $items[$i];

		if (!is_dir($folder) || $folder == "." || $folder == "..")
			continue;

		chdir($folder);
		$json = file_get_contents($folder . ".json");
		if (!$json)
		{
			chdir("..");
			continue;
		}

		$json = json_decode($json);
		
		if ($json->visibility != "public")
		{
			chdir("..");
			continue;
		}
		
		//$attr = hash("sha256", $folder);
		$attr = $folder;
		echo "<a href=\"index.php?a=" . $attr . "\">" . $json->title . "</a><br>";
		chdir("..");
	}

	chdir("..");
}

function GetCurrentVideoData()
{
	$json = "";

	if (isset($_GET["a"])) {
		$attr = $_GET["a"];
		if (!isset($attr))
			return "";

		chdir("videos");
		$folder = $attr;
		if (!is_dir($folder))
		{
			chdir("..");
			return "";
		}

		chdir($folder);
		
		$json = file_get_contents($attr . ".json");
		if ($json)
			$json = json_decode($json);

		chdir("../..");
	}
	return $json;
}

function GetCurrentVideoTitle()
{
	$json = GetCurrentVideoData();
	if ($json == "") return "";

	echo "<h1>" . $json->title . "</h1>";
}

function GetCurrentVideoDescription()
{
	$json = GetCurrentVideoData();
	if ($json == "") return "";

	echo "<span>" . $json->description . "</span>";
}

function GetCurrentVideoFile()
{
	$json = GetCurrentVideoData();
	if ($json == "") return "";

	chdir("videos");
	chdir($_GET["a"]);
	$file = $_GET["a"] . ".mp4";

	echo "<video width=\"640\" height=\"480\" controls><source src=\"videos\\" . $_GET["a"] . "\\" . $file . "\" type=\"video/mp4\">Your browser does not support the video tag.</video>";
	chdir("../..");
}
?>
