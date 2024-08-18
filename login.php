<?php  
session_start();
if (!isset($_SESSION['user_id']) &&
    !isset($_SESSION['user_email'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
		<form class="p-5 rounded shadow" style="max-width: 30rem; width: 100%" method="POST" action="php/auth.php">
		  <h1 class="text-center pb-5 display-4 color-dark-violet">LOGIN</h1>
		  <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
			  <?=htmlspecialchars($_GET['error']); ?>
		  </div>
		  <?php } ?>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label color-dark-violet">Email address</label>
		    <input type="email" class="form-control purple-bg" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label color-dark-violet">Password</label>
		    <input type="password" class="form-control purple-bg" name="password" id="exampleInputPassword1">
		  </div>
		  <button type="submit" class="btn btn-primary">Login</button>
		   <a href="index.php" class="ms-3 color-dark-violet ">Store</a>
		</form>
	</div>
</body>
</html>
<?php }else{
  header("Location: admin.php");
  exit;
} ?>