#Symfony, Nginx, php-fpm, Postgres project

## Installation

### 1. Clone the project

```bash
git clone
```

### 2. Install dependencies

```bash
composer install
```

### 3. Run the docker containers

```bash
make dc_up
```

### 4. Run the migrations

```bash
make db_migrate
```

## Description

### 1. Symfony

Symfony is a PHP framework for web and console applications and a set of reusable PHP components. Symfony is used by thousands of web applications (including BlaBlaCar.com and Spotify.com) and most of the popular PHP projects (including Drupal and Magento).

### 2. Nginx

Nginx is a web server that can also be used as a reverse proxy, load balancer, mail proxy and HTTP cache.

### 3. php-fpm

PHP-FPM (FastCGI Process Manager) is an alternative PHP FastCGI implementation with some additional features useful for sites of any size, especially busier sites.

### 4. Postgres

PostgreSQL is a powerful, open source object-relational database system with over 30 years of active development that has earned it a strong reputation for reliability, feature robustness, and performance.

## Messenger

### 1. Description

The Messenger component helps applications send and receive messages to/from other applications or via message queues. This component implements the **"publish-subscribe"** pattern: data producers, called publishers, send the messages, and data consumers, called subscribers, receive them.

You can see, that we have a **MessageHandler** class, which implements **MessageHandlerInterface**. This interface has only one method **__invoke()**. This method will be called when the message is received. In our case, we just log the message.
