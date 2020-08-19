# galery.ru
```
  http://167.71.7.3
```

## Цель проекта
```
Разработать проект, который будет содержать основной функционал: 
  работа с изображениями
  работа с постами
  работа с пользователями
Создать роли пользователй
Создать админ панель для управления сайтом

Выгрузить проект на репозиторий
```

## Необходимый стек
- PHP 7.x
- Postgres 11
- Apache

## Установка
```
psql postgres < dumpBD
```

## RBAC
```
  4 Основных роли
  admin - имеет полный функционал сайта
  content-manager - может создавать статьи 
  user - обычный пользователь
  ban - заблокирован
```
## Оснонвые возможности
  Главная страница: просмотр всех изображений
    Адрес: http://167.71.7.3
  
  Вход/Зарегестрироваться
  
  Вкладка новости: простр всех новостей
  ![](https://github.com/igorezov17/galery.ru/blob/master/docs/x50hXOhRVWc.jpg)
  
  Вкладка усправление
    - Загрузка картинки
    - Моя галерея
   ![](https://github.com/igorezov17/galery.ru/blob/master/docs/hVkrKAX-dUc.jpg)
    
  Вкладка профиль
    - Основная иформация о пользователе
    ![](https://github.com/igorezov17/galery.ru/blob/master/docs/3io0lGXsXJ4.jpg)
    - Изменение пароля
    ![](https://github.com/igorezov17/galery.ru/blob/master/docs/err__1AAT4Y.jpg)
    - Изменение пароля
    
  Выход (Для авторизированного пользователя)


## Админ панель
  доступна только пользователям с ролями "admin" и "content-manager"
  http://167.71.7.3/admin
  
  Список всех пользователей
  ![](https://github.com/igorezov17/galery.ru/blob/master/docs/7KAmooPWWw8.jpg)
  
    Список всех изображений
  ![](https://github.com/igorezov17/galery.ru/blob/master/docs/FsYYGm996mY.jpg)
  
      Список всех постов
  ![](https://github.com/igorezov17/galery.ru/blob/master/docs/KONcXNVBc4E.jpg)

