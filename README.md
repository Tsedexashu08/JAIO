# LaunchNest - Career Platform

![Alt Text]([https://github.com/Rufaelu/LaunchNest/blob/b4499f97c233bdb330d6de5af0829a1b6c520923/public/images/Logo.png])
LaunchNest is a Laravel-based career platform designed to bridge the gap between education and employment by providing an integrated solution for job discovery, skill-building resources, peer networking, and career guidance.

## Features

- **Integrated Job Listings**: Discover relevant job opportunities in one place
- **Learning Resources**: Access curated educational materials and courses
- **Peer Networking**: Connect with other users through chat functionality
- **Career Buddy**: AI-powered assistant to help with career guidance
- **User Management**: Comprehensive system for managing user profiles
- **Admin Dashboard**: Tools for institutions to track student progress

## Technologies Used

- **Backend**: Laravel 10.x
- **Frontend**: Blade templates, Tailwind CSS (or Bootstrap)
- **Database**: MySQL
- **Authentication**: Laravel Sanctum or Jetstream
- **Additional Packages**:
  - Laravel Livewire (for interactive UI components)
  - Laravel Horizon (for queue management)
  - Laravel Socialite (for social media login)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/launchnest.git
   cd launchnest
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Create a copy of the environment file:
   ```bash
   cp .env.example .env
   ```

4. Generate application key:
   ```bash
   php artisan key:generate
   ```

5. Configure your database in the `.env` file:
   ```env
   DB_DATABASE=launchnest
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

7. Build frontend assets:
   ```bash
   npm run build
   ```

8. Start the development server:
   ```bash
   php artisan serve
   ```

## Configuration

Configure these additional settings in your `.env` file as needed:

- Mail server configuration for notifications
- Social media login credentials
- AI service API keys for Career Buddy
- File storage settings (local, S3, etc.)

## Usage

After installation, you can:

1. Access the platform at `http://localhost:8000`
2. Register as a new user or use seeded admin credentials:
   - Email: admin@launchnest.com
   - Password: password
3. Explore the different features:
   - Job listings
   - Resource library
   - Networking chat
   - Career Buddy AI assistant

## API Endpoints

The application provides RESTful API endpoints for mobile clients. Documentation is available at `/api/documentation` after installing and configuring [Laravel API Documentation Generator](https://github.com/mpociot/laravel-apidoc-generator).

## Contributing

We welcome contributions! Please follow these steps:

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- Developers: Rufael Melese, Tsedalu Ashenafi
- Inspired by the challenges students face in the job market
- Laravel community for excellent documentation and support

## Contact

For support or inquiries, please email: support@launchnest.com

---

*Your Career Journey Starts Here! Fuel Your Journey. Find Your Nest.*
