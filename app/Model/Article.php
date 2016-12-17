<?php
	class Article extends AppModel{
		public $hasMany = array(
		    'Comment' => array(
                'order' => 'Comment.id DESC',
                'dependent' => true),
            'Rating' => array(
                'dependent' => true)
        );

	}