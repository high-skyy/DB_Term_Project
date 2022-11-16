<?
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

mysqli_query($connect, "set autocommit = 0");
mysqli_query($connect, "set session transaction isolation level serializable");
mysqli_query($connect, "start transaction");

$chart_id = $_POST['chart_id'];
$song_id = $_POST['song_id'];
$rank = $_POST['rank'];

$result = mysqli_query($conn, "insert into chart_song_list(song_id, chart_id, rank) values('$song_id', $chart_id, $rank)");
if(!$result){
	mysqli_query($conn, "rollback");
	s_msg('곡 추가하기가 실패하였습니다. 다시 시도하여 주십시오.');
	return;
}
else
{
	mysqli_query($conn, $commit);
    s_msg ('성공적으로 추가 되었습니다');
    echo "<script>location.replace('chart_song_list.php?chart_id={$_POST['chart_id']}');</script>";
}

?>

