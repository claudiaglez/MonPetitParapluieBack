# Mon Petit Parapluie :open_umbrella: <br>


Salut! Welcome to Mon Petit Parapluie, a showcase to show all the cross stitch projects I have been making over the years.




## 🎯 Project Overview


This project is my Final Individual Project for the full-stack development Bootcamp FemCoders Norte in Factoría F5.
<br><br>


## Backend Stack


This repository serves as the **backend stack** for my project. It is intricately linked with my [**frontend repository**](https://github.com/claudiaglez/MonPetitParapluieFront)<br><br>




## ⚙️ Technologies


[![My Skills](https://skillicons.dev/icons?i=php,laravel,mysql)](https://skillicons.dev)
<br>


## 🚀 Installation Guide (Laravel and MySQL)


**1. Clone the Repository**<br>
First, clone your project repository from GitHub or any other version control system:<br>
```git clone: https://github.com/claudiaglez/MonPetitParapluieBack.git```      




**2. Configure Environment**<br>
Navigate to your project directory:


    cd MonPetitParapluieBack   


Copy the .env.example file and rename it to .env. Then, configure the necessary environment variables, such as the database connection:


    cp .env.example .env    


Edit the .env file and set values for DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD according to your MySQL setup.


**3. Install Dependencies**<br>
Install project dependencies using Composer:


    composer install    


**4. Generate Application Key**<br>
Generate a unique application key for your project:


    php artisan key:generate    


**5. Run Migrations**<br>
Create the database tables by running migrations:


    php artisan migrate    


**6. Start the Server**
Launch the Laravel development server:


    php artisan serve    


**That’s it! Enjoy! ** <br>
You can access it at :  ```http://localhost:8000.
npm start. ```  


<br><br>


## 🌐 API Routes


I’ve developed several API routes using Laravel to handle HTTP requests. These routes are essential for communication between the frontend and backend of our application.


**Product Routes:**<br>
/api/articles:
Retrieves a list of all available articles.<br>
/api/articles/{id}: Retrieves details of a specific product by its ID.<br>
**Category Routes:**<br>
/api/categories: Retrieves a list of all product categories.<br>
/api/categories/{id}: Retrieves details of a specific category by its ID.<br>




## 🪢 Branches


| BRANCH      | Description                                                                         |
| ----------- | ----------------------------------------------------------------------------------- |
| main        | Main branch. Only final functional versions of the user stories will appear here    |
| dev         | Development branch. Here we merge frontend and backend branches and check stability |
| feature/... | Various branches each one for an individual feature                                 | 
| test/...    | The branch for several tests                                                        |





<br>


## 🤝 Contributions


Contributions are welcome. If you have any suggestions for improvement, please open an issue or pull request
<br>


## 👩‍💻 Author


Created by:
-   :rainbow: [Claudia González](https://github.com/claudiaglez)
