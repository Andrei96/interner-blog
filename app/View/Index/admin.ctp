<section class="admin-panel">
    <div class="wrapper">
        <h2>Панель адміністрування</h2>
        <div class="table-responsive">
            <h3>Таблиця 'Користувачi'</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Data of registration</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['User']['id'] ?></td>
                    <td><?php echo $user['User']['name'] ?></td>
                    <td><?php echo $user['User']['email'] ?></td>
                    <td><?php echo $user['User']['data'] ?></td>
                    <td>
                        <a href="/index/deleteUserById/<?php echo $user['User']['id'] ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="table-responsive">
            <h3>Таблиця 'Статті'</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Header</th>
                    <th>Data of create</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($articles as $article): ?>
                <tr>
                    <td><?php echo $article['Article']['id'] ?></td>
                    <td><?php echo $article['Article']['name'] ?></td>
                    <td><?php echo $article['Article']['data'] ?></td>
                    <td>
                        <a href="/index/deleteArticleByID/<?php echo $article['Article']['id'] ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="table-responsive">
            <h3>Таблиця 'Коментарі'</h3>

            <table class="table">
                <thead>
                <tr>
                    <th>Article_ID</th>
                    <th>Comment</th>
                    <th>User_name</th>
                    <th>Data</th>
                    <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?php echo $comment['Comment']['id'] ?></td>
                    <td><?php echo $comment['Comment']['comment'] ?></td>
                    <td><?php echo $comment['User']['name'] ?></td>
                    <td><?php echo $comment['Comment']['data'] ?></td>
                    <td>
                        <a href="/index/deleteCommentByID/<?php echo $comment['Comment']['id'] ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</section>
