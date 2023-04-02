<?php 
return array (
  'pk' => '_id',
  'columns' => 
  array (
    'classname' => 'varchar(255)',
    'description' => 'text',
    'location' => 'varchar(255)',
    'date' => 'timestamp',
    'no_of_places' => 'int(3)',
    'created_by' => 'int(8)',
    'created_date' => 'timestamp',
    '_id' => 'int(8)',
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