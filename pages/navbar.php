<!DOCTYPE html>
<html>
  <header>
    <?php
      session_start();
      error_reporting(E_ERROR | E_PARSE);
    ?>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2 active" aria-current="true" href="../index.php">Home</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2" href="zimmer.php">Zimmer</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2" href="hilfe.php">Hilfe</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2" href="impressum.php">Impressum</a>
          </li>
        </ul>

        <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
          <li class="nav-item col-6 col-lg-auto">
            <a class="nav-link py-2 px-0 px-lg-2" href="register.php">Registrieren</a>
          </li>
          <li class="nav-item col-6 col-lg-auto">
            <li class="nav-item col-6 col-lg-auto">
              <?php
              if(!isset($_SESSION["user"])) {
                echo "<a class='nav-link py-2 px-0 px-lg-2' href='login.php'>Login</a>";
              } else {
                echo "<a class='nav-link py-2 px-0 px-lg-2' href='logout.php'>Logout</a>";
              }
              ?>
            </li>
          </li>
        </ul>
      </div>
    </nav>
  </header>
</html>