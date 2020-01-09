# Pet_shop_management
The project focuses on handling the online business of a pet-shop. The PHP based website takes care that no false information is displayed on the website and a pet once sold should not be displayed in the lists anymore and if some other costumers have added the same pet into their cart, it turns unavailable for them.<br />
We have to use SQL triggers and cursors to provide the above implementation. Nested Queries have to be employed to query the database for complicated information from multiple tables.
# Major-Features
1. Costumer could signup and create an account to store his different information, cart, purchase history. Cookies are also used to manage information retrieval and improve the loading speed of the website
2. A customer could view items without creating an account but to order, account creation is mandatory.
3. Items in the list ie pets could be filtered on different parameters like type, age, color, etc. This provides better search efficiency on websites and ease of access to the costumers.
4. each item in the list has its separate profile in which detailed information about the pet is displayed and this page allows us to add it into our purchase cart.
5. multiple pets could be bought together by the costumers and could also be kept saved in the cart for later purchases. But in the time being if some other customer confirms the order, the item is turned unavailable for this costumer and total cart value is calculated based on currently available cart items.

# Usage
1. software requirements: 
````
MySQL
Apache webserver
````
Both of them could directly be installed using XAMPP.
Install XAMPP and run apache and MySQL using it.

2. First of all place all the project files in C:/XAMPP/htdocs/petshop
3. Now its time to create the database.
4. Open your web browser and go to address
````
localhost/htdocs
````
5. You would find petshop directory there, go to petshop and then db_create directory.
4. We need to run all 4 files in a particular order.
````
1. first.php
2. second.php
3. avalavbility_trig1.php
4. avalability_trig2.php
````
This shall create the whole database and process the required triggers for the consistent running of the project.
6. Now we are good to run the project, Go one directory back and run the file
````
index1.php
````
7. Now we can explore the different aspects of the website. We would now be displayed with the main item list. here on we could add filters, view full petprofile, create account, add items to cart, order pets, etc.


<h3> Thanks-For-Visiting</h3>
