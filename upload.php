<!DOCTYPE html>
<!-- ================================================
-- 
--	Project: UploadTool
--
--	File: upload.php
--	Desc: Handles clientside of video upload.
--
--	Modified: 2026/02/27 5:00 PM
--	Created: 2026/02/26 3:31 PM
--	Authors: The Kumor
-- 
-- ================================================ -->

<html lang="en">

<head>
	<title>Upload Tool</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles/common.css">
	<link rel="stylesheet" href="styles/upload.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
	<div class="grid-container">
		<div class="grid-element" id="stub">

		</div>
		<div class="grid-element" id="form-container">
			<form action="sending.php" method="post" enctype="multipart/form-data">
				<label for="file-upload">Pick a video to upload: </label>
				<input type="file" id="file-upload" name="video-file" accept="video/mp4" />

				<label for="file-name">Name: </label>
				<input type="text" id="file-name" name="video-name">

				<label for="file-desc">Description: </label>
				<input type="text" id="file-desc" name="video-desc">

				<label for="file-visibility">Visibility: </label>
				<select name="video-visibility">
					<option value="public">Public</option>
					<option value="private">Link</option>
				</select>

				<button>Send</button>
			</form>
		</div>
		<div class="grid-element" id="stub">

		</div>
	</div>
</body>

</html>