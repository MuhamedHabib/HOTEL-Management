# Hotel Management

> An academic Symfony web application for managing a hotel/booking catalogue — offers, products, categories, orders, booking requests, a shopping cart, and a contact form.

![PHP](https://img.shields.io/badge/PHP-%3E%3D7.1.3-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Symfony](https://img.shields.io/badge/Symfony-4.4-000000?style=for-the-badge&logo=symfony&logoColor=white)
![Doctrine](https://img.shields.io/badge/Doctrine-ORM-FC6A31?style=for-the-badge&logo=doctrine&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-database-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Twig](https://img.shields.io/badge/Twig-templates-1E8E3E?style=for-the-badge&logo=twig&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-UI%20theme-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)

## Overview

Hotel Management is a student/academic project built with **Symfony 4.4** (PHP). It implements a back-office plus a public front-end for a hotel-style booking and product catalogue. The application uses **Doctrine ORM** over a **MySQL** database, renders views with **Twig**, builds and validates HTML forms with the Symfony Form component, sends e-mails through SwiftMailer, paginates lists with KnpPaginatorBundle, and renders simple statistics charts with the Google Charts bundle.

The actual project code lives under `FirstProject/` in this repository.

> Naming note: variables, routes, and templates mix English and French (e.g. `Commande` = order, `Demande` = request/booking, `Offre` = offer, `Recherche` = search). This README describes them in English.

## Features

Grounded in the controllers, entities, forms, and Twig templates present in the repo:

- **Offers management (`/offre`)** — full CRUD for hotel offers, each with title, price, number of places, description, location, style, and an uploaded image. The public offers list is paginated.
- **Products & categories (`/prod`, `/category`)** — CRUD for products (title, image, price) linked to categories (title, slug) via a Doctrine `OneToMany` relationship. Product lists are paginated, and a category statistics view uses Google Charts.
- **Orders (`/commande`)** — CRUD for customer orders capturing name, surname, e-mail, city, postal code, address, and phone, plus a simple order search by customer name (`/commande/rechercheM`).
- **Booking requests (`/demande`)** — CRUD for booking/enquiry requests (full name, contact, start date, image).
- **Shopping cart (`/cart`)** — session-based cart with add, remove, decrement, delete-one, and empty-cart actions.
- **Contact form (`/contact`, `/contact2`)** — public contact form that persists messages to the database and sends an HTML e-mail via SwiftMailer using Twig e-mail templates.
- **Home / landing pages** — separate public and admin landing controllers (`/accueil`, `/accueiladmin`, `/acceuilFirstTemplate`) with their own base layouts and bundled front-office / back-office theme assets.
- **Image/file uploads** — uploaded images and brochures are stored under `public/uploads/`.

## Tech Stack

- **Language:** PHP (>= 7.1.3)
- **Framework:** Symfony 4.4 (framework-bundle, form, validator, security-bundle, serializer, translation, mailer)
- **ORM / Database:** Doctrine ORM + Doctrine Migrations, MySQL
- **Templating:** Twig
- **Forms & validation:** Symfony Form + Validator components
- **Pagination:** KnpPaginatorBundle
- **Charts:** cmen/google-charts-bundle
- **E-mail:** SwiftMailer (`symfony/swiftmailer-bundle`) + Symfony Mailer
- **Admin scaffolding:** EasyAdmin bundle (`easycorp/easyadmin-bundle`)
- **Front-end assets:** bundled Bootstrap-based admin/front themes, jQuery plugins, and CSS/JS under `public/` (no build step required)
- **Testing:** PHPUnit (`phpunit/phpunit ^9.5`), Symfony test/browser-kit components
- **Tooling:** Composer (a `composer.phar` is vendored in the project)

## Project Structure

```
HOTEL-Management/
└── FirstProject/                 # Symfony application root
    ├── composer.json             # Dependencies (Symfony 4.4 stack)
    ├── config/                   # Bundles, routes, services, package configs
    │   └── packages/             # doctrine, security, mailer, twig, etc.
    ├── migrations/               # Doctrine migration files (schema)
    ├── public/                   # Web root (index.php) + theme assets & uploads
    │   ├── backend/  backoffice/ # Back-office theme assets (Bootstrap, jQuery)
    │   ├── frontend/ frontoffice/# Front-office theme assets
    │   └── uploads/              # Uploaded images / brochures
    ├── src/
    │   ├── Controller/           # Offre, Products, Category, Commande, Demande,
    │   │                         #   Contact, Cart, Accueil controllers
    │   ├── Entity/               # Offre, Products, Category, Commande, Demande,
    │   │                         #   Contact, PropertySearch
    │   ├── Form/                 # Symfony form types per entity
    │   ├── Repository/           # Doctrine repositories
    │   └── Kernel.php
    ├── templates/                # Twig views (per entity + base layouts + emails)
    ├── translations/
    └── tests/
```

> Note: the repository also contains a nested duplicate `FirstProject/FirstProject/` copy of the application. Treat the top-level `FirstProject/` as the primary application.

## Getting Started

Routes are declared via annotations in the controllers. Requirements: PHP >= 7.1.3, Composer, and a MySQL server.

```bash
# 1. Clone and enter the application directory
git clone https://github.com/MuhamedHabib/HOTEL-Management.git
cd HOTEL-Management/FirstProject

# 2. Install PHP dependencies
composer install

# 3. Create your own local environment file (do NOT use the committed .env — see Notes)
#    Set your own values for DATABASE_URL, MAILER_URL, and APP_SECRET.
cp .env .env.local   # then edit .env.local with YOUR credentials

# 4. Create the database schema (Doctrine)
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

# 5. Run the application
php -S 127.0.0.1:8000 -t public
#    (or, if the Symfony CLI is installed:  symfony serve)
```

Then open `http://127.0.0.1:8000/accueil` (or `/offre`, `/prod`, `/cart`, `/contact`).

> This project pins Symfony **4.4**, which targets older PHP versions. On modern PHP you may need to adjust dependency constraints or run under PHP 7.x / early 8.x.

## Notes

- **Academic project.** This is a student/learning project. It is feature-oriented but not production-hardened: there is no real user authentication or login system — `config/packages/security.yaml` uses an empty in-memory provider with anonymous access, so administrative CRUD routes are not access-controlled.
- **Mixed-language naming.** Source identifiers, routes, and templates mix French and English. The descriptions above translate them to English.
- **Code is under `FirstProject/`.** A second, nested `FirstProject/FirstProject/` copy also exists in the repo and appears to be a duplicate.

### Security warning — committed `.env` files

> **A populated `.env` file is committed to version control in this repository** (both `FirstProject/.env` and the nested `FirstProject/FirstProject/.env`). These files contain **real, non-placeholder secrets**, including:
>
> - `APP_SECRET` (Symfony application secret)
> - `DATABASE_URL` with embedded **MySQL username and password**
> - `MAILER_URL` with mail-transport configuration
>
> These secrets are **not** reproduced in this README on purpose. If you control this repository, you should:
>
> 1. **Remove the `.env` files from version control** and keep only a sanitized `.env.dist` / `.env.example` with placeholder values. Symfony's default `.gitignore` only ignores `.env.local`, so the base `.env` was committed by mistake — store real values in `.env.local` instead.
> 2. **Rotate every committed secret immediately** — regenerate `APP_SECRET`, change the database password, and reset the mail credentials. Anything once pushed to a public host must be treated as compromised.
> 3. **Purge the secrets from git history** (e.g. with `git filter-repo` or BFG), since removing the file in a new commit does not erase it from earlier history.

---
<p align="center">Built by <b>Mohamed Habib Khattat</b> — <a href="https://github.com/MuhamedHabib">GitHub (@MuhamedHabib)</a> · <a href="https://www.linkedin.com/in/mohamed-habib-khattat-2b206a173">LinkedIn</a></p>
