
CREATE TABLE patients (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     first_name CHAR(20) NOT NULL,
     last_name CHAR(20) NOT NULL,
     PRIMARY KEY (id)
);

INSERT INTO patients
    (first_name, last_name)
VALUES
    ('Antonio','Pierro'),
    ('Gigi','Buffon');