<?php


namespace App\Controllers;


use App\Config\App;
use App\Controllers\Traits\Helper;

class ProductController
{
    use Helper;

    public function index()
    {
        $this->setHeader();

        $products = App::get('database')->selectAll('products');

        echo json_encode($products);
    }

    public function store()
    {
        $this->setHeader();

        $products = $this
            ->filterSpecialChar((array) json_decode(file_get_contents('php://input'), TRUE));

        $create = App::get('database')->insert('products', $products);

        echo json_encode("Product has been insert successfully");
    }

    public function show()
    {
        $this->setHeader();

        $product_id = $this
            ->filterSpecialChar((array) json_decode(file_get_contents('php://input'), TRUE));

        $query = "Select * from products where id=:id";

        $product = App::get('database')->query($query, $product_id, true);

        echo json_encode($product);
    }

    public function update()
    {
        $this->setHeader();

        $products = $this
            ->filterSpecialChar((array) json_decode(file_get_contents('php://input'), TRUE));

        $query = 'UPDATE products SET name=:name, sku=:sku, description=:description, category_id=:category_id, price=:price, image=:image WHERE id=:id';

        $update = App::get('database')->query($query, $products);

        echo json_encode("Product has been updated successfully");
    }

    public function delete()
    {
        $this->setHeader();

        $product = $this
            ->filterSpecialChar((array) json_decode(file_get_contents('php://input'), TRUE));

        $countQuery = "select COUNT(*) as count from orders WHERE product_id=:id";

        $count = App::get('database')->query($countQuery, $product, true);

        $this->CheckCountDelete($count, $product);

    }

    public function CheckCountDelete($count, $product)
    {
        if ($count[0]->count > 0) {
            echo json_encode("There are orders for this product, that's why you can not delete this one");
        } else {
            $query = 'DELETE FROM products WHERE id=:id';

            $delete = App::get('database')->query($query, $product);

            echo json_encode("Product has been deleted successfully");
        }
    }
}


