<?php ob_start(); ?>
<table class="table table-bordered table-dark table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Content</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response To</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Un-Approve</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        
    <?php 
        $query = "SELECT * FROM comments";
        $select_comments = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_comments)) {
            $comment_id = $row['comment_id'];
            $comment_author = $row['comment_author'];
            $comment_post_id = $row['comment_post_id'];
            $comment_content = $row['comment_content'];
            $comment_email = $row['comment_email'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];

            echo "<tr>";
            echo "<td>$comment_id</td>";
            echo "<td>$comment_author</td>";
            echo "<td>$comment_content</td>";

            // $query = "SELECT * FROM categories WHERE cat_id = {$comment_category}";
            // $update_categories = mysqli_query($connection, $query);

            // while ($row = mysqli_fetch_assoc($update_categories)){
            //     $cat_id = $row['cat_id'];
            //     $cat_title = $row['cat_title'];
            // }

            echo "<td>$comment_email</td>";
            echo "<td>$comment_status</td>";
                $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";
                $response_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($response_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];

                    echo "<a href=''><td>$post_title</td></a>";
                }
            
            echo "<td>$comment_date</td>";
            echo "<td><a href='comments.php?source=edit_comment&p_id='>Approve</a></td>";
            echo "<td><a href='comments.php?delete='>Un-Approve</a></td>";
            echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
            echo "</tr>";


        }
    ?>
    </tbody>
</table>

<?php 

        if(isset($_GET['delete'])) {
            $comment_id = $_GET['delete'];
            
            $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
            $comment_delete_query = mysqli_query($connection, $query);
            header("Location: comments.php");
        }

?>