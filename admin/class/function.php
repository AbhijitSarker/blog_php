<?php 
    class AdminBlog{
        public function __construct()
        {
            #database host, database user, database pass, database name
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = "";
            $dbname = 'blogproject';

            $this->conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
            
            if(!$this->conn){
                die("Database Connection Error!!");
            }
        }

        public function admin_login($data){
            $admin_email = $data['admin_email'];
            $admin_pass = md5($data['admin_pass']);

            $query = "SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_pass='$admin_pass'";
            
            if(mysqli_query($this->conn, $query)){
                $admin_info = mysqli_query($this->conn, $query);
            }

            if($admin_info){
                header("location: dashboard.php");
                $admin_data = mysqli_fetch_assoc($admin_info);
                session_start();
                $_SESSION['adminID'] = $admin_data['id'];
                $_SESSION['admin_name'] = $admin_data['admin_name'];
                
            }
        }

        public function admin_logout(){
            unset($_SESSION['adminID']);
            unset($_SESSION['admin_name']);
            header('location: index.php');
        }

        public function add_category($data){
            $cat_name = $data['cat_name'];
            $cat_des = $data['cat_des'];

            $query = "INSERT INTO category(cat_name,cat_des) VALUE('$cat_name','$cat_des')";
            
            if(mysqli_query($this->conn, $query)){
                return "Category Added Successfully";
            }

        }

        public function display_category(){
            $query = "SELECT * FROM category";
            if(mysqli_query($this->conn, $query)){
                $category = mysqli_query($this->conn, $query);
                return $category;
            }
        }

        public function delete_category($id){
            $query = "DELETE FROM category WHERE cat_id=$id";

            if(mysqli_query($this->conn, $query)){
                return "Category Deleted Succesfully";
            }
        }

        public function edit_category($id){
            $cat_name = $_POST['cat_name'];
	        $cat_des = $_POST['cat_des'];

            $edit_option = $_GET['status'];

            $edit_id = $_GET['id'];
            
            
            if($edit_option=="edit")
            { 
                ?>
                
                <?php
                $query_edit = "SELECT cat_name, cat_des FROM category WHERE cat_id=$edit_id";
                $query_edit_ex = mysqli_query($this->conn, $query_edit);
                $num_rows = mysqli_num_rows($query_edit_ex);
                
                $edit_query_fetch = mysqli_fetch_all($query_edit_ex, MYSQLI_ASSOC);

                foreach($edit_query_fetch as $edit_query_item){
                    $edit_cat_name = $edit_query_item['cat_name'];
                    $edit_cat_des = $edit_query_item['cat_des'];
                    print_r($edit_query_item) ;
                }

                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label class="mb-1" for="cat_name">Edit Name</label>
                        <input name="edit_cat_name" value="<?php echo $edit_cat_name; ?>" class="form-control py-4" id="cat_name" type="text"/>
                    </div>
                    <div class="form-group">
                        <label class="mb-1" for="cat_des">Edit Description</label>
                        <input name="edit_cat_des" value="<?php echo $edit_cat_des; ?>" class="form-control py-4" id="cat_des" type="text"/>
                    </div>
                    <input name="update_cat_btn" class="btn btn-success" type="submit" value="Update Category">
                </form>
                
            <?php 
                
        

            if(isset($_POST['update_cat_btn'])){
                $edited_cat_name = $_POST['edit_cat_name'];
                $edited_cat_des = $_POST['edit_cat_des'];
                $query =  "UPDATE category SET cat_name='$edited_cat_name', cat_des='$edited_cat_des' WHERE cat_id=$id";
                mysqli_query($this->conn, $query);
                
                ?> 
                <script>

                    location.href = "http://localhost/blog/admin/manage_category.php";

                </script>
                <?php
            }




            // if(mysqli_query($this->conn, $query)){

            //     return "Category Edited Succesfully";
            // }
        }

    }
}

