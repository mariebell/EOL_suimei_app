<?php require('back/executor.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="./front/css/sticky-footer.css">
  <title>東洋占術 四柱推命</title>
</head>
<body>
  <?php require('front/header.php'); ?>

    <div class="container-fluid">

      <div class="row layout">
      <div class="col col-12 col-lg-6">

      <?php require('front/meishiki.php'); ?>

      </div>

      <div class="col col-12 col-lg-6">
        <div class="container mb-5">
          <div class="row pt-5 p-3 justify-content-center">
              <h2>あなたの日干</h2>
          </div>
          <div class="row p-3">
            <div class="col display-4 text-center text-light <?= $m->nikkan['color_class'] ?>"><?= $m->nikkan['name'].$m->nikkan['element_ja'] ?></div>
            <div class="col display-4 text-center"><?= $m->info['count_elements'][$m->nikkan['element']]*12.5 ?></div>
          </div>
          <div class="row p-3">
            日干はあなたの性質を表します。<br>
            <?= $exp_kan[$m->nikkan['id']]; ?>
          </div>
          <div class="row p-3 justify-content-center">
              <h3>あなたの月干通変星</h3>
          </div>
          <div class="row p-3">
            <div class="col display-4 text-center"><?= $m->gekkan['tsuhen'] ?></div>
            <div class="col display-4 text-center"><?= $m->info['count_elements'][$m->gekkan['element']]*12.5 ?></div>
          </div>
          <div class="row p-3">
            月干通変星は主にあなたの外面的性格を表します。<br>
            ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
            ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
            ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
            ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
            ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
            ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
          </div>
          <div class="row p-3 justify-content-center">
              <h3>あなたの元命通変星</h3>
          </div>
          <div class="row p-3">
            <div class="col display-4 text-center"><?= $m->gesshi['tsuhen'][0] ?></div>
            <div class="col display-4 text-center"><?= $m->info['count_elements'][$m->gesshi['element']]*12.5 ?></div>
          </div>
          <div class="row justify-content-center p-3">
            元命通変星は主にあなたの内面的性格を表します。<br>
            ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
            ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
            ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
            ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
            ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
            ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
          </div>
          <div class="row p-3 justify-content-center">
              <h3>あなたの年干通変星</h3>
          </div>
          <div class="row justify-content-center p-3">
            <div class="col display-4 text-center"><?= $m->nenkan['tsuhen'] ?></div>
            <div class="col display-4 text-center"><?= $m->info['count_elements'][$m->nenkan['element']]*12.5 ?></div>
          </div>
          <div class="row justify-content-center p-3">
            年干通変星は主にあなたの青少年期の性格、成人後の補助的性格を表します。<br>
            ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
            ここに説明が入ります。ここに説明が入ります。ここに説明が入ります。
          </div>

        </div>
      </div>

      </div>
    </div>

    <?php require('front/footer.php'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>