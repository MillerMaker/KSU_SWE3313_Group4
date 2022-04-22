TO START DEVELOPMENT you will need to create a local server that you can run these files on...
First download XAMPP and setup the Apache and MySql modules. This is a good tutorial:
https://www.youtube.com/watch?v=mXdpCRgR-xE&list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-&index=2

Navigate to wherever you downloaded XAMPP and CLONE this repository to Xampp/htdocs. 
(You could download the zip from the repository if you don't want to mess with git yet.)

Next, if you start your Apache and MySQL software. If you go to your browser and type 'localhost' in the navigation bar, It should bring up
the files in htdocs. Click 'KSU_SWE3313_Group4' and it should display some version of the website. The menu won't work because the database has not been set up. 

Go to http://localhost/phpmyadmin/. Create a new database called 'magniche_btbdatabase'. With this database selected, navigate to the SQL tab. Copy and paste the 
SQL code from SQL_data (1).sql from the github. Click GO. This set up the neccessary database schema for the website to run properly. 
