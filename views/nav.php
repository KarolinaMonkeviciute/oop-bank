<nav class="navbar navbar-expand-lg navbar-light p-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL?>/accounts">BANKERINIS OOP Bankas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2" href="<?= URL ?>/create">Sukurti sąskaitą</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" href="<?= URL ?>/accounts">Sąskaitos</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto d-none d-lg-inline-flex">
            <li class="nav-item mx-2">
              <a class="nav-link text-dark h5" href="" target="blank"><i class="fab fa-google-plus-square"></i></a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link text-dark h5" href="" target="blank"><i class="fab fa-twitter"></i></a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link text-dark h5" href="" target="blank"><i class="fab fa-facebook-square"></i></a>
            </li>
          </ul>
        </div>
      </div>
      <div>
          <form action="<?= URL ?>/logout" method="post">
            <button class="btn btn-outline-light">Atsijungti</button>
          </form>
      </div>
    </nav>
    <?php require ROOT.'views/message.php' ?>