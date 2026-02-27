<!-- ================================================
-- 
--	Project: UploadTool
--
--	File: index.php
--	Desc: Main HTML file for the Upload Tool web
--	interface.
--
--	Modified: 2026/02/27 5:09 PM
--	Created: 2026/01/06 6:55 PM
--	Authors: The Kumor
-- 
-- ================================================ -->

<?php
include("search.php");
?>

<html lang="en">

<head>
	<title>Upload Tool</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/common.css">
	<link rel="stylesheet" href="styles/main.css">
	<script src="scripts/resize.js"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body onload="Ready()">
	<div class="grid-container">
		<div class="grid-element">
			<?php
			GetCurrentVideoTitle();
			?>
		</div>

		<div class="grid-element" id="available-videos">
			<h1>Available videos</h1>
		</div>

		<div class="grid-element">
			<?php
			GetCurrentVideoFile();
			?>
		</div>

		<div class="grid-element" id="video-list">
			<?php
			GetVideoList();
			?>
		</div>

		<div class="grid-element" id="description">
			<?php
			GetCurrentVideoDescription();
			?>
		</div>

		<div class="grid-element" id="upload">
			<a href="upload.php">Upload a video</a>
		</div>
	</div>

	<footer>
		<span>UploadTool - The Kumor 2026</span>
	</footer>
</body>

</html>
