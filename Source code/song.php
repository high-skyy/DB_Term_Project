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
    
    $query = "select * from song";
    if (array_key_exists("search_keyword", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $search_keyword = $_POST["search_keyword"];
        $query .= " where song_title like '%$search_keyword%' or artist like '%$search_keyword%'";
    }
    $result = mysqli_query($conn, $query);
    
    
    if (!$result) {
		s_msg('조회가 실패하였습니다. 다시 시도하여 주십시오.');
		return;
    }
    ?>

    <table class="table table-striped table-bordered">
        <tr>
            <th>No.</th>
            <th>노래 제목</th>
            <th>아티스트 명</th>
            <th>기능</th>
        </tr>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['song_title']}</td>";
            echo "<td>{$row['artist']}</td>";
            echo "<td width='30%'>
                <a href='add_song_to_playlist_form_access.php?song_id={$row['song_id']}'><button class='button primary small'>플레이리스트에 노래 추가</button></a>
                </td>";             // 수정 함
            echo "<td width='30%'>
                <a href='add_song_to_chart_form.php?song_id={$row['song_id']}'><button class='button primary small'>차트에 노래 추가(유저 입력 x)</button></a>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
    </table>
</div>
<? include("footer.php") ?>
