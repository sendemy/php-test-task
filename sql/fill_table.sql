INSERT INTO Products (PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_ARTICLE, PRODUCT_QUANTITY, DATE_CREATE, IS_HIDDEN)
VALUES 
(1, 'Product A', 19.99, 'A123', 50, DATE_SUB(NOW(), INTERVAL 2 DAY), 0),
(2, 'Product B', 29.99, 'B456', 30, NOW(), 0),
(3, 'Product C', 39.99, 'C789', 20, DATE_SUB(NOW(), INTERVAL 5 DAY), 0),
(4, 'Product D', 49.99, 'D999', 20, NOW(), 0);