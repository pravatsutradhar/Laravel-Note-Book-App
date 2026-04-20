# 📓 Laravel Personal Note Taker

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Blade](https://img.shields.io/badge/Blade-Template-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-27ae60?style=for-the-badge)

একটি সুন্দর এবং কার্যকর **Personal Note Taker** অ্যাপ্লিকেশন যা **Laravel 12** দিয়ে তৈরি। রঙিন নোট কার্ড, সম্পূর্ণ CRUD অপারেশন এবং Pagination সহ এই প্রজেক্টটি Laravel শেখার দ্বিতীয় ধাপ।

---

## 🖼️ Preview

```
┌─────────────────────────────────────────────┐
│  📓 আমার নোটবুক              ➕ নতুন নোট   │
├─────────────────────────────────────────────┤
│  ┌──────────┐ ┌──────────┐ ┌──────────┐    │
│  │ 🟡 নোট  │ │ 🔵 নোট  │ │ 🟢 নোট  │    │
│  │ শিরোনাম │ │ শিরোনাম │ │ শিরোনাম │    │
│  │ বিস্তার │ │ বিস্তার │ │ বিস্তার │    │
│  │ ২ ঘণ্টা │ │ ১ দিন   │ │ ৩ দিন   │    │
│  │ 👁 ✏️ 🗑️ │ │ 👁 ✏️ 🗑️ │ │ 👁 ✏️ 🗑️ │    │
│  └──────────┘ └──────────┘ └──────────┘    │
│         ← ১  ২  ৩  →                       │
└─────────────────────────────────────────────┘
```

---

## ✨ Features

- 📝 নতুন নোট তৈরি করা (শিরোনাম + বিস্তারিত + রঙ)
- 👁️ নোট বিস্তারিত দেখা
- ✏️ নোট এডিট করা
- 🗑️ নোট ডিলিট করা
- 🎨 ৪টি রঙ বাছাই (হলুদ, নীল, সবুজ, গোলাপি)
- 📄 Pagination (প্রতি পেজে ৮টি নোট)
- ✅ Form Validation
- 🕐 সময় দেখানো (কতক্ষণ আগে তৈরি)
- 🌱 Fake Data Seeder (২০টি নোট)
- 📱 Responsive Layout

---

## 🛠️ Technologies Used

| Technology | কাজ |
|---|---|
| **Laravel 12** | Backend Framework |
| **PHP 8.2+** | Server Side Language |
| **MySQL 8.0+** | Database |
| **Blade Template** | Frontend View |
| **Eloquent ORM** | Database Interaction |
| **Laravel Pagination** | ডাটা পেজিনেশন |

---

## 📋 Requirements

| সফটওয়্যার | মিনিমাম ভার্সন |
|---|---|
| PHP | >= 8.2 |
| Composer | Latest |
| MySQL | >= 8.0 |
| Node.js | >= 18 |

---

## ⚙️ Installation

### ধাপ ১: Repository Clone করুন

```bash
git clone https://github.com/pravatsutradhar/Laravel-Note-App.git
cd Laravel-Note-App
```

### ধাপ ২: Dependencies ইনস্টল করুন

```bash
composer install
```

### ধাপ ৩: Environment ফাইল তৈরি করুন

```bash
cp .env.example .env
php artisan key:generate
```

### ধাপ ৪: ডাটাবেস কনফিগার করুন

`.env` ফাইলে এই অংশ আপডেট করুন:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=note_app
DB_USERNAME=root
DB_PASSWORD=
```

### ধাপ ৫: Migration রান করুন

```bash
php artisan migrate
```

### ধাপ ৬: Fake Data তৈরি করুন (Optional)

```bash
php artisan db:seed
```

> এটি ২০টি sample নোট তৈরি করবে।

### ধাপ ৭: সার্ভার চালু করুন

```bash
php artisan serve
```

ব্রাউজারে যান: **http://localhost:8000**

---

## 📁 Project Structure

```
Laravel-Note-App/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── NoteController.php    # CRUD Logic
│   └── Models/
│       └── Note.php                  # Note Model
│
├── database/
│   ├── factories/
│   │   └── NoteFactory.php           # Fake Data Factory
│   ├── migrations/
│   │   └── ..._create_notes_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── NoteSeeder.php
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php         # Master Layout
│       └── notes/
│           ├── index.blade.php       # সব নোট + Pagination
│           ├── create.blade.php      # নতুন নোট ফর্ম
│           ├── show.blade.php        # নোট বিস্তারিত
│           └── edit.blade.php        # নোট এডিট ফর্ম
│
└── routes/
    └── web.php                       # All Routes
```

---

## 🗺️ Routes

| Method | URL | Controller Method | কাজ |
|---|---|---|---|
| GET | `/notes` | index | সব নোট দেখাবে |
| GET | `/notes/create` | create | নতুন নোট ফর্ম |
| POST | `/notes` | store | নোট সেভ করবে |
| GET | `/notes/{id}` | show | একটি নোট দেখাবে |
| GET | `/notes/{id}/edit` | edit | এডিট ফর্ম দেখাবে |
| PUT | `/notes/{id}` | update | নোট আপডেট করবে |
| DELETE | `/notes/{id}` | destroy | নোট মুছবে |

---

## 🗄️ Database Schema

```sql
CREATE TABLE notes (
    id         BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title      VARCHAR(255) NOT NULL,
    body       TEXT NOT NULL,
    color      VARCHAR(50) DEFAULT 'yellow',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

---

## 📚 What I Learned

### প্রজেক্ট ১ থেকে পার্থক্য:

| বিষয় | প্রজেক্ট ১ (Todo) | প্রজেক্ট ২ (Note) |
|---|---|---|
| **View** | শুধু index | index, create, show, edit |
| **Route** | Manual Routes | `Route::resource()` |
| **Layout** | নেই | `@extends`, `@yield`, `@section` |
| **Input** | শুধু text | text + textarea + radio |
| **Pagination** | নেই | `paginate(8)` |

### নতুন যা শিখলাম:
- 🔹 **Route::resource()** — একলাইনে ৭টি রাউট
- 🔹 **@extends & @yield** — Master Layout তৈরি
- 🔹 **Route Model Binding** — URL থেকে সরাসরি Model
- 🔹 **paginate()** — ডাটা পেজিনেশন
- 🔹 **diffForHumans()** — সময় দেখানো
- 🔹 **$request->only()** — নির্দিষ্ট ফিল্ড নেওয়া
- 🔹 **old('field', $model->field)** — এডিটে পুরনো ভ্যালু দেখানো

---

## 🗺️ Laravel Learning Roadmap

এই প্রজেক্টটি একটি **৬০ প্রজেক্টের Laravel রোডম্যাপ** এর দ্বিতীয় প্রজেক্ট।

| ধাপ | বিষয় | স্ট্যাটাস |
|---|---|---|
| ধাপ ১ | **To-Do List** (CRUD & Blade) | ✅ সম্পন্ন |
| ধাপ ২ | **Note Taker** (Layout, Pagination) | ✅ সম্পন্ন |
| ধাপ ৩ | **Student List Manager** | 🔄 চলমান |
| ধাপ ৪ | Authentication & File Handling | ⏳ আসছে |
| ধাপ ৫ | Eloquent Relationships | ⏳ আসছে |
| ধাপ ৬ | Middleware, Mail, API | ⏳ আসছে |
| ধাপ ৭ | Real-World Commercial Apps | ⏳ আসছে |

---

## 🔗 Related Projects

| প্রজেক্ট | Repository |
|---|---|
| ১. To-Do List | [Laravel-Todo-App](https://github.com/pravatsutradhar/Laravel-Todo-App) |
| ২. Note Taker | এই প্রজেক্ট |

---

## 👨‍💻 Author

**Pravat Sutradhar**
- GitHub: [@pravatsutradhar](https://github.com/pravatsutradhar)

---

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

---

⭐ এই প্রজেক্টটি ভালো লাগলে **Star** দিন!