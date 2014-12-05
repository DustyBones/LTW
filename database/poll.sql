
CREATE TABLE users (
    "username" VARCHAR PRIMARY KEY,
    "password" VARCHAR
);
CREATE TABLE polls (
  "ID" INTEGER PRIMARY KEY AUTOINCREMENT,
  "name" VARCHAR,
  "author" VARCHAR REFERENCES users(username),
  "public" BOOLEAN,
  "image" VARCHAR
);
CREATE TABLE questions (
    "ID" INTEGER PRIMARY KEY AUTOINCREMENT,
    "question" VARCHAR,
    "pollID" INTEGER REFERENCES polls(ID)
);
CREATE TABLE answers (
    "ID" INTEGER PRIMARY KEY AUTOINCREMENT,
    "answer" VARCHAR,
    "questionID" INTEGER REFERENCES questions(ID),
    "count" INTEGER DEFAULT (0)
);
CREATE TABLE votes (
  "username" VARCHAR REFERENCES users(username),
  "questionID" INTEGER REFERENCES questions(ID),
  "answerID" INTEGER REFERENCES answers(ID)
);

INSERT INTO users VALUES ('admin', '$2a$10$mwkK8jtGM11e/.NJE9jfQeS9bWIjpiDX1SNh2XdE0wCecMdIwMyJq');

INSERT INTO polls VALUES (NULL, 'Example poll', 'admin', 'true', NULL);
INSERT INTO polls VALUES (NULL, 'Example poll 2', 'admin', 'true', NULL);

INSERT INTO questions VALUES (NULL, 'hue?', 1);

INSERT INTO answers VALUES (NULL, 'hue1', 1, 0);
INSERT INTO answers VALUES (NULL, 'hue2', 1, 0);
