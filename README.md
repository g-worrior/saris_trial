<h1 align="center">SARIS</h1>
<p align="center">
  <img src="https://img.shields.io/github/license/g-worrior/saris_trial?style=flat-square" alt="License" />
  <img src="https://img.shields.io/github/stars/g-worrior/saris_trial?style=flat-square" alt="Stars" />
  <img src="https://img.shields.io/github/issues/g-worrior/saris_trial?style=flat-square" alt="Issues" />
  <img src="https://img.shields.io/github/last-commit/g-worrior/saris_trial?style=flat-square" alt="Last Commit" />
</p>

<p align="center">
  <strong>Student Academic Record Information System (SARIS)</strong><br>
  A web-based application for managing academic records of students in schools, colleges, and universities.
</p>

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Features

- Manage students' academic records, including grades, transcripts, and attendance.
- Generate reports for individual students or groups of students.
- Manage user accounts and permissions for administrators, teachers, and students.
- Customizable settings for schools, colleges, and universities.

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Composer
- Laravel 8.x

## Installation

1. Clone the repository:
git clone https://github.com/g-worrior/saris_trial.git


2. Install the dependencies:
composer install

3. Copy the `.env.example` file to `.env`:
cp .env.example .env

4. Generate an application key:
php artisan key:generate


5. Set up the database configuration in the `.env` file.

6. Run database migrations:
php artisan migrate

7. Seed the database with sample data (optional):
php artisan db:seed

## Usage

1. Start the development server:
php artisan serve

2. Visit the application at `http://localhost:8000`.

## Contributing

Contributions are welcome! Please see [CONTRIBUTING.md](CONTRIBUTING.md) for more information.

## License

This project is licensed under the MIT License. See [LICENSE](LICENSE) for more information.
