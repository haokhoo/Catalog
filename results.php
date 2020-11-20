<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search Results</title>
</head>
<style>
    table {
        border: 1px solid black;
        width: 100%;
    }
    
    th, td {
        border: 1px solid black;
    }
</style>
<body>
    <a href="search.html">
        <h1>Book Search Results</h1>
    </a>
    <?php
    $selectType = $_POST['searchtype'];
    $searchTerm = $_POST['searchterm'];

    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Fatal Error");


    $query = "SELECT * FROM catalogs WHERE $selectType like '$searchTerm'";
    $result = $conn->query($query);
    if(!$result) die("Database access failed");

    $rows = $result->num_rows;
 
    echo "
        <table>
            <tr>
                <th>ISBN</th>
                <th>Author</th>
                <th>Title</th>
                <th>Price</th>
            </tr>
        ";
     
    for ($j = 0; $j < $rows; $j++){
        $row = $result->fetch_array(MYSQLI_NUM);
        echo "<tr>";
        for ($k = 0; $k < 4; $k++){
            echo "<td>" .htmlspecialchars($row[$k]) . "</td>";
        }
        echo "</tr>";
    }
     
    echo "</table>";

    $conn->close();

    ?>
</body>
</html>