# 데이터베이스 카운트
**프로그램 설명**
  **MySQL 서버와 DB접속**
   데이터베이스 (amp_db)생성하기
   7행은 mysql 서버에 접속하기 위한 명령이고 8행은 apm_db에 접속하기 위한 명령어이다.
  **날짜 형식**
  10~12행은 년-월-일을 변수 $dat에 저장합니다.
  **오늘의 레코드 조회**
  16행 부분은 테이블에서 등록일자가 오늘인 레코드 조회하는 쿼리입니다.
  18행은 오늘의 날짜를 조회한 후 수행이 됐다면 19행에서 조회 건수를 할당합니다.
   **방문 기록을 구분**
   25행은 조회 건수가 1미만일 경우 0으로 초기화 합니다.
   26행은 오늘 날짜로 카운트 될 경우
   27행은 레코드($row)를 배열로 불러옴
   28행은 웹 사이트 방문 횟수가 변수가$count 저장됨
   **방문 기록을 구분**
  32행은 if(count==0)문은 처음 방문자일 경우 33에서 방문 횟수를 1증가 시킴
  33행에선 기존 방문자가 있을 경우 33행에서 방문횟수 1증가 그리고 34행에서 count_table1, cnt, redate등 필드 값을 업데이트 해줍니다.
   **전체 방문자 수를 조회**
  41행의 $tot_sql = "select sum(cnt) from count_table1"는 전체 방문자 수를 count_table에서 (cnt) 수 를 sum()함수로 산출합니다.
  42행에서 쿼리문을 수행하여 다음 45행 $tot_row = mysqli_fetch_array($tot_rst)에 $tot_row의 변수를 할당, 46행  
  $total = $tot_row[0]에 CNT의 전체 방문자 수를 저장합니다.
  **카운터의 자리수를 8자리로 출력**
  58행 for($a = 0; $a < 8 - strlen(strval($count)) ; $a++) echo "0"에서 방문 횟수를 8자리로 출력 하려면 8-1=7 자리를 0으로 출력.
  변수 값을 문자형으로 변환해주는 strval() 함수와 문자열 길이를 반환해주는 strlen() 이용합니다.
![image](https://user-images.githubusercontent.com/102715143/170228854-29e3c802-3df1-4bbb-bdba-8cac65e41801.png)
![image](https://user-images.githubusercontent.com/102715143/170228948-5de1ef5b-0e26-46d4-8cf4-eb50023e7b23.png)

