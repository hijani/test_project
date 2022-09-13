<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>New Post</title>
</head>
<body>
    <h1 class="text-center">New Post</h1>
    <form action="insert_post.php" method="post">
        <input type="text" name="post_title" class="form-control" placeholder="Post Title">
        <input type="submit" name="submit" class="form-control">
    </form>


    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.js"></script>
</body>
</html>