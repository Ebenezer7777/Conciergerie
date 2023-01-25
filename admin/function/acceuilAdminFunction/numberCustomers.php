<?php
    $sql = 'SELECT COUNT(*) as total FROM client';
    $result = $connect->query($sql);
    if ($result->rowCount () > 0) {
        while($row = $result->fetch()) {
            echo "<br>
            " . $row["total"] ;
        }
    } else {
        echo "0 results";
    }

?>