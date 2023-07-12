#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
#------------------------------------------------------------
# Table: pab7o_usersRoles
#------------------------------------------------------------
CREATE TABLE pab7o_usersRoles(
        id Int Auto_increment NOT NULL,
        name Varchar (20) NOT NULL,
        CONSTRAINT usersRoles_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: pab7o_users
#------------------------------------------------------------
CREATE TABLE pab7o_users(
        id Int Auto_increment NOT NULL,
        username Varchar (20) NOT NULL,
        email Varchar (100) NOT NULL,
        password Varchar (255) NOT NULL,
        birthdate Date NOT NULL,
        registerDate Date NOT NULL,
        id_usersRoles Int NOT NULL,
        CONSTRAINT users_PK PRIMARY KEY (id),
        CONSTRAINT users_usersRoles_FK FOREIGN KEY (id_usersRoles) REFERENCES pab7o_usersRoles(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: pab7o_postsCategories
#------------------------------------------------------------
CREATE TABLE pab7o_postsCategories(
        id Int Auto_increment NOT NULL,
        name Varchar (20) NOT NULL,
        CONSTRAINT postsCategories_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: pab7o_posts
#------------------------------------------------------------
CREATE TABLE pab7o_posts(
        id Int Auto_increment NOT NULL,
        title Varchar (100) NOT NULL,
        content Text NOT NULL,
        publicationDate Datetime NOT NULL,
        updateDate Datetime NOT NULL,
        image Varchar (255) NOT NULL,
        id_users Int NOT NULL,
        id_postsCategories Int NOT NULL,
        CONSTRAINT posts_PK PRIMARY KEY (id),
        CONSTRAINT posts_users_FK FOREIGN KEY (id_users) REFERENCES pab7o_users(id),
        CONSTRAINT posts_postsCategories_FK FOREIGN KEY (id_postsCategories) REFERENCES pab7o_postsCategories(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: pab7o_comments
#------------------------------------------------------------
CREATE TABLE pab7o_comments(
        id Int Auto_increment NOT NULL,
        content Text NOT NULL,
        publicationDate Datetime NOT NULL,
        id_posts Int NOT NULL,
        id_users Int NOT NULL,
        CONSTRAINT comments_PK PRIMARY KEY (id),
        CONSTRAINT comments_posts_FK FOREIGN KEY (id_posts) REFERENCES pab7o_posts(id),
        CONSTRAINT comments_users_FK FOREIGN KEY (id_users) REFERENCES pab7o_users(id)
) ENGINE = InnoDB;

INSERT INTO
        `pab7o_usersroles` (`id`, `name`)
VALUES
        (1, 'Utilisateur'),
        (2, 'Administrateur'),
        (3, 'Modérateur');

INSERT INTO
        `pab7o_postscategories` (`id`, `name`)
VALUES
        (1, 'Lifestyle'),
        (2, 'Mode'),
        (3, 'Décoration'),
        (4, 'Cuisine'),
        (5, 'Sport'),
        (6, 'Voyage'),
        (7, 'Culture'),
        (8, 'Santé'),
        (9, 'Technologie'),