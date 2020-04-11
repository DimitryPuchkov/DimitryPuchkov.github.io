<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Services\UsersAuthService;
use MyProject\View\View;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\Forbidden;
use MyProject\Models\Articles\Comment;

class ArticlesController    extends AbstractController
{


    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }
        $comments= Comment::findByArticleId($articleId);
        if ($this->user){
            $isAdmin = $this->user->isAdmin();
            $user = $this->user;
        }


        $this->view->renderHtml('articles/view.php', [
        'article' => $article,
        'comments'=> $comments,
        'user'    =>$user,
        'isAdmin' =>$isAdmin
    ]);
    }

    public function edit(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if (!$this->user->isAdmin()){
            throw new Forbidden();
        }

        if (!empty($_POST)) {
            try {
                $article->updateFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/edit.php', ['error' => $e->getMessage(), 'article' => $article]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
    }

    public function add(): void
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if (!$this->user->isAdmin()){
            throw new Forbidden();
        }

        if (!empty($_POST)) {
            try {
                $article = Article::createFromArray($_POST, $this->user);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/add.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/add.php');
    }
    public function comments(int $articleId) :void
    {

        if (!empty($_POST)){
            try {
                $comment = Comment::createComment($_POST, $this->user, $articleId );
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/view.php', ['error' => $e->getMessage()]);
                return;
            }
            header('Location: /articles/' . $comment->getArticleId().'#comment'.$comment->getId(), true, 302);
        }
    }
}