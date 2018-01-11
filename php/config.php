<?php

$database = new SQLite3('form_database.sqlite');

$database->exec("CREATE TABLE IF NOT EXISTS teachers (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)");
$database->exec("CREATE TABLE IF NOT EXISTS courses (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)");
$database->exec("CREATE TABLE IF NOT EXISTS components (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, course_id INT NOT NULL, teacher_id INT NOT NULL, FOREIGN KEY (course_id) REFERENCES courses (id) FOREIGN KEY (teacher_id) REFERENCES teachers (id))");
$database->exec("CREATE TABLE IF NOT EXISTS questions (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, question VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL)");
$database->exec("CREATE TABLE IF NOT EXISTS options (id INTEGER PRIMARY KEY AUTOINCREMENT, option_txt VARCHAR(255), question_id INT NOT NULL, is_open BOOLEAN NOT NULL, FOREIGN KEY (question_id) REFERENCES questions (id))");
$database->exec("CREATE TABLE IF NOT EXISTS answers (id INTEGER PRIMARY KEY AUTOINCREMENT, email VARCHAR(30) NOT NULL, course_id INTEGER NOT NULL, component_id INTEGER NOT NULL, FOREIGN KEY (course_id) REFERENCES courses (id), FOREIGN KEY (component_id) REFERENCES components (id))");
?>