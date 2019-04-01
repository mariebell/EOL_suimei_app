<?php
/**
 * executor.php
 * ユーザー入力を元に命式を生成する手続き
 */

require('back/meishiki.php');
require('back/expression.php');

/**
 * main
 */
main(); //実行
function main() {
  global $m;

  date_default_timezone_set('Asia/Tokyo');

  $input = getUserInput();
  
  $m = new Meishiki($input);
}

/**
 * getUserInput
 * ユーザー入力の検証と生年月日の配列を生成
 * @return array $birth
 */
function getUserInput()
{
  //入力がなければ何もしない
  if(empty($_GET)) {
    return;
  }
  $birth_str = $_GET['birth'];
  //生年月日入力チェック
  //10文字(生年月日時)または8文字である(生年月日)ことをチェック
  $isNum = preg_match('/^(19|20)[0-9]{2}[01][0-9][0123][0-9]([012][0-9])?$/', $birth_str);
  if(!$isNum){
    error_log('入力が不正です');
    return;
  }
  $birth = [
    'year' => substr($birth_str, 0, 4),
    'month' => substr($birth_str, 4, 2),
    'day' => substr($birth_str, 6, 2)
  ];
  //時間の入力がない場合は表示しない
  if(!substr($birth_str, 8, 2)){
    $isHourSet = false;
  } else {
    $birth['hour'] = substr($birth_str, 8, 2);
  }
  //文字列⇨数値に変換
  $birth = array_map(function($s){
    return intval($s);
  }, $birth);

  return $birth;
}

