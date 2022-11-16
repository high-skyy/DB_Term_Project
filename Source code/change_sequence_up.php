<?
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

mysqli_query($connect, "set autocommit = 0");
mysqli_query($connect, "set session transaction isolation level repeatable read");
mysqli_query($connect, "start transaction");

$playlist_id = $_GET['playlist_id'];
$sequence = $_GET['sequence']-1;
$song_id = $_GET['song_id'];

$result = mysqli_query($conn, "update play_song_list set sequence = $sequence where playlist_id = $playlist_id and song_id = '$song_id'");
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
    echo "<script>location.replace('play_song_list.php?playlist_id={$_GET['playlist_id']}');</script>";
}

?>

