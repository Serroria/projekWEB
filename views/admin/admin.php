<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JamuKita Admin</title>
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <link rel='stylesheet' href='../../assets/css/admin.css'>
    
</head>
<body>

<!-- sidebar -->
    <div>
         <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">JamuKita Admin</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="#" onclick="showContent('dashboard')">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <!-- <li>
                <a href="#" onclick="showContent('user')">
                    <i class='bx bx-user'></i>
                    <span class="links_name">User</span>
                </a>
                <span class="tooltip">User</span>
            </li> -->
            <li>
                <a href="#" onclick="showContent('products')">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Produk</span>
                </a>
                <span class="tooltip">Product</span>
            </li>
            <!-- <li>
                <a href="#" onclick="showContent('financial')">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Analytics</span>
                </a>
                <span class="tooltip">Analytics</span>
            </li> -->
            <li>
                <a href="#" onclick="showContent('orders')">
                    <i class='bx bx-cart-alt'></i>
                    <span class="links_name">Order</span>
                </a>
                <span class="tooltip">Order</span>
            </li>
            <!-- <li>
                <a href="#" onclick="showContent('settings')">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Settings</span>
                </a>
                <span class="tooltip">Settings</span>
            </li> -->
            <li class="profile">
                <div class="profile-details">
                    <img src="iconLogo.png" alt="profileImg">
                    <div class="name_job">
                        <div class="name">JamuKita</div>
                        <div class="job">Web Developer</div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </li>
        </ul>
    </div>
    </div>

    <!-- content mainnya -->
    <?php include('form.php'); ?>

<script src='../../assets/js/admin.js'></script>
</body>
</html>