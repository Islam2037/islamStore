
<?php
 include 'header.php' ;

?>
 

<section id="header">
<a href="index.php">
    <img src="img/logo.png" alt="homeLogo">
</a>

<div>
    <ul id="navbar">
        <li class="link">
            <a class="active " href="index.php">Shop</a>
        </li>

        <li class="link">
            <a href="blog.php">Blog</a>
        </li>
        <li class="link">
            <a href="about.php">About</a>
        </li>
        <li class="link">
            <a href="contact.php">Contact</a>
        </li>
        <?php
        if(!isset($_COOKIE['emailinfo']))
        { ?>
        <li class="link">
            <a href="registration.php">Signup</a>
        </li>

        <?php }
        ?>
        <li class="link">
            <a href="lang.php?lang=en">English</a>
        </li>
        <li class="link">
            <a href="lang.php?lang=ar">Arabic</a>
        </li>
        <?php
        if(isset($_COOKIE['emailinfo']))
        { ?>
            <li class="link">
                <form action="logout.php" method="post">
                <button class=" border-0 text-dark  fw-bolder bg-transparent " type="submit" name="logout" >Logout</button>
                </form>
          
        </li>

        <?php }
        else
        {
            ?>
            <li class="link">
            <a href="login.php">Login</a>
        </li>

        <?php

        }
        ?>



    
        <?php
        //  session_start();
        if(isset($_COOKIE['emailinfo']))
        { ?>
            <li class="link">
            <a href="##"><?php echo $_COOKIE['emailinfo'] ?></a>
        </li>

        <?php }
        ?>


        <li class="link">
            <a id="lg-cart" href="cart.php">
                <i class="fas fa-shopping-cart"></i> 
            </a>
        </li>
        <a href="#" id="close"><i class="fas fa-times"></i> </a>
    </ul>

</div>

<div id="mobile">
    <a href="cart.html">
        <i class="fas fa-shopping-cart"></i>
    </a>
    <a href="#" id="bar"> <i class="fas fa-outdent"></i> </a>
</div>
</section>
