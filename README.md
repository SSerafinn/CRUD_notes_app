# Notes App — Complete CRUD Reference (ITE 116)

Laravel 13 · PHP 8.3+ · SQLite · Create, Read, Update, Delete

## Setup

1. Create a project (choose **Starter kit: None**, **Database: SQLite**):

       laravel new notes-app
       cd notes-app

2. Copy these files into the matching folders, replacing `routes/web.php`:

       app/Models/Note.php
       app/Http/Controllers/NoteController.php
       database/migrations/2026_01_01_000000_create_notes_table.php
       routes/web.php
       resources/views/layout.blade.php
       resources/views/notes/index.blade.php
       resources/views/notes/create.blade.php
       resources/views/notes/edit.blade.php

3. Create the table and start the server:

       php artisan migrate
       php artisan serve or composer run dev


4. Open http://127.0.0.1:8000 — it redirects to /notes.

> If you generate your own model with `php artisan make:model Note -m`, keep the
> migration filename Artisan creates and paste in the `Schema::create` block
> instead of copying this migration file.

## Routes

| Method | URL                | Controller | Name          |
|--------|--------------------|------------|---------------|
| GET    | /notes             | index      | notes.index   |
| GET    | /notes/create      | create     | notes.create  |
| POST   | /notes             | store      | notes.store   |
| GET    | /notes/{note}/edit | edit       | notes.edit    |
| PUT    | /notes/{note}      | update     | notes.update  |
| DELETE | /notes/{note}      | destroy    | notes.destroy |

## Common errors

| Error                                   | Fix                                              |
|-----------------------------------------|--------------------------------------------------|
| 419 Page Expired                        | add `@csrf` to the form                          |
| 405 Method Not Allowed                  | add `@method('PUT')` or `@method('DELETE')`      |
| Add [title] to fillable property        | list the field in the model's `$fillable`        |
| no such table: notes                    | run `php artisan migrate`                        |
| Route [notes.x] not defined             | check `->name(...)` in `routes/web.php`          |
