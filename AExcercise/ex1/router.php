<?php

use App\Controller\ProductController;

require __DIR__ . '/vendor/autoload.php';

$page = $_REQUEST['page'] ?? null;
$action = $_REQUEST['action'] ?? null;

$productController = new ProductController();

switch ($page) {
    case 'product.json':
        switch ($action) {
            case 'list':
                $productController->index();
                break;
            case 'add':
                $productController->add();
                break;
            case 'update':
                $productController->update();
                break;
            case 'delete':
                $productController->delete();
                break;
            case 'search':
                $productController->search();
                break;
        }
}