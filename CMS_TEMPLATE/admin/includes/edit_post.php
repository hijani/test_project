<?php   

        if(isset($_GET['p_id'])){
            $edit_id = $_GET['p_id'];
            echo $edit_id;

        }

        $query = "SELECT * FROM posts";
        $edit_posts = mysqli_query($connection, $query);
        
        while ($row = mysqli_fetch_assoc($edit_posts)) {
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_content=$row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comments = $row['post_comment_count'];
            $post_date = $row['post_date'];
        }

?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="
        form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="post_category_id">Post Category</label>
        <input type="text" class="
        form-control" name="post_category_id">
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="
        form-control" name="post_author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="
        form-control" name="post_status">
    </div>

    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" class="
        form-control" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="
        form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" name="create_post" value="Publish Post" class="btn btn-primary">
    </div>


</form>