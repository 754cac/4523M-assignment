# ITP4523M-assignment

### Introduction

This is an end-of-module assignment for the 22/23 year ITP4523M module (Internet & Multimedia Applications Development). Due to quitting of my partner, I only did the purchase manager part of the project.

### Objectives

In this project, students are asked to:
- Build a web application which provides different functions for Purchase Manager and Supplier.
- Apply software development skills to develop a website which is user-friendly, interactive, robust and easy to maintain.
- Apply the knowledge that you learned in this module to solve the tasks. (i.e. HTML, CSS, JavaScript, PHP, SQL commands and Python)

### Simplified Procedure

There are two user roles for the Management System:
a. A Purchase Manager can make the orders and retrieve the Order records.
b. A Supplier can manage its own items.

### Design for Purchase Manager

a. Make the orders

- Managed to make orders for items provided by the supplier into the system with all necessary information
- View product information
  - Let the user easily select items available from different suppliers (show the items when the stock quantity is greater than zero)
  - orderID should be generated automatically by the system as Primary Key
  - Update the stock item quantity after an order is created

b. View the order records

- Managed to view all the records with the necessary information.
- Function requirement:
  - Group-ordered items by suppliers
  - List the items in ascending or descending order by at least TWO columns selectable by the user

c. Update purchase manager’s information

- Managed to update the purchase manager’s information.
- Only allow the user to update the following information:
  1. Password
  2. Contact Number
  3. Warehouse Address

d. Delete Order record

- Delete an order record from the Orders table and related records in the OrdersItem table.
- Update the stock item quantity after an order is deleted
- Function requirement:
  - A confirmation message should be displayed to let the user decide whether the selected order should be deleted.
  - The order can only be deleted two days before the receipt delivery date.

### Python Plug-in: Discount Calculator

Develop a simple Python flask application running on port 80 to determine the discount percentage based on the Total Order Amount. The RESTful API should accept the HTTP GET request and send the required response (in JSON format) from the Python program.
#### Introduction

This Python Flask application serves as a discount calculator, providing discount rates and new order amounts based on the total order amount. The RESTful API accepts an HTTP GET request with the total order amount as the input parameter and responds with the discount rate and new order amount in JSON format.

#### API Usage

URL Request: `/api/discountCalculator`

Input Parameter:
- `TotalOrderAmount` (float): The total amount of the order.

Response Format (in JSON):
```json
{
  "DiscountRate": ________,
  "NewOrderAmount": ________
}
```

#### Discount Calculation

The discount rate is determined based on the following decision table:

| Total Order Amount | Discount Rate |
| ----------------- | ------------- |
| ≥ $10000          | 0.13 or 13%   |
| ≥ $5000           | 0.06 or 6%    |
| ≥ $3000           | 0.03 or 3%    |
| default           | 0 or 0%       |

### Areas for Improvement

Based on the feedback from the teacher on this project, there are a few areas that I feel could be improved upon in the future:

1. User Interface Design: Although the web application is functional, the user interface could be enhanced to improve the overall user experience and make it more visually appealing.

2. Promtp Message: When the user inputted the wrong password I should display a warning message so the user can know that login was rejected due to an incorrect password. Also when the user wants to change account information I should prompt his password to the update information to avoid unwanted updates.

3. Display Discounted Price: When the user wants to checkout the order I should add a transition page to display the items selected and the discounted price, so the user doesn't need to view the discounted price in the view order record page.

4. Code Readability and Understanding: Comments help in making the code more readable and understandable for other developers who may be working on the project in the future. By adding comments, it becomes easier to comprehend the purpose and functionality of different sections of code.

These areas for improvement are suggestions to further enhance the project and make it even more robust, user-friendly, and maintainable.
