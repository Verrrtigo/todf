CREATE DATABASE TODF;
USE TODF;

CREATE TABLE EMPLOYEE(
   EmployeeID INT NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,LastName VARCHAR(50) NOT NULL
  ,FirstName VARCHAR(50) NOT NULL
  ,EmailAddress VARCHAR(100) NOT NULL
  ,Username VARCHAR(20) NOT NULL
  ,Password VARCHAR(32) NOT NULL
  ,Role ENUM("admin")
);

CREATE TABLE MEMBER(
   MemberID INT NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,LastName VARCHAR(50) NOT NULL
  ,FirstName VARCHAR(50) NOT NULL
  ,EmailAddress VARCHAR(100) NOT NULL
  ,UserName VARCHAR(20) NOT NULL
  ,Password VARCHAR(32) NOT NULL
  ,MemberImageFilename VARCHAR(50)
);

CREATE TABLE CATEGORY(
  CategoryID INT NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,CategoryName VARCHAR(50) NOT NULL
);

CREATE TABLE SUBCATEGORY(
  SubCategoryID INT NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,SubCategoryName VARCHAR(50) NOT NULL
  ,CategoryID INT NOT NULL
  ,FOREIGN KEY (CategoryID) REFERENCES CATEGORY (CategoryID)
);

CREATE TABLE QUESTION(
   QuestionID INT NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,Question TEXT NOT NULL
  ,QuestionDetails TEXT NULL
  ,QuestionCreationDate DATE NOT NULL
  ,QuestionStatus ENUM("open", "closed")
  ,CategoryID INT NOT NULL
  ,SubCategoryID INT NOT NULL
  ,MemberID INT NOT NULL
  ,FOREIGN KEY (CategoryID) REFERENCES CATEGORY (CategoryID)
  ,FOREIGN KEY (SubcategoryID) REFERENCES SUBCATEGORY (SubcategoryID)
  ,FOREIGN KEY (MemberID) REFERENCES MEMBER(MemberID)
);

CREATE TABLE QUESTIONDRAFT(
   QuestionDraftID INT NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,QuestionDraft TEXT NOT NULL
  ,QuestionDraftDetails TEXT NULL
  ,QuestionDraftCreationDate DATE NOT NULL
  ,QuestionDraftApproval ENUM("pending", "approved", "rejected") NOT NULL
  ,CategoryID INT NOT NULL
  ,SubCategoryID INT NULL
  ,QuestionID INT NULL
  ,MemberID INT NOT NULL
  ,FOREIGN KEY (CategoryID) REFERENCES CATEGORY (CategoryID)
  ,FOREIGN KEY (SubcategoryID) REFERENCES SUBCATEGORY (SubcategoryID)
  ,FOREIGN KEY (QuestionID) REFERENCES QUESTION (QuestionID)
  ,FOREIGN KEY (MemberID) REFERENCES MEMBER(MemberID)
);

CREATE TABLE ANSWERLINE(
   AnswerID INT NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,Answer TEXT NOT NULL
  ,AnswerDate DATE NOT NULL
  ,MemberID INT NOT NULL
  ,QuestionID INT NOT NULL
  ,FOREIGN KEY (MemberID) REFERENCES MEMBER(MemberID)
  ,FOREIGN KEY (QuestionID) REFERENCES QUESTION(QuestionID)
);

CREATE TABLE ANSWERDRAFTLINE(
   AnswerDraftID INT NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,AnswerDraft TEXT NOT NULL
  ,AnswerDraftDate DATE NOT NULL
  ,AnswerDraftApproval ENUM("pending", "approved", "rejected") NOT NULL
  ,MemberID INT NOT NULL
  ,QuestionID INT NOT NULL
  ,AnswerID INT NULL
  ,FOREIGN KEY (MemberID) REFERENCES MEMBER(MemberID)
  ,FOREIGN KEY (QuestionID) REFERENCES QUESTION(QuestionID)
  ,FOREIGN KEY (AnswerID) REFERENCES ANSWERLINE (AnswerID)
);









DELIMITER $$
CREATE PROCEDURE insertTestData()
BEGIN
call insertCategories;
call insertSubCategories;
call insertAdmin;
call insertMembers;
call insertQuestions;
call insertQuestionDrafts;
call insertAnswerLines;
call insertAnswerDraftLines;
END$$


DELIMITER $$
CREATE PROCEDURE insertCategories()
BEGIN
INSERT INTO CATEGORY(CategoryID, CategoryName)
     VALUES(1, "Operating System")
     ,(2, "Web Development")
     ,(3, "Food")
     ,(4, "Other")
     ;
END$$

DELIMITER $$
CREATE PROCEDURE insertSubCategories()
BEGIN

INSERT INTO SUBCATEGORY(CategoryID, SubCategoryName)
     VALUES(1, "Windows")
     ,(1, "MacOS")
     ,(1, "Linux")
     ,(1, "Other")
     ,(2, "HTML")
     ,(2, "CSS")
     ,(2, "JavaScript")
     ,(2, "Php")
     ,(2, "MySQL")
     ,(2, "Other")
     ,(3, "Breakfast")
     ,(3, "Lunch")
     ,(3, "Dinner")
     ,(3, "Snacks")
     ,(3, "Other")
     ;
