<?php include 'database.php' ?>
<?php 
    $id=$_GET['id'];
// Get number of questions
    
$query = "SELECT * FROM category WHERE category_id=$id" ;
$run = mysqli_query($con,$query) or die($mysqli->error.__LINE__);
$data=mysqli_fetch_assoc($run);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Online Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />

</head>

<body style="background: #eee;">
    <header style="background: #333; color: white;">
        <div class="container">
            <h1>Online Quiz</h1>

        </div>
    </header>
    <main>
        <div class="container">
            <h2>Test Your
                <?php echo $data['category']?> Knowledge</h2>
            <p>This is a multiple choice quiz to test your knowledge of
                <?php echo $data['category']?>
            </p>
            <ul>
                <li><strong>Number of Questions: <?php echo $data['total'];?></strong>
                </li>
                <li><strong>Total Marks: </strong>
                    <?php echo $data['sahi']*$data['total'] ?>
                </li>

                <li><strong>Marks for correct answer: </strong>
                    <?php echo $data['sahi'] ?>
                </li>
                <li><strong>Negative Marks: </strong>
                    <?php echo $data['galat'] ?>
                </li>
                <li><strong>Type: </strong>Multiple Choice</li>
                <li><strong>Estimated Time: </strong>
                    <?php echo $data['time'] ?>
                </li>
            </ul>
            <?php echo "<a  href=\"question.php?sn=1&id=".$data['category_id']."\"><button type=\"button\" class=\"btn btn-primary\">Start</button></a>";?>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2017, Online Quiz
        </div>
    </footer>
</body>

</html>
