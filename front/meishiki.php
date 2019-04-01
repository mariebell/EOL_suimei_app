<div class="container p-0 pb-5 mb-5">
<div class="row py-5 justify-content-center">
  <h2>あなたの命式</h2>
</div>
<div class="row justify-content-center">
  <h3>陰占</h3>
</div>
<div class="container meishiki">
  <div class="row justify-content-center">
  <?php if($m->isHourSet) { ?>
    <div class="col col-3 py-2 text-center font-weight-bold">時柱</div>
  <?php } ?>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> py-2 text-center font-weight-bold">日柱</div>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> py-2 text-center font-weight-bold">月柱</div>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> py-2 text-center font-weight-bold">年柱</div>
  </div>
  <div class="row text-center text-white">
  <?php if($m->isHourSet) { ?>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> display-4 <?= $m->jikan['color_class'] ?>">
      <?= $m->jikan['name']; ?>
    </div>
  <?php } ?>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> display-4 <?= $m->nikkan['color_class'] ?>">
      <?= $m->nikkan['name']; ?>
    </div>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> display-4 <?= $m->gekkan['color_class'] ?>">
      <?= $m->gekkan['name']; ?>
    </div>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> display-4 <?= $m->nenkan['color_class'] ?>">
      <?= $m->nenkan['name']; ?>
    </div>
  </div>
  <div class="row text-center text-white">
  <?php if($m->isHourSet) { ?>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> display-4 <?= $m->jishi['color_class'] ?>">
      <?= $m->jishi['name']; ?>
    </div>
  <?php } ?>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> display-4 <?= $m->nisshi['color_class'] ?>">
      <?= $m->nisshi['name']; ?>
    </div>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> display-4 <?= $m->gesshi['color_class'] ?>">
      <?= $m->gesshi['name']; ?>
    </div>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> display-4 <?= $m->nenshi['color_class'] ?>">
      <?= $m->nenshi['name']; ?>
    </div>
  </div>
  <div class="row text-center text-white">
  <?php if($m->isHourSet) { ?>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> display-6 <?= $m->jishi['color_class'] ?>">
      <?= implode(' - ', $m->jishi['zokan_ja']); ?>
    </div>
  <?php } ?>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> display-6 <?= $m->nisshi['color_class'] ?>">
      <?= implode(' - ', $m->nisshi['zokan_ja']); ?>
    </div>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> display-6 <?= $m->gesshi['color_class'] ?>">
      <?= implode(' - ', $m->gesshi['zokan_ja']); ?>
    </div>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> display-6 <?= $m->nenshi['color_class'] ?>">
      <?= implode(' - ', $m->nenshi['zokan_ja']); ?>
    </div>
  </div>
</div>

<div class="row justify-content-center">
  <h3 class="mt-5">陽占</h3>
</div>
<div class="container yousen">
  <div class="row justify-content-center">
  <?php if($m->isHourSet) { ?>
    <div class="col col-3 py-2 text-center font-weight-bold">時柱</div>
  <?php } ?>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> py-2 text-center font-weight-bold">日柱</div>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> py-2 text-center font-weight-bold">月柱</div>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> py-2 text-center font-weight-bold">年柱</div>
  </div>
  <div class="row text-center text-white">
  <?php if($m->isHourSet) { ?>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> <?= $m->jikan['color_class'] ?> display-5 py-2 ">
      <?= $m->jikan['tsuhen']; ?>
    </div>
  <?php } ?>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> <?= $m->nikkan['color_class'] ?> display-5 py-2 ">
      <?= $m->nikkan['tsuhen']; ?>
    </div>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> <?= $m->gekkan['color_class'] ?> display-5 py-2 ">
      <?= $m->gekkan['tsuhen']; ?>
    </div>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> <?= $m->nenkan['color_class'] ?> display-5 py-2 ">
      <?= $m->nenkan['tsuhen']; ?>
    </div>
  </div>
  <div class="row text-center text-white">
  <?php if($m->isHourSet) { ?>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> <?= $m->jishi['color_class'] ?> display-5 py-2">
      <?= implode(' - ', $m->jishi['tsuhen']); ?>
    </div>
  <?php } ?>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> <?= $m->nisshi['color_class'] ?> display-5 py-2">
      <?= implode(' - ', $m->nisshi['tsuhen']); ?>
    </div>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> <?= $m->gesshi['color_class'] ?> display-5 py-2">
      <?= implode(' - ', $m->gesshi['tsuhen']); ?>
    </div>
    <div class="col <?= $m->isHourSet ? 'col-3':'col-4' ?> <?= $m->nenshi['color_class'] ?> display-5 py-2">
      <?= implode(' - ', $m->nenshi['tsuhen']); ?>
    </div>
  </div>
</div>

<div class="row justify-content-center">
  <h3 class="mt-5">五行配分</h3>
</div>

<div class="progress mt-3">
<div class="progress-bar <?= $inClassicColor ? 'bg-primary' : 'bg-success' ?> progress-bar-striped" style="width: <?=$m->info['count_elements'][SUIMEI_GOGYO_MOKU]*12.5 ?>%;" role="progressbar" aria-valuenow="22" aria-valuemin="0" valuemax="100">
  木 <?= $m->info['count_elements'][SUIMEI_GOGYO_MOKU]*12.5 ?>%
