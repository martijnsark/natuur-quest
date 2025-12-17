# Natuur-Quest

---

## About This Project

Natuur-Quest is a project aimed at helping users explore, interact with, and gain insights related to nature. Built using a combination of Blade templates and PHP, the project ensures high performance and maintainable code. This repository encapsulates the logic, data structures, and user interfaces necessary for the application's core functionality.

With 54% of the code written in Blade, the project leans heavily on dynamic and interactive front-end interfaces, while the back-end logic is predominantly written in PHP. This repository is engineered for enthusiasts and developers passionate about blending code and nature.

---

## Packages Used

This project utilizes several open-source PHP and Laravel packages to streamline development. Below is a list of key packages used:

- `fakerphp/faker` (version ^1.23)
- `laravel/breeze`
- `laravel/pail` (version ^1.2.2)
- `laravel/pint` (version ^1.24)
- `laravel/sail` (version ^1.41)
- `mockery/mockery` (version ^1.6)
- `nunomaduro/collision` (version ^8.6)
- `pestphp/pest` (version ^4.1)
- `pestphp/pest-plugin-laravel` (version ^4.0)


---

## Entity Relationship Diagram (ERD)

The Entity Relationship Diagram (ERD) below showcases the logical structure of the database, illustrating the relationships between entities.

```mermaid
erDiagram
    users {
        int id PK
        string name
        string email UNIQUE
        timestamp email_verified_at
        string password
        string rememberToken
        timestamp created_at
        timestamp updated_at
        int balance "Default: 0"
    }

    password_reset_tokens {
        string email PK
        string token
        timestamp created_at
    }

    sessions {
        string id PK
        int user_id FK
        string ip_address
        text user_agent
        longText payload
        int last_activity
    }

    cache {
        string key PK
        mediumText value
        int expiration
    }

    cache_locks {
        string key PK
        string owner
        int expiration
    }

    jobs {
        int id PK
        string queue
        longText payload
        tinyint attempts
        int reserved_at
        int available_at
        int created_at
    }

    job_batches {
        string id PK
        string name
        int total_jobs
        int pending_jobs
        int failed_jobs
        longText failed_job_ids
        mediumText options
        int cancelled_at
        int created_at
        int finished_at
    }

    failed_jobs {
        int id PK
        string uuid UNIQUE
        text connection
        text queue
        longText payload
        longText exception
        timestamp failed_at
    }

    roles {
        int id PK
        char name
        timestamp created_at
        timestamp updated_at
    }

    assignments {
        int id PK
        int game_id FK
        int role_id FK
        int user_id FK
        int score "Default: 0"
        boolean active
        timestamp created_at
        timestamp updated_at
    }

    assignment_word {
        int id PK
        int word_id FK
        int assignment_id FK
        timestamp created_at
        timestamp updated_at
    }

    words {
        int id PK
        char name
        timestamp created_at
        timestamp updated_at
    }

    games {
        int id PK
        boolean active
        int photo_round_word_id FK
        int photo_round_winner_user_id FK
        timestamp photo_round_judged_at
        timestamp created_at
        timestamp updated_at
    }

    game_user {
        int id PK
        int user_id FK
        int game_id FK
        int score "Default: 0"
        timestamp created_at
        timestamp updated_at
    }

    user_game_role {
        int id PK
        int user_id FK
        int game_id FK
        int role_id FK
        timestamp created_at
        timestamp updated_at
    }

    challenges {
        int id PK
        string title
        string nature_word
        timestamp created_at
        timestamp updated_at
    }

    categories {
        int id PK
        string name
        timestamp created_at
        timestamp updated_at
    }

    facts {
        int id PK
        string title
        text content
        int category_id FK
        timestamp created_at
        timestamp updated_at
    }

    photos {
        int id PK
        int assignment_id FK
        int word_id FK
        string photo
        string original_name
        string mime
        unsignedBigInteger size
        timestamp created_at
        timestamp updated_at
    }

    photo_results {
        int id PK
        int game_id FK
        int word_id FK
        int winner_user_id FK
        timestamp created_at
        timestamp updated_at
    }

    photo_judgements {
        int id PK
        int game_id FK
        int word_id FK
        int winner_user_id FK
        timestamp created_at
        timestamp updated_at
    }

    users ||--|| sessions: "Has many"
    users ||--o| password_reset_tokens: "Has one"
    users ||--o{ game_user: "Participates in many"
    users ||--o{ user_game_role: "Has many roles in games"
    users ||--o{ assignments: "Can have assignments"
    users ||--o{ photo_results: "Can be winner"
    users ||--o{ photo_judgements: "Can be winner"
    
    games ||--o{ game_user: "Includes many players"
    games ||--o| assignments: "Has assignments"
    games ||--o{ photo_results: "Includes results"
    games ||--|{ photo_judgements: "Includes judgements"
    
    roles ||--o{ user_game_role: "Can be assigned"
    
    assignments ||--|{ assignment_word: "Contains words"
    
    categories ||--o{ facts: "Has many facts"
    
    photos ||--o{ assignments: "Belongs to assignment"
    photos ||--o{ words: "Linked to specific word"
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
