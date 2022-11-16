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
    
    $chart_id = $_GET["chart_id"];
    $query = "select chart_id, song_id, theme, rank, song_title, artist from chart_song_list natural join song natural join chart where chart_id = $chart_id order by rank";
    $result = mysqli_query($conn, $query);
    if (!$result) {
		s_msg('조회가 실패하였습니다. 다시 시도하여 주십시오.');
		return;
    }
    ?>
    <table class="table table-striped table-bordered">
        <tr>
        	<th>테마</th>
            <th>순위</th>
            <th>노래제목</th>
            <th>아티스트명</th>
            <th>기능</th>
        </tr>
        <?
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            // no 를 의미
            echo "<td>{$row['theme']}</td>";
            echo "<td>{$row['rank']}</td>";
            echo "<td>{$row['song_title']}</td>";
            echo "<td>{$row['artist']}</td>";
            echo "<td width='17%'>
            	<a href='change_rank_up.php?chart_id={$row['chart_id']}&song_id={$row['song_id']}&rank={$row['rank']}'><button class='button primary small'>순위 위로</button></a>
            	<a href='change_rank_down.php?chart_id={$row['chart_id']}&song_id={$row['song_id']}&rank={$row['rank']}'><button class='button primary small'>순서 아래로</button></a>
                <a href='delete_song_in_chart.php?chart_id={$row['chart_id']}&song_id={$row['song_id']}'><button class='button primary small'>삭제</button></a>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
    </table>
</div>
<? include("footer.php") ?>
