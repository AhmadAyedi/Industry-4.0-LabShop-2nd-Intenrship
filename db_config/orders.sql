CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    imageUrl VARCHAR(255),
    quantity INT NOT NULL,
    credentials_id INT,
    FOREIGN KEY (credentials_id) REFERENCES credentials(id)
);
