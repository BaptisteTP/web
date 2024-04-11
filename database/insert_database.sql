INSERT INTO `stage_quest`.`locations` (`country`, `city`, `street`, `postcode`, `add_info`)
VALUES
    ('France', 'Paris', 'Rue de Rivoli', '75001', '2ème étage'),
    ('France', 'Lyon', 'Place Bellecour', '69002', 'Appartement 3B'),
    ('France', 'Toulouse', 'Place du Capitole', '31000', 'Bâtiment A'),
    ('France', 'Marseille', 'Vieux Port', '13002', 'Face à la mer'),
    ('France', 'Nice', 'Promenade des Anglais', '06000', 'Proche de l\'aéroport'),
    ('France', 'Nantes', 'Place du Commerce', '44000', 'Près de la rivière'),
    ('France', 'Strasbourg', 'Grande Île', '67000', 'Centre-ville historique'),
    ('France', 'Montpellier', 'Place de la Comédie', '34000', 'Proche de la gare'),
    ('France', 'Bordeaux', 'Place de la Bourse', '33000', 'Au cœur du quartier historique'),
    ('France', 'Lille', 'Grand Place', '59000', 'En face de l\'hôtel de ville'),
    ('France', 'Rennes', 'Place de la Mairie', '35000', 'Près du marché'),
    ('France', 'Reims', 'Place Drouet d\'Erlon', '51100', 'Vue sur la cathédrale'),
    ('France', 'Le Havre', 'Quai Southampton', '76600', 'Port de plaisance'),
    ('France', 'Saint-Étienne', 'Place Jean Jaurès', '42000', 'Proche du stade'),
    ('France', 'Toulon', 'Port de Toulon', '83000', 'Bord de mer'),
    ('France', 'Grenoble', 'Place Grenette', '38000', 'Vue sur les montagnes'),
    ('France', 'Dijon', 'Place de la Libération', '21000', 'Près du palais des ducs'),
    ('France', 'Angers', 'Place du Ralliement', '49000', 'Proche du château'),
    ('France', 'Nîmes', 'Place des Arènes', '30000', 'Près de l\'amphithéâtre'),
    ('France', 'Villeurbanne', 'Cours Émile Zola', '69100', 'Centre-ville'),
    ('France', 'Besançon', 'Place de la Révolution', '25000', 'Vue sur la citadelle'),
    ('France', 'Limoges', 'Place de la République', '87000', 'Proche du jardin botanique'),
    ('France', 'Metz', 'Place d\'Armes', '57000', 'Près de la cathédrale');


INSERT INTO `stage_quest`.`roles` (`role`) VALUES ('STUDENT'), ('PILOTE'), ('ADMIN');

INSERT INTO `stage_quest`.`users` (`first_name`, `last_name`, `email`, `password`, `center`, `promotion`, `roles_id`)
VALUES 
    ('John', 'Doe', 'john.doe@example.com', MD5('password123'), 'Center A', 'Promotion 2023', 1),
    ('Alice', 'Smith', 'alice.smith@example.com', MD5('password456'), 'Center B', 'Promotion 2024', 1),
    ('Bob', 'Johnson', 'bob.johnson@example.com', MD5('password789'), 'Center C', 'Promotion 2023', 2);

INSERT INTO `stage_quest`.`sectors` (`sector`) VALUES ('INFORMATIQUE'), ('S3E'), ('BTP'), ('GENERALISTE');

INSERT INTO `stage_quest`.`companies` (`name`, `visibility`, `sectors_id`, `body`) 
VALUES      
    ('Thales', 1, 1, "L’activité Systèmes terrestres et aériens conçoit des systèmes, des équipements, des capteurs et des services pour le contrôle du trafic aérien civil et militaire, la défense aérienne ainsi que le combat naval et terrestre.Le site de Toulouse regroupe deux activités principales : l’une en charge de développer et commercialiser des solutions et équipements pour avions et hélicoptères (cockpits, solutions pour cabines, systèmes de missions civiles et militaires, et offres de services associées) ; l’autre , le centre d’Air Traffic Management (ATM), pôle d’expertise historique des systèmes de gestion du trafic aérien."),
    ('Airbus', 1, 2, "Airbus pioneers sustainable aerospace for a safe and united world. The Company constantly innovates to provide efficient and technologically-advanced solutions in aerospace, defence, and connected services. In commercial aircraft, Airbus offers modern and fuel-efficient airliners and associated services. Airbus is also a European leader."),
    ('Capgemini', 1, 3, "Capgemini is a global leader in consulting, digital transformation, technology, and engineering services. The Group is at the forefront of innovation to address the entire breadth of clients’ opportunities in the evolving world of cloud, digital and platforms."),
    ('CGI', 1, 3, "CGI is a global IT and business consulting services firm delivering consulting, systems integration, and outsourcing services. With 77,500 professionals across 40 countries, CGI has an industry-leading track record of on-time, on-budget projects, aligning clients’ operations with their business strategies."),
    ('Infotel', 1, 3, "Infotel is an international IT services company providing consulting, IT systems integration, application outsourcing, and software solutions. With a presence in several countries, Infotel serves major companies across various industries, delivering expertise and innovative solutions."),
    ('Apple', 1, 4, "Apple Inc. designs, manufactures, and markets smartphones, personal computers, tablets, wearables, and accessories worldwide. The company also sells various related services. Apple’s products and services include iPhone, iPad, Mac, Apple Watch, AirPods, iCloud, Apple Pay, and a range of professional software applications");



