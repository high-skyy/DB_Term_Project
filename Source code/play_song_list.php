<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    
    mysqli_query($connect, "set autocommit = 0");
	mysqli_query($connect, "set session transaction isolation level repeatable read");
	mysqli_query($connect, "start transaction");
    
    $playlist_id = $_GET["playlist_id"];
    $query = "select playlist_id, song_id, sequence, song_title, artist from play_song_list natural join song where playlist_id = $playlist_id order by sequence";
    $result = mysqli_query($conn, $query);
    if (!$result) {
		s_msg('조회하기가 실패하였습니다. 다시 시도하여 주십시오.');
		return;
    }
    ?>

    <table class="table table-striped table-bordered">
        <tr>
            <th>순서</th>
            <th>노래제목</th>
            <th>아티스트명</th>
        </tr>
        <?
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            // no 를 의미
            echo "<td>{$row['sequence']}</td>";
            echo "<td>{$row['song_title']}</td>";
            echo "<td>{$row['artist']}</td>";
            echo "<td width='17%'>
            	<a href='change_sequence_up.php?playlist_id={$row['playlist_id']}&song_id={$row['song_id']}&sequence={$row['sequence']}'><button class='button primary small'>순서 위로</button></a>
            	<a href='change_sequence_down.php?playlist_id={$row['playlist_id']}&song_id={$row['song_id']}&sequence={$row['sequence']}'><button class='button primary small'>순서 아래로</button></a>
                <a href='delete_song_in_playlist.php?playlist_id={$row['playlist_id']}&song_id={$row['song_id']}'><button class='button primary small'>삭제</button></a>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
    </table>
</div>
<? include("footer.php") ?>