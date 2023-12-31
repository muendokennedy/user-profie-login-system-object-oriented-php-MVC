----
# **Personal** Profile System
---- 
## Running the project code
Ensure that you have XAMPP installed which comes with apache and mySQL database. The PHP version should be at least 7.4. PHP comes already installed which XAMPP. If you are unsure of which version of PHP  is running in your system, you can run the **command** below in your operating system terminal:

```php
php --version
```
To start the system or the project, run the **command** below in your text editor terminal. The command should be run in the root directory of the project.

```php
php -S localhost:8080
```
After that, open the mySQL server and type http://127.0.0.1/phpmyadmin in your browser to open the phpmyAdmin and create your desired database name and change the default one in the `Dbh.php` file in the app folder. After that, import the SQL document inside the created database in order to have a copy of all the tables used in this project.

## About the project

This project is built using object oriented PHP. It is a system which a person can use to keep his or her personal life information such as hobbies, careers, friends and even their friends.
It consists of a complete login system which stores user data in the database using the PDO mySQL database connection in PHP. It has an integrated password recovery system which  allows the user to reset his or her password in case they forget or lose it.
Once a new user creates an account, the account is inactive by default and he or she has to enter his or her email again to activate the account after which they can login to the profile page.
The login has cookie which remembers or stores the users login credentials for a period of 30 days which enables the user to quickly login to the system if they do so regularly.

### Working of password recovery system

Once a user clicks the forgot password link in the login page, the request is processed and the account is inactivated and has to be verified for the process to proceed. He or she is prompted to enter the email which was used to create the account. After that, a verification code is sent via email and they are redirected to a new page where they can enter the code.
After successsfull verification of the account, a password recovery session is opened in the database which expires after 30 minutes. A link is sent to the email inbox of the user where they can click and get redirected a new page where they can create a new password.
After entry and confirmation of the new password the user is redirected to the login page where  they can login with the new password. So with this system a user cannot lose his or her account as long as they remember their email.
Incase of an error during the process the appropriate error messages are displayed. If no errors, appropriate success messages are displayed.

## Navigation of the system 

The main page which displays the information that is specific to a particular user is the profile page. In here, the user can edit the images and information uploaded during the account creation process, they can also upload new images and information on top of that which was uploaded during the registration process. They can also delete sections of old or unwanted pieces of uploaded information whenever they login in to their accounts.
There is also the gallery page which displays information which is tailored to particular user. They gallery page displays memory photos and information.
The user can perform a wide rage of activities in the gallery page. They can add new photos,  delete already existing photos, edit already existing photos as well as download photos into their devices in case the file is no longer contained in their devices.
The system also has a fully functional contact page in which the user can send any queries to the organisation, in this case I plugged dummy organisation name PERSONARA, you can replace it with your name. I configured the user to send the email message to my personal Gmail account inbox. In production, it should be the email inbox of the organisation. 
In case there is any error encountered during the sending of the mail message appropriate error messages are displayed.

>During the developement of this project I used a number of tools which include:
>**__The PDO__**, **__composer package management__**, and the **__PHPMailer__** for 
>for the email functionality

## Tools used

I used composer for autoloading of the PHP classes as well as for package management. In my case I have used the PHPMailer package for the email functionality of the project which I configured to use  a local SMTP server for testing purposes.

----