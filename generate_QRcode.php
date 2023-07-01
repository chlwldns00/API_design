<?php
// 텍스트 또는 데이터
$URL = 'https://chipsterplay.soundgram.co.kr/make_pack.php#n'; //ajax request를 통해서 입력받는 부분 ex)$GET[$URL]

// Google Chart API를 사용하여 QR 코드 이미지 URL 생성
$chartApiUrl = 'https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl=' . urlencode($URL);

// 이미지 파일 저장 경로
$outputFilePath = 'C:/xampp/htdocs/qr.png'; // 저장할 이미지 파일의 경로 및 파일명을 지정하세요

// QR 코드 이미지 파일 다운로드 및 저장
file_put_contents($outputFilePath, file_get_contents($chartApiUrl));

echo "QR 코드 이미지가 저장되었습니다.";
//** $outputFilePath 이 값을 ajax 호출시 리턴으로 던져주면 됨 */
?>
