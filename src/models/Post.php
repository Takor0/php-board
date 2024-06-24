<?php

namespace models;
include __DIR__ . '/Model.php';

class Post extends Model
{

    private int $id;

    private string $createdAt;

    private string $content;
    private string $category;
    private string $author;


}