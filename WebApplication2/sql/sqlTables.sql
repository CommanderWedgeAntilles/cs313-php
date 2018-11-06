
/*CREATE OR REPLACE TYPE stat AS OBJECT(
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
    value int
);*/

/*CREATE OR REPLACE TYPE feature AS OBJECT(
    name VARCHAR(20) NOT NULL,
    description MEDIUMTEXT,
    SourceID NOT NULL FOREIGN KEY
    --statBonus stat
);*/


/*CREATE OR REPLACE TYPE item AS OBJECT(
    ID SERIAL NOT NULL PRIMARY KEY,
    name VARCHAR(50),
    description MEDIUMTEXT
    --statBonus stat

);*/

/*CREATE TABLE charactersrace(
    ID SERIAL NOT NULL PRIMARY KEY,
    CHARACTERID NOT NULL FOREIGN KEY REFERENCES characters(ID),
    RACEID NOT NULL FOREIGN KEY REFERENCES race(ID)
);

CREATE TABLE charactersclass(
    ID SERIAL NOT NULL PRIMARY KEY,
    CHARACTERID NOT NULL FOREIGN KEY REFERENCES characters(ID),
    CLASSID NOT NULL FOREIGN KEY REFERENCES class(ID)
);*/


CREATE TABLE campaign(
    ID SERIAL NOT NULL PRIMARY KEY,
    storyName varchar(100) NOT NULL,
    description TEXT,
    meetTime varchar(100) 
);



CREATE TABLE item(
    ID SERIAL NOT NULL PRIMARY KEY,
    name VARCHAR(50),
    description TEXT
    
);

CREATE TABLE race(
    ID SERIAL NOT NULL PRIMARY KEY,
    name varchar(20) NOT NULL,
    description TEXT,
    raceTrait VARCHAR(200)
    
);

CREATE TABLE class(
    ID SERIAL NOT NULL PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    description TEXT,
    hitDie VARCHAR(6),
    primAbility VARCHAR(20),
    saves VARCHAR(20)

);

CREATE TABLE characters(
    ID SERIAL NOT NULL PRIMARY KEY,
    USERID INT,
    name VARCHAR(20) NOT NULL,
    age INT,
    gender VARCHAR(20),
    personalityTraits TEXT,
    ideals TEXT,
    bonds TEXT,
    flaws TEXT,
    background TEXT,
    appearance TEXT,
    wealth int,
    FOREIGN KEY (USERID) REFERENCES users(ID)
);

CREATE TABLE users(
    ID SERIAL NOT NULL,
    username varchar(100) NOT NULL UNIQUE,
    password varchar(100) NOT NULL,
    PRIMARY KEY(ID)
);


CREATE TABLE campaignNotes(
    USERID int,
    CAMPAIGNID int,
    notes TEXT,
    FOREIGN KEY (USERID) REFERENCES users(ID),
     FOREIGN KEY (CAMPAIGNID) REFERENCES campaign(ID)
);

CREATE TABLE userscharacters(
    ID SERIAL NOT NULL PRIMARY KEY,
    USERID int,
    CHARACTERID int,
    FOREIGN KEY (USERID) REFERENCES users(ID),
    FOREIGN KEY (CHARACTERID) REFERENCES characters(ID)
);

CREATE TABLE charactersrace(
    ID SERIAL NOT NULL PRIMARY KEY,
    CHARACTERID INT ,
    RACEID INT,
    FOREIGN KEY (CHARACTERID) REFERENCES characters(ID), 
    FOREIGN KEY (RACEID) REFERENCES race(ID)
);

CREATE TABLE charactersclass(
    ID SERIAL NOT NULL PRIMARY KEY,
    CHARACTERID INT,
    CLASSID INT,
    FOREIGN KEY (CHARACTERID)REFERENCES characters(ID),
    FOREIGN KEY (CLASSID)REFERENCES class(ID)
);

CREATE TABLE inventory(
    ID SERIAL NOT NULL PRIMARY KEY,
    CHARACTERID int, 
    FOREIGN KEY (CHARACTERID) REFERENCES characters(ID),
    ITEMID int, 
    FOREIGN KEY (ITEMID) REFERENCES item(ID)
);

