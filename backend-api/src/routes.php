<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/basicTitle[/{offset}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("
        SELECT id, primaryTitle 
        FROM titles
        ORDER BY primaryTitle
        LIMIT 1
        OFFSET 1 * :offset;");

    $offset = $args['offset'] ? $args['offset'] : '0';
    $sth->bindParam('offset', $offset);

    $sth->execute();
    return $this->response->withJson($sth->fetchAll());
});

$app->get('/fullTitle/{id}', function($request, $response, $args) {
    $sth = $this->db->prepare("
        SELECT *
        FROM titles
        WHERE id = :id;");

    $sth->bindParam('id', $args['id']);

    $sth->execute();
    return $this->response->withJson($sth->fetchAll());
});

$app->get('/search/{searchString}[/{pageNum}]', function($request, $response, $args) {
    $sth = $this->db->prepare("
        SELECT id, primaryTitle
        FROM titles
        WHERE primaryTitle ILIKE :searchString
        LIMIT 10
        OFFSET 10 * :pageNum;");

    $searchString = $args['searchString'] . '%';
    $sth->bindParam('searchString', $searchString);

    $pageNum = $args['pageNum'] ? $args['pageNum'] : '0';
    $sth->bindParam('pageNum', $pageNum);

    $sth->execute();
    return $this->response->withJson($sth->fetchAll());
});

// Catch-all route to serve a 404 Not Found page if none of the routes match
// NOTE: make sure this route is defined last
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
    return $handler($req, $res);
});
