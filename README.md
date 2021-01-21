# ShoppingCart
## How to execute after the Clone
### Controllers---->```app/Http/Controllers```
### Respositories--->```app/repositories```
### Services ---->```app/services```
### Recources API --->```app/Http/Resources```
### Routes---->```routes/api.php```
### TAX Config File ---->```config/tax.php```
   * checkout database connection
   * ```php artisan migrate:refresh --seed```
   * GET ```api/carts/cart12345``` get cartd that has cart_id=cart12345
   * POST ```api/carts/cart12345``` add item , you should use product id exist in the database(checkout CartSeeder)
   * PUT ```api/carts/cart12345``` Edit item
   * DELETE ```api/carts/cart12345```  DELETE Item
   * POST ```api/carts/cart12345/discount``` add dicount to cart 
