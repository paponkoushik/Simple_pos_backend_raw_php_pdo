#### Note: All API's link start with domain of your apps 
#### Get all products API and resource: 
Products url(Get request):  ```your-domain/products```

Example: 
```
url: http://localhost:8088/products

[
    {
        "id": "3",
        "name": "Shirt",
        "sku": "123vfd",
        "description": "somthing",
        "category_id": "1",
        "price": "14",
        "image": null
    },
    {
        "id": "6",
        "name": "Shirt",
        "sku": "cf vds",
        "description": "",
        "category_id": "1",
        "price": "14",
        "image": null
    }
]
```
#### Store A product API:
Store product url(post request):  ```your-domain/product/store```

Example:
```
url: http://localhost:8088/product/store

{
    "name": "Shirt",
    "sku": "cf@vngfnbfgds",
    "description":"",
    "category_id": "1",
    "price": "14",
    "image": ''
}
```
Use header content:
```
'Content-Type': 'multipart/form-data',
'Accept': 'application/json',
```
#### For update a product need to get specific product data
Get product data url (post request): ```your-doamin/product/show```

Example:
```
url: http://localhost:8088/product/store

{
    "id" : "1"
}
```

Response: 
```
{
    "id" : "1"
    "name": "Shirt",
    "sku": "cf@vngfnbfgds",
    "description":"",
    "category_id": "1",
    "price": "14",
    "image": ''
}
```
### Update product API:
Update product data url (post request) : ```your-doamin/product/update```
Must provide `product` `id`.

Example: 
```
url: http://localhost:8088/product/update
{
    "id" : "8",
    "name": "Shirt checke",
    "sku": "bnrjiv",
    "description":"bzdf",
    "category_id": "2",
    "price": "14",
    "image": ""
}
```

### Delete product API:
Delete product data url (post request): ```your-doamin/product/delete```
Must provide ``product`` ``id``

Example:
```
{
    "id" : "3"
}
```

### Get categories API:
Get all categories for products url (get request): ```your-doamin/categories```

Response example:
```
[
    {
        "id" : "1",
        "name" : "Men"
    },
    {
        "id" : "2",
        "name" : "Women"
    }
    {
        "id" : "3",
        "name" : "Kids"
    }
]
```
