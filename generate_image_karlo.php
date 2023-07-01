<?php
// [내 애플리케이션] > [앱 키] 에서 확인한 REST API 키 값 입력
    $REST_API_KEY = '${2ee17a13580700b2a0c01b457103a706}';

    // 이미지 생성하기 요청 함수
    function t2i($text, $batch_size) {
        $url = 'https://api.kakaobrain.com/v1/inference/karlo/t2i';
        $data = array(
            'prompt' => array(
                'text' => $text, // ** 이부분을 html ajax에서 입력받아온 이미지 설명 값으로 바꾸면 된다. ex)$GET[$text]
                'batch_size' => $batch_size
            )
        );

        $headers = array(
            'Authorization: KakaoAK2ee17a13580700b2a0c01b457103a706',
            'Content-Type: application/json'
        );
        
        // cURL을 사용하여 POST 요청 전송
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // 응답 JSON 디코딩
        $response = json_decode($response, true);
        return $response;
    }
    
    $text="A deep dark lake";  
    $response = t2i($text, 4);  //응답요청
    //echo "json data:";  
    //var_dump($response); //json데이터가 잘 받아졌나 테스트 출력부분
    $image_str=array(); //이미지base64 string값을 저장하는 배열
    $k=0;
    $arr2=array();
    foreach($response["images"] as $arr2)  //json데이터 배열을 돌면서 이미지 string값 4개를 파싱하여 image_str에 저장
    {
        
        $image_str[$k]=$arr2["image"];
        //echo $arr2["image"] . "<br>";
        $k=$k+1;
        
    }
    //여기까지 image값 파싱성공

    function base64ToImage($base64String, $outputFilePath) {  //base64 인코딩된 문자열 값을 디코딩->이미지 디코딩 통해서 이미지값으로 변환하는 함수
        $decodedImage = base64_decode($base64String);
        file_put_contents($outputFilePath, $decodedImage);
    }

    $outputDirectory ='C:/xampp/htdocs/';  // **여기를 변경 이미지 파일을 저장할 디렉토리 주소

    $image_arr=array(); //이미지로 변환되어 저장된 png파일 주소를 담는 배열(나중에 사용자가 이미지를 선택할때를 위함)
    for ($i = 0; $i < count($image_str); $i++) {  //변환한 이미지를 파일로 저장하고, 출력하는 부분
        $outputFilePath = $outputDirectory . 'generated_image_' . $i . '.png';
        base64ToImage($image_str[$i], $outputFilePath);
        $image_arr[$i]=$outputFilePath; // 배열에 이미지 파일 주소 저장
        //echo "<img src='$outputFilePath' alt='Image'>";
        //echo "이미지 파일 $outputFilePath 저장 완료<br>";
    }

    echo "이미지 파일 저장이 완료되었습니다.";

    //** ajax 호출시 $image_arr값을 던져주면 될거같습니다. */
    //echo($image_arr)
?>