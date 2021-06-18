#This is a simple PHP app that allows the user to connect to a mySQL database, enter in new users and to view a list of previously registered users


## Installation

There are four steps to run this basic application:

1. Download the project to the desired directory on your computer using git clone https://github.com/andrewh1994/PHP-basic-app

2. Alter the SQL below to include the name of your own database then run the SQL commands below in your mySQL workbench to create the table and sample users:

_________________________________________________________________________________________________________________________________________

USE YourDatabaseName;     ##change this to the name of your mySQL database

CREATE TABLE PHPUsers (

userId int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
username NVARCHAR(100), 
password NVARCHAR(250), 
accountType NVARCHAR(50)

);

_________________________________________________________________________________________________________________________________________


3. Alter dbconfig.php file so that it matches your local mySQL login details (e.g. database name, user and password)


4. Run  `php -S localhost:8080` on your terminal. Navigate to http://localhost:8080 to see the site. You can now register a user, then log in with that users details.


