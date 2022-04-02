<!-- MADE BY MUSAIB -->
<!DOCTYPE html>
  
<head>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <title>Submit status</title>
	<style>
		*,*::before,*::after{
			padding:0;
			margin:0;
			box-sizing:border-box;
		}
		html{
			font-family: "Inter", sans-serif;
		}
		body{
			height:100vh;
			display:flex;
			justify-content:center;
			align-items:center;
  			background-color: rgb(69, 68, 68);
		}
		.container{
			padding:2rem 2rem 1.5rem 2rem;
			border-radius:1rem;
			background-color: #faebfd;
		}
		.fail{
			color:red;
		}
		.success{
			color:green;
		}
		a{
			display:inline-block;
			padding:0.8rem 1rem;
			background-color:#000;
			margin-top:1rem;
			border-radius:15px;
			text-decoration:none;
			color:white;

		}
		a:hover{
			background-color: rgb(74, 73, 73);
		}
	</style>
</head>
  
<body>

    <center>
        <?php
		$conn = mysqli_connect("localhost", "root", "musaib", "pda");
		  
		// Check connection
		if($conn){
		   
		}else{
			die("ERROR: Could not connect. ". mysqli_connect_error());
		}
		  
		$name = $_REQUEST['name'];
		$department = $_REQUEST['department'];
		$titleOfManuscript = $_REQUEST['titleOfManuscript'];
		$typeOfPublication = $_REQUEST['typeOfPublication'];
		$typeOfConference = $_REQUEST['typeOfConference'];
		$titleOfJournal = $_REQUEST['titleOfJournal'];
		$volumeNumber = $_REQUEST['volumeNumber'];
		$issueNumber = $_REQUEST['issueNumber'];
		$pageNumber = $_REQUEST['pageNumber'];
		$yearOfPublication = $_REQUEST['yearOfPublication'];
		$indexing = $_REQUEST['indexing'];
		$h_Index = $_REQUEST['h_Index'];
		$impactFactor = $_REQUEST['impactFactor'];
		

		//File uploading
		$targetDir="uploads/";
		$fileName="["."$name"."]".basename($_FILES["file"]["name"]);
		$targetFilePath=$targetDir . $fileName;
		if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){
			echo"<div class='container'><h2 class='success'>FILE  UPLOADED SUCCESSFULLY &#10004;</h2>";
		}else{
			echo "<div class='container'><h1 class='fail'>FILE  UPLOADED FAILED!!!</h1>";
		}

		//inserting data
		$sql = "insert into publications values('$name','$department','$titleOfManuscript','$typeOfPublication','$typeOfConference','$titleOfJournal','$volumeNumber','$issueNumber','$pageNumber','$yearOfPublication','$indexing','$h_Index','$impactFactor','".$targetFilePath."')";
		//checking if data is inserted
		if(mysqli_query($conn, $sql)){
		    echo "<h3 class='success'>Your entries have been recorded &#10004;</h3>
					<a href='index.html'>Back to form</a>
				</div>"; 
	  
		} else{
			echo "<h3 class='fail'>Failed to record entries!!! &#10004;</h3>
				<a href='index.html'>Back to form</a>
			</div>";
		}
		  
		// Close connection
		mysqli_close($conn);
        ?>
    </center>
</body>

</html>
