<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

mysqli_query($connect, "set autocommit = 0");
mysqli_query($connect, "set session transaction isolation level serializable");
mysqli_query($connect, "start transaction");

$mode = "입력";
$action = "add_chart.php";

if (array_key_exists("chart_id", $_GET)) {
    $chart_id = $_GET["chart_id"];
    $query =  "select * from chart where chart_id = $chart_id";
    $result = mysqli_query($conn, $query);
    
    $chart = mysqli_fetch_array($result);
    if(!$chart) {
        msg("플레이리스트가 존재하지 않습니다.");
        return;
    }
    $mode = "수정";
    $action = "modify_chart.php";
}
?>
    <div class="container">
        <form name="add_chart_form" action="<?=$action?>" method="post" class="fullwidth">
            <p>
                <label for="chart_theme">차트 테마</label>
                <input type="text" placeholder="차트 테마" id="theme" name="theme"/>
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("theme").value == "-1") {
                        alert ("차트의 테마를 설정하세요"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>