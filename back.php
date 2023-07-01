<!DOCTYPE html>
<html>
<head>
    <title>로컬 MP3 파일 재생</title>
</head>
<body>
    <h1>로컬 MP3재생</h1>
    <p>음악이 자동으로 재생됩니다.</p>

    <script>
        // 오디오 요소 생성
        var audioElement = new Audio();
        audioElement.src = 'http://localhost/output.mp3';
        audioElement.loop = true;

        // 페이지 로드 후 자동 재생
        window.addEventListener('DOMContentLoaded', function() {
            audioElement.play();
        });
    </script>
</body>
</html>

