<?php

function display_messages()
{
    try {
        require_once "db_connection.php";
        
        $statement = $pdo->query("SELECT first_name, last_name, email, message FROM messages;");
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        echo '<table>';
        echo '<tr><td class="table-title">';
        echo "First name";
        echo '</td><td class="table-title">';
        echo "Last name";
        echo '</td><td class="table-title">';
        echo "email";
        echo '</td><td class="table-title">';
        echo "Message";
        echo "</td></tr>";
        foreach($rows as $row) {
            echo "<tr><td>";
            echo($row['first_name']);
            echo "</td><td>";
            echo($row['last_name']);
            echo "</td><td>";
            echo($row['email']);
            echo "</td><td>";
            echo($row['message']);
            echo "</td><td>";
           
            echo '<form action="../backend/delete_message.php" method="post">';
            echo '<input type="hidden" name="message" value="' . $row['message'] . '">';
            echo '<button type="submit" class="table-button">Delete</button>';
            echo '</form>';
            echo "</td></tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
