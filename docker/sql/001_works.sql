CREATE TABLE IF NOT EXISTS works (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(120) NOT NULL,
    category VARCHAR(60) NOT NULL,
    norm_hours DECIMAL(5, 2) UNSIGNED NOT NULL,
    price DECIMAL(10, 2) UNSIGNED NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT IGNORE INTO works (id, name, category, norm_hours, price) VALUES
    (1, 'Výmena motorového oleja a filtra', 'Pravidelný servis', 0.80, 25.00),
    (2, 'Prezutie pneumatík vrátane vyváženia', 'Pneumatiky', 1.00, 45.00),
    (3, 'Výmena predných brzdových platničiek', 'Brzdy', 1.50, 48.00),
    (4, 'Diagnostika riadiacej jednotky', 'Diagnostika', 0.50, 20.00);
