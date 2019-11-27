## Laravel Blog-Example
###Main tasks

- Demonstrate CRUD (Create, Read, Update, Delete) operations. Implement an option to add, read, edit and delete an item
- Create a simple user registration system - functional register/sign up and login forms
- Demonstrate the concept of AJAX with PHP. Implement the functionality for the user to be able to fetch content from the back-end server asynchronously, without a page refresh

##Installation guide

Clone the project from the GitHub repository:
```
git clone https://github.com/zlatangoralija/blog-example.git
```
Install composer: 
```
composer install
```
Instal npm: 
```
npm install 
```

Copy the .env file and set up your local variables: 
```
cp .env.example .env
```
Compile the project assets:
```
npm run dev
```
Run migrations: 
```
php artisan migrate
```
Run seeders: 
```
php artisan db:seed
```
Generate the application key
```
php artisan key:generate
```
After everything is done, serve the application and log in as an admin: 
```
php artisan serve
```

##Login information
```
email: admin@mail.com
password: 123456 
```

##Main features
- Login and register
- CRUD operations for users, blog, news, and blog categories, 
- AJAX image upload through dropzone
- Image manipulation through Image\Intervention package 
- AJAX search on users, news, and blogs thorugh vue.js templates
- Admin notifications through Event and Lister
- AJAX read and mark notification as read

##Author
Zlatan Goralija @ zlatangoralija@yahoo.com
