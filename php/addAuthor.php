<?php  
session_start();
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {
	include "../dbConn.php";
	if (isset($_POST['author_name'])) {
		$name = $_POST['author_name'];
		if (empty($name)) {
			$em = "Author name required";
			header("Location: ../addAuthor.php?error=$em");
            exit;
		}else {
			$sql  = "INSERT INTO authors (name)
			         VALUES (?)";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$name]);
		     if ($res) {
		     	$sm = "Created Successfully!";
				header("Location: ../addAuthor.php?success=$sm");
	            exit;
		     }else{
		     	$em = "Error!";
				header("Location: ../addAuthor.php?error=$em");
	            exit;
		     }
		}
	}else {
      header("Location: ../admin.php");
      exit;
	}
}else{
  header("Location: ../login.php");
  exit;
}