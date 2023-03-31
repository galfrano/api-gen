<?php
namespace Utility;

class Common{
  static function getName($line){
    return trim($line['first_name'].' '.$line['last_name']);
  }
}
