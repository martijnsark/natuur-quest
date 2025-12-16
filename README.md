# Natuur-Quest

---

## About This Project

Natuur-Quest is a project aimed at helping users explore, interact with, and gain insights related to nature. Built using a combination of Blade templates and PHP, the project ensures high performance and maintainable code. This repository encapsulates the logic, data structures, and user interfaces necessary for the application's core functionality.

With 54% of the code written in Blade, the project leans heavily on dynamic and interactive front-end interfaces, while the back-end logic is predominantly written in PHP. This repository is engineered for enthusiasts and developers passionate about blending code and nature.

---

## Packages Used

This project utilizes several open-source PHP and Laravel packages to streamline development. Below is a list of key packages used:

- **Laravel Framework**: Provides the backbone for the project with modern PHP conveniences.
- **Composer**: Used for dependency management and package handling.


---

## Entity Relationship Diagram (ERD)

The Entity Relationship Diagram (ERD) below showcases the logical structure of the database, illustrating the relationships between entities.

Copilot said: Here’s how you can add the **Entity
Here’s how you can add the Entity Relationship Diagram (ERD) into your README in a written format:

Markdown
---

## Entity Relationship Diagram (ERD)

### **Assignment**
- **Columns**: `id`, `game_id`, `user_id`, `role_id`, `created_at`, `updated_at`
- **Relationships**:
  - Belongs to **Game**
  - Belongs to **User**
  - Belongs to **Role**
  - Belongs to many **Word** _(via pivot)_

---

### **Game**
- **Columns**: `id`, `name`, `start_date`, `end_date`, `created_at`, `updated_at`
- **Relationships**:
  - Belongs to many **User** _(via `user_game_role` pivot, with pivot column `role_id`)_
  - Belongs to many **Role** _(via `user_game_role` pivot, with pivot column `user_id`)_
  - Has many **Assignment**

---

### **User**
- **Columns**: `id`, `name`, `email`, `password`, `created_at`, `updated_at`
- **Relationships**:
  - Belongs to many **Game** _(via `user_game_role` pivot, with pivot column `score`)_
  - Belongs to many **Role** _(via `user_game_role` pivot)_

---

### **Role**
- **Columns**: `id`, `name`, `created_at`, `updated_at`
- **Relationships**:
  - Belongs to many **Game** _(via `user_game_role` pivot, with pivot column `user_id`)_
  - Has many **Assignment**

---

### **Word**
- **Columns**: `id`, `word`, `definition`, `created_at`, `updated_at`
- **Relationships**:
  - Belongs to many **Assignment** _(via pivot)_

---

### **Category**
- **Columns**: `id`, `name`, `created_at`, `updated_at`
- **Relationships**:
  - Has many **Fact**

---

### **Fact**
- **Columns**: `id`, `title`, `content`, `category_id`, `created_at`, `updated_at`
- **Relationships**:
  - Belongs to **Category**

---

### **Challenge**
- **Columns**: `id`, `title`, `nature_word`, `created_at`, `updated_at`
- **Relationships**:
  - None explicitly defined in the model.

---

### **UserGameRole (Pivot Table)**  
- **Columns**:
  - `user_id` _(foreign key to **User**)_
  - `game_id` _(foreign key to **Game**)_
  - `role_id` _(foreign key to **Role**)_
- **Used for**:
  - Associating **Users** with **Games** and their corresponding **Roles**.


---

## Installation

To get started with Natuur-Quest locally, follow these steps:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/martijnsark/natuur-quest.git
   cd natuur-quest
   ```

2. **Install Dependencies**:
   Make sure you have Composer installed, then run:
   ```bash
   composer install
   ```

3. **Set Up the Environment**:
   Create a `.env` file from the provided example:
   ```bash
   cp .env.example .env
   ```
   Configure database and other environment variables in `.env`.

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

5. **Run Database Migrations**:
   ```bash
   php artisan migrate
   ```

6. **Start the Server**:
   ```bash
   php artisan serve
   ```

---

## Deployment

For deploying Natuur-Quest to a production environment, ensure the following steps are completed:


---

## Edge Cases

When using or deploying Natuur-Quest, consider the following edge cases to ensure smooth functionality:


---
