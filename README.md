<p align="center"><img src="https://i.imgur.com/taSLpYM.png" width="400" alt="Timmsy Logo"></a></p>

# Card Game App

This Card Game App is a web application built using the Laravel framework, Vite as the frontend build tool, and MySQL database. It allows users to play a card game by shuffling a deck of cards and dealing them to four players.

## Tech Stack

- Laravel 10: A server-side PHP MVC framework for building web applications
- Vite: As the frontend build tool, Vite ensures efficient and fast development, making the app lightweight and performant.
- MySQL: A relational database management system (RDBMS) for storing and retrieving data
- Bootstrap 5: A frontend framework for building responsive and mobile-friendly layouts

## Key Features

- Shuffling the Deck: Users can shuffle the deck of cards by clicking the "Shuffle Cards" button. The app uses a custom algorithm to shuffle the cards randomly.

- Dealing Cards: After shuffling the deck, users can deal the cards to four players by clicking the "Deal Cards" button. The app distributes the cards evenly among the players.

- Interactive Interface: The app provides an intuitive and user-friendly interface, allowing players to easily initiate actions and view their cards.

- Responsive Design: The app is designed to be responsive and accessible on various devices, including desktops, tablets, and smartphones.

## Installation

Pull the project to your local machine using your method of choice, then run the following in your bash terminal

```bash
  composer install
  npm install
  cp .env.example .env
  php artisan key:generate
```

Fill in the database credentials within the .env file. This is important for specific features to work.

Then Migrate the Database

```bash
    php artisan migrate
```
    
## Screenshots

<img src="https://i.imgur.com/ZUENNu8.png" alt="Login Page" width="468" height="300">
<img src="https://i.imgur.com/X7oox5E.png" alt="Registration Page" width="468" height="300">
<img src="https://i.imgur.com/VnRYjyI.png" alt="User Dashboard" width="468" height="300">
<img src="https://i.imgur.com/RCIaTZ8.png" alt="Articles 1" width="468" height="300">
<img src="https://i.imgur.com/8FARTo3.png" alt="Articles 2" width="468" height="300">
