<?php

require_once __DIR__ .'/../entities/Users.php';
require_once __DIR__ .'/../../config/DbConnect.php';
require_once __DIR__ .'/../../model/DAO/ArticlesDAO.php';
require_once __DIR__ .'/../../model/DAO/DAO.php';

class UsersDAO extends DAO
{
    private $pdo;

    public function __construct(){
        $this->pdo = (new DbConnect())->connect();
    }

    public function find($id, $array = true, $admin = false)
    {
        $results = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $results->execute([":id" => $id]);
        $userArray = $results->fetch(PDO::FETCH_ASSOC);

        if ($userArray){
            if ($array){
                return $this->createObject($userArray, "Users", $admin)->toArray();
            }
            return $this->createObject($userArray, "Users", $admin);
        }
        return false;
    }

    public function findAll($name, $admin = false)
    {
        $results = $this->pdo->prepare("SELECT * FROM users WHERE firstname like :name");
        $results->execute([':name' => "%".$name."%"]);

        $newUsers = [];
        foreach($results->fetchAll() as $user){
            $user['articles'] = (new ArticlesDAO())->findArticlesLink($user['id']);
            $userObject = $this->createObject($user, "Users", $admin);
            if (!$admin){
                $userObject->setPseudo(null);
                $userObject->setToken(null);
                $userObject->setCreatedAt(null);
            }
            $newUsers[] = $userObject->toArray();
        }
        return $newUsers;
    }

    public function findByToken($token)
    {
        $results = $this->pdo->prepare("SELECT * FROM users WHERE token = :token");
        $results->execute([":token" => $token]);

        $userArray = $results->fetch();

        return $userArray ? $this->createObject($userArray, "Users") : null;
    }

    public function create(Users $user) : bool
    {
        $results = $this->pdo->prepare("INSERT INTO users (lastname, firstname, pseudo, created_at, token) VALUES (:lastname, :firstname, :pseudo, :created_at, :token)");
        if ($results->execute([
            ":lastname" => $user->getLastname(),
            ":firstname" => $user->getFirstname(),
            ":pseudo" => $user->getPseudo(),
            ":created_at" => date('Y-m-d H:i:s'),
            ":token" => $user->getToken(),
        ])){
            return true;
        }
        return false;
    }

    public function update(Users $user) : bool
    {
        $results = $this->pdo->prepare("UPDATE users SET lastname = :lastname, firstname = :firstname, pseudo = :pseudo WHERE id = :id");
        if ($results->execute([
            ":id" => $user->getId(),
            ":lastname" => $user->getLastname(),
            ":firstname" => $user->getFirstname(),
            ":pseudo" => $user->getPseudo(),
        ])){
            return true;
        }
        return false;
    }

    public function delete(Users $user) : bool
    {
        $results = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        if ($results->execute([":id" => $user->getId()])){
            return true;
        }
        return false;
    }
}