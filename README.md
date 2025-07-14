# Simple Company Database Manager

A lightweight PHP web application built to help a small company manage its records (clients, orders, or products) through a basic CRUD interface.

## Project Structure

- `connect.php` — connects to the database
- `index.php` — displays database records
- `login.php` — displays login page
- `processLogin.php` — handles login page logic
- `actions/` — contains crud actions and handlers
- `css/` — styling files
- `views/` — displays the different pages
- `sql/` — contains the tables and some insert examples

## Technologies Used

- PHP
- MySQL
- Laragon (for local dev)
- HTML, CSS

## How to Run

1. Install [Laragon](https://laragon.org/)
2. Clone this repository to `C:\laragon\www\`
3. Create a MySQL database via phpMyAdmin
4. Create a database and set up the tables and data
5. Update your database credentials in `connect.php`
6. Start Laragon and open `http://localhost/CompanyDBManager/` in your browser

## Notes

- This was a real practice project for a small company that gave me a chance to develop a database management website to manage their client data internally.
- It covers simple CRUD operations with PHP and MySQL.
- No sensitive client data is included in this public version.

## Screenshots

<img width="928" height="493" alt="image" src="https://github.com/user-attachments/assets/f749ff51-fac9-4f3f-9bd3-d1e995e8f438" />
<img width="945" height="503" alt="image" src="https://github.com/user-attachments/assets/80a1171f-fe55-4299-a27c-ba79b0631e7c" />
<img width="945" height="501" alt="image" src="https://github.com/user-attachments/assets/313b55ff-d267-4a14-8141-6ea1ad4cb8f5" />



