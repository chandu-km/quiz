<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php

// Check to see if score is set
if (!isset($_SESSION['score'])) {
	$_SESSION['score'] = 0;
    
    $_SESSION['ans']=0;
   
    $_SESSION['wrans']=0;
}

if ($_POST) {
	// Get question number
	$sn = $_POST['sn'];
    $category_id=$_POST['category_id'];
	// Get selected choice id
	$selected_choice = $_POST['choice'];
	$next = $sn + 1;
	
	/*
	 * Get number of questions
	 */
	$query = "SELECT * FROM `category` where category_id=$category_id";
	
	$result = mysqli_query($con,$query) or die($mysqli->error.__LINE__);
	$data = mysqli_fetch_assoc($result);
	$total=$data['total'];
    $sahi=$data['sahi'];
    $galat=$data['galat'];
   
          
	$query = "SELECT * FROM `question` where sn=$sn";
	
	$result = mysqli_query($con,$query) or die($mysqli->error.__LINE__);
	$data = mysqli_fetch_assoc($result);
	
	
	if ($selected_choice == $data['correct_option']) {
		// Answer is correct
		$_SESSION['score']=$_SESSION['score']+$sahi;
        $_SESSION['ans']++;
	}
	else if($selected_choice==NULL){
        
    }
        else{
           $_SESSION['score']=$_SESSION['score']-$galat; 
            $_SESSION['wrans']++;
        }
	
	// Check if this is the last question
	if ($sn >= $total) {
		header("Location: final.php?total=".$total);
       
		exit();
	} else {
		header("Location: question.php?id=".$category_id."&sn=".$next);
	}
}
