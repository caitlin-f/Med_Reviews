/* Find most recent review for each resident */
SELECT *
FROM Review Rev1
WHERE Rev1.ReviewDate = (
	SELECT MAX(ReviewDate)
	FROM Review Rev2
	WHERE Rev1.ResidentID = Rev2.ResidentID);

/* Get MedIDs from recent review for each resident */
SELECT * 
FROM Review Rev1, ResidentRx Rx
WHERE Rev1.RevID = Rx.RevID AND Rev1.ReviewDate = (
SELECT MAX(ReviewDate)
FROM Review Rev2
WHERE Rev1.ResidentID = Rev2.ResidentID);

/* Find residents on antipsychotic on most recent review */
SELECT Rev1.*, Med.Class
FROM Review Rev1, ResidentRx Rx, Medications Med
WHERE Rev1.RevID = Rx.RevID 
AND Rx.MedID = Med.MedID 
AND Med.Class = 'Antipsychotic' 
AND Rev1.ReviewDate = (
SELECT MAX(ReviewDate)
FROM Review Rev2
WHERE Rev1.ResidentID = Rev2.ResidentID);

/* Find Resident's who don't have reviews */
SELECT *
FROM Residents
WHERE ResidentID NOT IN (
SELECT ResidentID
FROM Review);

/* Find emails */
SELECT FirstName LastName PersonalEmail
FROM Doctors;

SELECT CCFirstName CCLastName Name Email
FROM Facility;

SELECT ManagerFirstName ManagerLastName Name Email
FROM Clinic;

/* Get resident medication list from latest review */
SELECT Res.FirstName, Res.LastName, Med.GenericName, Med.Strength, Rx.Dose, Rx.Frequency
FROM Review Rev1, ResidentRx Rx, Resident Res, Medication Med
WHERE Rev1.RevID = Rx.RevID AND
Res.ResidentID = Rev1.ResidentID AND
Rx.MedID = Med.MedID AND 
Rev1.ReviewDate = (
SELECT MAX(ReviewDate)
FROM Review Rev2
WHERE Rev1.ResidentID = Rev2.ResidentID);

/* Get resident medictation list from latest review including formulation/administration subclass */
SELECT Res.FirstName, Res.Lastname, Med.GenericName, COALESCE(O.Formulation, T.Formulation, I.Administration) AS Form, Med.Strength, Rx.Dose, Rx.Frequency
FROM Review Rev1, ResidentRx Rx, Resident Res, Medication Med
LEFT JOIN Oral O ON O.MedID = Med.MedID
LEFT JOIN Topical T ON T.MedID = Med.MedID
LEFT JOIN Injectable I ON I.MedID = Med.MedID
WHERE Rev1.ReviD = Rx.RevID
AND Res.ResidentID = Rev1.ResidentID
AND Rx.MedID = Med.MedID 
AND Rev1.ReviewDate = (
	SELECT MAX(Rev2.ReviewDate)
	FROM Review Rev2
	WHERE Rev1.ResidentID = Rev2.ResidentID);


/* Find pharmacists who have written recommendations for all the reviews they have been assigned */
SELECT P.PharmID
FROM Pharmacist P
WHERE P.PharmID NOT IN (
SELECT Rev.RevID
FROM Review Rev
WHERE NOT EXISTS (
SELECT Rev.RevID
FROM Recommendations Rec
WHERE Rev.RevID = Rec.RevID AND Rev.PharmID = P.PharmID));

/* Find pharmacists who have not written recommendations for all the reviews they have been assigned */
SELECT P.PharmID
FROM Pharmacist P
WHERE P.PharmID IN (
SELECT Rev.RevID
FROM Review Rev
WHERE NOT EXISTS (
SELECT Rev.RevID
FROM Recommendations Rec
WHERE Rev.RevID = Rec.RevID AND Rev.PharmID = P.PharmID));


