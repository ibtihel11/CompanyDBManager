-- Insert into clients
INSERT INTO clients (name, email, phone, address) VALUES
('random', 'random@gmail.com', '46 512 975', 'sfax, tunis');

-- Insert into products
INSERT INTO products (name, description, unit, unit_price, stock_quantity) VALUES
('chandelier', 'led, 50cm', 'piece', 9.99, 100);

-- Insert into product_kits
INSERT INTO product_kits (name, description) VALUES
('High quality kit', 'chandeliers and wall lights');

-- Insert into kit_items
INSERT INTO kit_items (kit_id, product_id, quantity) VALUES
(1, 1, 5);

-- Insert into suppliers
INSERT INTO suppliers (name, contact, phone, address) VALUES
('Light Company', 'LightCompany@gmail.com', '+21622222222', 'SidiBouzid, Tunisie');

-- Insert into receipts
INSERT INTO receipts (supplier_id, receipt_date, note) VALUES
(1, '2025-05-25', 'fin de stock');

-- Insert into receipt_items
INSERT INTO receipt_items (receipt_id, product_id, quantity, unit_price) VALUES
(1, 1, 100, 8.50);

-- Insert into sales
INSERT INTO sales (client_id, sale_date, total_amount) VALUES
(1, '2025-05-25', 50);

-- Insert into sale_items
INSERT INTO sale_items (sale_id, product_id, quantity, unit_price) VALUES
(1, 1, 5, 9.99);

-- Insert into expenses
INSERT INTO expenses (category, amount, description, expense_date) VALUES
('Office Supplies', 150.00, 'Bought office stationery', '2025-05-20');

-- Insert into payments
INSERT INTO payments (client_id, amount, payment_date, method, note) VALUES
(1, 50, '2025-05-26', 'Credit Card', 'Payment for order #1');
