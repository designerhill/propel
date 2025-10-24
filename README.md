# Propel Real Estate Portal

Propel is a real estate web portal for buying, selling, and renting properties. It provides property listings, agent contacts, enquiry forms, and admin management features.

## Features
- Property details and image galleries
- Search and filter properties by city, type, and status
- Enquiry and contact forms for users
- Admin dashboard for managing properties, agents, amenities, blogs, and users
- User authentication (login/signup)
- Integration with external APIs (e.g., Salesforce for lead creation)
- Newsletter subscription
- Responsive design with Bootstrap

## Folder Structure
- `/assets/` - CSS, JS, images, fonts
- `/sitemanager/` - Admin panel scripts and assets
- `/user/` - User dashboard and profile management
- `/PHPMailer/` - Email sending library
- `/property-in-bhubaneswar-location/` - Location-specific property listings
- `/nawah-boulevard/` - Project-specific pages
- Main PHP files: `index.php`, `property-details.php`, `contact.php`, etc.

## Setup Instructions
1. Clone or copy the project files to your web server (e.g., WAMP/XAMPP).
2. Configure your database connection in `config.php`.
3. Import the required database tables (see `sitemanager/` for table references).
4. Make sure the `assets/`, `sitemanager/`, and `user/` folders have proper permissions for uploads.
5. Access the site via your local server (e.g., http://localhost/propel).

## Requirements
- PHP 7.x or higher
- MySQL/MariaDB
- Apache/Nginx web server
- Composer (for PHPMailer, if needed)

## Usage
- Browse properties, view details, and contact agents.
- Admins can log in to `/sitemanager/` to manage listings and users.
- Users can sign up, log in, and manage their own property listings and enquiries.

## Security Notes
- Validate all user inputs (server and client side).
- Protect admin routes and sensitive actions with authentication.
- Use HTTPS in production.

## License
This project is proprietary and for internal use only. Contact Propel for licensing information.

## Contact
For support or inquiries, email: info@propel.com
