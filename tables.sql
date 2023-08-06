CREATE TABLE Student_Applicant(
Std_ID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
Std_Fname VARCHAR(50) NOT NULL,
Std_Lname VARCHAR(50) NOT NULL,
Std_Address VARCHAR(50) NOT NULL,
Std_City VARCHAR(50) NOT NULL,
Std_State VARCHAR(2) NOT NULL,
Std_Email VARCHAR(50) NOT NULL,
Std_Phone VARCHAR(10) NOT NULL);

CREATE TABLE Admission_Officer(
OfficerID INT PRIMARY KEY AUTO_INCREMENT,
Officer_Fname VARCHAR(50) NOT NULL, 
Officer_Lname VARCHAR(50) NOT NULL,
Officer_Email VARCHAR(50) NOT NULL,
Officer_Phone VARCHAR(10) NOT NULL);

CREATE TABLE Government_Agency(
GAgencyID INT PRIMARY KEY AUTO_INCREMENT,
GAgency_Name VARCHAR(100) NOT NULL, 
GAgency_Email VARCHAR(50) NOT NULL,
GAgency_Phone VARCHAR(10) NOT NULL);

CREATE TABLE Department(
DepartmentID INT PRIMARY KEY AUTO_INCREMENT,
Dept_Name VARCHAR(50) NOT NULL, 
Dept_Email VARCHAR(50) NOT NULL,
Dept_Phone VARCHAR(10) NOT NULL,
Dept_Address VARCHAR(100) NOT NULL);

CREATE TABLE Major(
MajorID INT PRIMARY KEY AUTO_INCREMENT,
DepartmentID INT NOT NULL,
Major_Name VARCHAR(50) NOT NULL,
FOREIGN KEY (DepartmentID) REFERENCES Department(DepartmentID));

CREATE TABLE Applications(
ApplicationID INT PRIMARY KEY AUTO_INCREMENT,
Std_ID INT NOT NULL,
MajorID INT,
OfficerID INT,
GAgencyID INT,
App_Status ENUM('Submitted', 'In Review', 'Accepted', 'Rejected') NOT NULL DEFAULT 'Submitted',
Std_SAT INT, 
Std_HSname VARCHAR(100) NOT NULL, 
Std_HSgpa DECIMAL(3,2) NOT NULL, 
Std_EC TEXT,
FOREIGN KEY (Std_ID) REFERENCES Student_Applicant(Std_ID),
FOREIGN KEY (MajorID) REFERENCES Major(MajorID),
FOREIGN KEY (OfficerID) REFERENCES Admission_Officer(OfficerID),
FOREIGN KEY (GAgencyID) REFERENCES Government_Agency(GAgencyID));


INSERT INTO Student_Applicant(Std_Fname, Std_Lname, Std_Address, Std_City, Std_State , Std_Email, Std_Phone) VALUES 
('John', 'Smith', '246 Elm St', 'San Francisco', 'CA', 'john.smith@gmail.com', '2025551234'),
('Jane', 'Doe',   '456 Oak Ave', 'Austin',  'TX', 'jane.doe@gmail.com',   '3015555678'),
('Michael', 'Johnson', '7089 Maple St', 'Austin', 'TX', 'michael.johnson@gmail.com', '2405559012'),
('Sarah', 'Lee', '2534 Pine Rd', 'Tampa', 'FL', 'sarah.lee@gmail.com', '2025553456'),
('David', 'Brown', '5867 Elm St', 'Circus', 'NY', 'david.brown@gmail.com', '3015557890'),
('Emily', 'Wilson', '8930 Cedar Ave', 'Chicago', 'IL', 'emily.wilson@gmail.com', '2045552345'),
('William', 'Garcia', '8734 Cherry St', 'Philadelphia', 'PA', 'william.garcia@gmail.com', '3015556789'),
('Samantha', 'Martinez', '5678 Birch Rd', 'Atlanta', 'GA', 'samantha.martinez@gmail.com', '2045550123'),
('James', 'Robinson', '9012 Ash Ave', 'Charlotte', 'NC', 'james.robinson@gmail.com', '2045554567'),
('Ashley', 'Clark', '3456 Willow St', 'Baltimore', 'MD', 'ashley.clark@gmail.com', '3015558901'),
('Liam','Taylor','3959 Oak St','San Francisco','CA','liam.taylor@gmail.com','2405552468'),
('Emma','Moore','2943 Cedar Rd','Houston','TX','emma.moore@gmail.com','2025551357');

