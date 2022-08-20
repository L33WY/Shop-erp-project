##Project local set up steps:
- cd ./docker
- docker compose up -d
- docker exec shop_erp_app composer install
- docker inspect shop_erp_db
- Copy IpAddress value from docker_shop_erp_web to app/.env (replace ip at database connection)

![img.png](docker/web-ip-img.png)
