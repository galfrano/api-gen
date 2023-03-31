<?php
namespace Api;
use \Model\Entity;

abstract class Rest{
  protected $tableName;
  protected $entity;
  protected $data;
  function __construct(){
    $this->entity = new Entity($this->tableName);
    $this->data = json_decode(file_get_contents('php://input'), true);
  }
  
  function route($id){
  $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'GET'){
      return empty($id) ? $this->entity->getAll() : $this->entity->get($id);
    }
    elseif($method == 'POST'){
      try{
        return $this->entity->get($this->entity->add($this->data));
        }
      catch(\PDOException $e){
        http_response_code(400);
        return ['message' => $e->getMessage()];
      }
    }
    elseif($method == 'PUT' && !empty($id)){
      try{
        $this->entity->edit($this->data, $id);
        return $this->get($id);
      }
      catch(\PDOException $e){
        http_response_code(400);
        return ['message' => $e->getMessage()];
      }
    }
    elseif($method == 'DELETE' && !empty($id)){
      $id == 'deleteall' ? $this->entity->deleteAll() : $this->entity->delete($id);
      return ["acknowledged"=> true, 'deletedCount' => 1];
    }
    else{
      http_response_code(400);
      return ['message'=>'Method not supported or missing id'];
    }
  }
}
