<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/sticky-footer.css">
  <title>四柱推命 占いラボ</title>
</head>

<body>
  <?php require('sections/header.php'); ?>

    <div class="container">
      <div class="row pt-5 p-3 justify-content-center">
          <h2>四柱推命 占いラボ</h2>
      </div>
      <div class="row p-3">
        四柱推命は<br>
        台湾・中国では子供が生まれたら占うというほどポピュラーな占いと言われています。<br>
      </div>
      <div class="row p-3">
      <form action="result.php" method="get">
        <div class="form-group">
          <label for="birth">生年月日(1991年12月1日9時⇨1991120109と入力)</label>
          <input type="text" name="birth" id="birth" class="form-control" placeholder="19910401">
        </div>
          <input type="submit" class="btn btn-danger">
        </div>
      </form>
      </div>
    </div>

    <?php require('sections/footer.php'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>