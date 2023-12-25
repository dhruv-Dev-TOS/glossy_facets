<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">

        <div class="sidebar-user">
            <div class="sidebar-user-picture">
                <a href="index.php"><img alt="image" src="assets/img/logo3.png"></a>
            </div>
            <div class="sidebar-user-details">

            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>

            <li><a class="nav-link" href="index.php"><i data-feather="home"></i><span>Dashboard</span></a></li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="settings"></i><span>Customers</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="all_customers.php"><i data-feather="image"></i><span>All Customers</span></a></li>


                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="settings"></i><span>Product Management</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="basic_details.php"><i data-feather="grid"></i><span>Add new</span></a></li>
                    <li><a class="nav-link" href="all_products.php"><i data-feather="image"></i><span>All Products</span></a></li>


                </ul>
            </li>


            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="settings"></i><span>Order Management</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="all_orders.php"><i data-feather="image"></i><span>All Orders</span></a></li>


                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="settings"></i><span>Media</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="view_image_gallery.php"><i data-feather="image"></i><span>Image Gallery</span></a></li>
                    <li><a class="nav-link" href="view_video_gallery.php"><i data-feather="image"></i><span>Video Gallery</span></a></li>


                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i data-feather="settings"></i><span>Enquiries</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="view_contact_enq.php"><i data-feather="image"></i><span>Contact Enquiries</span></a></li>
                    <li><a class="nav-link" href="view_b2b_enq.php"><i data-feather="image"></i><span>B2B Enquiries</span></a></li>


                </ul>
            </li>
            <li><a class="nav-link" href="blogs.php"><i data-feather="users"></i><span>Blogs</span></a></li>

            <li><a class="nav-link text-danger" href="logout.php"><i data-feather="power"></i><span>Logout</span></a></li>



        </ul>
    </aside>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        var currentLocation = window.location.href;

        $('.sidebar-menu a').each(function() {
            var menuItemLink = $(this).attr('href');

            // Check if the current page's URL contains the menu item's URL
            if (currentLocation.indexOf(menuItemLink) !== -1) {
                $(this).closest('li').addClass('active'); // Add the 'active' class to the closest 'li' element
            }
        });
    });
</script>