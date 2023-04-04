<?php
namespace Api;
use \Model\Entity;

class Attendees extends Rest{
  protected $tableName = 'attendees';
  protected function delete(){
    $this->entity->deleteWhere($this->data);
  }
}
