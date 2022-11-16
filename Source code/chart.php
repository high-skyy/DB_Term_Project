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
    
    $query = "select * from chart";
    $result = mysqli_query($conn, $query);
    if(!$result){
		s_msg('조회하기가 실패하였습니다. 다시 시도하여 주십시오.');
		return;
	}
    ?>

    <table class="table table-striped table-bordered">
        <tr>
            <th>No.</th>
            <th>차트 테마</th>
        </tr>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            // no 를 의미
            echo "<td>{$row_index}</td>";
            echo "<td><a href='chart_song_list.php?chart_id={$row['chart_id']}'>{$row['theme']}</a></td>";
            echo "<td width='17%'>
                 <button onclick='javascript:deleteConfirm({$row['chart_id']})' class='button danger small'>삭제</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
    </table>
    <a href='add_chart_form.php'>차트 추가</a>
	<script>
        function deleteConfirm(chart_id) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "delete_chart.php?chart_id=" +chart_id;}
            else{   //취소
                return;
            }
        }
    </script>
</div>
<? include("footer.php") ?>
