<?php

include '../config.php';
use \Utility\Killable;
use \Utility\Path;

$resource = ucfirst(Path::getResource());
$class = '\Api\\'.$resource;
if(!empty($resource)){
  $data = (new $class)->route(Path::getId());
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($data, JSON_PRETTY_PRINT);
}
/*
$path = array_values(array_filter(explode('/', $_SERVER['REQUEST_URI'])));
$userName = function($line){return trim($line['first_name'].' '.$line['last_name']);};
$parents = ['classes'=>['created_by'=>$userName], 'attendees'=>[], 'users'=>[]];
$children = ['classes'=>['attendees'=>$userName], 'attendees'=>[], 'users'=>[]];
if(!empty($path[0]) && in_array($path[0], ['users', 'classes', 'attendees'])){
  $entity = new Model\Entity($path[0]);
  if(!empty($path[1])){
    $data = $entity->get($path[1]);
  }
  else{
    $data = $entity->getAll($parents[$path[0]], $children[$path[0]]);
  }
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($data, JSON_PRETTY_PRINT);
}
*/

else{ ?>

<a href="./users">Users</a><br />
<a href="./classes">Classes</a><br />
<a href="./attendees">Attendees</a><br />
<?php }

