<?php include 'header.php' ?>
<?php include 'navbar.php' ?>
<?php
if (!isset($_COOKIE['emailinfo'])) {
    header("location:login.php");
}
?>

<section id="page-header" class="about-header">
    <h2>#Cart</h2>
    <p>Let's see what you have.</p>
</section>

<section id="cart" class="section-p1">
    <table width="100%">
        <thead>
            <tr>
                <td>Image</td>
                <td>Name</td>
                <td>Desc</td>
                <td>Quantity</td>
                <td>price</td>
                <td>Subtotal</td>
                <td>Remove</td>
                <td>Edit</td>
            </tr>
        </thead>

        <tbody>
            <?php
            session_start();
            // print_r($_SESSION['cart']);




            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                array_push($_SESSION['cart'], $_SESSION['shop'][$id]);
            }

            if (!isset($_SESSION['quantity'])) {
                $_SESSION['quantity'] = array();
            }
            if (isset($_POST['quantity'])) {

                array_push($_SESSION['quantity'], $_POST['quantity']);
            }
            foreach ($_SESSION['cart'] as $key => $item) {
                $quantity = $_SESSION['quantity'][$key];
                $_SESSION['cart'][$key]['quantity'] = $quantity;
            }

            // print_r($_SESSION['quantity']);
            // echo "<br>";
            // print_r($_SESSION['cart']);
            $index = 0; {

                foreach ($_SESSION['cart'] as $key => $value) {
            ?>
                    <tr>
                        <td><img src="./admin/upload/<?php echo $value['imageName']; ?>" alt="product1"></td>
                        <td><?php echo $value['title']; ?></td>
                        <td><?php echo $value['desc']; ?></td>
                        <td><?php echo $value['quantity']; ?></td>
                        <td><?php echo $value['price']; ?></td>
                        <td><?php echo $value['quantity'] *  $value['price'];  ?></td>
                        <form action="deleteCard.php" method="post">
                            <input type="hidden" name="index" value="<?php echo $index; ?>">
                            <td><button type="submit" name="remove" class="btn btn-outline-danger">Remove</button></td>
                        </form>
                        <form action="updateCard.php" method="post">
                            <input type="hidden" name="index" value="<?php echo $index; ?>">
                            <td><button type="submit" name="update" class="btn btn-outline-warning">update</button></td>
                        </form>



                    </tr>
            <?php ++$index;
                }
            } ?>
        </tbody>
        <!-- confirm order  -->
        <form action="confirm.php" method="post">
            <td><button type="submit" name="confirm" class="btn btn-success">Confirm</button></td>

        </form>


    </table>
</section>

<section id="cart-add" class="section-p1">
    <div id="coupon">
        <h3>Coupon</h3>
        <input type="text" placeholder="Enter coupon code">
        <button class="normal">Apply</button>
    </div>
    <div id="subTotal">
        <h3>Cart totals</h3>
        <table>
            <tr>
                <td>Subtotal</td>
                <?php
                $total_price = 0;
                foreach ($_SESSION['cart'] as $key => $value) {
                    $total_price += $value['price'] * $value['quantity'];
                }
                echo "<td>$total_price</td>";
                ?>

            </tr>
            <tr>
                <td>Shipping</td>
                <td>$0.00</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>$0.00</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong><?php echo $total_price ?></strong></td>
            </tr>
        </table>
        <form action="confirm.php" method="post">
            <button name="confirm" class="normal">proceed to checkout</button>
        </form>

    </div>
</section>

<?php include "footer.php" ?>