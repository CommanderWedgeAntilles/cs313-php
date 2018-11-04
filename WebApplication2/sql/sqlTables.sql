

CREATE TABLE campaign(
    ID SERIAL NOT NULL PRIMARY KEY,
    storyName varchar(100) NOT NULL,
    meetTime varchar(200)
);

CREATE OR REPLACE TYPE stat AS OBJECT(
    currentHP int,
    permHP int,
    tempHP int,
    AC int,
    initiative int,
    strength int,
    dexterity int,
    constitution int,
    intelligence int,
    wisdom int,
    charisma int,
    passivePerception int
);
CREATE OR REPLACE TYPE feature AS OBJECT(
    name VARCHAR(20) NOT NULL,
    description MEDIUMTEXT,
    statBonus stat
);

type features IS VARRAY(50) OF feature;

CREATE OR REPLACE TYPE class AS OBJECT(
    ID SERIAL NOT NULL PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    feat features,
    statBonus stat

);

CREATE OR REPLACE TYPE race AS OBJECT(
    ID SERIAL NOT NULL PRIMARY KEY,
    name varchar(20) NOT NULL,
    feat features,
    statBonus stat
    
);

CREATE OR REPLACE TYPE bio AS OBJECT(
    motivation MEDIUMTEXT,
    bonds MEDIUMTEXT,
    flaws MEDIUMTEXT,
    background TEXT,
    appearance MEDIUMTEXT

);

CREATE OR REPLACE TYPE item AS OBJECT(
    name VARCHAR(50),
    description MEDIUMTEXT,
    feat features,
    statBonus stat

);

CREATE TABLE races(
    ID SERIAL NOT NULL PRIMARY KEY,
    raceType race


);

CREATE TABLE classes(
    ID SERIAL NOT NULL PRIMARY KEY,
    classType class

);

type items IS VARRAY(25) OF item;

CREATE OR REPLACE TYPE hero AS OBJECT(
    ID SERIAL NOT NULL PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    age INT,
    gender VARCHAR(20),
    raceChoice race,
    classChoice class,
    stats stat,
    feat features,
    biography bio,
    equipment items
);

type charactersOwned IS VARRAY(5) OF hero;
type campaignsIn IS VARRAY(5) OF campaign;

CREATE TABLE allCharacters(
    ID SERIAL NOT NULL PRIMARY KEY,
    player hero
);

CREATE TABLE users(
    ID SERIAL NOT NULL,
    username varchar(100) NOT NULL UNIQUE,
    password varchar(100) NOT NULL,
    characters charactersOwned,
    campaigns campaignsIn,
    PRIMARY KEY(ID)
);

