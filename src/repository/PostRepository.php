<?php

namespace repository;
include_once(__DIR__ . '/../models/Post.php');

use models\Post;

class PostRepository extends Post
{

    function get_all_per_category($category)
    {
        $stmt = $this->dbConnection->prepare("SELECT * FROM post WHERE category = :category ORDER BY created_at ASC");
        $stmt->execute([':category' => $category]);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    function create_post($content, $category, $author)
    {
        $stmt = $this->dbConnection->prepare("INSERT INTO post (content, category, author) VALUES (:content, :category, :author)");
        $stmt->execute([':content' => $content, ':category' => $category, ':author' => $author]);
    }

    function delete_post($id)
    {
        $stmt = $this->dbConnection->prepare("DELETE FROM post WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    function edit_post_content($id, $content)
    {
        $stmt = $this->dbConnection->prepare("UPDATE post SET content = :content WHERE id = :id");
        $stmt->execute([':content' => $content, ':id' => $id]);
    }

    function findById(int $id)
    {
        $stmt = $this->dbConnection->prepare("SELECT * FROM post WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

}