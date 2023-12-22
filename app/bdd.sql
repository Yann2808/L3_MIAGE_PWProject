-- Table pour les catégories
CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    code_raccourci VARCHAR(10) NOT NULL
);

-- Table pour les contacts
CREATE TABLE contacts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    numero_tel VARCHAR(15) NOT NULL
);

-- Table pour les licenciés
CREATE TABLE licencies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    numero_licence VARCHAR(20) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    contact_id INT,  -- Clé étrangère vers la table contacts
    FOREIGN KEY (contact_id) REFERENCES contacts(id)
);

-- Table pour les éducateurs
CREATE TABLE educateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    isAdmin BOOLEAN NOT NULL,
    licencie_id INT,  -- Clé étrangère vers la table licencies
    FOREIGN KEY (licencie_id) REFERENCES licencies(id)
);