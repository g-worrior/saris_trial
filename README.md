<h1 align="center">SARIS</h1>

<p align="center">
  <img src="https://img.shields.io/github/license/g-worrior/saris_trial?style=flat-square" alt="License" />
  <img src="https://img.shields.io/github/stars/g-worrior/saris_trial?style=flat-square" alt="Stars" />
  <img src="https://img.shields.io/github/issues/g-worrior/saris_trial?style=flat-square" alt="Issues" />
  <img src="https://img.shields.io/github/last-commit/g-worrior/saris_trial?style=flat-square" alt="Last Commit" />
</p>

<p align="center">
  <strong>School Automated Record and Information System (SARIS)</strong> is a web application designed to manage student records, courses, and grades. It aims to simplify and streamline the process of managing academic data for educational institutions.
</p>

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Features

- Create, update, and delete student profiles
- Manage student enrollment and enrollment history
- Assign courses to students and instructors
- Record and grade assignments and exams
- View academic progress reports for students
- Generate transcripts and other reports

## Installation

1. Clone the repository: `git clone https://github.com/g-worrior/saris_trial.git`
2. Install dependencies: `composer install`
3. Configure the `.env` file with your database settings and other environment variables
4. Migrate the database: `php artisan migrate`
5. Seed the database with sample data: `php artisan db:seed`

## Usage

1. Start the application: `php artisan serve`
2. Navigate to `http://localhost:8000` in your browser
3. Log in with the default credentials:
   - Username: admin@example.com
   - Password: password

## Contributing

Contributions are welcome! If you find a bug or have a feature request, please open an issue or submit a pull request.

## License

SARIS is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
