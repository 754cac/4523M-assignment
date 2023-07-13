# 4523M-assignment

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

### Python Plug-in: Discount Calculator (Function: 10 marks)

Develop a simple Python flask application running on port 80 to determine the discount percentage based on the Total Order Amount. The RESTful API should accept the HTTP GET request and send the required response (in JSON format) from the Python program.
