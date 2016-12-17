<div class="row" data-columns>
    <div>
        <a href="/articles/createarticle" class="btn btn-success" style="margin-left: 10px;">Add<span class="fa fa-plus" style="padding-left: 3px; font-size: 13px;"></span></a>
    </div>
<?php
    foreach ($articles as $article):
?>
            <div class="grid-el">
                <div class="thumbnail">
                    <img src="<?php if ($article["Article"]["photo"]) echo $article["Article"]["photo"]; else echo "http://placehold.it/300x240";?>" alt="">
                    <div class="caption">
                        <!--<h3><a href="/articles/view/<?php echo $article["Article"]["id"]?>"><?php echo $article["Article"]["name"]?>t1</a></h3>-->
                        <h3><?php echo $article["Article"]["name"]?></h3>
                        <?php
                            if (strlen($article["Article"]["description"])>50){
                                $article["Article"]["description"] = substr($article["Article"]["description"], 0, 50)."...";
                            }
                        ?>
                        <p><?php echo $article["Article"]["description"]?></p>
                        <a href="/articles/view/<?php echo $article["Article"]["id"]?>" class="btn btn-success">Детальніше (<?php echo count($article["Comment"]);?>) <span class="fa fa-arrow-right"></span></a>
                        <span class="small" style="color:#ccc;"><span>Дата створення: </span><?php echo date("d-m-Y", strtotime($article["Article"]["data"]))?></span>
                    </div>
                </div>
            </div>
    <?php
        endforeach;
    ?>
</div>