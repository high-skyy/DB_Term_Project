<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$action = "playlist.php";
?>
    <div class="container">
        <form name="playlist_access" action="<?=$action?>" method="post" class="fullwidth">
            <p>
                <label for="customer_id">플레이리스트 접속을 위해 아이디 입력</label>
                <input type="text" placeholder="아이디" id="customer_id" name="customer_id"/>
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();">입력</button></p>

            <script>
                function validate() {
                    if(document.getElementById("customer_id").value == "-1") {
                        alert ("아이디를 입력하세요"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>