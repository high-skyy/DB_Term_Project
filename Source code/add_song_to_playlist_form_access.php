<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

$action = "add_song_to_playlist_form.php";
$song_id = $_GET['song_id'];
?>
    <div class="container">
        <form name="customer_access" action="<?=$action?>" method="get" class="fullwidth">
            <p>
                <label for="customer_id">아이디</label>
                <input type="text" placeholder="아이디" id="customer_id" name="customer_id"/>
            </p>
            <p>
                <label for="song_id">노래 id</label>
                <input type="text" placeholder="노래 id" id="song_id" name="song_id" value = "<?=$song_id?>" />
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();">입력</button></p>

            <script>
                function validate() {
                    if(document.getElementById("customer_id").value == "-1") {
                        alert ("플레이리스트 제목을 설정하세요"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>