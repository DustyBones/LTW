
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
  "answerID" INTEGER REFERENCES answers(ID)
);

INSERT INTO users VALUES ('admin', '$2a$10$mwkK8jtGM11e/.NJE9jfQeS9bWIjpiDX1SNh2XdE0wCecMdIwMyJq');
