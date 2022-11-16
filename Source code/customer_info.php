<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    
    mysqli_query($connect, "set autocommit = 0");
	mysqli_query($connect, "set session transaction isolation level serializable");
	mysqli_query($connect, "start transaction");
    
    $customer_id = $_POST['customer_id'];
    $query = "select * from customer natural join fee_policy where customer_id like '%$customer_id%'";
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
		s_msg('조회가 실패하였습니다. 다시 시도하여 주십시오.');
		return;
    }
    ?>

    <table class="table table-striped table-bordered">
        <tr>
            <th>아이디</th>
            <th>이름</th>
            <th>주민등록번호</th>
            <th>요금제 이름</th>
        </tr>
        <?
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>{$row['customer_id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['personal_id']}</td>";
            echo "<td><a href='policy_view.php?policy_id={$row['policy_id']}'>{$row['policy_name']}</a></td>";
            echo "<td><a href='delete_customer_info.php?customer_id={$row['customer_id']}'>탈퇴</a></td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
    </table>
    
</div>
<? include("footer.php") ?>
