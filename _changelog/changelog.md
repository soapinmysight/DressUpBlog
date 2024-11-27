# Changelog

---

## About this Project
This project is built using Laravel 11 and p5.js.


---
### 09/10/2024
Initialized project and added Breeze
#### Added
- **Test pages**: about-us, test, home, contact
- **Test controllers**: AboutUsController, HomeController, ContactController
- **Changelog**: Added file with mock-up for changelogs

- **ERD**: I wrote the Erd

#### Changed
- **web.php**:  Added routes for test pages & controllers

### Source
[Laracast laravel 11 epidode 1](https://laracasts.com/series/30-days-to-learn-laravel-11/episodes/1)
[Laracast laravel 11 epidode 2](https://laracasts.com/series/30-days-to-learn-laravel-11/episodes/2)
 
---
### 14/10/2024
#### Added
- **Dress-up Flashgame**: Placeholder character and clothing assets in public, logic for putting on and off clothing in canvas.blade.php. Added comments for readability. Added game.js file for logic later on.
- **A navbar**: In contact.blade.php and about-us.blade.php

#### Changed
- **web.php**:  Added route fot canvas.blade.php
- **layout.blade.php**:  Added canvas.blade.php to navbar

#### Fixed
- **home.blade.php and layout.blade.php**: So that home's content is in home and the controller &routing works

### Source
[P5.js get started tutorial](https://p5js.org/tutorials/get-started/)
[P5.js draw](https://p5js.org/reference/p5/draw/)
[P5.js mousePressed](https://p5js.org/reference/p5/mousePressed/)
[P5.js loadImage](https://p5js.org/reference/p5/loadImage/)
[P5.js save image](https://p5js.org/reference/p5.Image/save/)
[Laracast laravel 11 epidode 3](https://laracasts.com/series/30-days-to-learn-laravel-11/episodes/3)
 
---

### 16/10/2024
#### Added
- **Items for dress-up game**: Placeholder item assets in public, logic for putting items on and off clothing in canvas.blade.php.
- **navlink-cast5.blade.php**: Created for navigation links with active page highlighting.

#### Changed
- **web.php**:  Added route fot canvas.blade.php

#### Fixed
- **home.blade.php and layout.blade.php**: So that home's content is in home and the controller &routing works

### Source
[Laracast laravel 11 epidode 4](https://laracasts.com/series/30-days-to-learn-laravel-11/episodes/4)
[Laracast laravel 11 epidode 5](https://laracasts.com/series/30-days-to-learn-laravel-11/episodes/5)

---

### 17/10/2024
#### Added
- **Blog, Theme, and Comment Features**:
    - Created controllers, models, and migrations.
    - Blog: Added `index.blade.php` for listing blogs, `show.blade.php` for blog details.
    - Theme: Added `create.blade.php` for creating themes.
    - Comments: Initial work on showing and creating comments. Asked for help and updated the models for relationships.

#### Changed
- **web.php**: Added routes for new features.
- **Navbar**: Started using breeze's navigation bar istead of my own.

### Source
[Eloquent Relationships Documentation](https://laravel.com/docs/11.x/eloquent-relationships)  
[Laracast Laravel 11 Episode 11](https://laracasts.com/series/30-days-to-learn-laravel-11/episodes/11)

---

### 18/10/2024
#### Added
- **Dress-up Game Updates**: Added hats and other items with placeholder assets.
- **Navigation Updates**: Updated logo in `navigation.blade.php`.

---

### 22/10/2024
#### Added
- **Post Creation**: Added form for creating a post with logic in `BlogController.php`, navigation updates, and route changes.
- **User Association with Blogs**: Added `user_id` foreign key to blogs for tracking creators. Started styling `index.blade.php`.

---

### 07/11/2024
#### Added
- **Dress-up Game Assets**: Added character, mannequin, and clothing assets in `public/images/game`. Updated `game_partial.blade.php`.
- **Next Steps**: Planned "finish outfit" button for redirecting to blog creation with an outfit image.

---

### 08/11/2024
#### Fixed
- **Roles and Middleware**: Implemented role assignment (user/admin). Struggled with routing but resolved with middleware changes in `bootstrap/app.php`.

---

### 09/11/2024
#### Added
- **Admin Role Functionality**: Routing, controller, views, and navigation for admin.

#### Fixed
- **User Routing**: Debugged routing issues for user pages.

---

### 11/11/2024
#### Added
- **Author Display**: Displayed blog author names using updated models and controllers.
- **CRUD Enhancements**: Focused on CRUD for blogs and comments.

---

### 13/11/2024
#### Added
- **Blog Editing**: Added `edit.blade.php` and updated logic in `BlogController.php` and `AppServiceProvider.php`.
- I made sure I have form validation for the blog edit and create functionalities. (title and description are required). An email adress check is done by breeze at for example login.
- IMAGES FORM VALIDATION

#### Changed
- **Views**: Moved edit button to `show.blade.php`.

---

### 14/11/2024
#### Fixed
- **Comments CRUD**: Added and debugged CRUD for comments, including policies and views.

---

### 19/11/2024
#### Added
- **User Restrictions**: Users can only comment if they’ve posted three blogs.
- **Theme Selection**: Added functionality to choose themes during blog creation.

---

### 23/11/2024
#### Added
- **Admin Theme CRUD**: Completed CRUD operations for admin themes and styled the pages.

#### Changed
- **User Views**: Minor styling updates.

---

### 24/11/2024
#### Added
- **Search Functionality**: Implemented search for `user.blog.index`.

---

### 26/11/2024
#### Fixed
- **Image Submission Issue**: Resolved by ensuring submit button triggers image-saving logic. Added final logic for saving images in blogs.

### Source
[Laravel Filesystem](https://laravel.com/docs/11.x/filesystem)  
[W3Schools PHP Functions](https://www.w3schools.com/php/)
