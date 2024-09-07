CREATE TABLE manufacturing_progress (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    station1_percentage INT DEFAULT 0,
    station2_percentage INT DEFAULT 0,
    station3_percentage INT DEFAULT 0,
    station4_percentage INT DEFAULT 0,
    station5_percentage INT DEFAULT 0,
    FOREIGN KEY (order_id) REFERENCES orders(id)
);
