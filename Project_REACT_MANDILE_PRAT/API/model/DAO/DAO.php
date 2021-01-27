<?php

require_once __DIR__ .'/../entities/Articles.php';
require_once __DIR__ .'/../entities/Users.php';

class DAO
{
    CONST ADMIN = "@dm1nt0k3n";

    public function generateToken(){
        return bin2hex(random_bytes(6));
    }

    public function createObject($array, $classname, $admin = false){
        if ($classname === "Users"){
            $user = new Users($array['lastname'], $array['firstname'], $array['pseudo']);
            $user->setId($array['id']);

            if ($admin){
                $user->setToken($array['token']);
                $user->setCreatedAt($array['created_at']);
            } else {
                $user->setPseudo(null);
            }

            if (isset($array['articles'])){
                $user->setArticles($array['articles']);
            }

            return $user;
        }

        if ($classname === "Articles"){
            $author = $array['created_by'];
            $linkAuthor = $_SESSION['path'].$_GET['token'].'/user/'.$array['created_by']->getId();
            if (!$admin){
                $author->setToken(NULL);
                $author->setCreatedAt(NULL);
                $author->setPseudo(NULL);
            }

            $articleObject = new Articles($array['title'], $array['content'], $author);
            $articleObject->setCreatedBy($linkAuthor);
            $articleObject->setCreatedAt($array['created_at']);
            $articleObject->setUpdatedAt($array['modified_at']);
            $articleObject->setId($array['id']);

            return $articleObject;
        }
        return false;
    }

}