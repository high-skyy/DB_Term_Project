<?
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

mysqli_query($connect, "set autocommit = 0");
mysqli_query($connect, "set session transaction isolation level serializable");
mysqli_query($connect, "start transaction");


$theme = $_POST['theme'];
$chart_id = $_POST['chart_id'];

$result = mysqli_query($conn, "insert into chart (chart_id, theme) values(NULL, '$theme')");

if(!$result){
	mysqli_query($conn, "rollback");
	s_msg('차트 추가가 잘못 되었습니다. 다시 시도하여 주십시오.');
	return;
}
else{
	mysqli_query($conn, $commit);
    s_msg ('성공적으로 입력 되었습니다');
    echo "<script>location.replace('chart.php');</script>";
}


?>

