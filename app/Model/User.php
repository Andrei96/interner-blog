<?php
	class User extends AppModel{

        var $hasMany = array(
            'Article' => array(
                'className' => 'Article',
                'foreignKey' => 'user_id',
                'dependent'=> true
            ),
            'Comment' => array(
                'className' => 'Comment',
                'foreignKey' => 'user_id',
                'dependent'=> true
            )
        );


    }