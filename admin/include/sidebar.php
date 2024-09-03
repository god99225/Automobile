<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Personal Webpage</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- Your custom CSS file -->
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<aside class="main-sidebar sidebar-dark-primary elevation-7">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assests/dist/img/user2-160x160.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Carzz</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- Dashboard -->
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link" onclick="activateComponent('dashboard')">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          <!-- Accessories -->
          <li class="nav-item">
            <a href="Suzuki.php" class="nav-link" onclick="activateComponent('accessories')">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Accessories
              </p>
            </a>
          </li>
          <!-- view accessories -->
          <li class="nav-item">
            <a href="View Accessories.php" class="nav-link" onclick="activateComponent('viewaccessories')">
            <i class="nav-icon fas fa-eye"></i>
              <p>
              View Accessories
              </p>
            </a>
          </li>
          <!-- Gallery -->
          <li class="nav-item">
            <a href="gallary.php" class="nav-link" onclick="activateComponent('gallery')">
              <i class="nav-icon fas fa-images"></i>
                <p>
                  Gallery
                </p>
            </a>
          </li>
          <!-- Slot Booking -->
          <li class="nav-item">
            <a href="Slotbooking.php" class="nav-link" onclick="activateComponent('slotbooking')">
              <i class="nav-icon far fa-plus-square icon"></i>
                <p>
                  Slot Booking
                </p>
            </a>
          </li>
          <!-- registered Users -->
          <li class="nav-item">
            <a href="registered.php" class="nav-link" onclick="activateComponent('registeredusers')">
             <i class="nav-icon ion ion-person-add registered"></i>
              <p>
                Registered Users
              </p>
            </a>
          </li>
          <!-- Contact Us -->
          <li class="nav-item">
            <a href="Contact Us.php" class="nav-link" onclick="activateComponent('contactus')">
             <i class="nav-icon fas fa-phone-square-alt contact"></i>
              <p>
                Contact Us
              </p>
            </a>
          </li>
          <!-- Newsletter -->
          <li class="nav-item">
            <a href="newsletter.php" class="nav-link" onclick="activateComponent('newsletter')">
             <i class="nav-icon fas fa-envelope contact"></i>
              <p>
                Newsletter
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
</aside>
<script>
  // Function to activate component
  function activateComponent(componentName) {
    // Remove 'active' class from all links
    const links = document.querySelectorAll('.nav-link');
    links.forEach(item => {
      item.classList.remove('active');
    });
    // Add 'active' class to the clicked link
    const activeLink = document.querySelector(`[onclick*="${componentName}"]`);
    activeLink.classList.add('active');
  }
</script>
</body>
</html>