DELETE FROM `stage_quest`.`type_promotions` WHERE `id` = 1;

INSERT INTO `stage_quest`.`type_promotions` (`id`, `type_promotion`) VALUES (1, 'CPIA1'), (2, 'CPIA2'),
		(3, 'CPIA3'), (4, 'CPIA4'), (5, 'CPIA5');

-- Remplir la table 'status_internships'
INSERT INTO `stage_quest`.`status_internships` (`id`,`status`) VALUES ('1','Open'), ('2','Closed');

-- Remplir la table 'internship_offers'
INSERT INTO `stage_quest`.`internship_offers` (`title`, `companies_id`, `location_id`, `duration_numerical`, `duration_unit`, `date`, `salary`, `num_place`, `num_applicant`, `text`, `type_promotions_id`, `status_id`)
VALUES 
    ('Développeur logiciel embarqué', 1, 1, 6, 2, '2024-04-10', 1800, 3, 0, 'Concevez et développez des logiciels embarqués pour les systèmes critiques', 3, 1),
    ('Ingénieur système S3E', 2, 3, 6, 3, '2024-05-01', 2000, 2, 0, 'Travaillez sur la conception et la mise en place de systèmes électroniques embarqués', 4, 1),
    ('Stage en génie civil', 3, 4, 5, 3, '2024-05-20', 1600, 4, 0, 'Participez à des projets de construction d infrastructures et de gestion de chantiers', 2, 1),
    ('Stage en développement logiciel', 4, 2, 3, 2, '2024-06-01', 1500, 3, 0, 'Contribuez au developpement de logiciels innovants dans un environnement agile', 1, 1),
    ('Ingénieur qualité logiciel', 5, 1, 4, 2, '2024-06-15', 1700, 2, 0, 'Assurez la qualité des logiciels développés en participant à la mise en place de processus et de tests', 3, 1),
    ('Stage en BTP', 6, 4, 6, 3, '2024-07-01', 1800.00, 3, 0, 'Apprenez les techniques de construction et participez à des projets de génie civil', 4, 1),
    ('Stage en cybersécurité', 5, 1, 3, 2, '2024-07-15', 1600, 2, 0, 'Contribuez à renforcer la securite des systèmes d information en identifiant et en corrigeant les vulnérabilités', 5, 1),
    ('Stage en ingénierie système', 4, 3, 4, 3, '2024-08-01', 1900, 2, 0, 'Participez à la conception et à l intégration de systèmes complexes dans des environnements industriels', 1, 1),
    ('Stage en réalité virtuelle', 3, 2, 3, 2, '2024-08-15', 1700, 2, 0, 'Explorez les applications de la réalité virtuelle dans différents domaines et participez au développement de solutions innovantes', 2, 1),
    ('Stage en ingénierie logicielle', 6, 1, 5, 2, '2024-09-01', 1800, 3, 0, 'Contribuez au développement et à l optimisation de logiciels dans un contexte industriel', 3, 1);

-- Remplir la table 'skills'
INSERT INTO `stage_quest`.`skills` (`skill`) VALUES ('Web Development'), ('Digital Marketing'), ('Data Analysis');

-- Remplir la table 'internship_offers_skills'
INSERT INTO `stage_quest`.`internship_offers_skills` (`skills_idskills`, `internship_offers_id`)
VALUES 
    (1, 1),
    (2, 2),
    (3, 2);


INSERT INTO `stage_quest`.`status_applications` (`id`, `status`)
VALUES (1, 'Closed'),(2, 'Opened');

INSERT INTO `stage_quest`.`evaluations` (`note`, `companies_id`, `users_id`, `created_at`, `updated_at`)
VALUES
(4, 1, 2, NOW(), NOW()),
(5, 2, 1, NOW(), NOW()),
(4, 3, 2, NOW(), NOW()),
(4, 2, 2, NOW(), NOW()),
(4, 3, 1, NOW(), NOW()),
(4, 4, 2, NOW(), NOW()),
(4, 5, 2, NOW(), NOW()),
(4, 4, 3, NOW(), NOW()),
(4, 6, 2, NOW(), NOW());
