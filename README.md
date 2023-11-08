# Products API
Simple products api based on contributte/apitte-skeleton

## How to install
Install with [docker compose](https://github.com/docker/compose)

1) Clone repository

2) Run `composer install`

3) Modify `config/local.neon` if needed

4) Run `docker-compose build`

5) Run `docker-compose up`

6) Open http://localhost/index.html for Swagger UI

  - sample database data provided in `/.docker/build/database/sample-data.sql`

## Additional info
### Public API endpoints
- [GET] http://localhost/api/public/v1/products - list of products
- [GET] http://localhost/api/public/v1/products/{id} - product detail
- [POST] http://localhost/api/public/v1/products/create - create new product
- [PUT] http://localhost/api/public/v1/products/update/{id} - update product
- [DELETE] http://localhost/api/public/v1/products/delete/{id} - delete product

### Secured API endpoints
- API access token is received from table `user` in database
- [GET] http://localhost/api/v1/products?_access_token={TOKEN} - secured list of products
  - Token can also be passed with `X-Token` header

### Features
- It's possible to limit number of products by `limit` and `offset` parameters, default `limit=10` and `offset=0`
  - e.g. http://localhost/api/public/v1/products?limit=10&offset=0


- It's possible to filter products by `name`, `minPrice` and `maxPrice` parameters
  - e.g. http://localhost/api/public/v1/products?name=Product&minPrice=1000&maxPrice=2000

### Tests
- Run `docker-compose exec php vendor/bin/tester .`
