<?php
	class IndexController extends AppController{

		public function index ($controll = ""){
			$this->Session->read("isset_user");
			$this->loadModel("Article");
			$articles;
			if ($controll != ""){
				$search = $_POST["search"];
				$articles = $this->Article->find("all",array('conditions'=>array("Article.name LIKE" => "%$search%"),'order' => array('Article.id DESC')));
//				debug($articles);
			}else{
				$articles = $this->Article->find("all",array('order' => array('Article.id DESC')));
			}
			
			$this->set(compact("articles"));
		}

		public function auntification (){
			$email = $_POST["email"];
			$password = $_POST["password"];
			$this->loadModel("User");
			$user = $this->User->find("first",array('conditions'=>array("User.email"=>$email,"User.password" =>$password)));
			
			if (isset($user["User"]))
			{
				$this->Session->write("isset_user",$user["User"]["id"]);
				return $this->redirect('/');
			}else if ($email == "admin@ib.com" && $password == "admin"){
				return $this->redirect("/index/admin");
			} else {

            }
		}

		public function registration (){
			$message = "";
			if ($_POST["password1"] == $_POST["password2"])
			{
				$name = $_POST["name"];
				$email = $_POST["email"];
				$password = $_POST["password1"];
				$this->loadModel("User");
				$this->User->save(array("name" => $name,"email" => $email,"password" => $password));
				$user = $this->User->find("first",array('conditions'=>array("User.email"=>$email,"User.password" =>$password)));
				//debug($user);
				if (isset($user["User"]))
				{
					$this->Session->write("isset_user",$user["User"]["id"]);
					return $this->redirect('/');
				}
				$message = "щось пішло не так;"; 
			}else{
				$message = "Ув. Рак, введи пароль правильно!";
			}
				$this->set(compact("message"));

			//return $this->redirect('/');
		}

		public function logout (){
			$this->Session->delete("isset_user");
			return $this->redirect('/');
		}

		public function view ($id = "null"){
			if ($id != "null")
			{
				$this->loadModel("Article");
				$this->Article->recursive = 3;
				$article = $this->Article->find("first",array('conditions'=>array("Article.id"=>$id)));
				$this->set(compact("article"));
			}else{
				return $this->redirect('/');
			}
		}

		public function support (){
			$this->layout = "support";
		}

        public function admin() {
            $this->loadModel("User");
            $users = $this->User->find("all");
            $this->set(compact("users"));

            $this->loadModel("Comment");
            $comments = $this->Comment->find("all");
            $this->set(compact("comments"));

            $this->loadModel("Article");
            $articles = $this->Article->find("all");
            $this->set(compact("articles"));
        }

        public function deleteUserById($id = "") {
            if ($id == ""){
                return $this->redirect("/");
            }
            $this->loadModel("User");
            $del_user = $this->User->find("first", array("conditions"=>array("User.id" => $id)));
            if ($del_user){
                $this->User->delete($del_user["User"]["id"]);
            }
            return $this->redirect("/index/admin");
        }

        public function deleteArticleByID($id = "") {
            if ($id == ""){
                return $this->redirect("/");
            }
            $this->loadModel("Article");
            $del_article = $this->Article->find("first", array("conditions"=>array("Article.id" => $id)));
            if ($del_article){
                $this->Article->delete($del_article["Article"]["id"]);
            }
            return $this->redirect("/index/admin");
        }

    public function deleteCommentByID($id = "") {
        if ($id == ""){
            return $this->redirect("/");
        }
        $this->loadModel("Comment");
        $del_comment = $this->Comment->find("first", array("conditions"=>array("Comment.id" => $id)));
        if ($del_comment){
            $this->Comment->delete($del_comment["Comment"]["id"]);
        }
        return $this->redirect("/index/admin");
    }
	}