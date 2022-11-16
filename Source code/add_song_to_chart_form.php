<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

mysqli_query($connect, "set autocommit = 0");
mysqli_query($connect, "set session transaction isolation level serializable");
mysqli_query($connect, "start transaction");

$action = "add_song_to_chart.php";
$song_id = $_GET['song_id'];

$theme = array();
$query = "select* from chart";
$res = mysqli_query($conn, $query);

if(!$res){
	s_msg('오류가 발생하였습니다. 다시 시도하여 주십시오.');
	return;
}

while($row = mysqli_fetch_assoc($res)){
	$theme[$row['chart_id']] = $row['theme'];
}

?>
    <div class="container">
        <form name="add_song_to_chart_form" action="<?=$action?>" method="post" class="fullwidth">
            <p>
            <label for="chart_id">테마</label>
                <select name="chart_id" id="chart_id">
                    <option value="-1">선택해 주십시오.</option>
                    <?
                        foreach($theme as $id => $name){
							echo "<option value={$id}>{$name}</option>";
						}
                    ?>
                </select>
            </p>
            <p>
                <label for="song_id">노래id(입력x)</label>
                <input type="text" placeholder="아무것도 입력하지 마세요" id="song_id" name="song_id" value = "<?=$song_id?>"/>
            </p>
            <p>
                <label for="rank">순위</label>
                <input type="number" placeholder="순서를 입력하세요" id="rank" name="rank"/>
            </p>


            <p align="center"><button class="button primary large" onclick="javascript:return validate();">노래 추가</button></p>

            <script>
                function validate() {
                    if(document.getElementById("playlist_title").value == "-1") {
                        alert ("차트id를 입력하세요"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>