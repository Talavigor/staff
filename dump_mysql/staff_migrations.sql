CREATE TABLE staff.migrations
(
    id int(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    migration varchar(255) NOT NULL,
    batch int(11) NOT NULL
);
INSERT INTO staff.migrations (migration, batch) VALUES ('2014_10_12_000000_create_users_table', 1);
INSERT INTO staff.migrations (migration, batch) VALUES ('2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO staff.migrations (migration, batch) VALUES ('2018_05_26_120527_create_employees_table', 1);