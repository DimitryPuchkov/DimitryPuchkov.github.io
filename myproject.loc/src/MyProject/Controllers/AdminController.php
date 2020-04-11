<?php


namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Exceptions\Forbidden;
use MyProject\Exceptions\UnauthorizedException;

class AdminController extends AbstractController
{
    public function admin(){
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if (!$this->user->isAdmin()){
            throw new Forbidden();
        }
        $articles = Article::findAll();
        $articles = array_reverse($articles);
        $this->view->renderHtml('admin/admin.php', ['articles'=>$articles]);
    }
    public function aboutMe(){
        $this->view->renderHtml('admin/about.php');
    }

}