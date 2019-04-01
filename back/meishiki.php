<?php
require('back/kanshi.php');

/**
 * class Meishiki
 * 四柱推命 演算用クラス
 */
class Meishiki extends Kanshi
{
    // 命式を入れる配列
    public $meishiki = [];

    // 命式に関する情報
    public $info = [];

    // 時柱が存在するフラグ
    public $isHourSet = false;

    // 各柱の情報（干支ID, 干支名）
    public $year = [];
    public $month = [];
    public $day = [];
    public $hour = [];

    // 年柱の情報
    public $nenkan = [];
    public $nenshi = [];

    // 月柱の情報
    public $gekkan = [];
    public $gesshi = [];

    // 日柱の情報
    public $nikkan = [];
    public $nisshi = [];

    // 時柱の情報
    public $jikan = [];
    public $jishi = [];

    function __construct($input){
      //干支の指定がある場合はそれを元に命式生成、そうでなければランダムで生成
      $kanshis = $this->generateKanshis($input);
      if(!empty($kanshis)){
        $this->generateMeishiki($kanshis);
      } else {
        $this->generateRandomMeishiki();
      }
    }

    /**
     * 生年月日配列から干支配列を生成
     * generateKanshis
     * @param array $birth
     * @return array $birth_kanshis
     */
    function generateKanshis($birth)
    {
        if(!$birth){
          return [];
        }
        /**
         * 基準日 1900年01月01日の干支
         * 乙亥年(36),丙子月(13),甲戌(11)日
         **/
        $base_ts = mktime(0, 0, 0, 1, 1, 1900);
        $birth_ts = mktime(0, 0, 0, $birth['month'], $birth['day'], $birth['year']);
        $passed_time = $birth_ts - $base_ts;

        //経過年月
        $passed_years = floor($passed_time / (3600 * 24 * 365.25)); //1年の秒数でわる
        $passed_months = floor($passed_time / (3600 * 24 * (365.25/12))); //1ヶ月の秒数でわる
        $passed_days = floor($passed_time / (3600*24)); //1日の秒数でわる

        //基準日をもとに調整
        $birth_kanshis = [
          'year' => $passed_years + 36,
          'month' => $passed_months + 13,
          'day' => $passed_days + 11
        ];

        //時柱の追加
        if (isset($birth['hour'])) {
          $birth_kanshis['hour'] = $birth['hour'];
        }

        //もし春分を超えていたら年+1
        if ($birth_ts > mktime(0, 0, 0, 2, 4, $birth['year'])) {
          $birth_kanshis['year'] += 1;
        }
        //もし節入り日を超えていたら月+1
        if ($birth_ts > mktime(0, 0, 0, $birth['month'], 4, $birth['year'])) {
          $birth_kanshis['month'] += 1;
        }

        return $birth_kanshis;
    }
    
    /**
     * generateRandomMeishiki
     * 命式の配列をランダムで生成
     * @param bool $hour 時柱の有無
     * @param bool $inJp 出力形式
     * @return array $meishki
     */
    private function generateRandomMeishiki($hour = true, $inJp = false)
    {
      $meishiki = [];
      $pillars = ['year', 'month', 'day'];
      if ($hour) {
        $pillars[] = 'hour';
        $this->isHourSet = true;
      }

      //命式配列を生成
      foreach($pillars as $p) {
        $r = rand(1, 60);
        $meishiki[$p] = ['kan' => $this->getKan($r, $inJp), 'shi' => $this->getShi($r, $inJp)];
      
        //干支情報を$year, $month, $day, $hourに保持
        $this->{$p}['id'] = $r;
        $this->{$p}['name'] = $this->getKanshi($r);
      }

      //命式を出力
      $this->meishiki = $meishiki;

      //命式から各柱の情報をセット
      $this->setPillarsParams();

      return $meishiki;
    }

