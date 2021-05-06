<?php

$title = str_replace(' ', '+', $_GET['title']);
$film = '';

$getAPI = file_get_contents('https://www.omdbapi.com/?apikey=36bcaa6b&s=' . $title);
$data = json_decode($getAPI, true);

if ($data["Response"] === 'True') {
    $film = "ada";
    $data = $data['Search'];
}
