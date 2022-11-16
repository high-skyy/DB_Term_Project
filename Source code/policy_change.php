<?
include "config.php";
include "util.php";
?>

<div class="container">

    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    
    mysqli_query($connect, "set autocommit = 0");
	mysqli_query($connect, "set session transaction isolation level serializable");
	mysqli_query($connect, "start transaction");
    
    $customer_id = $_POST['customer_id'];
    $policy_id = $_POST['policy_id'];
    $query = "UPDATE customer SET policy_id = $policy_id WHERE customer_id = '$customer_id'";
    
    $ret = mysqli_query($conn, $query);
    if(!$ret)
    {
    	mysqli_query($conn, "rollback");
		s_msg('요급제 수정이 실패하였습니다. 다시 시도하여 주십시오.');
		return;
    }
    else
    {
    	mysqli_query($conn, $commit);
    	msg("Successful");
    }
    ?>

</div>

