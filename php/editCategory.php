<?php  
session_start();
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {
	include "../dbConn.php";
	if (isset($_POST['category_name']) &&
        isset($_POST['category_id'])) {
		$name = $_POST['category_name'];
		$id = $_POST['category_id'];
		if (empty($name)) {
			$em = "The category name is required";
			header("Location: ../editCategory.php?error=$em&id=$id");
            exit;
		}else {
			$sql  = "UPDATE categories 
			         SET name=?
			         WHERE id=?";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$name, $id]);
		     if ($res) {
		     	$sm = "Updated Successfully!";
				header("Location: ../editCategory.php?success=$sm&id=$id");
	            exit;
		     }else{
		     	$em = "Error!";
				header("Location: ../editCategory.php?error=$em&id=$id");
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