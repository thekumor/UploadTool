<?php
// ================================================
// 
//	Project: UploadTool
// 
//	File: sending.php
//	Desc: Handles file uploads.
// 
//	Modified: 2026/02/26 4:23 PM
//	Created: 2026/02/26 4:20 PM
//	Authors: The Kumor
// 
// ================================================

$name = $_POST["video-name"] ?? "not set";
$description = $_POST["video-desc"] ?? "not set";
$visibility = $_POST["video-visibility"] ?? "public";

if (isset($_FILES["video-file"]) && $_FILES["video-file"]["error"] == UPLOAD_ERR_OK) {
	$tmpPath = $_FILES["video-file"]["tmp_name"];
	$orgName = $_FILES["video-file"]["name"];
	$size = $_FILES["video-file"]["size"];
	$type = $_FILES["video-file"]["type"];

	// Save video itself
	move_uploaded_file($tmpPath, __DIR__ . "\\videos\\" . $orgName);

	$entry = [
		"title"			=> $name,
		"description"	=> $description,
		"date"			=> time(),
		"visibility"	=> $visibility
	];

	// Save video data
	$json = json_encode($entry, JSON_PRETTY_PRINT);
	file_put_contents(__DIR__ . "\\videos\\" . $orgName . ".json", $json);
} else {
	echo "Critical fail";
}
?>