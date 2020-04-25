<?php include 'database.php' ?>
<?php session_start() ?>
<?php 
    $category_id=$_GET['id'];
	$sn=$_GET['sn'];
// Get number of questions
    
$query = "SELECT * FROM question where category_id=$category_id and sn=$sn" ;
$run = mysqli_query($con,$query) or die($mysqli->error.__LINE__); ;
if ($sn == 1) {
		$_SESSION['score'] = 0;
    $_SESSION['ans']=0;
   
    $_SESSION['wrans']=0;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Online Quiz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />


    <body style="background:#eee;">
        <header style="background: #333; color: white;">
            <div class="container">
                <h1>Online Quiz</h1>

            </div>
        </header>
        <main>
            <div class="container">
                <?php while ($data = mysqli_fetch_assoc($run)) { ?>
                <div class="current">
                    <?php echo $sn."." ?>
                    <?php echo $data['question_text'];?>
                </div>
                <form class="form-horizontal" role="form" id='quiz_form' method="post" action="process.php">
                    <li>
                        <input name="choice" type="radio" value="1" />
                        <?php echo $data['option1']?>
                    </li>
                    <li>
                        <input name="choice" type="radio" value='2' />
                        <?php echo $data['option2']?>
                    </li>
                    <li>
                        <input name="choice" type="radio" value='3' />
                        <?php echo $data['option3']?>
                    </li>
                    <li>
                        <input name="choice" type="radio" value='4' />
                        <?php echo $data['option4']?>
                    </li>
                    <input type="submit" name="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary" />
                    <input name="sn" type="hidden" value="<?php echo $sn ?>" />

                    <input name="category_id" type="hidden" value="<?php echo $category_id ?>" />
                </form>
                <?php } ?>



            </div>
        </main>

        <footer>
            <div class="container">
                Copyright &copy; 2017, Online Quiz
            </div>
        </footer>
    </body>

</html>
