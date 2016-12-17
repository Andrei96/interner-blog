<?php debug($categoryes)?>
<div class="row" data-columns>
    <div>
        <a href="/articles/index/" class="btn btn-default">Back</a>
        <div class="thumbnail text-center">

            <form method="POST" action="/articles/addarticle/">
                {#<?php debug($categoryes) ?>#}
                <p><label>Додати фото(url):</label></p>
                <p><input type="text" name="photo"></p>
                <p><label>Заголовок:</label></p>
                <p><input type="text" name="name"></p>
                <p>Опис</p>
                <textarea class="comments-create" name="description"></textarea>
                {#<?php debug($categoryes )?>#}
                <select name="categoryId" id="">
                <?php foreach ($categoryes as $category): ?>
                    {#<?php debug($category)?>#}
                    <option value="<?php echo $category['Category']['id'] ?>"><?php echo $category['Category']['name'] ?></option>
                <?php endforeach; ?>
                </select>
                <input class="btn btn-success" type="submit" value="Save">
            </form>

        </div>
    </div>
</div>