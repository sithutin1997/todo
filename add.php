<?php
require 'config.php';
if ($_POST)
{
    $title = $_POST['title'];
    $desc = $_POST['description']; 
    $sql = "INSERT INTO todo(title,description) VALUES (:title,:description)";
    $pdostatement = $pdo->prepare($sql);
    $result = $pdostatement->execute(
        array(
            ':title'=>$title,
            ':description'=>$desc
        )
    );

    if($result)
    {
       echo "<script>alert('New To Do is added');window.location.href='index.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <title>Add</title>
    </head>
    <body>
        <div class="card">
            <div class="card-body">
                <h2>Create New ToDo</h2>
                <form class="" action="add.php" method="post">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Decsription</label>
                        <textarea name="description" class="form-control" rows="8" cols="80" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="" class="btn btn-primary" value="SUBMIT">
                        <a href="index.php" role="button" class="btn btn-warning" name="">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>