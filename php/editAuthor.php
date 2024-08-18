<?php  
session_start();
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {
	include "../dbConn.php";
	if (isset($_POST['author_name']) &&
        isset($_POST['author_id'])) {
		$name = $_POST['author_name'];
		$id = $_POST['author_id'];
		if (empty($name)) {
			$em = "The author name is required";
			header("Location: ../editAuthor.php?error=$em&id=$id");
            exit;
		}else {
			$sql  = "UPDATE authors 
			         SET name=?
			         WHERE id=?";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$name, $id]);
		     if ($res) {
		     	$sm = "Successfully updated!";
				header("Location: ../editAuthor.php?success=$sm&id=$id");
	            exit;
		     }else{
		     	$em = "Error!";
				header("Location: ../editAuthor.php?error=$em&id=$id");
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