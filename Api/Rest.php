<?php
namespace Api;
use \Model\Entity;

abstract class Rest{
  protected $tableName;
  protected $entity;
  function __construct(){
    $this->entity = new Entity($this->tableName);
  }
  
  function route($id){
  $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'GET'){
      return empty($id) ? $this->getList() : $this->get($id);
    }
    elseif($method == 'POST'){
      $json = $this->getData();
      try{
        return $this->entity->get($this->entity->add($json));
        }
      catch(\PDOException $e){
        http_response_code(400);
        return ['message' => $e->getMessage()];
      }
    }
    elseif($method == 'PUT' && !empty($id)){
      $json = $this->getData();
      var_dump($json);
      $this->entity->edit($id, $json);
      return $this->get($id);
    }
    elseif($method == 'DELETE' && !empty($id)){
      return delete($id);
    }
    else{
      return ['message'=>'Method not supported or missing id'];
    }
  }
  protected function getList(){
    return $this->entity->getAll();
  }
  protected function get($id){
    return $this->entity->get($id);
  }
  protected function delete($id){
    $id == 'deleteall' ? $this->entity->deleteAll() : $this->entity->delete($id);
    return ;//?
  }
  protected function getData(){
    return json_decode(file_get_contents('php://input'), true);
  }
}
