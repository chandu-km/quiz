<?php session_start() ?>
<?php $total=$_GET['total']; ?>
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
            <h2>You're Done!</h2>
            <p>Congrats! You have completed the test!</p>
            <p><strong>Correct Answer:  </strong>
                <?php echo $_SESSION['ans'] ?>
            </p>
            <p><strong>Wrong Answer:</strong>
                <?php echo $_SESSION['wrans'] ?>
            </p>
            <p><strong>Unanswered Question:</strong>
                <?php $unans= $total-($_SESSION['ans']+$_SESSION['wrans']);
                echo $unans;?>
            </p>
            <p><strong>Final Score:</strong>
                <?php echo $_SESSION['score'] ?>
            </p>
            <a href="index.php" class="start"><button type="button" class="btn btn-primary">Home</button></a>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2017, PHP Quizzer
        </div>
    </footer>
</body>

</html>
