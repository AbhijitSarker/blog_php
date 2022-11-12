<?php
include('admin/class/function.php');
$obj = new AdminBlog();

$get_cat = $obj->display_category();

?>

<!-- head  -->
<?php include_once('includes/head.php'); ?>

<body>
    <!-- preloader -->
    <?php include_once('includes/preloader.php'); ?>

    <!-- Header -->
    <?php include_once('includes/header.php'); ?>


    <!-- Page Content -->
    <!-- Banner -->
    <?php include_once('includes/banner.php'); ?>

    <!-- call to action -->
    <?php include_once('includes/banner.php'); ?>



    <!-- blog posts -->

    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <!-- blog posts -->
                <?php include_once('includes/blogpost.php'); ?>

                <!-- sidebar -->
                <?php include_once('includes/sidebar.php'); ?>


            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include_once('includes/footer.php'); ?>


    <!-- scripts -->
    <?php include_once('includes/script.php'); ?>