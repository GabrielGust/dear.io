<div align="center">
    <img src="https://user-images.githubusercontent.com/65090609/101854663-b8d75e80-3b40-11eb-91e9-949da6a55b46.png" alt="Dear.io project logo">
</div>
<div align="center">
    <img alt="GitHub" src="https://img.shields.io/github/license/GabrielGust/dear.io">
</div>

<h4 align="center"> 
	The dear.io was finalized, but I accept change tips  ✔️
</h4>

<p align="center">
 • <a href="#-about">About</a> •
 <a href="#-Features">Features</a> •
 <a href="#-layout">Layout</a> • 
 <a href="#-getting-started">Getting Started</a> • 
</p>


## 💻 About

📓 dear.io is virtual diary project allows you to create, read, change and delete whenever you want. Project totally made with HTML5, CSS, PHP and MySQL.


---


## ⚙️ Features

- [x] New users can register easily with just:
  - [x] email
  - [x] password
  
- [x] With your created account the user can:
  - [x] create notes
  - [x] view all notes
  - [x] change notes
  - [x] delete notes

- [x] The notes have:
  - [x] title
  - [x] content
  - [x] date
---

## 🎨 Layout

Some prints of the project's look:

![teste](https://user-images.githubusercontent.com/65090609/101859977-7ff0b700-3b4b-11eb-89e6-5a05784dd717.gif)

![notas](https://user-images.githubusercontent.com/65090609/101860280-35236f00-3b4c-11eb-9139-ce0096db269e.gif)


---


## 👣 Getting started

This project is divided into two parts:
1. Frontend (branch master) 
2. Backend (assets directory)
3. DataBase (MySQLScript directory)

💡 It is important to remember that <b>if the database script is not executed, the application will not work!</b>.

### Prerequisites

Before you begin, you will need to have the following tools installed on your machine to run the project:
[WAMP](https://www.wampserver.com) or [XAMPP](https://www.apachefriends.org/pt_br/index.html). 
If you want to see the code more deeply, I recommend the editor [VSCode](https://code.visualstudio.com/).<br>
<b>OBS</b>: During the development of the project I used [MySQL Workbench](https://www.mysql.com/products/workbench/), however both WAMP and XAMPP have PHPMyAdmin so its installation is optional.

#### 🎲 Creating the Database (MySQL Server)

```bash

# Clone this repo
$ git clone https://github.com/GabrielGust/dear.io.git

# Access the project folder on terminal/cmd
$ cd dear-io

# Start your WAMP / XAMPP

# Go to the folder MySQLScript and execute all the script in PHPMyAdmin or MySQL Workbench

# After running all the script commands your database will be done

```

#### 🖥️ Configuring the application for localhost (WAMPP/XAMPP)

```bash

# Clone this repo
$ git clone https://github.com/GabrielGust/dear.io.git

# If you are using WAMP copy the repository and paste in: 
$ C:\wamp64\www

# If you are using XAMPP copy the repository and paste in: 
$ C:\xampp\htdoc

# The frontend is now in the localhost folder ready to run

```

#### 🖥️ Running the application (frontend)

```bash

# To run the application it is necessary to do the previous two steps

# With the previous two steps done, you will only need to type in the browser:
$ localhost/dear-io

```
