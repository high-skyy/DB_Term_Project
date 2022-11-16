<?
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

mysqli_query($connect, "set autocommit = 0");
mysqli_query($connect, "set session transaction isolation level serializable");
mysqli_query($connect, "start transaction");

$customer_id = $_POST['customer_id'];
$name = $_POST['name'];
$personal_id = $_POST['personal_id'];
$policy_id = 2;

$result = mysqli_query($conn, "insert into customer (customer_id, name, personal_id, policy_id) values('$customer_id', '$name', '$personal_id', '$policy_id')");

$row = mysqli_fetch_array($result);
$customer_id = $row['customer_id'];

if(!$result)
{
	mysqli_query($conn, "rollback");
	s_msg('등록이 실패하였습니다. 다시 시도하여 주십시오.');
	return;
}
else
{
	mysqli_query($conn, $commit);
    s_msg ('성공적으로 입력 되었습니다.');
    echo "<script>location.replace('customer_access.php');</script>";
}




?>

