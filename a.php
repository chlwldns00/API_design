<!DOCTYPE html>
<html>
<head>
    <title>MP3 파일 재생</title>
    <script>
        function playAudio() {
            var audio = document.getElementById('audioPlayer');
            audio.play();
        }
    </script>
</head>
<body>
    <?php
    $mp3_file ='C:\xampp\htdocs\music\output.mp3'; // 실제 MP3 파일의 경로와 파일명으로 대체

    // MP3 파일이 존재하는지 확인
    if (file_exists($mp3_file)) {
        echo '<h1>MP3 파일 재생</h1>';
        echo '<p>음악을 재생하려면 아래 재생 버튼을 클릭하세요.</p>';

        // 재생 버튼과 오디오 플레이어
        echo '<button onclick="playAudio()">재생</button>';
        echo '<audio id="audioPlayer" src="' . $mp3_file . '"></audio>';
    } else {
        echo 'MP3 파일을 찾을 수 없습니다.';
    }
    ?>
</body>
</html>
