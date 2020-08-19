# galery.ru

## Необходимый стек
- PHP 7.x
- Postgres 11
- Apache

## Установка
```
psql postgres < dumpBD
```

##RBAC
```
4 Основных роли
  admin - имеет полный функционал сайта
  content-manager - может создавать статьи 
  user - обычный пользователь
  ban - заблокирован
```