</div>
<div class="progress-bar bg-danger progress-bar-striped" style="width: <?=$m->info['count_elements'][SUIMEI_GOGYO_KA]*12.5 ?>%;" role="progressbar" aria-valuenow="22" aria-valuemin="0" valuemax="100">
  火 <?=$m->info['count_elements'][SUIMEI_GOGYO_KA]*12.5 ?>%
</div>
<div class="progress-bar <?= $inClassicColor ? 'bg-warning' : 'bg-secondary' ?> progress-bar-striped" style="width: <?=$m->info['count_elements'][SUIMEI_GOGYO_DO]*12.5 ?>%;" role="progressbar" aria-valuenow="22" aria-valuemin="0" valuemax="100">
  土 <?=$m->info['count_elements'][SUIMEI_GOGYO_DO]*12.5 ?>%
</div>
<div class="progress-bar <?= $inClassicColor ? 'bg-light text-dark' : 'bg-warning' ?> progress-bar-striped" style="width: <?=$m->info['count_elements'][SUIMEI_GOGYO_KIN]*12.5 ?>%;" role="progressbar" aria-valuenow="22" aria-valuemin="0" valuemax="100">
  金 <?=$m->info['count_elements'][SUIMEI_GOGYO_KIN]*12.5 ?>%
</div>
<div class="progress-bar <?= $inClassicColor ? 'bg-dark' : 'bg-primary' ?> progress-bar-striped" style="width: <?=$m->info['count_elements'][SUIMEI_GOGYO_SUI]*12.5 ?>%;" role="progressbar" aria-valuenow="22" aria-valuemin="0" valuemax="100">
  水 <?=$m->info['count_elements'][SUIMEI_GOGYO_SUI]*12.5 ?>%
</div>
</div>

<div class="row justify-content-center">
  <h3 class="mt-5">陰陽配分</h3>
</div>

<div class="progress mt-3">
<div class="progress-bar bg-dark" style="width: <?=$m->info['count_onmyo'][SUIMEI_ONMYO_IN]*12.5 ?>%;" role="progressbar" aria-valuenow="22" aria-valuemin="0" valuemax="100">
  陰 <?= $m->info['count_onmyo'][SUIMEI_ONMYO_IN]*12.5 ?>%
</div>
<div class="progress-bar bg-white text-dark" style="width: <?=$m->info['count_onmyo'][SUIMEI_ONMYO_YOU]*12.5 ?>%;" role="progressbar" aria-valuenow="22" aria-valuemin="0" valuemax="100">
  陽 <?= $m->info['count_onmyo'][SUIMEI_ONMYO_YOU]*12.5 ?>%
</div>
</div>

<div class="row justify-content-center">
  <h3 class="mt-5">命式のバランス</h3>
</div>

<div class="progress mt-3">
<div class="progress-bar <?= $m->info['jisei']['element_cc'] ?> progress-bar-striped" style="width: <?=$m->info['count_elements'][$m->info['jisei']['element']]*12.5 ?>%;" role="progressbar" aria-valuenow="22" aria-valuemin="0" valuemax="100">
  <?= $m->info['count_elements'][$m->info['jisei']['element']]*12.5 ?>
</div>
</div>
<div class="row">
  <div class="col col-12">
  自星【自立心・胆力】
  </div>
</div>

<div class="progress mt-3">
<div class="progress-bar <?= $m->info['rousei']['element_cc'] ?> progress-bar-striped" style="width: <?=$m->info['count_elements'][$m->info['rousei']['element']]*12.5 ?>%;" role="progressbar" aria-valuenow="22" aria-valuemin="0" valuemax="100">
  <?=$m->info['count_elements'][$m->info['rousei']['element']]*12.5 ?>
</div>
</div>
<div class="row">
  <div class="col col-12">
  漏星【聡明さ・表現力】
  </div>
</div>

<div class="progress mt-3">
<div class="progress-bar <?= $m->info['zaisei']['element_cc'] ?> progress-bar-striped" style="width: <?= $m->info['count_elements'][$m->info['zaisei']['element']]*12.5 ?>%;" role="progressbar" aria-valuenow="22" aria-valuemin="0" valuemax="100">
  <?= $m->info['count_elements'][$m->info['zaisei']['element']]*12.5 ?>
</div>
</div>
<div class="row">
  <div class="col col-12">
  財星【博愛心・社交性】
  </div>
</div>

<div class="progress mt-3">
<div class="progress-bar <?= $m->info['kansei']['element_cc'] ?> progress-bar-striped" style="width: <?= $m->info['count_elements'][$m->info['kansei']['element']]*12.5 ?>%;" role="progressbar" aria-valuenow="22" aria-valuemin="0" valuemax="100">
  <?= $m->info['count_elements'][$m->info['kansei']['element']]*12.5 ?>
</div>
</div>
<div class="row">
  <div class="col col-12">
  官星【規律性・管理力】
  </div>
</div>

<div class="progress mt-3">
<div class="progress-bar <?= $m->info['insei']['element_cc'] ?> progress-bar-striped" style="width: <?= $m->info['count_elements'][$m->info['insei']['element']]*12.5 ?>%;" role="progressbar" aria-valuenow="22" aria-valuemin="0" valuemax="100">
  <?= $m->info['count_elements'][$m->info['insei']['element']]*12.5 ?></div>
</div>
<div class="row">
  <div class="col col-12">
  印星【自制心・思考力】
  </div>
</div>
</div>