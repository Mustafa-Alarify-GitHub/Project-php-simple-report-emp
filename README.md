# Employee Evaluation Project

This project is designed to manage employee data and evaluations using PHP and MySQL.

## Requirements

1. **XAMPP**: Ensure you have XAMPP installed on your computer, which includes Apache and MySQL.
2. **Browser**: You can use any browser to open the application.

## Setup Steps

### 1. Install XAMPP

If you don't have XAMPP installed, you can download it from the [official XAMPP website](https://www.apachefriends.org/index.html) and install it.

### 2. Set up the Database

Once XAMPP is installed, you need to set up the database for your project using phpMyAdmin.

#### Steps to Set Up the Database:

1. Open the **XAMPP Control Panel**.
2. Start both **Apache** and **MySQL**.
3. Go to **phpMyAdmin** by navigating to: [http://localhost/phpmyadmin](http://localhost/phpmyadmin) in your browser.
4. In phpMyAdmin, create a new database called `report_emp`:
   - From the left sidebar, click on "Databases".
   - Enter `report_emp` in the "Database Name" field and click "Create".
   
5. After creating the database, select **Import** from the top menu.
6. Choose the SQL Dump file for the database or use the SQL queries provided earlier to manually insert the structure and data.
   - Alternatively, you can upload the SQL file containing the database structure and test data.

### 3. Set up the Project Files

1. Move the project folder to the `htdocs` directory in XAMPP. The path to this directory is typically:
   - **Windows**: `C:\xampp\htdocs`
   - **Mac/Linux**: `/Applications/XAMPP/htdocs`

2. The project folder structure should look like this:


### 4. Open the Project in the Browser

1. After starting XAMPP and the servers (Apache and MySQL), open your web browser.
2. In the address bar, enter the following URL:

Where `your_project_folder_name` is the name of the folder that contains your project files in `htdocs`.

### 5. View the Application

Once you navigate to the URL, you can interact with the application and start using it.

### 6. Notes

- Ensure that all the files inside `assets`, `config`, `controller`, etc., are placed correctly in the project structure.
- You can customize the settings or modify the database files if needed.

---

**Note**: you need go to dashboard user-name : admin and password : admin.
