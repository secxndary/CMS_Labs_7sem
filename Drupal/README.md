# Установка Drupal 10 на Docker

``` shell
docker pull mysql
docker pull phpmyadmin
docker pull drupal

docker run -d --name MysqlClient -e MYSQL_ROOT_PASSWORD=drupal mysql
docker run --name phpmyadmin -d --link MysqlClient:db -p 8081:80 phpmyadmin
docker run -d --name drupal --link MysqlClient -p 8082:80 -e MYSQL_USER:root -e MYSQL_PASSWORD:drupal drupal
```

![image](https://postimg.cc/67Xqv34w)

![image](https://postimg.cc/Ty0d5cXq)