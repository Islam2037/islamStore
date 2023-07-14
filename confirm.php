<?php
include "header.php";
include "navbar.php";
session_start();
if (!isset($_COOKIE['emailinfo'])) {
    header("location:login.php");
}

?>

<section id="cart-add" class="section-p1">

    <form>
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" name="coupon" placeholder="Enter coupon code">
            <button class="normal" type="submit">Apply</button>
        </div>
    </form>
    <div id="subTotal">
        <h3>Cart totals</h3>
        <?php
        if (!empty($_SESSION['confirmErrors'])) {
            foreach ($_SESSION['confirmErrors'] as $error) { ?>

                <h4 class="alert alert-danger w-50 p-1"><?php echo $error ?></h4>

        <?php }
            unset($_SESSION['confirmErrors']);
        }
        ?>
        <form class=" col-4" method="post" action="handleconfirm.php">
            name<input type="text" name="name" value="<?php if (isset($_SESSION['name'])) {
                                                            echo $_SESSION['name'];
                                                        } ?>">
            email <input type="email" name="email" value="<?php if (isset($_SESSION['email'])) {
                                                                echo $_SESSION['email'];
                                                            } ?>">
            address<input type="text" name="address" value="<?php if (isset($_SESSION['address'])) {
                                                                echo $_SESSION['address'];
                                                            } ?>">
            city<input type="text" name="city" value="<?php if (isset($_SESSION['city'])) {
                                                            echo $_SESSION['city'];
                                                        } ?>">
            postalCode<input type="number" name="postalcode" value="<?php if (isset($_SESSION['postalcode'])) {
                                                                        echo $_SESSION['postalcode'];
                                                                    } ?>">
            phone<input type="text" name="phone" value="<?php if (isset($_SESSION['phone'])) {
                                                            echo $_SESSION['phone'];
                                                        } ?>">
            paymentType<select name="paymentType">
                <option value="Cash_on_Delivery">Cash on Delivery</option>
                <option value="Credit_Card">Credit Card</option>
                <option value="Fawry">Fawry</option>
            </select>
            <button class="normal" name="confirm" type="submit">proceed to checkout</button>
        </form>
        <?php
        //    session_start();
        if (!empty($_SESSION['successMes'])) {
        ?>
            <p class=" alert alert-success"><?php echo $_SESSION['successMes']  ?></p>
        <?php
            unset($_SESSION['successMes']);
            unset($_SESSION['name']);
            unset($_SESSION['phone']);
            unset($_SESSION['address']);
            unset($_SESSION['postalcode']);
            unset($_SESSION['email']);
            unset($_SESSION['city']);
        }
        ?>

    </div>
</section>


<?php include "footer.php" ?>