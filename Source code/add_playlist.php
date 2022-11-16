<?
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

mysqli_query($connect, "set autocommit = 0");
mysqli_query($connect, "set session transaction isolation level repeatable read");
mysqli_query($connect, "start transaction");

$playlist_title = $_POST['playlist_title'];
$customer_id = $_POST['customer_id'];

$result = mysqli_query($conn, "insert into playlist (playlist_id, playlist_title, customer_id) values(NULL, '$playlist_title', '$customer_id')");
if(!$result)
{
	mysqli_query($conn, "rollback");
	s_msg('플레이리스트 추가가 실패하였습니다. 다시 시도하여 주십시오.');
	return;
}
else
{
	mysqli_query($conn, $commit);
    s_msg ('성공적으로 입력 되었습니다');
    echo "<script>location.replace('playlist_access.php?');</script>";
}

?>

