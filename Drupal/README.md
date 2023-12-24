# Установка Drupal 10 на Docker

``` shell
docker pull mysql
docker pull phpmyadmin
docker pull drupal

docker run -d --name MysqlClient -e MYSQL_ROOT_PASSWORD=drupal mysql
docker run --name phpmyadmin -d --link MysqlClient:db -p 8081:80 phpmyadmin
docker run -d --name drupal --link MysqlClient -p 8082:80 -e MYSQL_USER:root -e MYSQL_PASSWORD:drupal drupal
```

[![Database Creation](https://i.postimg.cc/bvGt4SzG/photo-2023-12-24-10-31-34.jpg)](https://postimg.cc/67Xqv34w)

[![Drupal Installation](https://i.postimg.cc/85Qj3yK3/photo-2023-12-24-10-31-35.jpg)](https://postimg.cc/Ty0d5cXq)
