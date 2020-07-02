
# Installation
Clone project

    cd projectDir
    git clone https://github.com/gaxz/luckyonlinetest.git .

Then build

    docker-compose build

Run containers

    docker-compose up -d

Install dependencies

    docker-compose exec php-fpm composer install

Apply migrations

    docker-compose exec php-fpm php yii migrate

# Running

http://localhost:8080/

# Books test case
Database architecture can be found here:

    app\migrations\m200630_113353_create_book_table.php
   
Logging to database:

    docker-compose exec mysql mysql -proot -D app

SQL #1

    SELECT b.id, b.name, count(bc.category_id) as categories FROM book as b
    LEFT JOIN book_category as bc ON bc.book_id = b.id
    WHERE b.type = 1 AND b.tirage = 5000
    GROUP BY b.id HAVING categories > 3;

SQL #2

    SELECT 
    bc.book_id, 
    COUNT(bc.category_id) category_match, 
    tbc.book_id 
    FROM book_category bc
	    INNER JOIN book_category tbc 
	    ON tbc.book_id != bc.book_id AND tbc.category_id = bc.category_id
    GROUP BY bc.book_id, tbc.book_id HAVING count(tbc.category_id) >= 10;

