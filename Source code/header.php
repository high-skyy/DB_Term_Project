<!DOCTYPE html>
<html lang='ko'>
<head>
    <title>Melon</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="song.php" method="post">
    <div class='navbar fixed'>
        <div class='container'>
            <a class='pull-left title' href="index.php">Melon</a>
            <ul class='pull-right'>
                <li>
                    <input type="text" name="search_keyword" placeholder="노래 검색">
                </li>
                <li><a href='song.php'>노래</a></li>
                <li><a href='playlist_access.php'>플레이 리스트</a></li>
                <li><a href='chart.php'>차트</a></li>
                <li><a href='customer_access.php'>개인정보</a></li>
                <li><a href='register_form.php'>회원가입</a></a></li>
            </ul>
        </div>
    </div>
</form>
</html>