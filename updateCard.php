


<?php include 'header.php' ?>
<?php include 'navbar.php' ?>

<?php
if(!isset($_COOKIE['emailinfo']))
{ 
    header("location:login.php");

}
?>

<div class="card-body px-5 py-5" style="background-color:darkgray;">
                <h3 class="card-title text-left mb-3">update product</h3>
                <form method="POST" action="handleupdateCard.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Category</label>
                    <input type="text"  name="category" class="form-control p_input" value="">
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="desc" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="index" value="<?php echo $_POST['index']  ?>" class="form-control p_input">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="updateProduct" class="btn btn-primary btn-block enter-btn">Add</button>
                  </div>
                
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>












<?php include "footer.php"; ?>