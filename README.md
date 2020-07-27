# KO
KO is a php web mvc framework for developing website easily :)

## Audience

Those who come from Core PHP can easily understand this

## Installation

You can clone this or download this from [here](https://github.com/nirav-chavda/ninjaPHP)

```bash
git clone https://github.com/nirav-chavda/ninjaPHP.git
```

After cloning or downloading run

```bash
copy .env.example .env
```
```bash
composer install
```

Put values in .env file (example for localhost) 

```.env
APP_URL=http://localhost:8000
APP_ROOT=http://localhost/project_name/
```

## File Structure

**App**

- __Config__
 
   Contains all configuration variables
- __Controllers__

  Controllers contains business logic
- __Database__

  Contains all table classes

- __Middlewares__

  Contains Middleware files
- __Models__

  Models classes are class representations of tables
- __Views__

  Views contains all presentation layer files
- __Routes.php__

  Add Routes here

**Public**

- __css__
  
  contains css files
- __images__
  
  contains images

- __js__
  
  contains javascript files

**Other Files**

- __.env__

  environment variables of the website

- __.gitignore__

  items which should not pushed to git

## Usage

**Commands**

* To host a local server

```bash
php command serve
```
* To create controller

```bash
php command make:controller Post
```
* To create database table
```bash
php command make:table Post
```
* To create model
```bash
php command make:model Post
```
Model with controller
```bash
php command make:model Post --c
```
Model with controller and table
```bash
php command make:model Post --ct
```
* To move tables to database
```bash
php command db:move
```


**Functions**

* view

  view() is use to call a particular view from controller

  ```php
  $this->view('home');
  ```
* redirect
 
  redirect() is use to redirect to a particular route

  ```php
  redirect('auth/login');
  ```
* redirect_back

  redirect_bak() is use to redirect to a previous route

  ```php
  redirect_back();
  ```
* public_path

  returns path to the public folder

  ```php
  <img src="<?=public_path() . 'images/xyz.png' ?>" />
  ```
* app_path

  returns path to the app folder

  ```php
  app_path()
  ```
 * ###### Auth

   ```php
   use Ninja\Auth;
   ```

   * user()

     returns object of the authenticated user

     ```php
     Auth::user()->name;
     ```
    * id()

      returns id of the authenticated user

      ```php
      Auth::id();
      ```
    * set()

      to set authenticated user to Session

      ```php
      Auth::set($user->id);
      ```
    * guest()

      returns true if current user is guest 

      returns false if current user is authenticated 

      ```php
      if(!Auth::guest())
        echo "Welcome " . Auth::user()->name . "!";
      ```

    * deAuth()

      it will remove current user from session

      ```php
      Auth::deAuth()
      ```
* ###### Session

   ```php
   use Ninja\Session;
   ```

   * flash()

     sets a message to session and will be removed after one use

     ```php
     Session::flash('msg','Welcome');
     ```
     ```php
     echo Session::flash('msg');
     ```
    * has()

      checks if session has a given key value or not

      ```php
      Auth::has('msg');
      ```
    * get()

      return value of a given key

      returns all session variables (array) if no key passed

      ```php
      Auth::get('msg');
      ```
      ```php
      Auth::get();
      ```

    * set()

      to set a key value in session

      ```php
      Session::set(key,value);
      ```

    * terminate()

      it will destroy current session

      ```php
      Session::terminate()
      ```

    * unset()

      it will unset a given key from the session

      ```php
      Session::unset(key)
      ```

    * unsetAll()

      it will unset all the variable from the session

      ```php
      Session::unsetAll()
      ```

* ###### Database\Tables

  Tables are classes that holds a structure of a particular table

  Using which one can directly create tables inside the databse

  ```php
  php command db:move
  ```
* ###### Models

  Models represents tables of database

  Here Eloquent Models are used of [Illuminate/database](https://github.com/illuminate/database)

  For Usage refer [this](https://github.com/illuminate/database) and [laravel docs](https://laravel.com/docs/5.8)
