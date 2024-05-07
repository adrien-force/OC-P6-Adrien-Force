<h1 align="center">Development of the TomTroc website</h1>
<p align="center"><i>Project N°6 of the PHP Symfony Application Developer training
@OpenClassrooms <br> <a href="https://github.com/adrien-force/OC-P6-Adrien-Force/commits?author=adrien-force"><img src="https://img.shields.io/badge/Author_:-Adrien_FORCE-orange"></a></i></p>

## 🎯 Table of Contents
- [Project Description](#-description)
- [Project Installation](#-installation)
- [Prerequisites](#-prerequisites)
- [Project Usage](#-usage)
- [Additional Features](#-additional-features)


## 📄 Description
<br>

This project involves developing a website for an association named TomTroc.
This association aims to connect people who wish to exchange books.
The site must allow users to register, log in, view ads, and contact other users.
<br> <br>


## 🔧 Prerequisites

- Web server (Apache)
- Database (MySQL)
- PHP >= 8.0

## 🛠️ Installation

1. Clone the project on your machine
```bash
git clone https://github.com/adrien-force/OC-P6-Adrien-Force.git
```

2. Configure your web server to point to the project's root directory
<br>


3. Integrate the database tables via the file: <br> <br>

   - `docs/TomTroc.dev.sql` for a MySQL development database
   - `docs/TomTroc.dev.sql` for a MySQL development database
     <br> <br>

## 🔥️ Usage

The project is a website developed in PHP, HTML, CSS without external libraries.
The git project has a `main` branch and a `feature` branch. <br>
The `main` branch corresponds to the initial project requirements. <br>
The `feature` branch corresponds to additional project enhancements.

The site opens on `index.php`. This page acts as a router and redirects to the different pages of the site.
By default, the user is redirected to the home page `home.php`.

It is possible to register or log in with the default admin account:
- email: admin@mail.com
- password: password

Or with a test user account:
- email: test1/2/3@mail.com
- password: password

Ads are visible to all users, either through the `Our books for exchange` page or on user profiles.

Users can send messages to other users via the `Messaging` page.
<br> <br>

## 🚀 Additional Features

The `feature` branch contains additional enhancements to the initial project:
- Addition of a page allowing to add a book
- A dark theme for the site accessible via a button on the `My account` page
- More to come...