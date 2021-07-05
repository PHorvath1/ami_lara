<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/MY/APP">
   <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
  </a>

<h3 align="center">My App</h3>

  <p align="center">
    Repository of MyApp
    <br />
    <a href="https://github.com/MY/APP"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/MY/APP">View Demo</a>
    ·
    <a href="https://github.com/MY/APP/issues">Report Bug</a>
    ·
    <a href="https://github.com/MY/APP/issues">Request Feature</a>
  </p>

- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
    - [1. Install XDebug](#1-install-xdebug)
    - [2. Clone this project](#2-clone-this-project)
    - [3. Create your local environment](#3-create-your-local-environment)
    - [4. Create your database](#4-create-your-database)
    - [5. Create your virtual host:](#5-create-your-virtual-host)
    - [6. Add your app to your DNS](#6-add-your-app-to-your-dns)
      - [Windows:](#windows)
      - [Linux:](#linux)
    - [7. Set up your laravel app:](#7-set-up-your-laravel-app)
    - [Done](#done)
- [License](#license)

<!-- GETTING STARTED -->
# Getting Started

To get a local copy up and running follow these simple steps:

## Prerequisites
- [(XAMPP recommended)](https://www.apachefriends.org/index.html)
- php 8.0+ with xdebug extension
- [composer](https://getcomposer.org/)
- [node.js](https://nodejs.org/en/)
- [yarn](https://yarnpkg.com/getting-started/install)
- [Visual Studio Code](https://code.visualstudio.com/)

## Installation

### 1. Install XDebug
On Windows, open a new powershell, and execute this code:
```powershell
php -i | clip ; Start-Process https://xdebug.org/wizard
```
This command already copied php info to your clipboard. Now paste it in the textbox, click "analyse" and follow the instructions.

On Linux or mac go to https://xdebug.org/ and follow the instructions there.

### 2. Clone this project
* Clone this repository to your server directory (ex: `C:/xampp/htdocs/`).
```sh
git clone https://github.com/MY/APP.git MY/APP
```
* Open a powershell terminal here (On Windows: shift+right click > Open new Powershell terminal here).

### 3. Create your local environment
* In the source folder (ex. `C:/xampp/htdocs/web3/`) copy the `.env.example` file and rename it to `.env`
* Configure your `.env` accordingly to your project needs. Do not forget to set your Database name, username and password. 
> Important: the `APP_URL` variable MUST end with `.test`

### 4. Create your database
* Create a database with the name configured in `.env`.
> <small>With xampp: Start XAMPP and on the control panel start both Apache and MySQL</small>

### 5. Create your virtual host:
> If you're not using XAMPP, consult the documentation of your server on how to create VHost.

* Open `xampp/apache/conf/extra/httpd-vhosts.conf` file and paste the following to the end of the file:
```apacheconf
<VirtualHost *:80>
    ServerName MY-APP.test
    DocumentRoot C:\xampp\htdocs\MYAPP\src\public
    SetEnv APPLICATION_ENV "development"
    <Directory C:\xampp\htdocs\MYAPP\src\>
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
```

### 6. Add your app to your DNS
* Open your HOSTS file
```powershell
code C:/Windows/System32/drivers/etc/hosts
```

#### Linux:
```bash
sudo code '/etc/hosts'
# or
sudo nano '/etc/hosts'
```
* At the end of the file add the following line <small>(Obviously replace 'myapp' with your app name)</small>:
```
127.0.0.1        MY-APP.test
```
* Save it. You will need Administrator rights to do this.
* Restart your (Apache) server now

### 7. Set up your laravel app:
* In your source folder run the following:
    ```powershell
    composer install
    php artisan migrate:fresh --seed
    yarn
    yarn run development
    ```
  
### Done
* You can access the app at the url you have set (ex. `MY-APP.test`)
* You can run tests with `php artisan test` or with PS-Mod: `lumen test`

# License

Distributed under the MIT License. See `LICENSE` for more information.
