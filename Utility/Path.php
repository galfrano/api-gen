<?php
namespace Utility;

class Path{

  private static $resources = ['users', 'attendees', 'classes'];
  private static $resource = false;
  private static $id = false;
  
  static function getResource(){
    empty(self::$resource) && self::getParts();
    return self::$resource;
  }
  static function getId(){
    empty(self::$id) && self::getParts();
    return self::$id;
  }
  protected static function getParts(){
    $parts = array_values(array_filter(explode('/', $_SERVER['REQUEST_URI'])));
    key_exists(0, $parts) && in_array($parts[0], self::$resources) && self::$resource = $parts[0];
    key_exists(1, $parts) && self::$id = $parts[1];
  }
}
