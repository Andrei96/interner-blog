<?php
	class ArticlesController extends AppController{
        
        public function __construct( $request = null, $response = null ) {
    		parent::__construct( $request, $response );
    		$this->Session = $this->Components->load('Session');
 
    		if (!$this->Session->read("isset_user")){
    			return $this->redirect("/");
    		}
		}

		public function index (){
			$this->loadModel("Article");
			$articles = $this->Article->find("all",array('order' => 'Article.id DESC','conditions'=>array("Article.user_id"=>$this->Session->read("isset_user"))));
			$this->set(compact("articles"));
		}

		public function view ($id = "null"){
			if ($id != "null")
			{
				$this->loadModel("Article");
                $this->loadModel("Rating");
				$this->Article->recursive = 3;
				$article = $this->Article->find("first",array('conditions'=>array("Article.id"=>$id)));
				$articleRating = $this->Rating->find(
                'first',  array(
                    'conditions' => array(
                        'Rating.article_id' => $id
                    ),
                    'fields'    => array(
                        'AVG( Rating.rating ) AS average',
                    )));
//                debug($articleRating);
                $this->set(compact("articleRating"));
				$this->set(compact("article"));
			}else{
				return $this->redirect('/');
			}
		}

		public function addcomment ($id_article = "null",$r_page = "index"){
			if ($id_article != "null")
			{
				$comment = $_POST["comment"];
				$this->loadModel("Comment");
				$user_id = $this->Session->read("isset_user");
				$this->Comment->save(array("article_id" => $id_article,"user_id" => $user_id,"comment" => $comment));

				return $this->redirect(array("controller"=>$r_page,"action"=>"view", $id_article));
			}else{
				return $this->redirect('/');
			}
		}

		public function delarticle($id_article = "null"){
			if ($id_article != "null")
			{
				$this->loadModel("Article");
				$article = $this->Article->find("first",array('conditions'=>array("Article.id"=>$id_article)));
				$this->Article->deleteAll($article["Article"],true);
				return $this->redirect(array("controller"=>"articles","action"=>"index"));
			}else{
				return $this->redirect('/');
			}
		}

		public function delcomment($id_comment = "null"){
			if ($id_comment != "null")
			{
				$this->loadModel("Comment");
				$comment = $this->Comment->find("first",array('conditions'=>array("Comment.id"=>$id_comment)));
				$cellback = $comment["Comment"]["article_id"];
				$this->Comment->delete($comment["Comment"]);
				return $this->redirect(array("controller"=>"articles","action"=>"view" , $cellback));
			}else{
				return $this->redirect('/');
			}
		}

		public function createarticle (){
                $this->loadModel("Category");
                $categoryes = $this->Category->find("all");
                $this->set(compact("categoryes"));
                $this->render("new");
		}

		public function addarticle (){
				$image = $_POST["photo"];
				$name = $_POST["name"];
                $categoryId = $_POST["categoryId"];
				$description = $_POST["description"];
				$this->loadModel("Article");

				if(($image == null) || ($name == null) || ($description == null)) {
                    return $this->redirect("/articles/createarticle");
                } else {
                    $this->Article->save(array("photo" => $image,"name" => $name,"description" => $description, "id_category" => $categoryId ,"user_id" => $this->Session->read("isset_user")));
                    return $this->redirect(array("controller"=>"articles","action"=>"index"));
                }


		}

		public function editarticle ($id_article = "null"){
			if ($id_article != "null")
			{
				$this->loadModel("Article");
				$article = $this->Article->find("first",array('conditions'=>array("Article.id"=>$id_article)));
				$this->set(compact("article"));
				$this->render("edit");
				//return $this->redirect(array("controller"=>"articles","action"=>"index"));
			}else{
				return $this->redirect('/');
			}
		}

		public function updatearticle($id_article = "null"){
			$image = $_POST["image"];
			$name = $_POST["name"];
			$description = $_POST["description"];
			$this->loadModel("Article");
			$this->Article->save(array("id"=>$id_article,"photo" => $image,"name" => $name,"description" => $description));
			return $this->redirect(array("controller"=>"articles","action"=>"index"));
		}

		public function addRating(){
            $rating = $_GET["rating"];
            $articleId = $_GET["articleId"];
            $callBack = $_GET["callBack"];
            $this->LoadModel("Rating");
            $user_id = $this->Session->read("isset_user");
            $ratingKey = $this->Rating->find("first", array("conditions" => array("user_id"=> $user_id, "article_id" => $articleId)));
            if ($ratingKey){
                $ratingKey["Rating"]["rating"] = $rating;
                $this->Rating->save($ratingKey);
            }else {
                $this->Rating->save(array("user_id" => $user_id, "article_id" => $articleId, "rating" => $rating));
            }
            return $this->redirect($callBack);
        }
	}