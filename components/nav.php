<header id="header">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">School Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Library</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
            </div>
            <a class="nav-item active nav-link text-warning mx-3" href="cart.php">Cart</a>
            <?php 
                if(isset($_SESSION['cart'])){
                    $count = count($_SESSION['cart']);
                    echo "<span class=\"text-danger bg-light px-3 rounded\" id=\"cart_count\">$count</span>";
                } else {
                    echo "<span class=\"text-danger bg-light px-3 rounded\" id=\"cart_count\">0</span>";
                }
            ?>
            
        </div>
    </nav>
</header>