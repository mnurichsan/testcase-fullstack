# Preview test case fullstack

## Mockup
![Mockup](/public/img/mockup.png)

## Admin
![Admin](/public/img/admin.png)


# Dokumen Teknis Test Case 
- Terdapat juga dokumen word di project dokumenteknis.docs

## ERD
![ERD](/public/img/erd.png)

## DML

### Category
- Insert : INSERT INTO categories (id,name,created_at,updated_at) values ('1', 'Pro', '','');
- Update : UPDATE categories name = 'Pro' where id='1';
- Delete : DELETE FROM categories WHERE id='1';
- Select : SELECT * FROM categories;

### Product
- Insert : INSERT INTO products (id,name,price,image,description,category_id,created_at,updated_at) values ('1', '','' ,'','','','');
- Update : UPDATE products price = '100000' where id='1';
- Delete : DELETE FROM products WHERE id='1';
- Select : SELECT * FROM products;

## Activity Diagram

### Login Activity
![Login](/public/img/login.png)

### Category Activity
![Category](/public/img/category.png)

### Product Activity
![Product](/public/img/product.png)

## Use Case
![Use Case](/public/img/usecase.png)

### User Login From Seeder
- Email : admin@majoo.id
- Password : password

## Requirements

### PHP
- Recomended PHP version ^8

### Jquery
- Jquery version 3.5.1

### Bootstrap
- Bootstrap version 5

### Composer
- Recomended Composer version ^2.0

### Database
- Mysql

### Third Party
- Yajra Datatables
- Sweetalert Laravel
- Laravel UI
- Filepond Upload
- CKeditor

## Installation & Update

Install php dependencies
``` bash
composer install
```

Make .env
```bash
cp .env.example .env
```

Generate app key
```bash
php artisan key:generate
```

Configure DB on .env
```bash
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations
```bash
php artisan migrate
```

Create symbolic link from public/storage to storage/app/public
```bash
php artisan storage:link
```

Publish Package Third Party
```bash
php artisan vendor:publish
```

### For development purpose (Optional)

Run fresh migrations with seeds
```bash
php artisan migrate:fresh --seed
```

### This step is required in every deployment

Run migrations
```bash
php artisan migrate
```

Sync versioning on .env
```bash
APP_VERSION=x.x.x
```

Clear/optimize system
```bash
php artisan optimize:clear
```

## Run Server

Run server
```bash
php artisan serve
```