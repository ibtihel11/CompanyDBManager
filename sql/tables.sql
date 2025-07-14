CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,
    unit VARCHAR(20),
    unit_price DECIMAL(10,2),
    stock_quantity INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE product_kits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE kit_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kit_id INT,
    product_id INT,
    quantity INT,
    FOREIGN KEY (kit_id) REFERENCES product_kits(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    contact VARCHAR(100),
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE receipts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_id INT,
    receipt_date DATE,
    note TEXT,
    FOREIGN KEY (supplier_id) REFERENCES suppliers(id)
);

CREATE TABLE receipt_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    receipt_id INT,
    product_id INT,
    quantity INT,
    unit_price DECIMAL(10,2),
    FOREIGN KEY (receipt_id) REFERENCES receipts(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    sale_date DATE,
    total_amount DECIMAL(10,2),
    FOREIGN KEY (client_id) REFERENCES customers(id)
);

CREATE TABLE sale_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sale_id INT,
    product_id INT,
    quantity INT,
    unit_price DECIMAL(10,2),
    FOREIGN KEY (sale_id) REFERENCES sales(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(100),
    amount DECIMAL(10,2),
    description TEXT,
    expense_date DATE
);

CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    amount DECIMAL(10,2),
    payment_date DATE,
    method VARCHAR(50),
    note TEXT,
    FOREIGN KEY (client_id) REFERENCES customers(id)
);
