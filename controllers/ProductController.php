<?php


namespace App\Controllers;


use App\Config\App;
use App\Controllers\Traits\Helper;

class ProductController
{
    use Helper;

    public function index()
    {
        $products = App::get('database')->selectAll('products');

        header('Content-Type: application/json');

        echo json_encode($products);
    }

    public function store()
    {
        $products = $this
            ->filterSpecialChar((array) json_decode(file_get_contents('php://input'), TRUE));

        $create = App::get('database')->insert('products', $products);

        echo json_encode("Product has been insert successfully");
    }

    public function show()
    {
        $product_id = $this
            ->filterSpecialChar((array) json_decode(file_get_contents('php://input'), TRUE));

        $product = App::get('database')->select('products', $product_id);

        header('Content-Type: application/json');

        echo json_encode($product);
    }

    public function update()
    {
        $products = $this
            ->filterSpecialChar((array) json_decode(file_get_contents('php://input'), TRUE));

        $query = 'UPDATE products SET name=:name, sku=:sku, description=:description, category_id=:category_id, price=:price, image=:image WHERE id=:id';

        $update = App::get('database')->query($query, $products);

        echo json_encode("Product has been updated successfully");
    }

    public function delete()
    {
        $product = $this
            ->filterSpecialChar((array) json_decode(file_get_contents('php://input'), TRUE));
        $query = 'DELETE FROM products WHERE id=:id';

        $delete = App::get('database')->query($query, $product);

        echo json_encode("Product has been deleted successfully");
    }
}


