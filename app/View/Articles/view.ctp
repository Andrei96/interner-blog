 <div class="row" data-columns>
        <div></div>
        <div>
            <div class="thumbnail">
                <img src="<?php if ($article["Article"]["photo"]) echo $article["Article"]["photo"]; else echo "http://placehold.it/300x240";?>" alt="">
                <div class="caption">
                    <h3><?php echo $article["Article"]["name"]?></h3>
                    <p><?php echo $article["Article"]["description"]?></p>
                    <span class="small" style="color:#ccc;"><span>Дата створення: </span><?php echo date("d-m-Y", strtotime($article["Article"]["data"]))?></span>
                </div>
                <a href="/articles/delarticle/<?php echo $article['Article']['id']?>" class="btn btn-danger">Delete</a>
                <a href="/articles/editarticle/<?php echo $article['Article']['id']?>" class="btn btn-info">Edit</a>
                <div class="rating">
                    <span style="display: block">Виберіть рейтинг:</span>
                    <a href="/articles/addRating?articleId=<?php echo $article['Article']['id']?>&rating=5&callBack=/articles/view/<?php echo $article['Article']['id']?>">+5</a>
                    <a href="/articles/addRating?articleId=<?php echo $article['Article']['id']?>&rating=4&callBack=/articles/view/<?php echo $article['Article']['id']?>">+4</a>
                    <a href="/articles/addRating?articleId=<?php echo $article['Article']['id']?>&rating=3&callBack=/articles/view/<?php echo $article['Article']['id']?>">+2</a>
                </div>
                <!--<?php debug($articleRating['Rating']['average']) ?>
                <span>Средний рейтинг = <?php echo $articleRating["Rating"]["average"] ?></span>
                <!-- {#<a href="/articles/addRating?articleId=<?php echo $article['Article']['id']?>&rating=5&callBack=/articles/view/<?php echo $article['Article']['id']?>">+5</a>#}
                {#<a href="/articles/addRating?articleId=<?php echo $article['Article']['id']?>&rating=4&callBack=/articles/view/<?php echo $article['Article']['id']?>">+4</a>#}
                {#<a href="/articles/addRating?articleId=<?php echo $article['Article']['id']?>&rating=3&callBack=/articles/view/<?php echo $article['Article']['id']?>">+3</a>#} -->
            </div>
            <div id="accordion" class="panel-group">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#collapse-1" class="comments_look" data-toggle="collapse" data-parent="#accordion">Коментарі (<?php echo count($article["Comment"]);?>)</a>
                        </h4>
                    </div>
                    <div id="collapse-1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <?php
                                if ($this->Session->read("isset_user")){
                            ?>
                            <form action="/articles/addcomment/<?php echo $article["Article"]["id"]?>/articles" method="POST">
                                <div class="form-group">
                                    <label>Ваш коментарій<textarea type="comment" class="form-control" placeholder="Your comments" name="comment" required></textarea></label>
                                </div>
                                <button type="submit" class="btn btn-success">
                                    Залишити коментарій
                                </button>
                            </form>
                            <?php
                                }else{
                            ?>
                            <h4>Для залишення коментарів, потрібно <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-2">зареєструватися</a>.</h4>
                            <?php
                                }
                            ?>
                        </div>
                        <hr>

                        <?php
                            foreach ($article["Comment"] as $comment) :
                                //debug($comment);
                        ?>
                        <div class="comments">
                            <h4><?php echo $comment["User"]["name"];?></h4>
                            <p><?php echo $comment["comment"];?></p>
                            <span class="small" style="color: #ccc"><?php echo $comment["data"];?></span>
                            <span class="small" style="color: red"><a href="/articles/delcomment/<?php echo $comment["id"];?>">Видалити</a></span>
                        </div>
                        <?php
                            endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>