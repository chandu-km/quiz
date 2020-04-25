<?php include 'database.php' ?>
<?php 
// Get number of questions
$query = "select * FROM category";
$run = mysqli_query($con,$query) or die($mysqli->error.__LINE__);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Online Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <style>
        .panel {
            border-color: #eee;
            margin: 40px 400px 40px 400px;
            padding: 20px;
            font: 15px "Century Gothic", "Times Roman", sans-serif;
        }

    </style>
</head>

<body style="background: #eee;">
    <header style="background: #333; color: white;">
        <div class="container">
            <h1>Online Quiz</h1>
        </div>
    </header>
    <main>
        <div class="panel">
            <table class="table table-striped">


                <tr>
                    <th>S.No.</th>
                    <th>Category</th>
                    <th>Total Question</th>

                    <th>Marks</th>
                    <th colspan="2">Time Limit</th>

                </tr>
                <?php
                $count=1 ;
            while($data=mysqli_fetch_assoc($run)){ ;?>

                    <tr>
                        <td>
                            <?php echo $count++ ;?>
                        </td>
                        <td>
                            <?php echo $data['category'];?>
                        </td>
                        <td>
                            <?php echo $data['total'];?>
                        </td>
                        <td>
                            <?php echo $data['sahi']*$data['total'];?>
                        </td>
                        <td colspan="2">
                            <?php echo $data['time'];?>
                        </td>



                        <td>
                            <?php echo "<a  href=\"start.php?id=".$data['category_id']."\"><button type=\"button\" class=\"btn btn-primary\">Start</button></a>";?></td>

                    </tr>

                    <?php  }
            ?>

            </table>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2017, Online Quiz
        </div>
    </footer>
</body>

</html>
