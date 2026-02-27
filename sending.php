<?php
// ================================================
// 
//	Project: UploadTool
// 
//	File: sending.php
//	Desc: Handles file uploads.
// 
//	Modified: 2026/02/27 2:27 PM
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

	// Get rid of white spaces
	$safeName = str_replace(" ", "_", $orgName);
	// Get rid of extension
	// Note that this has to be .mp4
	$safeName = str_replace(".mp4", "", $safeName);

	// If file name is too long, this will cause undefined behavior
	while (is_dir("videos\\" . $safeName))
		$safeName += "_";

	// Save video itself
	mkdir("videos\\" . $safeName);
	move_uploaded_file($tmpPath, "videos\\" . $safeName . "\\" . $safeName . ".mp4");

	$entry = [
		"title" => $name,
		"description" => $description,
		"date" => time(),
		"visibility" => $visibility
	];

	// Save video data
	$json = json_encode($entry, JSON_PRETTY_PRINT);
	file_put_contents("videos\\" . $safeName . "\\" . $safeName . ".json", $json);
} else {
	echo "Critical fail";
}

header("Location: index.php");
?>