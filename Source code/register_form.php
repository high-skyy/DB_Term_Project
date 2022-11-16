<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);



$action = "register.php";
?>
    <div class="container">
        <form name="register_form" action="<?=$action?>" method="post" class="fullwidth">
        	<p>
                <label for="customer_id">아이디</label>
                <input type="text" placeholder="customer_id" id="customer_id" name="customer_id"/>
            </p>
            <p>
                <label for="name">이름</label>
                <input type="text" placeholder="이름" id="name" name="name"/>
            </p>
            <p>
                <label for="personal_id">주민등록번호</label>
                <input type="text" placeholder="주민등록번호" id="personal_id" name="personal_id"/>
            </p>

            <p align="center"><button class="button primary large" onclick="javascript:return validate();">추가</button></p>

            <script>
                function validate() {
                    if(document.getElementById("name").value == "-1") {
                        alert ("이름을 설정하세요"); return false;
                    }
                    else if(document.getElementById("personal_id").value == "-1") {
                        alert ("본인 주민등록번호를 입력하세요"); return false;
                    }
                    else if(document.getElementById("customer_id").value == "-1") {
                        alert ("아이디를 입력하세요"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>