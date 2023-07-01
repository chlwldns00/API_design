<?php

function get_youtube_uploader_id($video_url) {
    $uploader_id = shell_exec('yt-dlp --get-id ' . escapeshellarg($video_url));
    $uploader_id = trim($uploader_id);
    return $uploader_id;
}

function download_youtube_audio($video_url, $output_path) {
    $uploader_id = get_youtube_uploader_id($video_url);
    shell_exec('yt-dlp -x --audio-format mp3 -o ' . escapeshellarg($output_path) . ' ' . escapeshellarg($video_url));
}


$youtube_url = 'https://www.youtube.com/watch?v=6WNfYfSLKIk'; // <-여기에 사용자가 선택한 URL을 넣으면 됩니다.
$output_file = 'C:\xampp\htdocs\music\output.mp3';  //<-mp3파일이 저장되는 경로(변경)

download_youtube_audio($youtube_url, $output_file);
echo "download_success";
?>


//**서버에 설치해야되는 패키지**
//pip install -U youtube-dl
//pip install -U yt-dlp
//**설치확인 및 버전확인**
//youtube-dl --version ->2021.12.17
//yt-dlp --version->2023.03.04