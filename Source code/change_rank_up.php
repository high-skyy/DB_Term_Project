<?
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

mysqli_query($connect, "set autocommit = 0");
mysqli_query($connect, "set session transaction isolation level serializable");
mysqli_query($connect, "start transaction");

$chart_id = $_GET['chart_id'];
$rank = $_GET['rank']-1;
$song_id = $_GET['song_id'];

$result = mysqli_query($conn, "update chart_song_list set rank = $rank where chart_id = $chart_id and song_id = '$song_id'");
if(!$result)
{
    mysqli_query($conn, "rollback");
	s_msg('변경이 실패하였습니다. 다시 시도하여 주십시오.');
	return;
}
else
{
	mysqli_query($conn, "commit");
    s_msg ('성공적으로 수정 되었습니다');
    echo "<script>location.replace('chart_song_list.php?chart_id={$_GET['chart_id']}');</script>";
}

?>

