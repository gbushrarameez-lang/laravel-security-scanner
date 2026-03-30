# 🔐 Laravel Security Scanner

Laravel Security Scanner is a lightweight developer tool that helps identify common security vulnerabilities in Laravel applications such as SQL Injection, mass assignment, unsafe raw queries, and missing validation.

---

## 🚀 Features

* 🔍 Scan Laravel code for vulnerabilities
* ⚠️ Detect SQL Injection risks
* 🛑 Identify unsafe raw queries (`DB::select`, `whereRaw`, etc.)
* 📦 Detect mass assignment issues (`$request->all()`)
* 🧠 Highlight missing validation
* 📍 Shows file name, line number, and severity
* ⚡ Easy CLI command integration

---

## 📦 Installation

```bash
composer require bushra/laravel-security-scanner
```

---

## ⚙️ Usage

Run the scanner using Artisan:

```bash
php artisan security:scan
```

Optional: Scan a specific directory

```bash
php artisan security:scan app/Http/Controllers
```

---

## 📊 Example Output

```text
[HIGH] UserController.php (Line 12)
Possible SQL Injection

[HIGH] UserController.php (Line 20)
Mass assignment risk

[MEDIUM] UserController.php (Line 35)
Dynamic orderBy - validate input
```

---

## 🧠 What It Detects

### 🔴 High Severity

* SQL Injection (raw queries with variables)
* Unsafe `whereRaw`, `DB::select`, `DB::statement`
* Mass assignment (`$request->all()`)

### 🟠 Medium Severity

* Dynamic column usage (e.g., `orderBy($request->input())`)
* Unsafe update patterns

### 🟡 Low Severity

* Missing validation in controller methods

---

## ❗ Important Notes

* This tool uses pattern-based detection (regex)
* It helps identify common mistakes but does not replace manual code review
* Always follow Laravel best practices for security

---

## 🛠️ Best Practices

* Use Eloquent or Query Builder instead of raw SQL
* Always validate user input
* Avoid `$request->all()` in create/update
* Use parameter binding (`?`) in raw queries

---

## 🔧 Roadmap

* ✅ CLI Scanner
* ⏳ Web UI Interface
* ⏳ Auto-fix suggestions
* ⏳ Configurable rules
* ⏳ CI/CD integration

---

## 🤝 Contributing

Contributions are welcome! Feel free to open issues or submit pull requests.

---

## 📄 License

MIT License

---

## 👩‍💻 Author

Bushra
