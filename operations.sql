/* Questions */
DELETE FROM votes;
DELETE FROM answers;
DELETE FROM questions;

INSERT INTO 
	`questions`(`description`, `begin_date`, `end_date`)
VALUES
	('Test question','2014-12-30 00:00:00','2014-12-28 00:00:00'),
	('Would you like to use this tool?','2014-10-30 00:00:00','2014-10-15 00:00:00');

INSERT INTO 
	`answers`(`name`, `description`, `question_id`)
VALUES
	('A','Test answer A', 12),
	('B','Test answer B', 12),
	('C','Test answer C', 12),
	('D','Test answer D', 12);

INSERT INTO 
	`answers`(`name`, `description`, `question_id`)
VALUES
	('Y','Yes', 13),
	('N','No', 13);
	
INSERT INTO 
	`votes`(`question_id`,`id`)
VALUES
	(12, 'Alex Soms Batalla'),
	(12, 'Ivan Soms Castro'),
	(12, 'Èric Soms Castro');
	
UPDATE answers SET votes = 2 WHERE question_id = 5 AND name = 'A';
UPDATE answers SET votes = 1 WHERE question_id = 5 AND name = 'C';

SELECT * FROM questions;
SELECT * FROM answers;
SELECT * FROM votes;

SELECT q.description, a.name, a.description, a.votes FROM questions q, answers a WHERE q.id = a.question_id;