    /**
     * generateMeishiki
     * 干支IDの配列から命式を生成
     * @param array $kanshis
     * @param bool $inJp 出力形式
     */
    private function generateMeishiki($kanshis, $inJp = false)
    {
      $meishiki = [];
      $pillars = ['year', 'month', 'day', 'hour'];

      //命式を生成
      foreach($kanshis as $k => $p)
      {
        //キーを指定してなければ、$pillarsをキーとして用いる
        $key = is_string($k) ? $k : $pillars[$k];
        if($key === 'hour') continue; //時柱は飛ばす（あとで追加）

        $meishiki[$key] = ['kan' => $this->getKan($p, $inJp), 'shi' => $this->getShi($p, $inJp)];
      
        //干支情報を$year, $month, $dayに保持
        $this->{$key}['id'] = $p;
        $this->{$key}['name'] = $this->getKanshi($p);
      }
      
      //時柱あり
      if(isset($kanshis['hour'])){
        $this->isHourSet = true; //フラグを立てる
        $hour = $kanshis['hour']; //00-24の値
        $nikkan = $meishiki['day']['kan'];

        //時柱の算出
        //甲己・乙庚・丙辛・丁壬・戊癸の5グループ（スート）
        //甲子、丙子、戊子、庚子、壬子から2時間ごとに1つ干支を巡る
        $top_of_suite = [1, 13, 25, 37, 49];
        $suite = ($nikkan%5)-1;
        if($suite < 0) $suite = 4; //戊・癸は4

        //2で割って切り上げした値を$top_of_suiteに加えることで時干支を出す
        $jikanshi = $top_of_suite[$suite] + ceil($hour / 2);

        //時干支から命式の時柱を出力
        $meishiki['hour'] = ['kan' => $this->getKan($jikanshi, $inJp), 'shi' => $this->getShi($jikanshi, $inJp)];

        //干支情報を$hourに保持
        $this->hour['id'] = $jikanshi;
        $this->hour['name'] = $this->getKanshi($jikanshi);
      }

      //命式に情報をセット
      $this->meishiki = $meishiki;

      //命式から各柱の値をセット
      $this->setPillarsParams();

      return $meishiki;
    }

    

    /**
     * setPillarsParams
     * $meishikiから各柱の値をセット
     * $nenkan, $nenshi, $gekkan, $gesshi, $nikkan, $nisshi, $jikan, $jishi
     */
    private function setPillarsParams()
    {
      $kans = ['year' => 'nenkan', 'month' => 'gekkan', 'day' => 'nikkan'];
      $shis = ['year' => 'nenshi', 'month' => 'gesshi', 'day' => 'nisshi'];

      //時柱を追加
      if($this->isHourSet){
        $kans['hour'] = 'jikan';
        $shis['hour'] = 'jishi';
      }

     //まず日干を取得(通変星を求めるため)
     $nikkan = $this->getNikkan($this->meishiki, false);

      //天干の情報をセット
      foreach ($kans as $pillar => $kan) {
        $this->{$kan}['id'] = $this->getKan($this->{$pillar}['id'], false);
        $this->{$kan}['name'] = $this->getKan($this->{$pillar}['id']);
        $this->{$kan}['onmyo'] = $this->getOnmyo($this->{$pillar}['id']);

        //五行属性
        $this->{$kan}['element'] = $this->getElementOfKan($this->{$kan}['id'], false);
        $this->{$kan}['element_ja'] = $this->getElementOfKan($this->{$kan}['id'], true);
        $this->{$kan}['color_class'] = $this->getColorCode($this->{$pillar}['id'], 'kan');

        //通変星
        $this->{$kan}['tsuhen'] = $this->getTsuhen($nikkan, $this->{$kan}['id'], false);
        $this->{$kan}['tsuhen_ja'] = $this->getTsuhen($nikkan, $this->{$kan}['id'], true);
      }

      //地支の情報をセット
      foreach ($shis as $pillar => $shi) {
        $this->{$shi}['id'] = $this->getShi($this->{$pillar}['id'], false);
        $this->{$shi}['name'] = $this->getShi($this->{$pillar}['id'], true);
        $this->{$shi}['onmyo'] = $this->getOnmyo($this->{$pillar}['id']);

        //五行属性
        $this->{$shi}['element'] = $this->getElementOfShi($this->{$shi}['id'], false);
        $this->{$shi}['element_ja'] = $this->getElementOfShi($this->{$shi}['id'], true);
        $this->{$shi}['color_class'] = $this->getColorCode($this->{$pillar}['id'], 'shi');

        //蔵干
        $this->{$shi}['zokan'] = $this->getZokan($this->{$shi}['id'], false);
        $this->{$shi}['zokan_ja'] = $this->getZokan($this->{$shi}['id'], true);

        //通変星
        $this->{$shi}['tsuhen'] = $this->getTsuhenOfArray($nikkan, $this->{$shi}['zokan'], false);
        $this->{$shi}['tsuhen_ja'] = $this->getTsuhenOfArray($nikkan, $this->{$shi}['zokan'], true);
      }

      //$infoに命式の周辺情報をセット
      $this->setOtherElementInfo(); //他の五行の情報をセット
      $this->countElementFromMeishiki(); //命式各五行の数をセット
      $this->countOnmyoFromMeishiki(); //命式陰陽の数をセット
    }

