  <?php

    $posts = $obj->display_post_public();

    ?>


  <div class="col-lg-8">
      <div class="all-blog-posts">
          <div class="row">
              <?php while ($post = mysqli_fetch_assoc($posts)) { ?>

                  <div class="col-lg-12">
                      <div class="blog-post">
                          <div class="blog-thumb">
                              <img style="height: 300px;" src="upload/<?php echo $post['post_img']; ?>" alt="">
                          </div>
                          <div class="down-content">
                              <span><?php echo $post['cat_name']; ?></span>
                              <a href="post-details.html">
                                  <h4><?php echo $post['post_title']; ?></h4>
                              </a>
                              <ul class="post-info">
                                  <li><a href="#"><?php echo $post['post_author']; ?></a></li>
                                  <li><a href="#">May 31, 2020</a></li>
                                  <li><a href="#">12 Comments</a></li>
                              </ul>
                              <p><?php echo $post['post_summery']; ?></p>
                              <div class="post-options">
                                  <div class="row">
                                      <div class="col-6">
                                          <ul class="post-tags">
                                              <li><i class="fa fa-tags"></i></li>
                                              <li><a href="#">Beauty</a>,</li>
                                              <li><a href="#">Nature</a></li>
                                          </ul>
                                      </div>
                                      <div class="col-6">
                                          <ul class="post-share">
                                              <li><i class="fa fa-share-alt"></i></li>
                                              <li><a href="#">Facebook</a>,</li>
                                              <li><a href="#"> Twitter</a></li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              <?php } ?>

          </div>
      </div>
  </div>