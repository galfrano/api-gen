<?php

namespace Api;
use \Model\Entity;
use Utility\Common;

class Classes extends Rest{
  protected $tableName = 'classes';
  protected function getList(){
    $users = (new Entity('users'))->catalog(function($u){return Common::getName($u);});
    return array_values($this->entity->getList(1, [], function($line)use($users){
      $attendees = array_values((new Entity('attendees'))->getList(1, ['class'=>$line['_id']], function($a)use($users){return [$a['attendee']=>$users[$a['attendee']]];}));
      return [$line['_id']=>$line+['created_by_name'=>$users[$line['created_by']], 'attendees'=>$attendees]];
    }));
  }
  protected function get($id){
    $users = (new Entity('users'))->catalog(function($u){return Common::getName($u);});
    return $this->entity->get(1, [], true, function($line)use($users){
      $attendees = array_values((new Entity('attendees'))->getList(1, ['class'=>$line['_id']], function($a)use($users){return [$a['attendee']=>$users[$a['attendee']]];}));
      return [$line['_id']=>$line+['created_by_name'=>$users[$line['created_by']], 'attendees'=>$attendees]];
    });
  }
}
