<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Entry Results</title>
</head>
<body>
    <a href="newbook.html">
        <h1>Book Entry Results</h1>
    </a>
    <?php

        $isbn = $_POST["isbn"];
        $author = $_POST["author"];
        $title = $_POST["title"];
        $price = $_POST["price"];

        if(isset($_POST['isbn']) && isset($_POST['author']) && isset($_POST['title']) && isset($_POST['price']))
        {
            require_once 'login.php';
            $conn = new mysqli($hn, $un, $pw, $db);
            if ($conn->connect_error) die("Fatal Error");

            $query = "INSERT INTO catalogs (isbn, author, title, price) 
            VALUES ('$isbn','$author','$title','$price')";
            $result = $conn->query($query);

            if(!$result){
                echo "INSERT FAILED";
            }else{
                echo $title." inserted successfully.";
            }
        }

    $conn->close();
    ?>
    
</body>
</html>