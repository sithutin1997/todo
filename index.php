<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>HOME</title>
</head>
<body>
    <?php
        $pdostatement=$pdo->prepare("SELECT * FROM TODO ORDER BY id");
        $pdostatement->execute();
        $result = $pdostatement->fetchAll();
    ?>
    <div class="card">
        <div class="card-body">
            <h2>ToDo Home</h2>
            <a role="button" class="btn btn-success" href="add.php">Create New</a><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($result as  $value) {
                            $i=1;
                            # code...
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $value['title']?></td>
                        <td><?php echo $value['description']?></td>
                        <td><?php echo date('Y-m-d',strtotime($value['created_at']))?></td>
                        <td>
                            <a role="button" class="btn btn-warning" href="edit.php?id=<?php echo $value['id'];?>" >Edit</a>
                            <a role="button" class="btn btn-danger" href="delete.php?id=<?php echo $value['id'];?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                        $i++;
                    }
                     ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>