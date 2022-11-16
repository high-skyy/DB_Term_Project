<?
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

mysqli_query($connect, "set autocommit = 0");
mysqli_query($connect, "set session transaction isolation level repeatable read");
mysqli_query($connect, "start transaction");

$playlist_id = $_POST['playlist_id'];
$song_id = $_POST['song_id'];
$sequence = $_POST['sequence'];

$result = mysqli_query($conn, "insert into play_song_list(playlist_id, song_id, sequence) values($playlist_id, '$song_id', $sequence)");
if(!$result){
	mysqli_query($conn, "rollback");
	s_msg('주문하기가 실패하였습니다. 다시 시도하여 주십시오.');
	return;
}
else
{
	mysqli_query($conn, $commit);
    s_msg ('성공적으로 추가 되었습니다');
    echo "<script>location.replace('play_song_list.php?playlist_id={$_POST['playlist_id']}');</script>";
}

?>

