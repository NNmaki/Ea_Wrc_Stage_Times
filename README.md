# EA WRC -Playstation Game Lap Time Recording System
I am pretty active console-gamer, especially when it comes to simulator games on the PlayStation console. One of the games is EA WRC-game on Playstation, and there isn't any way to store best stage times while playing career or multiplay-mode, so I decided to make simple website where players can input their best stage times. The special stages selected for the system have been chosen from the game in such a way that the real-world long stages are driven as stages divided into two or three parts. The stages have been arranged, and their driving direction has been determined to correspond to the real-world stages.

There isn't any user authentication features or authentication valid records, but this suits for our group of friends to share their times vie user-friendly interface. System is public, and I tried to take care sql-injection and tried to sanitize inputs, but if a lot flooding appears in the table, I must consider to make more protection.

The special stages selected for the system have been chosen from the game in such a way that the real-world long stages are driven as stages divided into two or three parts. The stages have been arranged, and their driving direction has been determined to correspond to the real-world stages.

## 🔥 Time Recording, Storage and Dynamic Leaderboard
Users can manually input their lap times via an intuitive web interface. The times are stored in an SQL database, ensuring structured data management. The system automatically sorts times in ascending order, ranking the fastest laps at the top.

The interface displays a real-time ranking of the top 10 best lap times. A "Show All" button allows users to view the complete list of times stored in the database via a pop-up window. The leaderboard is automatically updated when a new time is added.

When a new lap time is successfully saved, a popup confirmation message appears. The system prevents duplicate or incorrect entries by validating the input.

## 📱 Mobile-Friendly Design
The interface is designed with CSS media-queries, making it fully responsive for both desktop and mobile users. Tables and pop-ups adjust dynamically to fit different screen sizes. Input field is implemented with html pattern -attribute, which ensures valid input from users, e.g. so you can enter only numbers on time-input fields on correct format.

## 🔧 Technologies Used
Frontend: HTML, CSS, JavaScript (for pop-ups and dynamic updates). Backend: PHP (for handling SQL queries and data retrieval). Database: MySQL (for storing and managing lap times)

This was pretty fun and useful project! 

See Here: https://nnmaki.com/wrc/
