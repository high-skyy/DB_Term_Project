<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$action = "customer_info.php";
?>
    <div class="container">
        <form name="customer_access" action="<?=$action?>" method="post" class="fullwidth">
            <p>
                <label for="customer_id">아이디</label>
                <input type="text" placeholder="아이디" id="customer_id" name="customer_id"/>
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