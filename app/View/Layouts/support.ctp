<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Support | By Andrei Bliznuik</title>

    <link rel="shortcut icon" href="/images/icon_logo.ico" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="/css/support_css.css">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header class="container-fluid">
    <h1>Справка - по сайту I\Б</h1>
</header>
<section class="container">
    <h2 class="text-center">Перелік найпоширеніших питань</h2>
    <div id="accordion" class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#collapse-1" data-toggle="collapse" data-parent="#accordion" class="collapsed">Хто автор?</a>
                </h4>
            </div>
            <div id="collapse-1" class="panel-collapse collapse in collapsing">
                <div class="panel-body">
                    <p class="text-justify">Автором являється Андрій Близнюк (Україна).</p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#collapse-2" data-toggle="collapse" data-parent="#accordion" class="collapsed">Що це за проект?</a>
                </h4>
            </div>
            <div id="collapse-2" class="panel-collapse collapse" >
                <div class="panel-body">
                    <p class="text-justify">Цей проект був створений для курсової роботи з теми "Інтернет Блог"</p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#collapse-3" data-toggle="collapse" data-parent="#accordion" class="collapsed">Як створити статтю?</a>
                </h4>
            </div>
            <div id="collapse-3" class="panel-collapse collapse" >
                <div class="panel-body">
                    <p class="text-justify">Все дуже просто. Для початку потрібно зареєструватися, після чого Вам буде відкрито меню "Стрічка" і "Мої статті",
                        де ви зможе переглянути як інші статті так і створити власну, натиснувши в розділі "Мої статті" кнопку "Add".
                    Після чого вам буде відкрито форму для заповнення статті даними, включаючи фотографією. Розмір необмежений.
                    </p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#collapse-4" data-toggle="collapse" data-parent="#accordion" class="collapsed">Як видалити статтю?</a>
                </h4>
            </div>
            <div id="collapse-4" class="panel-collapse collapse" >
                <div class="panel-body">
                    <p class="text-justify">
                        Для цього потрібно зайти під свій логін та зайти в розділ "Мої статті", де вибрати статю, яку бажаєте видалити\редагувати.
                        І натиснувши клавішу "Delete" - стаття, разом із коментарями буде видалена з бази даних. Відновити буде неможливо.
                    </p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#collapse-5" data-toggle="collapse" data-parent="#accordion" class="collapsed">Не можу створити коментарій. HELP!!!!!</a>
                </h4>
            </div>
            <div id="collapse-5" class="panel-collapse collapse" >
                <div class="panel-body">
                    <p class="text-justify">
                        Не переживайте так. Вам потрібно зайти під свій логін, або ж зареєструватися, якщо цього досі не зробили.
                    </p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#collapse-6" data-toggle="collapse" data-parent="#accordion" class="collapsed">Чому не можу видалити коментарій? Я автор!</a>
                </h4>
            </div>
            <div id="collapse-6" class="panel-collapse collapse" >
                <div class="panel-body">
                    <p class="text-justify">
                        Більше за все, що ви знаходитесь не в своїй статті, відповідо, доступу до її редагування\видалення ви не маєте.
                        Перевірьте в розділі "Мої статті" чи дійсно ви являєтесь автором цієї статті.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <form action="/index/sendmail" method="POST" id="form-quest">
        <h4>Якщо у вас виникло інше питання, будь ласка, заповніть цю форму і ми з Вами зв'яжемось.</h4>
        <div class="form-group">
            <label>Ваш імейл: <input type="email" placeholder="Email" required="required" name="email" id="email"></label>
        </div>
        <div class="form-group">
            <span>Ваше питання:</span>
            <textarea name="question" id="question"></textarea>
        </div>
        <button class="btn btn-info" type="submit">Відправити</button>
    </form>
</section>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.js"></script>

</body>
</html>