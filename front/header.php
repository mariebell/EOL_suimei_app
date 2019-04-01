<nav class="navbar navbar-light bg-white border-danger shadow sticky-top">
  <a class="navbar-brand" href="#">
      東洋占術 四柱推命
  </a>
  <form class="form-inline d-none d-sm-block" action="./index.php" method="get">
    <input name="birth" class="form-control mr-sm-2" type="search" placeholder="生年月日" value="<?= isset($_GET['birth']) ? $_GET['birth'] : ''; ?>" aria-label="Search">
    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">鑑定</button>
  </form>
</nav>