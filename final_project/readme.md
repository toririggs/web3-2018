Final Project for Web 3.
Final project was made using a LAMP configuration on an Ubuntu 18.04 Server Virtualbox. All main php files are located in /var/www/html/ so that Apache can serve them. 

index.php: contains a login page. All pages lead back here if user information in the mysql database is marked as inactive. Correct login information must be entered, otherwise a message will appear.

page2.php: contains a list of all mysql databases. Only the Collectibles and Games databases can be selected and they lead to page5.php and page6.php, respectively.

page3.php: contains all data of the Animal_Crossing_Amiibo table. This information is drawn into a table by querying the mysql database. This page also includes an add and delete function, where the user can add a row to the table or delete one from it by entering information. This will query the database appropriately.

page4.php: contains all data of the GameCube table, also contains the add and delete function.

page5.php: contains a list of all tables in the Collectibles database. Only Animal_Crossing_Amiibo is available, and it leads to page3.php.

page6.php: contains a list of all tables in the Games database. Only GameCube is available, and it leads to page4.php.

mylib/loginout.php: contains all important functions used in the main php files. This includes a login function, a logout function, a function to pass username information to each php page, a function to pass password information to each php page, an add item function for page3.php, a delete item function for page3.php, an add item function for page4.php, a delete item function for page4.php, a function that sets up basic information for each php page including a title, and a function that assigns a user as inactive so that each php page can't be accessed by url even when no one is logged in. 

mylib/info.txt: contains user login info.

mylib/mysqlusers.txt: contains all mysql users to compare to user login info.

mylib/styles.css: contains css styles for the website. 

screenshots.docx: a word document containing screenshots of the webpage in various states. 