    private function setOtherElementInfo()
    {
      //自星の五行情報
      $this->info['jisei'] = [
        'element' => $this->nikkan['element'],
        'element_ja' => $this->nikkan['element_ja'],
        'element_cc' => $this->nikkan['color_class'],
      ];

      //日干五行を中心に各通変星と五行の情報を入れる
      $ne = $this->nikkan['element'];
      $types = [1 => 'rousei', 2 => 'zaisei', 3 => 'kansei', 4 => 'insei'];
      foreach($types as $dist => $type){
        $type_elm = $this->getOtherElement($ne, $dist);
        $type_elm_ja = $this->getOtherElement($ne, $dist, true);
        $this->info[$type] = [
          'element' => $type_elm,
          'element_ja' => $type_elm_ja,
          'element_cc' => $this->getColorClassName($type_elm),
        ];
      }
    }

    /**
     * getColorCode
     * 干支IDからカラーコードを取得
     * @param int $id 干支ID
     * @param string $target 干か支か
     * @param string $style クラス名の接頭辞
     * @param bool $classic 五色の使用（クラシックカラー）
     */
    private function getColorCode($id, $target = 'kan', $style = "bg", $classic = false)
    {
      if ($target === 'kan') {
        $element = $this->getElementOfKan($id);
      } else if ($target === 'shi') {
        $element = $this->getElementOfShi($id);
      }
      return $this->getColorClassName($element, $style, $classic);
    }

    /**
     * getColorClass
     * 五行をクラス名に変換
     * @param int $element 五行
     * @return string $color 
     */
    private function getColorClassName($element, $style = 'bg', $classic = false)
    {
      switch ($element) {
        case SUIMEI_GOGYO_MOKU:
          $color = "{$style}-success";
          if($classic) $color = "{$style}-primary";
          break;
        case SUIMEI_GOGYO_KA:
          $color = "{$style}-danger";
          if($classic) $color = "{$style}-danger";
          break;
        case SUIMEI_GOGYO_DO:
          $color = "{$style}-secondary";
          if($classic) $color = "{$style}-warning";
          break;
        case SUIMEI_GOGYO_KIN:
          $color = "{$style}-warning";
          if($classic) $color = "{$style}-light text-dark";
          break;
        case SUIMEI_GOGYO_SUI:
          $color = "{$style}-primary";
          if($classic) $color = "{$style}-dark";
          break;
        default:
          $color = "{$style}-secondary";
      }
      return $color;
    }

    /**
     * countElementFromMeishiki
     * 命式からそれぞれの五行の数を配列で取得
     * @param array $meishiki
     * @return array 
     */
    private function countElementFromMeishiki()
    {
      $elements = [
        SUIMEI_GOGYO_MOKU => 0,
        SUIMEI_GOGYO_KA => 0,
        SUIMEI_GOGYO_DO => 0,
        SUIMEI_GOGYO_KIN => 0,
        SUIMEI_GOGYO_SUI => 0
      ];

      $counts = [];
      foreach ($this->meishiki as $pillar) {
        $a[] = $this->getElementOfKan($pillar['kan'], false);
        $a[] = $this->getElementOfShi($pillar['shi'], false);
      }
      $counts = array_count_values($a);

      $this->info['count_elements'] = $counts + $elements;
    }

    /**
     * countOnmyoFromMeishiki
     * 命式からそれぞれの陰陽の数を配列で取得
     * @param array $meishiki
     * @return array 
     */
    private function countOnmyoFromMeishiki()
    {
      $elements = [
        SUIMEI_ONMYO_IN => 0,
        SUIMEI_ONMYO_YOU => 0,
      ];

      $counts = [];
      foreach ($this->meishiki as $pillar) {
        $a[] = $this->getOnmyo($pillar['kan'], false);
        $a[] = $this->getOnmyo($pillar['shi'], false);
      }
      $counts = array_count_values($a);

      $this->info['count_onmyo'] = $counts + $elements;
    }