END$$


DELIMITER $$
CREATE PROCEDURE insertAdmin()
BEGIN
INSERT INTO EMPLOYEE(LastName, FirstName, EmailAddress, Username, Password, Role)
     VALUES("Admin", "Admin", "admin@gmail.com", "admin", md5('admin'), "admin");
END$$

DELIMITER $$
CREATE PROCEDURE insertMembers()
BEGIN
INSERT INTO MEMBER(LastName, FirstName, EmailAddress, Username, Password, MemberImageFileName)
     VALUES("Sorales", "Meth", "methsorales@gmail.com", "meth", md5('meth'), "defaultUser.png")
     ,("Doe", "John", "johndoe@gmail.com", "john", md5('johnnydabest'), "johnDoe.jpg")
     ;
END$$

DELIMITER $$
CREATE PROCEDURE insertQuestions()
BEGIN
INSERT INTO QUESTION(Question, QuestionDetails, QuestionCreationDate, QuestionStatus, CategoryID, SubCategoryID, MemberID)
     VALUES("What do you think is the most useful JS framework?", "Discussion", "2020-01-22", "closed", 2, 7, 1)
     ,("I'm looking for the best scrambled eggs recipes, give 'em here!", "Recipes", "2021-08-12", "open", 3, 11, 2)
     ;
END$$

DELIMITER $$
CREATE PROCEDURE insertQuestionDrafts()
BEGIN
INSERT INTO QUESTIONDRAFT(QuestionDraft,QuestionDraftDetails, QuestionDraftCreationDate, QuestionDraftApproval, CategoryID, SubCategoryID, QuestionId, MemberID)
      VALUES("How much is the fish?", "Discussion","2020-07-22", "rejected", 2, 7, 1, 1)
     ,("Would you eat roadkill?", "Opinions", "2021-12-12", "pending", 3, 11, 2, 2)
     ;
END$$

DELIMITER $$
CREATE PROCEDURE insertAnswerLines()
BEGIN
INSERT INTO ANSWERLINE(Answer, AnswerDate, MemberID, QuestionID)
      VALUES("react", "2020-02-22", 2, 1)
     ,("I just like mine sunny side up", "2020-02-22", 1, 2);
END$$

DELIMITER $$
CREATE PROCEDURE insertAnswerDraftLines()
BEGIN
INSERT INTO ANSWERDRAFTLINE(AnswerDraft, AnswerDraftDate, AnswerDraftApproval, MemberID, QuestionID, AnswerID)
     VALUES("no actually angular is better","2020-03-22", "approved", 1, 1, 1)
     ,("so which is it?","2020-03-22", "rejected", 2, 1, 1)
     ;
END$$

DELIMITER $$
CREATE PROCEDURE deleteTestData()
BEGIN
call deleteAnswerDraftLines;
call deleteAnswerLines;
call deleteQuestionDrafts;
call deleteQuestions;
call deleteSubCategories;
call deleteCategories;
call deleteAdmin;
call deleteMembers;
END$$

DELIMITER $$
CREATE PROCEDURE deleteCategories()
BEGIN
DELETE FROM EMPLOYEE;
ALTER TABLE EMPLOYEE
AUTO_INCREMENT = 1;
END$$

DELIMITER $$
CREATE PROCEDURE deleteSubcategories()
BEGIN
DELETE FROM EMPLOYEE;
ALTER TABLE EMPLOYEE
AUTO_INCREMENT = 1;
END$$

DELIMITER $$
CREATE PROCEDURE deleteAdmin()
BEGIN
DELETE FROM EMPLOYEE;
ALTER TABLE EMPLOYEE
AUTO_INCREMENT = 1;
END$$

DELIMITER $$
CREATE PROCEDURE deleteMembers()
BEGIN
DELETE FROM MEMBER;
ALTER TABLE MEMBER
AUTO_INCREMENT = 1;
END$$

DELIMITER $$
CREATE PROCEDURE deleteQuestions()
BEGIN
DELETE FROM QUESTION;
ALTER TABLE QUESTION
AUTO_INCREMENT = 1;
END$$

DELIMITER $$
CREATE PROCEDURE deleteQuestionDrafts()
BEGIN
DELETE FROM QUESTIONDRAFT;
ALTER TABLE QUESTIONDRAFT
AUTO_INCREMENT = 1;
END$$

DELIMITER $$
CREATE PROCEDURE deleteAnswerLines()
BEGIN
DELETE FROM ANSWERLINE;
ALTER TABLE ANSWERLINE
AUTO_INCREMENT = 1;
END$$

DELIMITER $$
CREATE PROCEDURE deleteAnswerDraftLines()
BEGIN
DELETE FROM ANSWERDRAFTLINE;
ALTER TABLE ANSWERDRAFTLINE
AUTO_INCREMENT = 1;
END$$
