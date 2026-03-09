# 🔐 Password Generator

A simple and secure password generator that creates strong random passwords.
This project is designed to help users quickly generate passwords that are difficult to guess or brute-force.

## 📌 Features

* Generate secure random passwords
* Customizable password length
* Option to include:

  * Uppercase letters (`A-Z`)
  * Lowercase letters (`a-z`)
  * Numbers (`0-9`)
  * Special characters (`!@#$%^&*`)
* Lightweight and easy to use
* Simple codebase suitable for learning or extension

## 🛠️ Built With

* **PHP** – backend password generation logic
* **HTML/CSS** – basic interface (if used)
* **JavaScript** – optional client-side interactions

## 📂 Project Structure

```
Password-generator/
│
├── index.php          # Main interface (if applicable)
├── generator.php      # Password generation logic
├── style.css          # Styling (optional)
└── README.md          # Project documentation
```

*(File names may vary depending on implementation.)*

## 🚀 Installation

1. Clone the repository:

```bash
git clone https://github.com/Lazaro549/Password-generator.git
```

2. Navigate to the project directory:

```bash
cd Password-generator
```

3. Run the project with a local PHP server:

```bash
php -S localhost:8000
```

4. Open your browser and go to:

```
http://localhost:8000
```

## 💻 Example Usage

Example PHP logic for generating a password:

```php
function generatePassword($length = 12) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[random_int(0, strlen($characters) - 1)];
    }

    return $password;
}

echo generatePassword(16);
```

Example output:

```
fT9@K2!zQ7x#Lp1$
```

## 🔒 Security Notes

* Uses `random_int()` for cryptographically secure randomness.
* Avoid using `rand()` or `mt_rand()` for password generation in production environments.
* Always hash passwords before storing them using `password_hash()`.

Example:

```php
$hash = password_hash($password, PASSWORD_DEFAULT);
```

## 🤝 Contributing

Contributions are welcome.

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Submit a Pull Request

## 📄 License

This project is open source and available under the **MIT License**.

---

⭐ If you find this project useful, consider giving the repository a star!
