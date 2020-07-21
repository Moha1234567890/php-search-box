<html>
	
	<head>
		
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
			<form class='form-inline my-2 my-lg-0' method='POST' action='query.php' style='padding-top: 40px;padding-left:30px auto'>
			 <input class='form-control mr-sm-2 ' type='text' placeholder='Search'  aria-label='Search' name='fucks' >
			 <button class='btn btn-secondary my-2 my-sm-0' type='submit' name='submit'>Search</button>
			 
		   </form> 
		</div>
	    </div>
	</div>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script> 
	  

	</body>   

</html>




<?php

    header('Cache-Control: no cache'); //no cache
	session_cache_limiter('private_no_expire'); // works


    include "includes/config.php";
	
	$out = ''; 
	if (isset($_POST['submit'])) {
		$x = $_POST['fucks'];
			       	

		
		$query = ("SELECT  * FROM sets WHERE title LIKE '%{$x}%' LIMIT 2")  or die('not done'); 
        $run_q = $conn->prepare($query);
		
		$run_q->execute();


		
		
		$count = $run_q->rowCount();

		//echo ;

		if($count == 0) {
			   echo 'there is no search';
			
		

		} else {

				while ($fetch = $run_q->fetch(PDO::FETCH_ASSOC))
				 {

					//$fetch['title'];
					$out .= "
					
				<div class='container'>
					<div class='row'>

                      <div class='col-md-6'>
                      
						<div class='alert alert-danger' role='alert'>
						  <a href='singel.php?x=$fetch[id]'><h5>$fetch[title]</h5></a>
						</div>
					   </div>
					</div>
				 </div>
		  	                        ";
					echo $out;  

					       			
				}
				echo "<p> number of results:  . {$count}</p>";   
		}
				  }



?>


