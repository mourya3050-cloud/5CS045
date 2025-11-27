<?php
// navbar.php
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Game Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="list-games.php">List Games</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add-game-form.php">Add Game</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="search-games.php">Search Games</a>
        </li>
        <!-- Optional dropdown for AJAX features -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="ajaxDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            AJAX Features
          </a>
          <ul class="dropdown-menu" aria-labelledby="ajaxDropdown">
            <li><a class="dropdown-item" href="bootstrap-ajax-dropdown.html">Dropdown Example</a></li>
            <li><a class="dropdown-item" href="bootstrap-ajax-modal.html">Modal Example</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
