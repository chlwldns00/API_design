# API_design(capstone_design_project)
## 웹앱 프로젝트를 하면서 앱에 필요한 특정 세부기능을 api로 디자인 하고 그 기능을 구현하는 역할을 맡았습니다.
1. 유저 프로필을 생성할때 프로필 사진을  생성AI를 이용한 이미지를 사용할수있게하는 api를 구현
- generate_image_karlo.php -> kakao developers의 karlo api를 이용하여서 사용자가 생성하고 싶은 이미지에 대한 설명을 입력하면 그에 맞는 이미지 4장을 생성하고 지정 디렉토리에 저장하는 api
- 예시로 생성된 generated_image_0~3.png (예시 설명: A deep dark lake)

2. 유저 프로필을 생성할때 프로필 음악을 api를 이용해 검색해서 원하는 음악을 사용할수 있게 하는 api를 구현
- music_search.php -> googleyoutubedataAPI를 사용해서 유저가 프로필음악으로 하고 싶은 음악의 설명을 입력하면 그에 맞는 음악을 유튜브에서 찾아서 유튜브 링크를 반환해주는 api
- downloadMP3.php -> 유튜브 링크에 있는 영상파일을 mp3음악파일로 변환해주는 api ->youtube yt-dlp사용
- back.php -> 프로필 페이지로 진입시 프로필음악이 백그라운드로 재생되게 하는 php코드
- 예시로 생성된 Music1~4.mp3 (예시 설명: 산뜻하고 발랄한 음악 저작권없음)

3. 앱 내의 정보들로 빠르게 들어갈수있는 고유 QR코드 생성하는 api
- generate_QRcode.php -> googlechartAPI를 사용해서 원하는 페이지나 정보를 입력하면 그에 맞는 고유 QR을 생성해서 반환해주는 api
- 예시로 생성된 qr.png(예시 page:https://chipsterplay.soundgram.co.kr/make_pack.php#n)



