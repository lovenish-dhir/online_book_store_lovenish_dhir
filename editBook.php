<?php  
session_start();
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {
	if (!isset($_GET['id'])) {
        header("Location: admin.php");
        exit;
	}
	$id = $_GET['id'];
	include "dbConn.php";
	include "php/funcBook.php";
    $book = get_book($conn, $id);
    if ($book == 0) {
        header("Location: admin.php");
        exit;
    }
	include "php/funcCategory.php";
    $categories = get_all_categories($conn);
	include "php/funcAuthor.php";
    $authors = get_all_author($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Book</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="admin.php">Admin</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link" aria-current="page" href="index.php">Store</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="addBook.php">Add Book</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="addCategory.php">Add Category</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="addAuthor.php">Add Author</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="logout.php">Logout</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
     <form action="php/editBook.php" method="post" enctype="multipart/form-data" class="shadow p-4 rounded mt-5" style="width: 90%; max-width: 50rem;">
     	<h1 class="text-center pb-5 display-4 fs-3"> Edit Book </h1>
     	<?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
			  <?=htmlspecialchars($_GET['error']); ?>
		  </div>
		<?php } ?>
		<?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
			  <?=htmlspecialchars($_GET['success']); ?>
		  </div>
		<?php } ?>
     	<div class="mb-3">
		    <label class="form-label"> Book Title </label>
		    <input type="text" hidden value="<?=$book['id']?>" name="book_id">
		    <input type="text" class="form-control" value="<?=$book['title']?>" name="book_title">
		</div>
		<div class="mb-3">
		    <label class="form-label"> Book Description </label>
		    <input type="text" class="form-control" value="<?=$book['description']?>" name="book_description">
		</div>
		<div class="mb-3">
		    <label class="form-label"> Book Author </label>
		    <select name="book_author" class="form-control">
				<option value="0"> Select author </option>
				<?php 
				if ($authors == 0) {
				}else{
				foreach ($authors as $author) { 
					if ($book['author_id'] == $author['id']) { ?>
					<option selected value="<?=$author['id']?>">
						<?=$author['name']?>
					</option>
					<?php }else{ ?>
					<option value="<?=$author['id']?>">
						<?=$author['name']?>
					</option>
				<?php }} } ?>
		    </select>
		</div>
		<div class="mb-3">
		    <label class="form-label"> Book Category </label>
		    <select name="book_category" class="form-control">
				<option value="0"> Select category </option>
				<?php 
				if ($categories == 0) {
				}else{
				foreach ($categories as $category) { 
					if ($book['category_id'] == $category['id']) { ?>
					<option selected value="<?=$category['id']?>">
						<?=$category['name']?>
					</option>
					<?php }else{ ?>
					<option value="<?=$category['id']?>">
						<?=$category['name']?>
					</option>
				<?php }} } ?>
		    </select>
		</div>
		<div class="mb-3">
		    <label class="form-label"> Book Cover </label>
		    <input type="file" class="form-control" name="book_cover">
		    <input type="text" hidden value="<?=$book['cover']?>" name="current_cover">
		    <a href="uploads/cover/<?=$book['cover']?>" class="link-dark">Current Cover </a>
		</div>
		<div class="mb-3">
		    <label class="form-label"> File </label>
		    <input type="file" class="form-control" name="file">
		    <input type="text" hidden value="<?=$book['file']?>" name="current_file">
		    <a href="uploads/files/<?=$book['file']?>" class="link-dark"> Current File </a>
		</div>
	    <button type="submit" class="btn btn-primary"> Update </button>
     </form>
	</div>
</body>
</html>
<?php }else{
  header("Location: login.php");
  exit;
} ?>