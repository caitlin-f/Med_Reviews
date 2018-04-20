/*
source /path/to/med_reviews/private/sql_scripts/SQL_DDL.sql;
*/
DROP TABLE IF EXISTS Recommendation;
DROP TABLE IF EXISTS ResidentDx;
DROP TABLE IF EXISTS ResidentHome;
DROP TABLE IF EXISTS ResidentRx;
DROP TABLE IF EXISTS Review;
DROP TABLE IF EXISTS Doctor;
DROP TABLE IF EXISTS Topical;
DROP TABLE IF EXISTS Injectable;
DROP TABLE IF EXISTS Oral;
DROP TABLE IF EXISTS Diagnosis;
DROP TABLE IF EXISTS Medication;
DROP TABLE IF EXISTS Facility;
DROP TABLE IF EXISTS Resident;
DROP TABLE IF EXISTS Clinic;
DROP TABLE IF EXISTS Pharmacist;
/* 

Tables not referenced by any other 

*/
CREATE TABLE Pharmacist(
	PharmID INT NOT NULL AUTO_INCREMENT,
	FirstName VARCHAR(20) NOT NULL,
	LastName VARCHAR(20) NOT NULL,
	RegistrationNumber VARCHAR(20) NOT NULL UNIQUE,
	RegistrationExpiry DATE NOT NULL,
	AccreditationNumber VARCHAR(20) NOT NULL UNIQUE,
	AccreditationExpiry DATE NOT NULL,
	Phone INT(20),
	Email VARCHAR(50),
	PRIMARY KEY (PharmID)
);
CREATE TABLE Clinic(
	ClinicID INT NOT NULL AUTO_INCREMENT,
	Name VARCHAR(50),
	ManagerFirstName VARCHAR(20),
	ManagerLastName VARCHAR(20),
	Email VARCHAR(50),
	Phone INT(12),
	StreetAddress VARCHAR(50),
	Suburb VARCHAR(20),
	State VARCHAR(4),
	PostCode INT,
	PRIMARY KEY (ClinicID)
);
CREATE TABLE Resident(
	ResidentID INT NOT NULL AUTO_INCREMENT,
	FirstName VARCHAR(20),
	LastName VARCHAR(20),
	Medicare VARCHAR(12),
	DOB DATE,
	PRIMARY KEY (ResidentID)
);
CREATE TABLE Facility(
	RACID INT NOT NULL,
	Organisation VARCHAR(50),
	Name VARCHAR(50),
	Phone VARCHAR(10),
	BedNumber INT,
	Email VARCHAR(30),
	CCFirstName VARCHAR(20),
	CCLastName VARCHAR(20),
	StreetAddress VARCHAR(50),
	Suburb VARCHAR(20),
	State VARCHAR(4),
	PostCode INT,
	PRIMARY KEY (RACID)
);
CREATE TABLE Medication(
	MedID INT NOT NULL AUTO_INCREMENT,
	GenericName VARCHAR(50),
	Class VARCHAR(50),
	Strength VARCHAR(10),
	PRIMARY KEY (MedID)
);
CREATE TABLE Diagnosis(
	Disease VARCHAR(100) NOT NULL,
	PRIMARY KEY (Disease)
);
/* 

Tables with Foreign keys 

*/
/* Medications subclasses */
CREATE TABLE Oral(
	Formulation VARCHAR(50) NOT NULL,
	MedID INT NOT NULL,
	PRIMARY KEY (Formulation, MedID),
	FOREIGN KEY (MedID) REFERENCES Medication (MedID) ON DELETE CASCADE
);
CREATE TABLE Injectable(
	Administration VARCHAR(50) NOT NULL,
	MedID INT NOT NULL,
	PRIMARY KEY (Administration, MedID),
	FOREIGN KEY (MedID) REFERENCES Medication (MedID) ON DELETE CASCADE
);
CREATE TABLE Topical(
	Formulation VARCHAR(20) NOT NULL,
	MedID INT NOT NULL,
	PRIMARY KEY (Formulation, MedID),
	FOREIGN KEY (MedID) REFERENCES Medication (MedID) ON DELETE CASCADE
);
CREATE TABLE Doctor(
	DoctorID INT NOT NULL AUTO_INCREMENT,
	ClinicID INT NOT NULL,
	FirstName VARCHAR(20),
	LastName VARCHAR(20),
	ProviderNumber VARCHAR(20) UNIQUE,
	PersonalEmail VARCHAR(50),
	PRIMARY KEY (DoctorID),
	FOREIGN KEY (ClinicID) REFERENCES Clinic (ClinicID)
);
CREATE TABLE Review(
	RevID INT NOT NULL AUTO_INCREMENT,
	DoctorID INT NOT NULL,
	PharmID INT,
	ResidentID INT NOT NULL,
	ReferralDate DATE NOT NULL,
	ReviewDate DATE,
	PRIMARY KEY (RevID),
	FOREIGN KEY (ResidentID) REFERENCES Resident (ResidentID) ON DELETE CASCADE,
	FOREIGN KEY (DoctorID) REFERENCES Doctor (DoctorID),
	FOREIGN KEY (PharmID) REFERENCES Pharmacist (PharmID)
);
/* Many to Many Review/Medication intermediate table */
CREATE TABLE ResidentRx(
	RevID INT NOT NULL,
	MedID INT NOT NULL,
	Frequency VARCHAR(20),
	Dose VARCHAR(10),
	PRIMARY KEY (RevID, MedID),
	FOREIGN KEY (RevID) REFERENCES Review (RevID) ON DELETE CASCADE,
	FOREIGN KEY (MedID) REFERENCES Medication (MedID)
);
/* Many to Many Resident/Facility intermediate table */
CREATE TABLE ResidentHome(
	ResidentID INT NOT NULL,
	RACID INT NOT NULL,
	AdminDate DATE,
	PRIMARY KEY (ResidentID, RACID),
	FOREIGN KEY (ResidentID) REFERENCES Resident (ResidentID) ON DELETE CASCADE,
	FOREIGN KEY (RACID) REFERENCES Facility (RACID)
);
/* Many to Many Resident/Diagnosis intermediate table */
CREATE TABLE ResidentDx(
	ResidentID INT NOT NULL,
	Disease VARCHAR(50) NOT NULL,
	PRIMARY KEY (ResidentID, Disease),
	FOREIGN KEY (ResidentID) REFERENCES Resident (ResidentID) ON DELETE CASCADE,
	FOREIGN KEY (Disease) REFERENCES Diagnosis (Disease)
);
CREATE TABLE Recommendation(
	Title VARCHAR(50) NOT NULL,
	RevID INT NOT NULL,
	Information VARCHAR(2500),
	Options VARCHAR(100),
	PRIMARY KEY (Title, RevID),
	FOREIGN KEY (RevID) REFERENCES Review (RevID) ON DELETE CASCADE
);
SHOW TABLES;