INSERT INTO Admission_Officer(Officer_Fname, Officer_Lname, Officer_Email, Officer_Phone) VALUES 
('John', 'Smith', 'john.smith@gmail.com', '3015551234'),
('Emily', 'Garcia', 'emily.garcia@gmail.com', '3015555678'),
('Michael', 'Nguyen', 'michael.nguyen@gmail.com', '3015559012'),
('Rachel', 'Lee', 'rachel.lee@gmail.com', '3015553456'),
('Sarah', 'Kim', 'sarah.kim@gmail.com', '3015557890'),
('David', 'Rodriguez', 'david.rodriguez@gmail.com', '3015552345'),
('Jennifer', 'Davis', 'jennifer.davis@gmail.com', '3015556789'),
('Kevin', 'Wilson', 'kevin.wilson@gmail.com', '3015550123'),
('Laura', 'Hernandez', 'laura.hernandez@gmail.com', '3015554567'),
('Brian', 'Garcia', 'brian.garcia@gmail.com', '3015558901'),
('Ashley', 'Choi', 'ashley.choi@gmail.com', '3015552341'),
('Mark', 'Wang', 'mark.wang@gmail.com', '2405555679');

INSERT INTO Government_Agency (GAgency_Name, GAgency_Email, GAgency_Phone) VALUES 
('Social Security Administration','ssa@usa.gov', '8009001254'), 
('United States Department of Education','usdeptofedu@usa.gov', '8009002134'),
('Federal Bureau of Investigation','fbi@usa.gov', '8009008821'),
('Department of Veteran Affairs','deptofva@usa.gov', '8009004331'),
('Department of College Students', 'deptofcs@usa.gov', '8001234657'),
('Administration of Colleges and Universities','acu@usa.gov', '8008734532'),
('Department of United States Financial Aid','deptofusfinaid@usa.gov', '8001237822'),
('Miniorities Government Agency','mga@usa.gov', '8007812382'),
('United States Army Reserve','usar@usa.gov', '8007912332'),
('United States Navy Agency','usna@usa.gov', '8009111123'),
('United States Military Agency','usma@usa.gov', '8001455412'),
('United States Coast Guard Agency','uscga@usa.gov', '8003331234');

INSERT INTO Department VALUES
(1001, 'Department of Fine Arts', 'FA@Howard.edu', '2025552141', '21 Howard Rd'),
(1002, 'Department of Journalism', 'JOUR@Howard.edu', '2025551122', '20 Howard Rd’'),
(1003, 'Department of Biology', 'BIO@Howard.edu', '2025554422', '19 Howard Rd'),
(1004, 'Department of Political Science', 'PS@Howard.edu', '2025553331', '18 Howard Rd'),
(1005, 'Department of Health Management', 'HM@Howard.edu', '2025553231', '17 Howard Rd'),
(1006, 'Department of Finance', 'FIN@Howard.edu', '2025554123', '16 Howard Rd'),
(1007, 'Department of Accounting', 'ACCT@Howard.edu', '2025552314', '15 Howard Rd'),
(1008, 'Department of Business Management', 'BM@Howard.edu', '2025551432', '14 Howard Rd'),
(1009, 'Department of International Business', 'IB@Howard.edu', '2025553412', '13 Howard Rd'),
(1010, 'Department of Marketing', 'MKTG@Howard.edu', '2025552341', '12 Howard Rd'),
(1011, 'Department of Supply Chain', 'SC@Howard.edu', '2025551234', '11 Howard Rd'),
(1012, 'Department of Information Systems', 'IS@Howard.edu', '2025554321', '10 Howard Rd');

INSERT INTO Major VALUES
(101, 1012, 'Information Systems'),
(102, 1011, 'Supply Chain'),
(103, 1010, 'Marketing'),
(104, 1009, 'International Business'),
(105, 1008, 'Business Management'),
(106, 1007, 'Accounting'),
(107, 1006, 'Finance'),
(108, 1005, 'Health Management'),
(109, 1004, 'Political Science'),
(110, 1003, 'Biology'),
(111, 1002, 'Journalism'),
(112, 1001, 'Fine Arts');

Insert into Applications (Std_ID, MajorID, OfficerID, GAgencyID, App_Status, Std_SAT, Std_HSname, Std_HSgpa, Std_EC) VALUES 
(1,101,1,2,'Accepted',1450,'Howard High School',3.78,'Boys Basketball Varsity Caption and SGA President'),
(2,102,2,2,'Accepted','The Catholic School of Maryland',3.6,'Boys Varsity Basketball Manager'),
(3, 103, 3, 2, 'Rejected','Long Reach High School',2.1,'N/A'),
(4,104,4,4,'Accepted',1350,'Columbia High School',4.00,'Member of Speech and Debate and Mocktrial'),
(5, 105, 5, 9, 'Rejected',1180,'East High School',3.33,'Member of Baseball Team'),
(6,106,6,'Accepted',1300,'Hammond High School',3.20,'Member of Future Business Leaders of America'),
(7, 107, 7, 'Rejected',1080,'Flowers High School',3.2,'Member of Golf Team'),
(8,108,8,'Rejected',950,'Wise High School',3.65,'Tennis Team'),(9,109,9,'Accepted',1270,'MLK Jr High School',3.50,'Cheese Club'),
(10,10,'Accepted',1230,'Laurel High School',2.50,'Member of Speech and Debate'), (11,11,12,'Accepted','Meade High School',2.70,'Member of Gospel Choir'), (12,12,11,'Accepted','Hanover High School',3.30,'Member of Track and Field');
