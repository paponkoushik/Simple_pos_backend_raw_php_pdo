<?php


namespace App\Controllers\Traits;


use App\Config\App;

trait ProductHelper
{
    public function getData($post): array
    {
        return [
            'name' => $post['name'],
            'sku' => $post['sku'],
            'description' => $post['description'],
            'category_id' => $post['category_id'],
            'price' => $post['price'],
            'image' => null,
        ];
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