<?php 
return array (
  'pk' => '_id',
  'columns' => 
  array (
    'first_name' => 'varchar(255)',
    'last_name' => 'varchar(255)',
    'email' => 'varchar(255)',
    'password' => 'varchar(255)',
    '_id' => 'int(8)',
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
      '_id' => 'attendee',
    ),
  ),
);