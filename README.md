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

```plantuml
@startuml
title Entity Relationship Diagram

entity "Assignment" {
    * id
    --
    * game_id
    * user_id
    * role_id
    * created_at
    * updated_at
}

entity "Game" {
    * id
    --
    * name
    * start_date
    * end_date
    * created_at
    * updated_at
}

entity "User" {
    * id
    --
    * name
    * email
    * password
    * created_at
    * updated_at
}

entity "Role" {
    * id
    --
    * name
    * created_at
    * updated_at
}

entity "Word" {
    * id
    --
    * word
    * definition
    * created_at
    * updated_at
}

entity "Category" {
    * id
    --
    * name
    * created_at
    * updated_at
}

entity "Fact" {
    * id
    --
    * title
    * content
    * category_id
    * created_at
    * updated_at
}

entity "Challenge" {
    * id
    --
    * title
    * nature_word
    * created_at
    * updated_at
}

entity "UserGameRole" <<pivot>> {
    * user_id
    --
    * game_id
    * role_id
}

Assignment }o--|| Game : belongsTo
Assignment }o--|| User : belongsTo
Assignment }o--|| Role : belongsTo
Assignment }o--o{ Word : belongsToMany

Game ||--o{ UserGameRole : hasMany
Game ||--o{ Assignment : hasMany
Game }o--|| Role : belongsToMany

Role ||--o{ Assignment : hasMany
Role ||--o{ UserGameRole : hasMany

User ||--o{ UserGameRole : hasMany
User }o--|| Role : belongsToMany

Word }o--o{ Assignment : belongsToMany

Category ||--o{ Fact : hasMany

Fact }o--|| Category : belongsTo
@enduml
```


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
