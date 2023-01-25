<?php


    $sql = "SELECT COUNT(*) as total FROM produit";
    $result = $connect->query($sql);
    if ($result->rowCount () > 0) {
        while($row = $result->fetch()) {
            echo "<p>" . $row["total"] . " k</p>";
        }
    } else {
        echo "0 results";
    }

?>