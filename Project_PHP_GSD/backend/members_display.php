<?php

function display_members()
{
    try {
        require_once "db_connection.php";
        
        $statement = $pdo->query("SELECT email, phone, first_name, last_name, age, id FROM members;");
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        echo '<table>';
        echo '<tr><td class="table-title">';
        echo "First name";
        echo '</td><td class="table-title">';
        echo "Last name";
        echo '</td><td class="table-title">';
        echo "Age";
        echo '</td><td class="table-title">';
        echo "Email";
        echo '</td><td class="table-title">';
        echo "Phone number";
        echo "</td></tr>";
        foreach($rows as $row) {
            echo "<tr><td>";
            echo($row['first_name']);
            echo "</td><td>";
            echo($row['last_name']);
            echo "</td><td>";
            echo($row['age']);
            echo "</td><td>";
            echo($row['email']);
            echo "</td><td>";
            echo($row['phone']);
            echo "</td><td>";
           
            echo '<form action="../backend/delete_member.php" method="post">';
            echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
            echo '<button type="submit" class="table-button">Delete</button>';
            echo '</form>';
            echo "</td></tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}

function display_members_table()
{
    echo '<div class="table-container">';
    echo '<?php';
    echo 'display_members();';
    echo '?>';
    echo '</div>';
}