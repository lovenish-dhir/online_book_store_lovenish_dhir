<?php  
session_start();
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {
	include "../dbConn.php";
	if (isset($_POST['category_name'])) {
		$name = $_POST['category_name'];
		if (empty($name)) {
			$em = "The category name is required";
			header("Location: ../addCategory.php?error=$em");
            exit;
		}else {
			$sql  = "INSERT INTO categories (name)
			         VALUES (?)";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$name]);
		     if ($res) {
		     	$sm = "Created Successfully!";
				header("Location: ../addCategory.php?success=$sm");
	            exit;
		     }else{
		     	$em = "Error!";
				header("Location: ../addCategory.php?error=$em");
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