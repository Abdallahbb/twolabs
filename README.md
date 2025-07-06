# 🧿 Eye Clinic Management System

A web-based eye clinic management system built with Laravel, tailored for eye clinics. It includes features such as:

- 📅 Appointment Scheduling
- 🛍️ Optical Product Catalog
- 🛒 Cart and Checkout
- 🧑‍⚕️ Admin Dashboard
- 📬 Automated Email Notifications

This system is designed to help clinics streamline operations, improve customer service, and modernize their service delivery.

## ⚙️ Technologies Used

- Laravel (PHP)
- MySQL
- Bootstrap 5
- Blade Templating Engine
- JavaScript
- Monnify API (test integration)
- XAMPP (local development server)

## 📂 Project Structure

```
├── app/
├── routes/
├── resources/views/
├── public/
├── database/migrations/
└── .env.example
```a

## 🚀 How to Run Locally

1. Clone the repository:
```bash
git clone https://github.com/your-username/eye-clinic-system.git
cd eye-clinic-system
```

2. Install dependencies:
```bash
composer install
npm install && npm run dev
```

3. Setup environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Run migrations:
```bash
php artisan migrate --seed
```

5. Start development server:
```bash
php artisan serve
```

## 🧑‍💻 Developers

- Adam Sani
- Abdallah Abdulrahman

Under the supervision of Mr. Umar Shehu Abdulwahab,  
Department of Computer Science,  
Lincoln College of Science, Management and Technology, Kano.
