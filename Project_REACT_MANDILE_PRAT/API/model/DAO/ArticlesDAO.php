<?php

require_once __DIR__ .'/../entities/Articles.php';
require_once __DIR__ .'/../entities/Users.php';
require_once __DIR__ .'/../../config/DbConnect.php';
require_once __DIR__ .'/../../model/DAO/DAO.php';

class ArticlesDAO extends DAO
{
    private $pdo;

    public function __construct(){
        $this->pdo = (new DbConnect())->connect();
    }

    public function findAll($query, $page, $pageSize, $admin = false) : array
    {
        $results = $this->pdo->prepare("SELECT * FROM articles WHERE title like :query LIMIT ".(($page-1) * $pageSize).", ".$pageSize);
        $results->execute([
            ":query" => "%".$query."%",
        ]);
        
        $articles = $results->fetchAll(PDO::FETCH_ASSOC);

        $newArticles = [];
        foreach ($articles as $article){
            $resultUser = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
            $resultUser->execute([":id" => $article['created_by']]);
            $author = $resultUser->fetch(PDO::FETCH_ASSOC);

            $author['articles'] = $this->findArticlesLink($author['id']);
            $article['created_by'] = $this->createObject($author, "Users", $admin);

            $newArticles[] = $this->createObject($article, "Articles", $admin)->toArray();
        }
        return $newArticles;
    }

    public function find($id, $array = true, $admin = false)
    {
        $results = $this->pdo->prepare("SELECT * FROM articles WHERE id = :id");
        $results->execute([":id" => $id]);
        $article = $results->fetch();

        if ($article){
            $resultUser = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
            $resultUser->execute([":id" => $article['created_by']]);
            $author = $resultUser->fetch();

            //$author['articles'] = $this->findArticlesLink($author['id'], "article");
            $article['created_by'] = $this->createObject($author, "Users", $admin);

            $articleObject = $this->createObject($article, "Articles", $admin);

            return $array ? $articleObject->toArray() : $articleObject;
        }
        return false;
    }

    public function create(Articles $articles) : bool
    {
        $results = $this->pdo->prepare("INSERT INTO articles (title, content, created_by, created_at, modified_at) VALUES (:title, :content, :created_by, :created_at, :modified_at)");
        if ($results->execute([
            ":title" => $articles->getTitle(),
            ":content" => $articles->getContent(),
            ":created_by" => $articles->getCreatedBy(),
            ":created_at" => date('Y-m-d H:i:s'),
            ":modified_at" => date('Y-m-d H:i:s'),
        ])){
            return true;
        }
        return false;
    }

    public function update(Articles $articles) : bool
    {
        $results = $this->pdo->prepare("UPDATE articles SET title = :title, content = :content, modified_at = :modified_at WHERE id = :id");
        if ($results->execute([
            ":id" => $articles->getId(),
            ":title" => $articles->getTitle(),
            ":content" => $articles->getContent(),
            ":modified_at" => date('Y-m-d H:i:s'),
        ])){
            return true;
        }
        return false;
    }

    public function delete(Articles $articles) : bool
    {
        $results = $this->pdo->prepare("DELETE FROM articles WHERE id = :id");
        if ($results->execute([":id" => $articles->getId()])){
            return true;
        }
        return false;
    }

    public function findArticlesByUser($id) : array
    {
        $results = $this->pdo->prepare("SELECT * FROM articles WHERE created_by = :id");
        $results->execute([':id' => $id]);
        $articles = $results->fetchAll(PDO::FETCH_ASSOC);

        $newArticles = [];
        foreach ($articles as $article){
            $resultUser = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
            $resultUser->execute([":id" => $article['created_by']]);

            $article['created_by'] = $resultUser->fetch(PDO::FETCH_ASSOC);
            $newArticles[] = $article;
        }

        return $newArticles;
    }

    public function findArticlesLink($id)
    {
        $articlesForOneUser = $this->findArticlesByUser($id);

        $articles = [];
        foreach($articlesForOneUser as $article){
            $articles[] = $_SESSION['path'].$article['created_by']['token']."/article/".$article['id'];
        }

        return $articles;
    }
}