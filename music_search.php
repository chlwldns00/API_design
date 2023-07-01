<?php

function get_music_link($search_query) {
    $api_key = 'AIzaSyAWSrBCY6ajenUHx3N2tRPNEkHU0j4Apao';
    $base_url = 'https://www.googleapis.com/youtube/v3/search';

    $params = array(
        'key' => $api_key,
        'part' => 'snippet',
        'q' => $search_query, //<-음악에 대한 설명을 입력받는 부분
        'type' => 'video',
        'maxResults' => 4,
        'videoDuration' => 'short'
    );

    $url = $base_url . '?' . http_build_query($params);
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    //var_dump($data);

    $music_links = array();  //링크들을 담는 배열(이부분을 ajax로 리턴받아서 링크에 접근후 downloadMP3.php에 링크만 넘겨주면 mp3파일이 설정한 디렉토리 위치에 저장된다)

    if (isset($data['items']) && count($data['items']) > 0) {
        foreach ($data['items'] as $item) {
            $video_id = $item['id']['videoId'];
            $music_links[] = 'https://www.youtube.com/watch?v=' . $video_id;
        }

        return $music_links;
    }

    return null;
}
//영상파일을 mp3파일로 다운로드 받는 함수
function get_youtube_uploader_id($video_url) {
    $uploader_id = shell_exec('yt-dlp --get-id ' . escapeshellarg($video_url));
    $uploader_id = trim($uploader_id);
    return $uploader_id;
}

function download_youtube_audio($video_url, $output_path) {
    $uploader_id = get_youtube_uploader_id($video_url);
    shell_exec('yt-dlp -x --audio-format mp3 -o ' . escapeshellarg($output_path) . ' ' . escapeshellarg($video_url));
}
//

$output_file = 'C:\xampp\htdocs\music';  //다운로드 경로 지정

// 예시: 'pop' 장르의 음악 링크를 가져옴
$genre = '산뜻하고 발랄한 음악 '.'저작권없음'; //파라미터 입력부에 '저작권없음' 을 붙여서 
$music_links = get_music_link($genre);  //music_link 배열에
$k=1;  // <-음악번호 변수

if ($music_links) {
    echo '음악 링크:<br>';
    foreach ($music_links as $link) {
        $linkText= $k.' 번 음악';
        echo '<a href="' . $link . '">' .$linkText.'</a>';
        echo  '<br>';
        $output_link=$output_file. '\Music'. $k. '.mp3';
        download_youtube_audio($link, $output_link);
        echo 'music download successfully';
        echo '<br>';
        $k=$k+1;
    }
} 
else {
    echo '음악을 찾을 수 없습니다.';
}





?>



