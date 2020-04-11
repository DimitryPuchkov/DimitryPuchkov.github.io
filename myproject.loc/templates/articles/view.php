<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
    <?
        if($isAdmin){
           echo '<a href="http://myproject.loc/articles/'.$article->getId().'/edit">Редактировать</a>';
     }
    ?>
    <hr>
    <p>
        Комментарии:
        <?= $article->getId()?>
        <?php
        foreach ($comments as $comment){?>
            <a name="comment<?=$comment->getId()?>"></a>
            <p class="comment">
                <span class="comment__user"><?=$comment->getUser()->getNickname()?></span>
                <? echo  $comment->getText(); ?>
            </p>
        <?} ?>
    </p>
    <p>
        <?php

            if($user){?>

                <form action="/articles/<?= $article->getId() ?>/comments"  method="post">

            <label for="text">Текст Комментария</label><br>
            <textarea name="text" id="text" rows="10" cols="80"></textarea><br>
            <br>
            <input type="submit" value="Ок">
            </form>

           <? }else{?>
                <p>Для того, чтобы оставить комментарий, необходимо авторизоваться</p>
                <p>
                    <a href="http://myproject.loc/users/login">Войти</a>|<a href="http://myproject.loc/users/register">Зарегистрироваться</a>
                </p>
            <?}

        ?>
    </p>


<?php include __DIR__ . '/../footer.php'; ?>