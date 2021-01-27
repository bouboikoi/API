<?php

require_once __DIR__ .'/../model/DAO/UsersDAO.php';
require_once __DIR__ .'/../model/DAO/ArticlesDAO.php';
require_once __DIR__ .'/../model/DAO/DAO.php';

class MainController
{

    private $user;

    public function __construct(){
        
        header('Content-Type: application/json');

        if (isset($_GET['token'])){
            $this->user = (new UsersDAO)->findByToken($_GET['token']);
            if (!$this->user){
                echo json_encode(["status" => "ko", 'message' => "Le token est incorrect."]);
                die;
            }
        } else {
            $this->user = null;
            echo json_encode(["status" => "ko", 'message' => "Le token n'a pas été saisi."]);
            die;
        }
    }

    public function getAllArticles($query, $page, $pageSize){

        if ($_GET['token'] === DAO::ADMIN){
            $allArticles = (new ArticlesDAO())->findAll($query, $page, $pageSize, true);
        }else {
            $allArticles = (new ArticlesDAO())->findAll($query, $page, $pageSize);
        }
        echo json_encode($allArticles, JSON_PRETTY_PRINT);
    }

    public function getOneArticle($id){

        if ($_GET['token'] === DAO::ADMIN){
            $article =  (new ArticlesDAO())->find($id, true, true);
        }else {
            $article =  (new ArticlesDAO())->find($id);
        }

        if ($article) {
            echo json_encode($article, JSON_PRETTY_PRINT);
        } else {
            echo json_encode(["status" => "ko", 'message' => "Cet article n'existe pas"]);
        }
    }

    public function getOneUser($id) {

        if ($_GET['token'] === DAO::ADMIN){
            $user =  (new UsersDAO())->find($id, true, true);
        } else {
            $user = (new UsersDAO())->find($id);
        }

        if ($user) {
            echo json_encode($user, JSON_PRETTY_PRINT);
        } else {
            echo json_encode(["status" => "ko", 'message' => "Cet utilisateur n'existe pas"]);
        }
    }

    public function getAllUsers($name) {

        if ($_GET['token'] === DAO::ADMIN){
            $allUsers = (new UsersDAO())->findAll($name, true);
        } else{
            $allUsers = (new UsersDAO())->findAll($name);
        }

        echo json_encode($allUsers, JSON_PRETTY_PRINT);
    }

    public function addUser()
    {
        $_POST = json_decode(file_get_contents("php://input"), true);

        if ($this->user !== NULL && $_GET['token'] === DAO::ADMIN) {
            $user = new Users($_POST['lastname'], $_POST['firstname'], $_POST['pseudo']);
            $user->setToken((new UsersDAO())->generateToken());

            $newUser = (new UsersDAO())->create($user);

            if ($newUser){
                echo json_encode(["status" => "ok", 'message' => "L'utilisateur a bien été ajouté", 'token' => "Votre token est : " . $user->getToken()]);
            } else {
                echo json_encode(["status" => "ko", 'message' => "L'utilisateur n'a pas pu être ajouté"]);
            }
        } else { 
            echo json_encode(["status" => "ko", 'message' => "Vous n'avez pas les droits pour effectuer cette requête"]);
        }
    }

    public function addArticle()
    {

        $_POST = json_decode(file_get_contents("php://input"), true);

        if ($this->user !== NULL){
            $article = new Articles($_POST['title'], $_POST['content'], $this->user);

            $newArticle = (new ArticlesDAO)->create($article);

            if ($newArticle){
                echo json_encode(["status" => "ok", 'message' => "L'article a bien été ajouté"]);
            } else {
                echo json_encode(["status" => "ko", 'message' => "L'article n'a pas pu être ajouté"]);
            }
        }
    }

