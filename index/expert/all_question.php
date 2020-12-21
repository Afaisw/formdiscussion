<?php
        $dbc = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
        
        $statement = $dbc->prepare("SELECT a.fullname, b.isi, c.judul FROM `user` a, `question` b, `topik` c WHERE a.id=b.id_user AND b.id_topic=c.id_topik");
        $statement->execute();

        foreach ($statement as $row) {
            echo "<h1>{$row['fullname']}</h1>";
            echo "<p>topik : {$row['judul']}</p>";
            echo "<p>{$row['isi']}</p>";
        }
?>