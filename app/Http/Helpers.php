<?php

class Helpers {
  public static function toggleId($id, $arr) {
    if (in_array($id, $arr)) {
      $idx = array_search($id, $arr);
      unset($array[$idx]);
    } else {
      array_push($id);
    }
    return $arr;
  }
}