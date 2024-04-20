
# YUMMY Online Food Ordering Platform

YUMMY here, an online food ordering system (OFOS) to streamline the basic process of ordering your favorite food.

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)

## Overview

YUMMY is a web-based platform that developed in PHP and MySQL. It allows the users to browse through a variety of food category, select their desired dishes, add desired foods to cart and checkout orders for delivery.
## Features

- User-friendly interface for browsing food category and menus
- Sign up form validation and Login/Logout system
- Account/Edit profile available
- Cart functionality for adding/removing foods and proceed to checkout orders
- Contact us form functionality
- Food searching to browse the favorite foods
- Responsive design


## Installation

To run the YUMMY Online Food Ordering System locally, follow these steps:

1. **Clone the repository**: 
    ```git
    git clone https://github.com/KawaiiMoe3/yummy-OFOS.git
    ```

2. **Start the Wampserver64**:
- Make sure all the services is running and it will be shown as green color icon.
- Download Wampserver here: https://www.wampserver.com/en/

3. **Set up the phpMyAdmin database**:
    - Login to your phpMyAdmin database.
    - Please make sure the username is `root` and password is `empty`.
    - Import the sql file `yummydb.sql`.
    - If username not equal to `root` and password is not `empty`, select `db_setup` folder and open `db.php` file to modify as your username and password.

4. **Access to website**:
- Make sure the project folder is placed in the root directory `www` of `wamp64` directory like this path: `C:\wamp64\www`.
- Open your web browser and navigate to http://localhost/OnlineFoodOrderingPlatform/.
- If a domain is occupied, try http://localhost:8081.


## Usage

- **User Accounts**: 
    - Sign up for a new user or log in with existing credentials.
    - View `My Account`, and edit profile.
    - Browse `Category`, view `Menu`, and add food to the `Cart`.
    - Search the food by `category name` or `food name`.
    - Modify your cart to update the quantity or remove the foods from the cart, view summary of bills, select a payment method, and proceed to checkout.
    - Check your order history.
    


## Contributing

Contributions to the YUMMY project are welcome! To contribute, please follow these guidelines:
- Fork the repository
- Create a new branch (`git checkout -b feature-branch`)
- Make your changes and commit them (`git commit -am 'Add new feature'`)
- Push to the branch (`git push origin feature-branch`)
- Create a new Pull Request

