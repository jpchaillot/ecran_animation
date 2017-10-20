<?php
if(!isset($_POST['video_url'])){
    header('Location: index.php');
}

require __DIR__ . '/vendor/autoload.php';

use YoutubeDl\YoutubeDl;
use YoutubeDl\Exception\CopyrightException;
use YoutubeDl\Exception\NotFoundException;
use YoutubeDl\Exception\PrivateVideoException;

$dl = new YoutubeDl([
    'continue' => true, // force resume of partially downloaded files. By default, youtube-dl will resume downloads if possible.
    'f' => 'mp4',
]);
// For more options go to https://github.com/rg3/youtube-dl#user-content-options

$dl->setDownloadPath('./video/');
// Enable debugging
/*$dl->debug(function ($type, $buffer) {
 if (\Symfony\Component\Process\Process::ERR === $type) {
 echo 'ERR > ' . $buffer;
 } else {
 echo 'OUT > ' . $buffer;
 }
 });*/
try {
    $video = $dl->download($_POST['video_url']);
    //echo $video->getTitle(); // Will return Phonebloks
    // $video->getFile(); // \SplFileInfo instance of downloaded file
} catch (NotFoundException $e) {
    // Video not found
} catch (PrivateVideoException $e) {
    // Video is private
} catch (CopyrightException $e) {
    // The YouTube account associated with this video has been terminated due to multiple third-party notifications of copyright infringement
} catch (\Exception $e) {
    // Failed to download
}

header('Location: index.php');
