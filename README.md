# LiteMVC

**LiteMVC** is a lightweight and clean PHP MVC framework designed for developers who want simplicity, speed, and full control over their application structure. It’s perfect for small to mid-sized projects and learning the MVC pattern.

---

## 📁 Folder Structure

```
litemvc/
├── app/
│   ├── config/                # App configuration
│   │   └── config.php
│   ├── controllers/          # Controller files (e.g. Pages.php)
│   ├── helpers/              # Helper functions (optional)
│   ├── libraries/            # Core framework classes
│   │   ├── Controller.php    # Base controller class
│   │   ├── Core.php          # URL handling & routing
│   │   └── Database.php      # Database abstraction with PDO
│   ├── models/               # Your data models
│   ├── views/                # View files (HTML + PHP)
│   │   ├── inc/              # Reusable partials (header, footer)
│   │   │   ├── header.php
│   │   │   └── footer.php
│   │   └── pages/            # Page-specific views
│   │       ├── index.php
│   │       └── about.php
│   └── bootstrap.php         # Initializes core libraries
│
├── public/                   # Public assets and entry point
│   ├── css/
│   ├── js/
│   ├── images/
│   └── .htaccess             # Rewrite URLs for pretty routing
│
└── README.md                 # You are here!
```

---

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/litemvc.git
```

### 2. Configure Apache

Point your server's document root to the `public/` folder inside `litemvc/`.

Make sure `.htaccess` is enabled and `mod_rewrite` is turned on in Apache.

```apacheconf
# public/.htaccess
<IfModule mod_rewrite.c>
    Options -Multiviews
    RewriteEngine On
    RewriteBase /your-project-name/public  # Replace 'your-project-name' with the actual folder name of your project
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
</IfModule>
```

### 3. Configure the App

Edit `app/config/config.php`:

```php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', '__YOUR_DB_USER__');
define('DB_PASS', '__YOUR_DB_PASS__');
define('DB_NAME', '__YOUR_DB_NAME__');

// App constants
define('APPROOT', dirname(dirname(__FILE__)));
define('URLROOT', '__YOUR_URL_ROOT__'); // e.g. http://localhost/litemvc/public
define('SITENAME', '__YOUR_SITE_NAME__');
```

---

## ✍️ Example Usage

### Controller (app/controllers/Pages.php)

```php
class Pages extends Controller {
    public function index() {
        $data = ['title' => 'Welcome to LiteMVC'];
        $this->view('pages/index', $data);
    }

    public function about() {
        $data = ['title' => 'About Us'];
        $this->view('pages/about', $data);
    }
}
```

### View (app/views/pages/index.php)

```php
<?php require APPROOT . '/views/inc/header.php'; ?>
<h1><?php echo $data['title']; ?></h1>
<p>This is the LiteMVC homepage.</p>
<?php require APPROOT . '/views/inc/footer.php'; ?>
```

---

## 🧐 How It Works

- **Routing:** URLs are parsed by `Core.php` and routed to the correct controller/method.
- **Controllers:** Extend the base `Controller.php` to load models and views.
- **Models:** Use `Database.php` (PDO wrapper) to interact with your database.
- **Views:** Stored in `app/views`, and loaded dynamically using `$this->view()`.

---

## ✅ Requirements

- PHP 7.4 or higher
- Apache web server with mod_rewrite enabled
- MySQL or MariaDB

---

## 🧪 Example URL

```
http://localhost/litemvc/public/pages/about
```

- Loads the `Pages` controller
- Calls the `about()` method
- Loads `views/pages/about.php`

---

## 📝 License

MIT — Free to use, modify, and distribute.

---

## 🙌 Author

Developed by [Nazmun Sakib](https://github.com/nazmunsakib)  
If you like it, please ⭐ the repo!# sharePost
