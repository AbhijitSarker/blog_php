<?php
$catdata = $obj->display_category();

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'delete') {
        $delid = $_GET['id'];
        $msg = $obj->delete_category($delid);
        echo $msg;

?>

        <script>
            location.href = "http://localhost/blog/admin/manage_category.php";

            var urlParams = new URLSearchParams(window.location.search);




            if (urlParams.get('status') == 'delete') {
                alert("deleted successfully");
            }
        </script>


<?php   }

    if ($_GET['status'] == 'edit') {
        $editid = $_GET['id'];
        $msg = $obj->edit_category($editid);
        echo $msg;
    }
}


if (isset($_POST['edit_btn'])) {
    $msg = $obj->edit_data($_POST);
    echo $msg;
}

?>


<div class="manage_cat_items">
    <h1>Manage Category</h1>

    <?php if (isset($msg)) {
        echo $msg;
    } ?>

    <table class="table">
        <thead>
            <th>ID</th>
            <th>Category name</th>
            <th>Category Description</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php while ($cat = mysqli_fetch_assoc($catdata)) { ?>
                <tr>
                    <td><?php echo $cat['cat_id']; ?></td>
                    <td><?php echo $cat['cat_name']; ?></td>
                    <td><?php echo $cat['cat_des']; ?></td>
                    <td>
                        <a class="btn btn-success" href="?status=edit&&id=<?php echo $cat['cat_id']; ?>">Edit</a>
                        <a class="btn btn-warning" href="?status=delete&&id=<?php echo $cat['cat_id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
if (isset($_GET['status'])) {


?>
    <script>
        document.querySelector(".manage_cat_items").style.display = 'none';
    </script>
<?php
}
?>