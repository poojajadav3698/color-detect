# Install color detect Package

## Step 1 :
### Create a new laravel project
```
 composer create-project --prefer-dist laravel/laravel blog_demo
 ```
## Step 2 :
#### Require this package with composer using:
•	Add in composer.json must be have you minimum-stability is dev,("minimum-stability": "dev" in composer.json)
```bash
composer require image/colordetect
```
# OR

•	Add in composer.json :(after adding, you should update your composer[ composer update ]
```bash
"require": { 
	…
	"image/colordetect": "dev-master"
}
```
## Step 3 :
### After updating composer, add the service provider to the providers array in config/app.php
```
image\colordetect\ColordetectServiceProvider::class,
```
## Step 4 :

### Call in postman

API BASE URL : [http://localhost/<project_name>/public/getImageMainColor](http://localhost/<project_name>/public/getImageMainColor)

Parameters : "file" : 1.jpg,

 ### Demo
 That’s it – load URL in the postman!
 <img src="https://raw.githubusercontent.com/poojajadav3698/color-detect/master/3.JPG" />
 
### Thank you

