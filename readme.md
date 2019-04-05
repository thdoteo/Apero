# Apero

![Screenshot](https://raw.githubusercontent.com/thdoteo/apero/master/docs/screenshot.png)  

A simple messaging web app for a single conversation.  

Apero uses an API, built with PHP and the framework Laravel, and VueJS and web sockets for the front-end.

## Features

- User registration and authentication
- Single conversation with a clean interface
- Receive messages in real time
- Old messages are loaded as you go upward in the conversation

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
- Messages: expire time, smileys, attachments, markdown, multi lines
- Messages: separator depending on date, group messages per sender
- Messages: edit, delete
- Messages: audio messages
- Messages: notifications, sounds, animations
- Deploy with Ansible

### Significant features

- Create profile for users
- Implement multiple conversations
- Backend for users and conversations

## Objective

In the long run I would like apero to be focused on privacy and security.
It would use its own communication protocol and encrypt messages.
Question: facial recognition authentication would be relevant to implement?