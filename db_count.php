<?php
    $host = "localhost";    //호스트
    $user = "root";         //사용자 계정
    $passwd = "";            //비밀번호

    /*mysql 서버와 데이터베이스 접속*/
    $connect = mysqli_connect($host, $user, $passwd) or die("mysql서버 접속 에러");
    mysqli_select_db($connect, 'apm_db3') or die("DB 접속 에러");     //amp_db 선택

    $YY = date('Y');
    $MM = date('m');
    $DD = date('d');
    $dat = $YY . "-" . $MM . "-" . $DD;     //날짜의 형식 지정
    // echo "dat=".$dat;
    /*테이블에서 등록일자가 오늘인 레코드 조회 쿼리*/
    $sql = "select * from count_table1 where redate = '$dat'";
    // echo "sql=>".$sql;
    $result = mysqli_query($connect, $sql);     //쿼리문 수행
    $list = mysqli_num_rows($result);           //레코드 조회 건수를 할당



    /*레코드 조회 건수를 구분하여 수행*/
    if(!$list){
        $count = 0;                             //조회 건수가 1미만이면 0으로 초기화
    } else{                                     //오늘 날짜의 카운터가 있을 경우
        $row = mysqli_fetch_array($result);     //레코드를 배열로 불러옴
        $count = $row['cnt'];                   //count_table1 테이블의 cnt필드
    }

    /*오늘 처음 방문인지, 기존 방문자가 있는지에 대한 처리*/
    if($count == 0){
        $count++;
        $to_sql = "insert into count_table1 (cnt, redate) values ($count, '$dat')";
    } else{
        $count++;
        $to_sql = "update count_table1 set cnt = $count where redate = '$dat'";
    }

    /*생성된 방문자 수의 업데이트*/
    mysqli_query($connect, $to_sql);

    /*전체 방문자 수를 조회*/
    $tot_sql = "select sum(cnt) from count_table1";
    $tot_rst = mysqli_query($connect, $tot_sql);

    /*조회 쿼리 실행 후 결과 셋에서 첫번째 레코드를 할당*/
    $tot_row = mysqli_fetch_array($tot_rst);
    $total = $tot_row[0];       //첫 번째 필드 값을 할당
    mysqli_close($connect);

    /*카운터의 자리수를 8자리로 출력*/
    echo "<br><center><h2>kimeunhyuk</h2><hr>";
    echo "데이터베이스를 이용한 카운터입니다... <br><br><br>";
    echo "[오늘 : <font color = blue>";
    
        
    for($a = 0; $a < 8 - strlen(strval($count)) ; $a++) echo "0";
    echo $count . "</font>]<br>";
    
    echo "[전체 : <font color = blue>";
    
    for($a = 0; $a < 8 - strlen(strval($total)) ; $a++) echo "0";
        echo $total."</font>]";
?>