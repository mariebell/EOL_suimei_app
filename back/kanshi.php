<?php
require('back/const.php');

/**
 * class Kanshi
 * 四柱推命 基礎メソッド群クラス
 */
abstract class Kanshi
{
    /**
     * 干を取得
     * @param int $id 干支ID
     * @param bool $inJp 出力形式
     */
    protected function getKan($id, $inJp = true)
    {
      global $mst_kan;
      if (is_array($id)) return false;
      if (is_string($id)) $id = intval($id);
      //1-10に変換
      $kan_id = $id % SUIMEI_NUMBER_OF_KAN === 0 ?
        SUIMEI_NUMBER_OF_KAN : $id%SUIMEI_NUMBER_OF_KAN;
      return $inJp ? $mst_kan[$kan_id] : $kan_id;
    }

    /**
     * 支を取得
     * @param int $id 干支ID
     * @param bool $inJp 出力形式
     */
    protected function getShi($id, $inJp = true)
    {
      global $mst_shi;
      if (is_array($id)) return false;
      if (is_string($id)) $id = intval($id);
      //1-12に変換
      $shi_id = $id % SUIMEI_NUMBER_OF_SHI === 0 ? 
        SUIMEI_NUMBER_OF_SHI : $id % SUIMEI_NUMBER_OF_SHI;
      return $inJp ? $mst_shi[$shi_id] : $shi_id;
    }

    /**
     * 干支を取得
     * @param int $id 干支ID
     */
    protected function getKanshi($id)
    {
      if (is_array($id)) return false;
      if (is_string($id)) $id = intval($id);
      //干支を出力
      return $this->getKan($id).$this->getShi($id);
    }

    /**
     * 天干の五行を取得
     * @param int $id 干支ID
     * @param bool $inJp 出力形式
     */
    protected function getElementOfKan($id, $inJp = false)
    {
      global $mst_gogyo, $kan_to_gogyo;
      $kan_id = $this->getKan($id, false);
      return $inJp ? $mst_gogyo[$kan_to_gogyo[$kan_id]] : $kan_to_gogyo[$kan_id];
    }

    /**
     * 地支の五行を取得
     * @param int $id 干支ID
     * @param bool $inJp 出力形式
     * @param bool $multiple 蔵干を考慮（配列でreturn）
     */
    protected function getElementOfShi($id, $inJp = false, $multiple = false)
    {
      global $mst_gogyo, $shi_to_gogyo;
      $shi_id = $this->getShi($id, false);
      return $inJp ? $mst_gogyo[$shi_to_gogyo[$shi_id]] : $shi_to_gogyo[$shi_id];
    }

    /**
     * 陰陽を取得
     * @param int $id 干支ID
     * @param bool $inJp 出力形式
     */
    protected function getOnmyo($id, $inJp = false)
    {
      global $mst_onmyo;
      if (is_array($id)) return false;
      if (is_string($id)) $id = intval($id);
      $onmyo = $id % SUIMEI_NUMBER_OF_ONMYO;
      return $inJp ? $mst_onmyo[$onmyo] : $onmyo;
    }

    /**
     * 陽干かどうか
     * @param int $id 干支ID
     */
    protected function isPositive($id)
    {
      return getOnmyo($id, false) === SUIMEI_ONMYO_YOU;
    }

    /**
     * 陰干かどうか
     * @param int $id 干支ID
     */
    protected function isNegative($id)
    {
      return getOnmyo($id, false) === SUIMEI_ONMYO_IN;
    }

    
}