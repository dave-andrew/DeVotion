# DeVotion
DeVotion is a Laravel-based note-taking application inspired by Notion. It facilitates seamless note-taking, document management, and collaboration for individuals and teams. Built with Laravel, it supports advanced features like namespaces, teamspaces, and real-time collaboration.

## Features
- Namespaces: Personal workspaces for users.
- Teamspaces: Collaborative spaces for teams.
- Authorization: Role-based access control for secure sharing.
- Real-Time Collaboration: Live updates with WebSocket integration.

## Requirements
- PHP >= 8.0
- Composer
- Node.js
- MySQL/PostgreSQL
- Installation

## Project Setup

1. Clone the repository:

```bash
git clone https://github.com/dave-andrew/DeVotion.git
cd DeVotion
```

2. Install dependencies:

```bash
composer install
npm install
Set up environment:
```

```bash
Copy code
cp .env.example .env
php artisan key:generate
```

3. Configure database and OAuth credentials in .env file.

Run migrations:

```bash
php artisan migrate
```

4. Start the local server:

```bash
Copy code
php artisan serve
```

5. Compile front-end assets:

```bash
Copy code
npm run dev
```
