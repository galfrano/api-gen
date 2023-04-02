<?php 
return array (
  'pk' => '_id',
  'columns' => 
  array (
    'attendee' => 'int(8)',
    'class' => 'int(8)',
    '_id' => 'int(8)',
  ),
  'parents' => 
  array (
    'attendee' => 
    array (
      'users' => '_id',
    ),
    'class' => 
    array (
      'classes' => '_id',
    ),
  ),
  'children' => 
  array (
  ),
);