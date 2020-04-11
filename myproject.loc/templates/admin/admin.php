<!-- шапка админки -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="/styles.css">


</head>
<body>
<h1 class="admin">
    Административная панель
</h1>
<nav class="nav-admin">
    <ul class="nav-admin__ul">
        <li class="nav-admin__list">
            <a href="#" class="nav-admin__link">Статьи</a>
        </li>
        <li class="nav-admin__list">
            <a href="#" class="nav-admin__link">Комментарии</a>
        </li>
    </ul>
</nav>
<!--/ шапка админки -->
<section class="admin-field">
    <a href="/articles/add" class="admin-add-article">
        Добавить статью
    </a>
    <ul class="admin-field__ul">
        <?
        if(count( $articles)>=5){
            $i=0;
            for($i;$i<5;$i++)
            {?>

                <li class="field">
                    <h3 class="field__title">
                        <?=$articles[$i]->getName();?>
                    </h3>
                    <p class="field__par">
                        <?=$articles[$i]->getTinyText();?>
                    </p>
                    <a href="/articles/<?= $articles[$i]->getId() ?>/edit" class="field__redaction">
                        Редактировать
                    </a>
                </li>
            <?}
        }else{
            foreach ($articles as $article)
            {?>

            <?}
        }

        ?>
<!--        <li class="field">-->
<!--            <h3 class="field__title">-->
<!--                Статья-->
<!--            </h3>-->
<!--            <p class="field__par">-->
<!--                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos perferendis, eum, dolor delectus distinctio porro, eaque neque qui cum deserunt iure, reiciendis aliquam! Debitis, qui harum suscipit doloremque delectus, repellendus?-->
<!--            </p>-->
<!--            <a href="#" class="field__redaction">-->
<!--                Редактировать-->
<!--            </a>-->
<!--        </li>-->
<!--        <li class="field">-->
<!--            <h3 class="field__title">-->
<!--                Статья-->
<!--            </h3>-->
<!--            <p class="field__par">-->
<!--                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos perferendis, eum, dolor delectus distinctio porro, eaque neque qui cum deserunt iure, reiciendis aliquam! Debitis, qui harum suscipit doloremque delectus, repellendus?-->
<!--            </p>-->
<!--            <a href="#" class="field__redaction">-->
<!--                Редактировать-->
<!--            </a>-->
<!--        </li>-->
<!--        <li class="field">-->
<!--            <h3 class="field__title">-->
<!--                Статья-->
<!--            </h3>-->
<!--            <p class="field__par">-->
<!--                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos perferendis, eum, dolor delectus distinctio porro, eaque neque qui cum deserunt iure, reiciendis aliquam! Debitis, qui harum suscipit doloremque delectus, repellendus?-->
<!--            </p>-->
<!--            <a href="#" class="field__redaction">-->
<!--                Редактировать-->
<!--            </a>-->
<!--        </li>-->
<!--        <li class="field">-->
<!--            <h3 class="field__title">-->
<!--                Статья-->
<!--            </h3>-->
<!--            <p class="field__par">-->
<!--                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos perferendis, eum, dolor delectus distinctio porro, eaque neque qui cum deserunt iure, reiciendis aliquam! Debitis, qui harum suscipit doloremque delectus, repellendus?-->
<!--            </p>-->
<!--            <a href="#" class="field__redaction">-->
<!--                Редактировать-->
<!--            </a>-->
<!--        </li>-->
    </ul>
</section>



</body>
</html>

