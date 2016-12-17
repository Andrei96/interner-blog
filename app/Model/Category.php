<?php
class Category extends AppModel{
    var $hasMany = array(
        'Article' => array(
            'className' => 'Article',
            'foreignKey' => 'id_category',
            'dependent'=> true)
    );
}