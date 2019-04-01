# Apero

A simple messaging web app for a single conversation. 

## Usage

Requirements: PHP 7.0, a MySQL server and a Redis server.

To install the project, execute `composer i` and `npm i`.

To run Apero, follow these steps:
1. Run `php artisan serve`
2. Run `laravel-echo-server start`
3. Open your browser on `http://localhost:8000`

## To-Do

### Currently

- Clean code and add documentation

### Soon

- Messages: seen
- Messages: smileys, attachments, markdown, multi lines
- Messages: separator depending on date, group messages per sender
- Messages: edit, delete
- Messages: audio messages
- Messages: expire time

### Significant features

- Create profile for users
- Implement multiple conversations
- Backend for users and conversations
