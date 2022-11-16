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
    
    $customer_id = $_POST['customer_id'];
    $query = "select * from playlist where customer_id = '$customer_id'";
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
		s_msg('조회하기가 실패하였습니다. 다시 시도하여 주십시오.');
		return;
    }
    ?>

    <table class="table table-striped table-bordered">
        <tr>
            <th>No.</th>
            <th>플레이리스트 id</th>
            <th>플레이리스트 제목</th>
            <th>기능</th>
        </tr>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            // no 를 의미
            echo "<td>{$row_index}</td>";
            echo "<td>{$row['playlist_id']}</td>";
            echo "<td><a href='play_song_list.php?playlist_id={$row['playlist_id']}'>{$row['playlist_title']}</a></td>";
            echo "<td width='17%'>
                <a href='add_playlist_form.php?playlist_id={$row['playlist_id']}'><button class='button primary small'>제목 수정</button></a>
                 <button onclick='javascript:deleteConfirm({$row['playlist_id']})' class='button danger small'>삭제</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
    </table>
    <a href='add_playlist_form.php'>플레이 리스트 추가</a>
	<script>
        function deleteConfirm(playlist_id) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "delete_playlist.php?playlist_id=" +playlist_id;}
            else{   //취소
                return;
            }
        }
    </script>
</div>
<? include("footer.php") ?>
