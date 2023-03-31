<?php 
return array (
  'pk' => '_id',
  'columns' => 
  array (
    '_id' => 'int(8)',
    'first_name' => 'varchar(255)',
    'last_name' => 'varchar(255)',
    'email' => 'varchar(255)',
    'password' => 'varchar(255)',
  ),
  'parents' => 
  array (
  ),
  'children' => 
  array (
    'classes' => 
    array (
      '_id' => 'created_by',
    ),
    'attendees' => 
    array (
      '_id' => 'atendee',
    ),
  ),
);