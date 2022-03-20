<?php
session_start();
include 'includes/autoloader.inc.php';
require_once './components/book.cmp.php';
require_once './createDB.php';

$db = new CreateDb($dbname = "booksdb",$tbl_name = "bookstbl");

if (isset($_POST['add'])){
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "book_id");

        if(in_array($_POST['book_id'], $item_array_id)){
            echo "<script>alert('book is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'book_id' => $_POST['book_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'book_id' => $_POST['book_id']
        );

        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>School Library</title>
</head>

<body>
    <?php require_once ("components/nav.php"); ?>
    <section class="container">
        <div class="row text-center py-5">
            <?php
                $res = $db->getData();
                while($row = mysqli_fetch_assoc($res)){
                    bookComponent($row['bkName'],$row['bkText'],$row['bkImg'], $row['id']);
                }
            ?>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>