CREATE TABLE IF NOT EXISTS users (
  id SERIAL PRIMARY KEY,
  firstName VARCHAR(100),
  lastName VARCHAR(100),
  email VARCHAR(255) UNIQUE,
  password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS sellers (
  id SERIAL PRIMARY KEY,
  user_id INT REFERENCES users(id),
  store_name VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS products (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255),
  description TEXT,
  price DECIMAL(10, 2),
  image VARCHAR(255),
  seller_id INT REFERENCES sellers(id)
);

CREATE TABLE IF NOT EXISTS comments (
  id SERIAL PRIMARY KEY,
  title VARCHAR(100),
  description TEXT,
  rating INT CHECK (rating >= 1 AND rating <= 5),
  product_id INT REFERENCES products(id),
  user_id INT REFERENCES users(id)
);
CREATE TABLE IF NOT EXISTS contact_requests (
  id SERIAL PRIMARY KEY,
  title VARCHAR(100),
  description TEXT,
  user_id INT,
  FOREIGN KEY (user_id) REFERENCES users(id) 
);

CREATE TABLE IF NOT EXISTS login_attempts (
    email VARCHAR(100) NOT NULL,
    attempts INT NOT NULL,
    timestamp TIMESTAMP NOT NULL,
    PRIMARY KEY (email)
);

INSERT INTO users (firstName, lastName, email, password) 
VALUES 
('John', 'Doe', 'john.doe@example.com', 'password123'),
('Jane', 'Smith', 'jane.smith@example.com', 'password456');

INSERT INTO sellers (user_id, store_name) 
VALUES 
(2, 'Jane''s Electronics');

INSERT INTO products (name, description, price, image, seller_id) 
VALUES 
('Product 1', 'Description of product 1', 19.99, '/images/product1.jpg', 1),
('Product 2', 'Description of product 2', 29.99, '/images/product2.jpg', 1);

INSERT INTO comments (title, description, rating, product_id, user_id) 
VALUES 
('Great product', 'This product is amazing!', 5, 1, 1),
('Not bad', 'It works, but could be better.', 3, 2, 2);

INSERT INTO contact_requests (title, description) 
VALUES 
('Shipping Issue', 'The product did not arrive on time.');

SELECT * FROM users;
SELECT * FROM sellers;
SELECT * FROM products;
SELECT * FROM comments;
SELECT * FROM contact_requests;

INSERT INTO products (name, description, price, image, seller_id) VALUES
('Smartphone X', 'Un smartphone haut de gamme', 699.99, 'image/smartphone_x.jpg', 1),
('Laptop Pro', 'Un ordinateur portable puissant', 1299.99, 'image/laptop_pro.jpg', 2),
('Montre Connectée', 'Une montre intelligente avec suivi de santé', 199.99, 'image/montre.jpg', 1),
('Casque Audio', 'Un casque avec réduction de bruit', 149.99, 'image/casque.jpg', 3),
('Tablette Ultra', 'Une tablette performante pour le travail et le divertissement', 499.99, 'image/tablette.jpg', 2),
('Clavier Mécanique', 'Clavier rétroéclairé RGB pour gamers', 89.99, 'image/clavier.jpg', 4),
('Souris Gaming', 'Souris ergonomique avec capteur haute précision', 59.99, 'image/souris.jpg', 4),
('Écran 4K', 'Un écran UHD 27 pouces pour une image parfaite', 399.99, 'image/ecran.jpg', 5),
('Imprimante Laser', 'Imprimante rapide et efficace pour bureau', 299.99, 'image/imprimante.jpg', 6),
('Chaise Gaming', 'Chaise ergonomique avec support lombaire', 249.99, 'image/chaise.jpg', 7),
('Microphone Pro', 'Microphone cardioïde pour streaming et podcasting', 129.99, 'image/microphone.jpg', 8),
('Enceinte Bluetooth', 'Enceinte sans fil avec basses puissantes', 79.99, 'image/enceinte.jpg', 9),
('Caméra de Sécurité', 'Caméra HD avec vision nocturne et détection de mouvement', 159.99, 'image/camera.jpg', 10),
('Disque SSD 1To', 'Stockage rapide pour PC et consoles', 109.99, 'image/ssd.jpg', 11),
('Clé USB 128Go', 'Clé USB haute vitesse pour le transfert de fichiers', 29.99, 'image/cle_usb.jpg', 12),
('Ventilateur RGB', 'Ventilateur pour PC avec éclairage LED', 39.99, 'image/ventilateur.jpg', 13),
('Power Bank 20000mAh', 'Batterie externe haute capacité', 49.99, 'image/power_bank.jpg', 14),
('Drone 4K', 'Drone avec caméra UHD et stabilisation', 799.99, 'image/drone.jpg', 15),
('Casque VR', 'Casque de réalité virtuelle immersif', 349.99, 'image/casque_vr.jpg', 16),
('Console Next-Gen', 'Console de jeux dernière génération avec 1To de stockage', 499.99, 'image/console.jpg', 17);


INSERT INTO sellers ( store_name, description) VALUES
( 'TechShop', 'Magasin d électronique généraliste offrant une large gamme de produits tech de qualité.'),
( 'GamerZone', 'Spécialiste des équipements gaming : consoles, périphériques, accessoires, etc.'),
( 'MobileExpress', 'Vente de téléphones et accessoires, avec un service rapide et efficace pour les professionnels.'),
( 'HomeElectro', 'Appareils électroménagers et de bureau, pour un quotidien plus facile et productif.'),
( 'PC Master', 'Ordinateurs et composants high-tech, pour des performances maximales dans tous les domaines.'),
( 'SoundWave', 'Audio et accessoires pour musique, un son de qualité professionnelle pour tous les passionnés.'),
( 'SmartHome', 'Solutions domotiques et smart home pour rendre votre maison plus intelligente et connectée.'),
( 'CloudStore', 'Produits électroniques et services cloud pour simplifier vos besoins technologiques.'),
( 'VisionTech', 'Écrans, projecteurs et technologies visuelles pour un divertissement de haute qualité.'),
( 'DroneWorld', 'Drones et accessoires pour passionnés de photographie aérienne et de technologie.');
