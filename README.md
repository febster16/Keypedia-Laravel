<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


    Keypedia is a famous keyboard shop in Indonesia made by a famous computer science student from Korea. To expand its business, Keypedia wants to create a website for their shop. In that website, people can find information about Keypedia’s products and order it. This website enables the customers to know what is inside Keypedia.
    As a web developer, you are asked to create a website using Laravel 8 for this online shop. There are three types of user’s role in this website: Manager, Customer, and Guest (non-logged-in user).
Each page shows greeting to user, and current date time. The descriptions for each page are:

1.	Login Page
    This page allows guest to log in to the website. Display an error message on the Login Page if user enters wrong combination of Email and Password.
If user has entered correct Email and Password, the page will be redirected to the Home Page based on the user’s role. If user checks the Remember Me checkbox, the website will save the Email and Password using cookies for 7 days.

2.	Register Page
    This page allows guest to register themselves as Keypedia customer. Display an error message if user input incorrect personal data.

3.	Home
    This page allows user to see all Keypedia categories and accessible for all users. In this page, user can also pick the Keypedia categories at Categories dropdown menu in the navbar. 
    In this page, guest can Login or Register. After logged in, display the user’s username between the Categories menu and current date. Then make a dropdown to display some menu through the username’s menu.
    For manager, there are several menus such as Add Keyboard, Manage Categories, Change Password, and Logout at the username’s dropdown menu in the navbar. While for customer, the menus are My Cart, Transaction History, Change Password, and Logout at the username’s dropdown menu in the navbar.

4.	View Keyboard Page
    This page is accessible for all users. This page shows all Keypedia product based on its Categories. For manager, this page can also be used to update or delete each keyboard. This page also includes pagination to display 8 items in per page and search field to search keyboard by its name and price. This page displays keyboard’s image, name, and price.  Each keyboard can be clicked to redirect into Keyboard Detail Page.
    Each product in the lists have Delete Keyboard and Update Keyboard buttons:
-	If manager clicks Delete Keyboard button, it will delete the selected product
-	If manager clicks Update Keyboard button, it will redirect them to Update Keyboard Page

5.	Update Keyboard Page
    This page is only accessible for manager. This page will show all the data of the keyboard and its description. 

6.	Keyboard Detail Page
    This page allows all users to see details of each keyboard. There is also an Add to Cart button. Validate the button to only appear for guest and customer, then validate if guest clicks Add to Cart button, they will be redirected to Login Page. In this page, there will be a text field for inputting quantity of the product you want to purchase. There will be an error message if user input a quantity below 1.

7.	Add Keyboard Page
    This page will allow manager to add new keyboard and can be access when Manager choose Add Keyboard button at username’s dropdown menu in the navbar. Display an error message if user input incorrect data. 

8.	Manage Category Page
    This page is accessible only for manager. First, insert the category’s image and name to the database using seeder. Then display all the category’s image and name.
    Each product in the lists have Update Category and Delete Category buttons:
-	If Manager click Delete Category button, it will delete the selected category
-	If Manager click Update Category button, they will be redirected to Update Category Page

9.	Update Category Page
    This page allows manager to update existing category. Display an error message if Manager input incorrect category data. If Manager click Update button, then update current selected category with updated data. After that, redirect back to Manage Category Page.

10.	My Cart Page
    This page is accessible for customer to show customer’s cart. In this page, users can see all the keyboard details in the cart, such as keyboard’s image, name, subtotal (price x quantity) and quantity.
    There will be 2 buttons: Update and Checkout. When user click Update button, it will be used to update its item quantity (quantity must not below 0). If the customer update quantity to 0, then it will delete the selected items from the cart. If user clicks Checkout button, it will delete all items in the cart and those items will be inserted to Transaction History.

11.	Transaction History Page
    This page is accessible for customer to show their transaction history. This page display will be sorted by the newest transaction. If the customer clicks a transaction history, it will redirect to selected Transaction History Detail Page.

12.	Transaction History Detail Page
    This page will show the transaction history detail from the selected transaction history at Transaction History Page. The information that must be displayed are keyboard’s image, name, subtotal (price x quantity) and quantity. At the bottom of transaction history detail, there will be Total Price of the transaction history.

13.	Change Password Page
    Logged-in users (customer and manager) can change their password in this page. 
