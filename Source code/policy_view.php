<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<table border = '1'>
	<tr>
		<th>요금제ID</th> <th>요금제 이름</th> <th>요금제 설명</th> <th>금액</th>
	</tr>

<?
$conn = dbconnect($host, $dbid, $dbpass, $dbname);

mysqli_query($connect, "set autocommit = 0");
mysqli_query($connect, "set session transaction isolation level serializable");
mysqli_query($connect, "start transaction");

if (array_key_exists("policy_id", $_GET)) {
    $policy_id = $_GET["policy_id"];
    $query = "select * from fee_policy where policy_id = $policy_id";
    $result = mysqli_query($conn, $query);
    
    if(!$result){
		s_msg('조회하기가 실패하였습니다. 다시 시도하여 주십시오.');
		return;
	}
    
    $row = mysqli_fetch_array($result);
    if (!$row) {
        msg("물품이 존재하지 않습니다.");
    }
}
echo"<br>";
echo"<tr>";
echo"<td>{$row['policy_id']}</td>";
echo"<td>{$row['policy_name']}</td>";
echo"<td>{$row['description']}</td>";
echo"<td>{$row['price']}</td>";
echo"</tr>";
?>
</table>
<a href='policy_change_form.php'>요금제 변경</a>

<? include "footer.php" ?>