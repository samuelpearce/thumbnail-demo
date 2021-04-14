<?php

// Usage:
//      <a target="_blank" href="/path/to/original.jpg">
//              <img src="/thumbnail.php?file=IMG_9326_Samuel_Pearce.jpg">
//      </a>
//
// The jpeg thumbnails will automatically generate in the background and download.
// If the image file is already downloaded, the thumbnail is served
// jpg images 5.8MB reduces to 601kB

// Known issues:
//   $_GET['file'] is vulnerable to a Directory Traversal attack (../../secretfile.txt)
//   Once the thumbnail is generated, it will never expire


/** Compression rate for JPEG image format. */
define('JPEG_COMPRESSION_QUALITY', 70);
/** Compression rate for PNG image format. */
define('PNG_COMPRESSION_QUALITY', 9);

require_once "scaleimage.php";

$pathId = $_GET['file'];

if (!file_exists($pathId)) {
    exit("File does not exist");
}

$originalUploadFilePath = $pathId;

$outputImagePath = "thumb-" . $originalUploadFilePath;

if (!file_exists($outputImagePath)) {
    scaleImage($originalUploadFilePath, $outputImagePath, 2048);
}

// Serve file to user
header("Content-type: image/jpeg");
// Cache forever
header("Cache-Control: public");
readfile($outputImagePath);
exit;




