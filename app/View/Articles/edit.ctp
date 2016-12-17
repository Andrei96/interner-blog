<?php
   // debug($categories);
?>
 <div class="row" data-columns>
        <div>
            <a href="/articles/index/" class="btn btn-default">Back</a>
            <div class="thumbnail text-center">
                <form method="POST" action="/articles/updatearticle/<?php echo $article["Article"]["id"];?>">
                    <p><label>Додати фото(url):</label></p>
                    <p><input type="text" value="<?php echo $article["Article"]["photo"];?>" name="image"></p>
                    <p><label>Заголовок:</label></p>
                    <p><input type="text" value="<?php echo $article["Article"]["name"];?>" name="name"></p>
                    <p>Опис</p>
                    <textarea class="comments-create" name="description"><?php echo $article["Article"]["description"];?></textarea>
                    <input class="btn btn-success" type="submit" value="Save">
                </form>
        </div>
            
    </div>
</div>