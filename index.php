<?php include 'header.php' ?>
<?php include 'navbar.php';
if (!isset($_COOKIE['emailinfo'])) {
    header("location:login.php");
}

?>

<section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p>Summer Collection New Modren Desgin</p>
    <div class="pro-container">

        <?php
        session_start();
        if (isset($_SESSION['shop'])) {


            $id = 0;
            foreach ($_SESSION['shop'] as $key => $value) { ?>

                <div class="pro">
                    <form method="post" action="cart.php">
                        <img src="./admin/upload/<?php echo $value['imageName']; ?>" alt="p1" />
                        <div class="des">
                            <h2><?php echo $value['category']; ?></h2>
                            <h5><?php echo $value['desc']; ?></h5>
                            <div class="star ">
                                <i class="fas fa-star "></i>
                                <i class="fas fa-star "></i>
                                <i class="fas fa-star "></i>
                                <i class="fas fa-star "></i>
                                <i class="fas fa-star "></i>
                            </div>
                            <h4><?php echo $value['price']; ?></h4>
                            <input type="number" name="quantity" value="1">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <button type="submit"><a class="cart "><i class="fas fa-shopping-cart "></i></a></button>
                        </div>
                    </form>
                </div>


        <?php
                $id++;
            }
        }


        ?>



    </div>

</section>



<section id="pagenation" class="section-p1">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="shop.php" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1 of 2 </a></li>

            <li class="page-item">
                <a class="page-link" href="shop.php?" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>

</section>

<section id="newsletter" class="section-p1 section-m1">
    <div class="newstext ">
        <h4>Sign Up For Newletters</h4>
        <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
    </div>
    <div class="form ">
        <input type="text " placeholder="Enter Your E-mail... ">
        <button class="normal ">Sign Up</button>
    </div>
</section>


<?php include 'footer.php' ?>