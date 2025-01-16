# CMH Hall Registration System

The CMH Hall Registration System is a simple web application designed to allow students to register for the CMH Hall. The system captures essential student details and stores them securely in a database.

## Features

- **User-Friendly Interface:**
  - Clean and responsive design using Bootstrap.
  - Intuitive form layout for ease of use.

- **Core Functionalities:**
  - Registration form capturing the following details:
    - First Name
    - Last Name
    - Email
    - Gender
    - Program
    - Residential Status

- **Hall Theme Design:**
  - Background in black with deep yellow headers reflecting traditional hall colors.
  - Modern typography and hover effects for enhanced user experience.

## Technologies Used

- **Frontend:**
  - HTML5
  - CSS3
  - Bootstrap 5.2.1

- **Backend:**
  - PHP (Procedural approach)

- **Database:**
  - MySQL

## Installation and Setup

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/your-username/CMH-Hall-Registration.git
   ```

2. **Configure the Database:**
   - Create a MySQL database named `cmh_hall`.
   - Import the `cmh_hall.sql` file included in the repository to set up the necessary tables.

3. **Edit Database Connection:**
   - Update the `db.php` file with your database credentials:
     ```php
     $conn = new mysqli('localhost', 'root', '', 'cmh_hall');
     ```

4. **Start a Local Server:**
   - Use tools like XAMPP or WAMP to host the project locally.

5. **Access the Application:**
   - Open your browser and navigate to `http://localhost/CMH-Hall-Registration`.

## Folder Structure

```
CMH-Hall-Registration/
├── index.php         # Displays all registered users.
├── create.php        # Processes new registrations.
├── edit.php          # Edits user details.
├── view.php          # Views user details.
├── delete.php        # Deletes a user record.
├── db.php            # Database connection file.
├── message.php       # Displays success or error messages.
├── assets/           # Contains additional resources like CSS and JS files.
├── README.md         # Documentation for the project.
└── cmh_hall.sql      # SQL file for database setup.
```

## Future Improvements

- Add an admin dashboard to manage registrations.
- Implement email notifications for successful registrations.
- Add CAPTCHA to prevent spam submissions.
- Enable file uploads (e.g., ID or profile pictures).
- Enhance security with prepared statements to prevent SQL injection.

## Contribution

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a feature branch: `git checkout -b feature-name`.
3. Commit your changes: `git commit -m 'Add feature name'`.
4. Push to the branch: `git push origin feature-name`.
5. Submit a pull request.

## License

This project is open-source and available under the [MIT License](LICENSE).

## Acknowledgments

- Bootstrap 5 for responsive design.
- Open-source tools and tutorials for learning resources.



**Built with passion for CMH Hall and its community!**
