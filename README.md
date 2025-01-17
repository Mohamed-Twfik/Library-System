# PHP Library Website Project Documentation

## Overview

The PHP Library Website Project is a web application designed to manage and display a library's collection of books. It provides features for librarians to add, edit, and delete books, as well as for users to search and view book details.

## Features

1. **User Authentication**: Users can sign up for an account or sign in to access the website's features.
2. **Add Book**: Librarians can add new books to the library's collection, including information such as title, description, image, and edition date.
3. **Edit Book**: Librarians can edit existing book details, allowing them to update information or correct errors.
4. **Delete Book**: Librarians have the ability to remove books from the library's collection.
5. **Search**: Users can search for books by title, enabling quick and easy access to specific titles of interest.
6. **View Book Details**: Users can view detailed information about each book, including title, description, image, owner, and edition date.

## Technologies Used

- **Backend**: Pure PHP
- **Frontend**: HTML, CSS, JavaScript
- **Database**: MySQL (not mentioned in provided code but assumed)
- **Additional Frameworks and Libraries**: jQuery, Bootstrap CSS framework

## Project Structure

The project is structured as follows:

- **index.php**: The main entry point of the website, displaying the list of books and search functionality.
- **signin.php**: Sign-in page for users to log in to their accounts.
- **signup.php**: Sign-up page for new users to create accounts.
- **signout.php**: Page for users to log out of their accounts.
- **navbarUser.php**: Navigation bar component displayed on every page.
- **footerUser.php**: Footer component displayed on every page.
- **main/addbook.php**: Page for librarians to add new books to the collection.
- **main/deletebook.php**: Page for librarians to delete existing books from the collection.
- **main/editbook.php**: Page for librarians to edit details of existing books.
- **bookDetailsUser.php**: Page for users to view detailed information about a specific book.
- **classes/**: Directory containing files that contain functionality for interacting with the database tables.
- **css/**: Directory containing CSS stylesheets for styling the website.
- **js/**: Directory containing JavaScript files for client-side functionality.
- **uploads/**: Directory for storing uploaded book images.

## Installation

1. Clone the repository to your local machine:

```
git clone https://github.com/Mohamed-Twfik/Library_System_With_PHP.git
```

2. Update the database connection settings in the `databaseConfigData.php` file.

3. Run the project on a local server (e.g., Apache) or deploy it to a web hosting service.

## Usage

1. Open the website in a web browser.
2. Sign in with an existing account or sign up for a new account.
3. Explore the list of books, search for specific titles, and view detailed information about each book.
4. Librarians can add, edit, or delete books as needed.

## Contributing

Contributions are welcome! If you'd like to contribute to this project, please follow these steps:

1. Fork the repository.
2. Create your feature branch (`git checkout -b feature/new-feature`).
3. Commit your changes (`git commit -am 'Add new feature'`).
4. Push to the branch (`git push origin feature/new-feature`).
5. Create a new Pull Request.

## Credits

This project was developed by Mohamed Twfik. For any questions or inquiries, please contact mohamedtwfik910@gmail.com.