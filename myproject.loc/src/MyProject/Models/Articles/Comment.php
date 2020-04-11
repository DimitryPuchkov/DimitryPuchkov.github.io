<?php


namespace MyProject\Models\Articles;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Services\Db;
use MyProject\Models\Users\User;
use MyProject\Models\Articles\Article;
use MyProject\Exceptions\InvalidArgumentException;
class Comment extends ActiveRecordEntity
{
    protected $userId;
    protected $articleId;
    protected $text;
    protected $date;

    public function getText():string
    {
        return $this->text;
    }
    public function getUserId():int
    {
        return $this->userId;
    }
    public function getDate():string
    {
        return $this->date;
    }
    public function getArticleId():int
    {
        return $this->articleId;
    }
    public function setText($text): void
    {
        $this->text = $text;
    }
    public function setUserId(User $user): void
    {
        $this->userId = $user->getId();
    }
    public function setArticleId($articleId): void
    {
        $this->articleId = $articleId;
    }
    public function getUser(): User
    {
        return User::getById($this->userId);
    }
    protected static function getTableName(): string
    {
        return 'comments';
    }
    public static function findByArticleId($articleId)
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE article_id=:id;',
            [':id' => $articleId],
            static::class
        );
        return $entities;
    }
    public static function createComment(array $fields, User $user, $articleId) :Comment
    {

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст комментария');
        }
        $comment = new Comment();
        $comment->setText($fields['text']);
        $comment->setUserId($user);
        $comment->setArticleId($articleId);
        $comment->save();
        return $comment;

    }

}