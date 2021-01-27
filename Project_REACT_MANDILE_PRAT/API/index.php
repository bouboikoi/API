<?php

session_start();
require_once "controllers/MainController.php";

$request_method = $_SERVER["REQUEST_METHOD"];
$current_folder = str_replace("/index.php", "",$_SERVER['PHP_SELF']);
$request_route = str_replace($current_folder, "", $_SERVER['REQUEST_URI']);

$mainCtrl = new MainController();

$_SESSION['path'] = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']) . '/';

$title = isset($_GET['title'])? $_GET['title'] : "";
$name = isset($_GET['name'])? $_GET['name'] : "";
$page = isset($_GET['page'])? $_GET['page'] : "1";
$pageSize = isset($_GET['pageSize'])? $_GET['pageSize'] : "999999999";

switch($request_method){
    case "GET":
        if (isset($_GET['user']) && $_GET['user'] === "user"){
            if (isset($_GET['idUser'])){
                $mainCtrl->getOneUser($_GET['idUser']);
                break;
            }
            $mainCtrl->getAllUsers($name);
            break;
        }

        if (isset($_GET['article']) && $_GET['article'] === "article"){
            if (isset($_GET['idArticle'])){
                $mainCtrl->getOneArticle($_GET['idArticle']);
                break;
            }
            $mainCtrl->getAllArticles($title, $page, $pageSize);
            break;
        }

        $mainCtrl->redirectToArticleOrUser($_GET['token']);
        break;
    case "PUT" :
        if (isset($_GET['user']) && $_GET['user'] === "user" && isset($_GET['idUser'])){
            $mainCtrl->updateUser($_GET['idUser']);
            break;
        }

        if (isset($_GET['article']) && $_GET['article'] === "article" && isset($_GET['idArticle'])){
            $mainCtrl->updateArticle($_GET['idArticle']);
            break;
        }
        break;
    case "POST" :
        if (isset($_GET['user']) && $_GET['user'] === "user"){
            $mainCtrl->addUser();
            break;
        }

        if (isset($_GET['article']) && $_GET['article'] === "article"){
            $mainCtrl->addArticle();
            break;
        }
        break;
    case "DELETE" :
        if (isset($_GET['user']) && $_GET['user'] === "user" && isset($_GET['idUser'])){
            $mainCtrl->deleteUser($_GET['idUser']);
            break;
        }

        if (isset($_GET['article']) && $_GET['article'] === "article" && isset($_GET['idArticle'])){
            $mainCtrl->deleteArticle($_GET['idArticle']);
            break;
        }
        break;
    default :
        header ("HTTP/1.0 405 Method Not Allowed");
        break;
}