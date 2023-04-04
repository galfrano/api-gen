<?php
namespace Api;
use \Model\Entity;

//all verbs should be overwritable
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
      return empty($id) ? $this->getList() : $this->get($id);
    }
    elseif($method == 'POST'){
      $this->post();
    }
    elseif($method == 'PUT' && !empty($id)){
      $this->put($id);
    }
    elseif($method == 'DELETE' && !empty($id)){
      $this->delete();
    }
    else{
      http_response_code(400);
      return ['message'=>'Method not supported or missing id'];
    }
  }
  
  protected function getList(){
    return $this->entity->getAll();
  }
  
  protected function get($id){
    return $this->entity->get($id);
  }
  
  protected function post(){
    try{
      return $this->entity->get($this->entity->add($this->data));
      }
    catch(\PDOException $e){
      http_response_code(400);
      return ['message' => $e->getMessage()];
    }
  }
  
  protected function put($id){
    try{
      $this->entity->edit($this->data, $id);
      return $this->get($id);
    }
    catch(\PDOException $e){
      http_response_code(400);
      return ['message' => $e->getMessage()];
    }
  }

  protected function delete(){
    $id == 'deleteall' ? $this->entity->deleteAll() : $this->entity->delete($id);
    return ["acknowledged"=> true, 'deletedCount' => 1];
  }
}
