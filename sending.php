<?php
// ================================================
// 
//	Project: UploadTool
// 
//	File: sending.php
//	Desc: Handles file uploads.
// 
//	Modified: 2026/04/05 5:35 PM
//	Created: 2026/02/26 4:20 PM
//	Authors: The Kumor
// 
// ================================================

$name = $_POST["video-name"] ?? "not set";
$description = $_POST["video-desc"] ?? "not set";
$visibility = $_POST["video-visibility"] ?? "public";

//phpinfo();

if (isset($_FILES["video-file"]) && $_FILES["video-file"]["error"] == UPLOAD_ERR_OK) {
//	header("Location: https://google.com");
	$tmpPath = $_FILES["video-file"]["tmp_name"];
	$orgName = $_FILES["video-file"]["name"];
	$size = $_FILES["video-file"]["size"];
	$type = $_FILES["video-file"]["type"];

	// Get rid of white spaces
	$safeName = str_replace(" ", "_", $orgName);
	// Get rid of extension
	// Note that this has to be .mp4
	$safeName = str_replace(".mp4", "", $safeName);

	chdir("videos");
	// If file name is too long, this will cause undefined behavior
	while (is_dir($safeName))
		$safeName += "_";

	// Save video itself
	//echo getcwd();
	mkdir($safeName);
	chdir($safeName);
	move_uploaded_file($tmpPath, $safeName . ".mp4");

	$entry = [
		"title" => $name,
		"description" => $description,
		"date" => time(),
		"visibility" => $visibility
	];

	// Save video data
	$json = json_encode($entry, JSON_PRETTY_PRINT);
	file_put_contents($safeName . ".json", $json);

	header("Location: index.php?a=" . $safeName);
} else {
	echo "Error: " . $_FILES["video-file"]["error"] . ". Max file size: " . ini_get("upload_max_filesize");
}
?>
