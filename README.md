# Simple PHP + MySQL Auth System

Un proiect rapid cu Apache, PHP și MySQL/MariaDB: pagini de login/register, protecție acces pentru home, hash pentru parole și prevenire XSS.

## Caracteristici
- Înregistrare rapidă și autentificare utilizatori
- Parolele sunt stocate *doar* hash-uit cu `password_hash()`
- Pagina "home" accesibilă doar utilizatorilor logați
- Protecție XSS folosind `htmlspecialchars()` pe inputuri afișate
- Cod curat, ușor de adaptat și extins

## Cerințe
- Apache2
- PHP 7.4+ (compatibil cu orice versiune modernă)
- MySQL sau MariaDB
- Permisiuni pe folderul proiectului pentru Apache

## Instalare

1. Clonează repository-ul:

```
git clone https://github.com/user/php-auth-project.git
cd php-auth-project
```

2. Creează baza de date și tabela utilizatori:

```
CREATE DATABASE login_system;
USE login_system;
CREATE TABLE users (
id INT PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(50) UNIQUE,
password VARCHAR(255)
);
```


3. Setează datele de conectare la MySQL în `config.php`.

4. Configurează Apache să servească folderul proiectului (poți folosi orice director, vezi exemplu VirtualHost în README).

5. Accesează `/register.php` pentru înregistrare și `/login.php` pentru autentificare.

## Securitate rapidă

- Parolele nu sunt niciodată expuse sau salvate ca text simplu.
- Escape XSS pentru toate datele primite de la utilizatori.
- Poți extinde cu validări suplimentare sau stiluri CSS custom.

## Licență

MIT License