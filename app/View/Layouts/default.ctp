<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $this->fetch('title'); ?> | By Andrei Bliznuik</title>

    <link rel="shortcut icon" href="/images/icon_logo.ico" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="/css/style.css">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header class="navbar navbar-fixed-top">
        <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Open menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a href="/"><span class="navbar-brand "><span class="fa fa-align-justify"></span>Блог <span class="fa fa-hand-peace-o"></span></span></a>
                </div>
                <div class="navbar-header social-icons">
                    <a href="http://vk.com/" target="_blank"><span class="fa fa-vk"></span></a>
                    <a href="https://www.facebook.com/profile.php?id=100003932890548" target="_blank"><span class="fa fa-facebook"></span></a>
                    <a href="https://twitter.com/AndreiGritz" target="_blank"><span class="fa fa-twitter"></span></a>
                    <a href="https://plus.google.com/118151335095368734752" target="_blank"><span class="fa fa-google-plus"></span></a>
                </div>
            <?php
                if (!$this->Session->read("isset_user")){
            ?>
            <button type="button" class="btn btn-primary log-in hidden-sm hidden-xs" data-toggle="modal" data-target="#modal-2" style="margin-left: 20px;">Зареєструватися&nbsp;</button>
            <button type="button" class="btn btn-success log-in hidden-sm hidden-xs" data-toggle="modal" data-target="#modal-1">Увійти&nbsp;<span class="glyphicon glyphicon-log-in"></span></button>
            <?php
                }else{
            ?>
            <a type="button" href="/index/logout" class="btn btn-warning log-in hidden-xs" data-toggle="modal" data-target="">Вийти&nbsp;<span class="glyphicon glyphicon-log-out"></span></a>
            <?php
                }
            ?>
            


        </div>
    </header>
    <section class="container-fluid left">
        <div class="list-group">
            <?php
                if ($this->Session->read("isset_user")){
            ?>
             <!-- Color for list #00A9FF -->       
            <a class="list-group-item" href="/" style="<?php if ($this->fetch('title') == "Index"){ echo "color: red;";}?>">
                    <i class="fa fa-home fa-fw"></i>&nbsp; Стрічка
            </a>
            <a class="list-group-item" href="/articles" style="<?php if ($this->fetch('title') == "Articles"){ echo "color: red;";}?>">
                    <i class="fa fa-align-left fa-fw"></i>&nbsp; Мої статті
            </a>
            <?php
                }
            ?>
            <a class="list-group-item" href="/index/support" target="_blank">
                <i class="fa fa-question fa-fw"></i>&nbsp; Справка
            </a>
            <a class="list-group-item" href="#" data-toggle="modal" data-target="#modal-propos">
                <i class="fa fa-mail-forward fa-fw"></i>&nbsp; Залишити відгук
            </a>
            <form action="/index/index/search" method="POST">
                <a class="list-group-item" href="#">
                    <button type="submit" class="btn btn-info fa fa-search fa-fw"></button>&nbsp; 
                    <input type="text" name="search" class="input-search" placeholder="Пошук">
                </a>
                <!--<input type="submit" value="Search" class="btn btn-info">-->
            </form>
        </div>
        <span class="small">&copy; Andrei Bliznuik 2016</span>
    </section>
    <section class="container-fluid right">
        <?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
    </section>




<!-- Modal window for registration -->
    <div class="modal fade" id="modal-2">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">
                        <span class="fa fa-close"></span>
                    </button>
                    <h4 class="modal-title" align="center">Реєстрація</h4>
                </div>
                <div class="modal-body">
                    <form action="/index/registration" method="POST">
                        <div class="form-group">
                            <label>Nick<input type="text" name="name" class="form-control" placeholder="Your nick name" required></label>
                        </div>
                        <div class="form-group">
                            <label>Email<input type="email" name="email" class="form-control" placeholder="Your email" required></label>
                        </div>
                        <div class="form-group">
                            <label>Password<input type="password" name="password1" class="form-control" placeholder="Your password" required></label>
                        </div>
                        <div class="form-group">
                            <label>Password<input type="password" name="password2" class="form-control" placeholder="Your password" required></label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <span class="fa fa-sign-in"></span> Accept
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal window for log-in -->
    <div class="modal fade" id="modal-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">
                        <span class="fa fa-close"></span>
                    </button>
                    <h4 class="modal-title" align="center">Log-in</h4>
                </div>
                <div class="modal-body">
                    <form action="/index/auntification/" method="POST">
                        <div class="form-group">
                            <label>Email<input name="email" type="email" class="form-control" placeholder="Your email" required></label>
                        </div>
                        <div class="form-group">
                            <label>Password<input name="password" type="password" class="form-control" placeholder="Your password" required></label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                             Accept
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for propositional -->
<div class="modal fade" id="modal-propos">
    <div class="modal-dialog modal-sm" style="width:600px;">
        <div class="modal-content">
            <div class="modal-body">
                <button class="close" type="button" data-dismiss="modal">
                    <span class="fa fa-close"></span>
                </button>
                <div class="container-fluid">
                <form action="/Index/sendmail2" method="post">

                    <h1 style="margin-bottom: 30px;"><span class="fa fa-commenting-o" style="color: darkcyan; font-size: 50px; margin-right: 30%;"></span>Відгук</h1>
                    <p style="text-align:justify;">Відгук – зручний спосіб поделітися своєю думкою про наший продукт або повідомити про проблеми. Ми завжди раді новим ідеям та пропозиціям.</p>
                    <span>Почніть з короткого опису:</span>
                    <div class="form-group">
                        <textarea name="user_propos" id="user_propose" cols="73" rows="4" style="resize: none; "></textarea>
                    </div>
                    <button type="submit" name="send_propose" class="btn btn-success">Send</button>
                    <button class="btn btn-danger" style="float:right;" type="button" data-dismiss="modal">Cancel</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.js"></script>
    <script src="/js/script.js"></script>
    <script src="/js/salvattore.min.js"></script>
</body>
</html>
<?php echo $this->element('sql_dump'); ?>