<?php 
return array (
  'pk' => '_id',
  'columns' => 
  array (
    '_id' => 'int(8)',
    'classname' => 'varchar(255)',
    'description' => 'text',
    'date' => 'timestamp',
    'no_of_places' => 'int(3)',
    'created_by' => 'int(8)',
    'created_date' => 'timestamp',
  ),
  'parents' => 
  array (
    'created_by' => 
    array (
      'users' => '_id',
    ),
  ),
  'children' => 
  array (
    'attendees' => 
    array (
      '_id' => 'class',
    ),
  ),
);