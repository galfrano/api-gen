<?php 
return array (
  'pk' => '_id',
  'columns' => 
  array (
    '_id' => 'int(8)',
    'atendee' => 'int(8)',
    'class' => 'int(8)',
  ),
  'parents' => 
  array (
    'atendee' => 
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