INSERT INTO race (name,description,raceTrait) VALUES('Aasimar','Aasimar are placed in the world to serve as guardians of law and good. Their patrons expect them to strike at evil, lead by example, and further the cause of justice.','+2 Charisma, Darkvision, Celestial Resistance, Healing Hands, Light Bearer');
INSERT INTO race (name,description,raceTrait) VALUES('Dragonborn','Dragonborn look very much like dragons standing erect in humanoid form, though they lack wings or a tail.','+2 Strength, +1 Charisma, Draconic Ancestry, Breath Weapon, Damage Resistance');
INSERT INTO race (name,description,raceTrait) VALUES('Dwarf','Bold and hardy, dwarves are known as skilled warriors, miners, and workers of stone and metal.','+2 Constitution, Darkvision, Dwarven Resilience, Dwarven Combat Training, Stonecunning');
INSERT INTO race (name,description,raceTrait) VALUES('Elf','Elves are a magical people of otherworldly grace, living in the world but not entirely part of it.','+2 Dexterity, Darkvision, Keen Senses, Fey Ancestry, Trance');
INSERT INTO race (name,description,raceTrait) VALUES('Gnome','A gnome’s energy and enthusiasm for living shines through every inch of his or her tiny body.','+2 Intelligence, Darkvision, Gnome Cunning');
INSERT INTO race (name,description,raceTrait) VALUES('Halfling','The diminutive halflings survive in a world full of larger creatures by avoiding notice or, barring that, avoiding offense.','+2 Dexterity, Lucky, Brave, Halfling Nimbleness');
INSERT INTO race (name,description,raceTrait) VALUES('Half-Orc','Half-orcs’ grayish pigmentation, sloping foreheads, jutting jaws, prominent teeth, and towering builds make their orcish heritage plain for all to see.','+2 Strength, +1 Constitution, Darkvision, Menacing, Relentless');
INSERT INTO race (name,description,raceTrait) VALUES('Human','Humans are the most adaptable and ambitious people among the common races. Whatever drives them, humans are the innovators, the achievers, and the pioneers of the worlds.','+1 to All Ability Scores, Extra Language');
INSERT INTO race (name,description,raceTrait) VALUES('Tiefling','To be greeted with stares and whispers, to suffer violence and insult on the street, to see mistrust and fear in every eye: this is the lot of the tiefling.','+2 Charisma, +1 Intelligence, Darkvision, Hellish Resistance, Infernal Legacy');

INSERT INTO class (name,description,hitDie,primAbility,saves) VALUES('Barbarian','A fierce warrior of primitive background who can enter a battle rage','d12','Strength','Strength & Constitution');
INSERT INTO class (name,description,hitDie,primAbility,saves) VALUES('Bard','An inspiring magician whose power echoes the music of creation','d8','Charisma','Dexterity & Charisma');
INSERT INTO class (name,description,hitDie,primAbility,saves) VALUES('Cleric','A priestly champion who wields divine magic in service of a higher power','d8','Wisdom','Wisdom & Charisma');
INSERT INTO class (name,description,hitDie,primAbility,saves) VALUES('Druid','A priest of the Old Faith, wielding the powers of nature and adopting animal forms','d8','Wisdom','Intelligence & Wisdom');
INSERT INTO class (name,description,hitDie,primAbility,saves) VALUES('Fighter','A master of martial combat, skilled with a variety of weapons and armor','d10','Strength or Dexterity','Strength & Constitution');
INSERT INTO class (name,description,hitDie,primAbility,saves) VALUES('Monk','A master of martial arts, harnessing the power of the body in pursuit of physical and spiritual perfection','d8','Dexterity & Wisdom','Strength & Dexterity');
INSERT INTO class (name,description,hitDie,primAbility,saves) VALUES('Paladin','A holy warrior bound to a sacred oath','d10','Strength & Charisma','Wisdom & Charisma');
INSERT INTO class (name,description,hitDie,primAbility,saves) VALUES('Ranger','A warrior who combats threats on the edges of civilization','d10','Dexterity & Wisdom','Strength & Dexterity');
INSERT INTO class (name,description,hitDie,primAbility,saves) VALUES('Rogue','A scoundrel who uses stealth and trickery to overcome obstacles and enemies','d8','Dexterity','Dexterity & Intelligence');
INSERT INTO class (name,description,hitDie,primAbility,saves) VALUES('Sorceror','A spellcaster who draws on inherent magic from a gift or bloodline','d6','Charisma', 'Constitution & Charisma');
INSERT INTO class (name,description,hitDie,primAbility,saves) VALUES('Warlock','A wielder of magic that is derived from a bargain with an extraplanar entity','d8','Charisma','Wisdom & Charisma');
INSERT INTO class (name,description,hitDie,primAbility,saves) VALUES('Wizard','A scholarly magic-user capable of manipulating the structures of reality','d6','Intelligence','Intelligence & Wisdom');
