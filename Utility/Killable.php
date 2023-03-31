<?php
namespace Utility;

class Killable{
  static function kill($debug){
    throw new \Exception(get_called_class().': '.var_export($debug, 1));
  }
}
