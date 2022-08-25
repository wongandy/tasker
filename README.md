# Tasker

A web app for assigning tasks to users.


## Features
- Admins can create and assign tasks to users.
- Admins can view the statuses of assigned tasks.
- Admins will receive email whenever new users are registered.
- Admins will receive email whenever a user has completed a task.
- Users can change the status of their tasks.


## Tech Stack

**Front-end framework:** TailwindCSS

**Back-end framework:** Laravel

# Tasker
A web app for assigning tasks to users.

## Installation

First, install backend dependencies

```bash
  composer install
```
Generate an .env file and edit it with your own database details

```bash
  cp .env.example .env
```
Then generate keys

```bash
  php artisan key:generate
```
Install frontend dependencies 

```bash
  npm install && npm run dev
```

Run migration code to setup database schema

```bash
  php artisan migrate
```
And if you wish to run seeders
```bash
  php artisan db:seed
```




