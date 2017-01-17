CREATE TABLE `blog`.`links`(
    id INT AUTO_INCREMENT, 
    owner VARCHAR(255) NOT NULL, 
    div_id VARCHAR(100) NULL, 
    link_text VARCHAR(255) NOT NULL, 
    link VARCHAR(255) NOT NULL, 
    tip VARCHAR(255) NULL, 
    PRIMARY KEY (id) 
); 

INSERT INTO `blog`.`links` (owner, div_id, link_text, link, tip) VALUES 
("Sam", "foodtip", "Food", "Google.com", "Take a bite"), 
("Sam", "phototip", "Photography", "Google.com", "Beautiful shots"), 
("Sam", "codetip", "Code", "Google.com", "Elegantly imperfect code"), 
("Laravel", NULL, "Documentation", "https://laravel.com/docs", NULL), 
("Laravel", NULL, "Laracasts", "https://laracasts.com/", NULL), 
("Laravel", NULL, "News", "https://laravel-news.com/", NULL), 
("Laravel", NULL, "Forge", "https://forge.laravel.com/", NULL), 
("Laravel", NULL, "GitHub", "https://github.com/laravel/laravel", NULL);
