<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Category.php';
class CategoryRepository extends Repository
{
    public function getAllCategories() {
        $stmt = $this->database->connect()->prepare("SELECT * FROM categories");
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($categories as $category) {
            $result[] = new Category($category['id'], $category['name'], $category['description']);
        }
        return $result;
    }

    public function getCategoryById($categoryId) {
        $stmt = $this->database->connect()->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Category($category['id'], $category['name'], $category['description']);
    }
}