    public function updateUser($idUser) {
        if ($this->user !== NULL){
            $_PUT = json_decode(file_get_contents("php://input"), true);
            $lastname = $_PUT['lastname'];
            $firstname = $_PUT['firstname'];
            $pseudo = $_PUT['pseudo'];

            if ($_GET['token'] === DAO::ADMIN){
                $userChoose = (new UsersDAO)->find($idUser, false);
                $userChoose->setLastname($lastname);
                $userChoose->setFirstname($firstname);
                $userChoose->setPseudo($pseudo);
                $update = (new UsersDAO)->update($userChoose);

                if ($update){
                    echo json_encode(["status" => "ok", 'message' => "L'utilisateur a bien été mis à jour"]);
                } else {
                    echo json_encode(["status" => "ko", 'message' => "L'utilisateur n'a pas pu être mis à jour"]);
                }

            } else {
                $this->user->setLastname($lastname);
                $this->user->setFirstname($firstname);
                $this->user->setPseudo($pseudo);
                $update = (new UsersDAO)->update($this->user);

                if ($update && $idUser === $this->user->getId()){
                    echo json_encode(["status" => "ok", 'message' => "L'utilisateur a bien été mis à jour"]);
                } else {
                    echo json_encode(["status" => "ko", 'message' => "L'utilisateur n'a pas pu être mis à jour"]);
                }
            }
        } else {
            echo json_encode(["status" => "ko", 'message' => "L'utilisateur n'a pas pu être mis à jour"]);
        }
    }

    public function updateArticle($idArticle) {
        if ($this->user !== NULL){
            $_PUT = json_decode(file_get_contents("php://input"), true);
            $title = $_PUT['title'];
            $content = $_PUT['content'];

            $article = (new ArticlesDAO)->find($idArticle);
            
            $newArticle = new Articles($title, $content, $this->user);
            $newArticle->setId($article['id']);
            
            $update = (new ArticlesDAO)->update($newArticle);

            if ($_GET['token'] === DAO::ADMIN){
                if ($update) {
                    echo json_encode(["status" => "ok", 'message' => "L'article a bien été mis à jour"]);
                } else {              
                    echo json_encode(["status" => "ko", 'message' => "L'article n'a pas pu être mis à jour"]);
                }
            } else {
                if ($update && $article['created_by']['id'] === $this->user->getId()) {
                    echo json_encode(["status" => "ok", 'message' => "L'article a bien été mis à jour"]);
                } else {              
                    echo json_encode(["status" => "ko", 'message' => "L'article n'a pas pu être mis à jour"]);
                }
            }

        } else {              
            echo json_encode(["status" => "ko", 'message' => "L'article n'a pas pu être mis à jour"]);
        }
    }

    public function deleteUser($idUser) {
        
        if ($_GET['token'] === DAO::ADMIN){
            $userChoose = (new UsersDAO)->find($idUser, false);
            $delete = (new UsersDAO)->delete($userChoose);
            if ($delete){
                echo json_encode(["status" => "ok", 'message' => "L'utilisateur a bien été supprimé"]);
            } else {
                echo json_encode(["status" => "ko", 'message' => "L'utilisateur n'a pas pu être supprimé"]);
            }
        } else {
            $delete = (new UsersDAO)->delete($this->user);
            if ($delete && $idUser === $this->user->getId()){
                echo json_encode(["status" => "ok", 'message' => "L'utilisateur a bien été supprimé"]);
            } else {
                echo json_encode(["status" => "ko", 'message' => "L'utilisateur n'a pas pu être supprimé"]);
            }
        }
    }

    public function deleteArticle($idArticle) {

        $article = (new ArticlesDAO)->find($idArticle);
        $newArticle = new Articles($article['title'], $article['content'], $this->user);
        $newArticle->setId($article['id']);

        $delete = (new ArticlesDAO)->delete($newArticle);
        
        if ($_GET['token'] === DAO::ADMIN){
            if ($delete){
                echo json_encode(["status" => "ok", 'message' => "L'article a bien été supprimé"]);
            } else {
                echo json_encode(["status" => "ko", 'message' => "L'article n'a pas pu être supprimé"]);
            }
        } else {
            if ($delete && $article['created_by']['id'] === $this->user->getId()){
                echo json_encode(["status" => "ok", 'message' => "L'article a bien été supprimé"]);
            } else {
                echo json_encode(["status" => "ko", 'message' => "L'article n'a pas pu être supprimé"]);
            } 
        }
        
    }

    public function redirectToArticleOrUser($token)
    {
        echo json_encode([
            "status" => "ok",
            'redirect' => [
                "article" => $_SESSION['path'].$token."/article",
                "user" => $_SESSION['path'].$token."/user"
            ]
        ]);
    }
}