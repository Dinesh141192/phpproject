USE database;

CREATE TABLE users (
    email VARCHAR(128) NOT NULL PRIMARY KEY,
    hash_password VARCHAR(255) NOT NULL,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    biography TEXT NOT NULL,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

INSERT INTO users (email, hash_password, first_name, last_name, biography) VALUES ("c.dineshreddy14@gmail.com", "$2y$10$TGrS5gXRVUn6QIm.zFHvvepAsYlxVAPP2iQhGTzr9FKyD0L/erqa.", "Dinesh", "Challa", "Student");

CREATE TABLE posts (
    
    
    
    
     VARCHAR(128) NOT NULL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    author VARCHAR(128) NOT NULL,
     post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX (author),
    FOREIGN KEY (users)
    REFERENCES authors (email)
);
INSERT INTO `posts` (slug , title , content , author) VALUES ("post-a" , "Post A" , "<article><h2>Post A<h2><section><p>This is a sample article</p></section></article>" , "c.dineshreddy14@gmail.com");

