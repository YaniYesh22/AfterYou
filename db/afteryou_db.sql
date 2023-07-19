CREATE TABLE dbShnkr23stud2.tbl_215_users (
  user_id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(45) NOT NULL,
  password VARCHAR(45) NOT NULL,
  first_name VARCHAR(45) NOT NULL,
  last_name VARCHAR(45) NOT NULL,
  type_id INT NOT NULL,
  profile_pic VARCHAR(250) NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (user_id),
  FOREIGN KEY (type_id)
    REFERENCES dbShnkr23stud2.tbl_215_type(type_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);



CREATE TABLE dbShnkr23stud2.tbl_215_team (
  team_id INT NOT NULL AUTO_INCREMENT,
  comm_user_id INT,
  war_room_user_id INT,
  PRIMARY KEY (team_id)
);


CREATE TABLE dbShnkr23stud2.tbl_215_mission (
  mission_id INT NOT NULL AUTO_INCREMENT,
  team_id INT,
  location VARCHAR(80),
  date DATE,
  PRIMARY KEY (mission_id),
    FOREIGN KEY (team_id)
        REFERENCES dbShnkr23stud2.tbl_215_team(team_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);


CREATE TABLE dbShnkr23stud2.tbl_215_contact (
  contact_id INT NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(45),
  last_name VARCHAR(45),
  phone_number VARCHAR(15),
  mission_id INT,
  PRIMARY KEY (contact_id),
    FOREIGN KEY (mission_id)
        REFERENCES dbShnkr23stud2.tbl_215_mission(mission_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);


CREATE TABLE dbShnkr23stud2.tbl_215_safe_spot (
  spot_id INT NOT NULL AUTO_INCREMENT,
  country VARCHAR(45),
  address VARCHAR(45),
  description VARCHAR(15),
  mission_id INT,
  PRIMARY KEY (spot_id),
    FOREIGN KEY (mission_id)
        REFERENCES dbShnkr23stud2.tbl_215_mission(mission_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);


