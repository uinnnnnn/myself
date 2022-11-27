<?php
    function dbConnect(){
        $db_type = 'mysql';
        $db_host = 'localhost';
        $db_name = 'guestbook';
        $db_user = 'root';
        $db_password = '';
        $dbconnect = 'mysql:host='.$db_host.";dbname=".$db_name;
        $db = new PDO($dbconnect, $db_user, $db_password);
        $db->query("SET NAMES UTF8");
        return $db;
    }
    function createComment($name, $comment){
        $db = dbConnect();//連線到資料庫
        $statement = $db ->prepare("INSERT INTO guestbook(name,comment) VALUES(?,?)");
        $statement ->execute([$name, $comment]);
        return $statement;
    }
    function getAllComments(){
        $db = dbConnect();
        $statement = $db ->prepare("SELECT * FROM guestbook");
        $statement ->execute();
        return $statement ->fetchAll(PDO::FETCH_ASSOC);
    }
    function editComment($id){
        $db = dbConnect();
        $statement = $db ->prepare("SELECT * FROM guestbook WHERE id=?");
        $statement ->execute([$id]);
        return $statement ->fetchAll(PDO::FETCH_ASSOC);
    }
    function updateComment($id, $name, $comment){
        $db = dbConnect();
        $statement = $db ->prepare("UPDATE guestbook SET name=?, comment=? WHERE id=?");
        $statement ->execute([$name, $comment, $id]);
        return $statement;
    }
    function deleteComment($id){
        $db = dbConnect();
        $statement = $db ->prepare("DELETE FROM guestbook WHERE id= ?");
        $statement ->execute([$id]);
        return $statement;
    }
?>
