<?php
function DeleteCategorie($categorie, $bdd)
{
    $reponseQuery = $bdd->exec("call delete_category('".$categorie."', @z)");
    return $reponseQuery;
}

function DeleteArticle($article, $bdd)
{
    $reponseQuery = $bdd->exec("call delete_article('".$article."')");
    return $reponseQuery;
}

function DeleteCategoryArticle($article, $bdd)
{
    $reponseQuery = $bdd->exec("call delete_category_article('".$article."')");
    return $reponseQuery;
}

function DeleteSection($section, $bdd)
{
    $reponseQuery = $bdd->exec("call delete_section('".$section."')");
    return $reponseQuery;
}

function GetArticles($category, $bdd)
{
    $reponseQuery = $bdd->query("call get_articles('".$category."')");
    return $reponseQuery;
}

function GetCategories($bdd)
{
    $reponseQuery = $bdd->query("call get_categories()");
    return $reponseQuery;
}

function GetSection($article, $bdd)
{
    $reponseQuery = $bdd->query("call get_sections('".$article."')");
    return $reponseQuery;
}

function GetSubCategories($category, $bdd)
{
    $reponseQuery = $bdd->query("call get_subcategories('".$category."')");
    return $reponseQuery;
}

function InsertArticle($title, $bdd)
{
    $reponseQuery = $bdd->exec("call insert_article('".$title."')");
    return $reponseQuery;
}

function InsertCategory($category, $name, $iconPath, $bdd)
{
    $reponseQuery = $bdd->exec("call insert_category('".$category."', '".$name."', '".$iconPath."')");
    return $reponseQuery;
}

function InsertCategoryArticle($article, $category, $bdd)
{
    $reponseQuery = $bdd->exec("call insert_category_article('".$category."', '".$article."')");
    return $reponseQuery;
}

function InsertSection($section, $order, $title, $body, $bdd)
{
    $reponseQuery = $bdd->exec("call insert_section('".$section."', '".$order."', '".$title."', '".$body."')");
    return $reponseQuery;
}

function UpdateArticle($article, $title, $bdd)
{
    $reponseQuery = $bdd->exec("call update_article('".$article.", ".$title."')");
    return $reponseQuery;
}

function UpdateCategory($category, $parentCategory, $name, $iconPath, $bdd)
{
    $reponseQuery = $bdd->exec("call update_category('".$category.", ".$parentCategory.", ".$name.", ".$iconPath."')");
    return $reponseQuery;
}

function UpdateSection($section, $parentArticle, $order, $title, $body, $bdd)
{
    $reponseQuery = $bdd->exec("call update_section('".$section."', '".$parentArticle."', '".$order."', '".$title."', '".$body."')");
    return $reponseQuery;
}

function GetUser($username, $bdd)
{
    $reponseQuery = $bdd->query("call get_user('".$username."')");
    return $reponseQuery;
}