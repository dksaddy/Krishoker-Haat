<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/article.css">
    <title>Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <?php  include("template\db_connect.php");
         include("header.php");
  ?>
    <div class="blog-section">
        <div class="section-content">
            <div class="title">
                <h2>Make a post</h2>
            </div>
        </div>
        </div>
    </div>
    <div class="container">
    <form class="row g-3" action="./add_post.php" method="POST"  enctype="multipart/form-data">
        <div class="col-md-4"></div>
        <div class="form-floating mb-3 col-md-4">
  <input type="text" class="form-control" id="floatingInput" name="title" placeholder="name@example.com">
  <label for="floatingInput">Title</label>
</div>
  <div class="col-md-4"></div>
  <div class="col-md-4"></div>
  <div class="form-floating col-md-4">
  <textarea class="form-control" name="post" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Post</label>
</div>
  <div class="col-md-4"></div>
  <div class="col-md-4"></div>
  <div class="input-group mb-3 col-md-4">
  <label class="input-group-text" for="inputGroupFile01">Upload Image</label>
  <input type="file" class="form-control" name="image" id="inputGroupFile01">
</div>

<div class="col-md-4"></div>
 
  <div class="col-md-4 d-flex align-items-center justify-content-center">
    <button type="submit" class="btn btn-success w-100">Post</button>
  </div>
</form>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>