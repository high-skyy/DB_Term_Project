<?
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

mysqli_query($connect, "set autocommit = 0");
mysqli_query($connect, "set session transaction isolation level serializable");
mysqli_query($connect, "start transaction");

$chart_id = $_GET['chart_id'];
$song_id = $_GET['song_id'];
$ret = mysqli_query($conn, "delete from chart_song_list where chart_id = $chart_id and song_id = $song_id");

	if(!$ret)
	{
	    mysqli_query($conn, "rollback");
		s_msg('주문하기가 실패하였습니다. 다시 시도하여 주십시오.');
		return;
	}
	else
	{
		mysqli_query($conn, $commit);
	    s_msg ('성공적으로 삭제 되었습니다');
	    echo "<meta http-equiv='refresh' content='0;url=chart_song_list.php?chart_id={$_GET['chart_id']}'>";
	}	
    echo "<meta http-equiv='refresh' content='0;url=chart_song_list.php?chart_id={$_GET['chart_id']}'>";

?>

