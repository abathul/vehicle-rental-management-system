<?php
require_once('config.php'); // Include your database connection config

// SQL query with correlated subquery
$sql = "SELECT c.car_id, c.make, c.model
        FROM car c
        WHERE (
            SELECT COUNT(*)
            FROM reservation r
            WHERE r.car_id = c.car_id
        ) > 1";

$result = $conn->query($sql);

// Start HTML output
echo '<html>';
echo '<head>';
echo '<title>Popular Cars</title>';
echo '<style>';
echo 'body { font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 0; }';
echo 'h2 { background-color: #333; color: #fff; padding: 20px; text-align: center; }';
echo 'table { background-color: #fff; border-collapse: collapse; border-radius: 5px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); margin: 20px auto; max-width: 800px; padding: 20px; }';
echo 'th, td { padding: 10px; text-align: center; border: 1px solid #ccc; }';
echo 'th { background-color: #333; color: #fff; }';
echo 'tr:nth-child(even) { background-color: #f2f2f2; }';
echo 'tr:hover { background-color: #ddd; }';
echo '</style>';
echo '</head>';
echo '<body>';

// Display the query results in an HTML table
echo '<h2>Popular Cars</h2>';
echo '<table border="1">';
echo '<tr><th>Car ID</th><th>Make</th><th>Model</th></tr>';

while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row['car_id'] . '</td>';
    echo '<td>' . $row['make'] . '</td>';
    echo '<td>' . $row['model'] . '</td>';
    echo '</tr>';
}

echo '</table>';

// End HTML output
echo '</body>';
echo '</html>';

$conn->close(); // Close the database connection
?>
