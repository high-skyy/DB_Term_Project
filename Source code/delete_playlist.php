<?
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

mysqli_query($connect, "set autocommit = 0");
mysqli_query($connect, "set session transaction isolation level repeatable read");
mysqli_query($connect, "start transaction");

$playlist_id = $_GET['playlist_id'];

$ret = mysqli_query($conn, "delete from playlist where playlist_id = $playlist_id");

	if(!$ret)
	{
	    mysqli_query($conn, "rollback");
		s_msg('삭제하기가 실패하였습니다. 다시 시도하여 주십시오.');
		return;
	}
	else
	{
		mysqli_query($conn, $commit);
	    s_msg ('성공적으로 삭제 되었습니다');
	    echo "<meta http-equiv='refresh' content='0;url=playlist_access.php'>";
	}	
    echo "<meta http-equiv='refresh' content='0;url=playlist_access.php?'>";

?>
