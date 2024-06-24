<?php

namespace repository;
include(__DIR__ . '/../models/Post.php');

use models\Post;

class PostRepository extends Post
{

    function getALlPerCategory($category)
    {
        $stmt = $this->dbConnection->prepare("SELECT * FROM post WHERE category = :category ORDER BY created_at DESC");
        $stmt->execute([':category' => $category]);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

}