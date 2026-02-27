// ================================================
// 
//	Project: UploadTool
//
//	File: scripts/resize.js
//	Desc: Makes changes to CSS grid once client
//	resizes their window.
//
//	Modified: 2026/02/27 5:15 PM
//	Created: 2026/02/27 5:15 PM
//	Authors: The Kumor
// 
// ================================================

const MINIMUM_WIDTH = 1300;

var mobileView = false;

function FitElements() {
	// var width = window.innerWidth;
	// console.log(width);

	// if (width < MINIMUM_WIDTH && !mobileView) {
	// 	mobileView = true;
	// 	console.log("Switching to mobile view.");

	// 	var container = document.getElementById("main-container");
	// 	if (container === null) return;

	// 	container.style.gridTemplateColumns = "1fr";
	// }
	// else if (width >= MINIMUM_WIDTH && mobileView) {
	// 	mobileView = false;
	// 	console.log("Switching from mobile view.");

	// 	var container = document.getElementById("main-container");
	// 	if (container === null) return;

	// 	container.style.gridTemplateColumns = "minmax(560px, 800px) 4fr";
	// }
}

function Ready() {
	FitElements();

	addEventListener("resize", (event) => {
		FitElements();
	});
}