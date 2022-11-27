<?php
    include("datatable.php");
    $name = $_POST["name"];
    $comment = $_POST['comment'];
    $statement = createComment($name, $comment);
    header('Location: ./index.php');//跳轉
    echo "資料新增成功";
?>