    /**
     * ある五行に対する他の五行を取得
     * @param int $element
     * @param int $target
     * @param bool $inJp
     */
    private function getOtherElement($element, $target, $inJp = false)
    {
      global $mst_gogyo;
      //+1 漏星 +2 財星 +3 官星 +4 印星
      $r = $element + $target;
      $element = $r > SUIMEI_NUMBER_OF_GOGYO ? $r - SUIMEI_NUMBER_OF_GOGYO : $r;
      return $inJp ? $mst_gogyo[$element] : $element;
    }

    /**
     * 命式配列から日干を取得
     */
    public function getNikkan($array, $inJp = true)
    {
      return $this->getKan($array['day']['kan'], $inJp);
    }

    /**
     * 命式配列から年干を取得
     */
    public function getNenkan($array, $inJp = true)
    {
      return $this->getKan($array['year']['kan'], $inJp);
    }

    /**
     * 命式配列から月干を取得
     */
    public function getGekkan($array, $inJp = true)
    {
      return $this->getKan($array['month']['kan'], $inJp);
    }

    /**
     * 命式配列から時干を取得
     */
    public function getJikan($array, $inJp = true)
    {
      return $this->getKan($array['hour']['kan'], $inJp);
    }

    /**
     * 命式配列から日支を取得
     */
    public function getNisshi($array, $inJp = true)
    {
      return $this->getShi($array['day']['shi'], $inJp);
    }

    /**
     * 命式配列から年支を取得
     */
    public function getNenshi($array, $inJp = true)
    {
      return $this->getShi($array['year']['shi'], $inJp);
    }

    /**
     * 命式配列から月支(元命)を取得
     */
    public function getGesshi($array, $inJp = true)
    {
      return $this->getShi($array['month']['shi'], $inJp);
    }

    /**
     * 命式配列から時支を取得
     */
    public function getJishi($array, $inJp = true)
    {
      return $this->getShi($array['hour']['shi'], $inJp);
    }

    /**
     * 地支から蔵干配列を取得
     * @param int $shi
     * @param bool $inJp
     * @return array $zokan
     */
    private function getZokan($shi, $inJp = true)
    {
      global $shi_to_zokan;
      if ($inJp === false) {
        return $shi_to_zokan[$shi];
      } else {
        $zokan = [];
        foreach ($shi_to_zokan[$shi] as $kan) {
          $zokan[] = $this->getKan($kan, true);
        }
        return $zokan;
      }
    }

    /**
     * 天干にとっての通変を返す
     * @param int $tenkan
     * @param int $target
     * @param bool $inJp
     * @return string
     */
    private function getTsuhen($tenkan, $target, $inJp = true)
    {
      global $mst_tsuhen, $tsuhen_order_in, $tsuhen_order_you;
      //天干との距離を計算
      $dist = intval($target) - intval($tenkan);
      $dist = $dist < 0 ? $dist + SUIMEI_NUMBER_OF_TSUHEN : $dist;

      if (intval($tenkan) % SUIMEI_NUMBER_OF_ONMYO === SUIMEI_ONMYO_IN) {
        return $inJp ? $mst_tsuhen[$tsuhen_order_in[$dist]] : $tsuhen_order_in[$dist];
      } else if (intval($tenkan) % SUIMEI_NUMBER_OF_ONMYO === SUIMEI_ONMYO_YOU) {
        return $inJp ? $mst_tsuhen[$tsuhen_order_you[$dist]] : $tsuhen_order_you[$dist];
      }
    }

    /**
     * 干配列から通変星を取得
     * @param int $tenkan
     * @param array $targets
     * @param bool $inJp
     * @return array $tsuhens
     */
    private function getTsuhenOfArray($tenkan, $targets, $inJp = true)
    {
      $tsuhens = [];
      foreach($targets as $target)
      {
        //日干番号を取得
        $tsuhens[] = $this->getTsuhen($tenkan, $target, $inJp);
      }
      return $tsuhens;
    }
}