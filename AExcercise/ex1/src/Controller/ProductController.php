<?php

namespace App\Controller;

use App\Model\ProductModel;
use App\Model\Product;

class ProductController
{
    public $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    function index()
    {
        $products = $this->productModel->getAll();
        include 'src/View/list.php';
    }

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'src/View/add.php';
        } else {
            $product = new Product($_POST);
            $this->productModel->add($product);
            header('Location:index.php?page=product.json&action=list');
        }
    }

    function error()
    {
        $error = [];
        $fields = ['name', 'price'];
        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                $error[$field] = 'must have value';
            }
        }
    }

    function update()
    {
        $errors = [];
        $fields = ['name', 'price'];

        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                $errors[$field] = "can't be null";
            }
        }

        $id = $_GET['id'];
        if (empty($errors)) {
            $product = new Product($_POST);
            $this->productModel->update($id, $product);
            header("location: index.php?page=product.json&action=list");
        } else {
            $product = $this->productModel->get($id);
            include 'src/View/update.php';
        }
    }

    function delete()
    {
        $id = $_GET['id'];
        $this->productModel->delete($id);
        header('Location:index.php?page=product.json&action=list');
    }

    function search()
    {
        //var_dump('in');die();
        $search = $_GET['search'];
        //var_dump($search);die();
        $product = $this->productModel->search($search);
        header('Location:index.php?page=product.json&action=list');
    }
}