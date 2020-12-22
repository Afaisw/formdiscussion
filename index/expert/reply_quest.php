<?php
    $statement = $db->prepare('SELECT a.fullname, b.isi, b.id_question, c.judul FROM `user` a, `question` b, `topik` c WHERE b.id_topic = c.id_topik AND a.id=b.id_user AND b.id_question=:id');
    $statement->bindValue(':id', $_GET['id']);
    $statement->execute();
    $data = $statement->fetchAll();

    foreach ($data as $row) {
        echo "<h1>{$row['fullname']}</h1>";
        echo "<p>{$row['judul']}</p>";
        echo "<p>{$row['isi']}</p>";
    }
?>