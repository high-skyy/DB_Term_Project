<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

mysqli_query($connect, "set autocommit = 0");
mysqli_query($connect, "set session transaction isolation level repeatable read");
mysqli_query($connect, "start transaction");

$mode = "입력";
$action = "add_playlist.php";

if (array_key_exists("playlist_id", $_GET)) {
    $playlist_id = $_GET["playlist_id"];
    $query =  "select * from playlist where playlist_id = $playlist_id";
    $result = mysqli_query($conn, $query);
    $playlist = mysqli_fetch_array($result);
    
    if(!$playlist) {
        msg("플레이리스트가 존재하지 않습니다.");
        return;
    }
    $mode = "수정";
    $action = "modify_playlist.php";
}
?>
    <div class="container">
        <form name="add_playlist_form" action="<?=$action?>" method="post" class="fullwidth">
            <p>
                <label for="playlist_title">플레이리스트 제목</label>
                <input type="text" placeholder="플레이리스트 제목" id="playlist_title" name="playlist_title"/>
            </p>
            <p>
                <label for="customer_id">본인 아이디를 입력하세요</label>
                <input type="text" placeholder="아이디를 입력하세요" id="customer_id" name="customer_id"/>
            </p>
            <p>
            	<label for='playlist_id'>플레이리스트 id(아무것도 입력하지 마세요)</label>
            	<input type="number" placeholder="아무것도 입력하지 마세요" id='playlist_id' name="playlist_id", value = "<?=$playlist_id?>"/>
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("playlist_title").value == "-1") {
                        alert ("플레이리스트 제목을 설정하세요"); return false;
                    }
                    else if(document.getElementById("customer_id").value == "-1") {
                        alert ("본인 아이디를 입력하세요"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>