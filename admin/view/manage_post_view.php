<?php

$posts = $obj->display_post();


?>

<h1>Manage post </h1>

<table class="table table-hover table-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Content</th>
            <th>Image</th>
            <th>Summery</th>
            <th>Date</th>
            <th>Category</th>
            <th>Tags</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($post_data = mysqli_fetch_assoc($posts)) { ?>
            <tr>
                <td><?php echo $post_data['post_id']; ?></td>
                <td><?php echo $post_data['post_title']; ?></td>
                <td><?php echo $post_data['post_author']; ?></td>
                <td><?php echo $post_data['post_content']; ?></td>
                <td><img style="height: 30px;" src="../upload/<?php echo $post_data['post_img']; ?>" alt=""></td>
                <td><?php echo $post_data['post_summery']; ?></td>
                <td><?php echo $post_data['date']; ?></td>
                <td><?php echo $post_data['cat_name']; ?></td>
                <td><?php echo $post_data['post_tag']; ?></td>
                <td><?php if ($post_data['post_status'] == 1) {
                        echo 'Published';
                    } else {
                        echo 'Unpublished';
                    } ?></td>
                <td>
                    <a class="btn btn-primary" href="">Edit</a>
                    <a class="btn btn-danger" href="">Delete</a>
                </td>


            </tr>

        <?php } ?>
    </tbody>
</table>