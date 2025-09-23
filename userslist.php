<?php
require 'conf.php';

require 'ClassAutoLoad.php';

$ObjLayouts->header($conf);
$ObjLayouts->navbar($conf);

echo "<h2>Registered Users</h2>";

// query users (ascending by name)
$sql = "SELECT id, name, email FROM users ORDER BY name ASC";
$result = $conn->query($sql);

// display list
if ($result && $result->num_rows > 0) {
    echo "<h2>User List</h2>";
    echo "<ol>"; // ordered list gives automatic numbering
    while ($row = $result->fetch_assoc()) {
        $name = htmlspecialchars($row['name']);
        $email = htmlspecialchars($row['email']);
        echo "<li>$name ($email)</li>";
    }
    echo "</ol>";
} else {
    echo "No users found.";
}

$ObjLayouts->footer($conf);
