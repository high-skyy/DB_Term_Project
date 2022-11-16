<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";  
?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    
    mysqli_query($connect, "set autocommit = 0");
	mysqli_query($connect, "set session transaction isolation level serializable");
	mysqli_query($connect, "start transaction");
    
    $query = "select * from fee_policy";
    $result = mysqli_query($conn, $query);
    if (!$result) {
		s_msg('요금제 조회가 실패하였습니다. 다시 시도하여 주십시오.');
		return;
    }
    ?>
    <form name='policy_change' action='policy_change.php' method='POST'>
        <p align='right'> 사용자 ID 입력: <input type='text' name='customer_id'></p>
        <table class="table table-striped table-bordered">
            <tr>
            	<th>No.</th>
                <th>요금제id</th> 
                <th>요금제 이름</th>
                <th>요금제 설명</th>
                <th>금액</th>
            </tr>
            <?
            $row_index = 1;
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>{$row_index}</td>";
                echo "<td>{$row['policy_id']}</td>";
                echo "<td>{$row['policy_name']}</td>";
                echo "<td>{$row['description']}</td>";
                echo "<td>{$row['price']}</td>";
                echo "<td width='17%'>
                    <input type='radio' name=policy_id value='{$row['policy_id']}'>
                    </td>";
                echo "</tr>";
                $row_index++;
            }
            ?>
            
        </table>
        <div align='center'>
            <input type='submit' class='button primary small' value=변경>
        </div>
    </form>
</div>
<? include("footer.php") ?>