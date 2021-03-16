-- Joining
-- post View
$sql = "SELECT books.*, users.uname, categories.catname,subcat.name as subcat, language.lanname,writers.writername,division.divname,district.disname FROM books
                   JOIN users ON books.uid = users.id
                   JOIN categories ON books.cid = categories.id
                   JOIN subcat ON books.scid = subcat.id
                   JOIN language ON books.lid = language.id
                   JOIN writers ON books.writerid = writers.id
                   JOIN division ON books.divid = division.id
                   JOIN district ON books.disid = district.id
                   WHERE books.id ='1' LIMIT 1";


                   



INSERT INTO `writers` (`id`, `writername`, `created`, `updated`, `deleted`) VALUES (NULL, 'Romance novel', current_timestamp(), NULL, NULL);



create trigger after_inser after INSERT
on users
FOR EACH row
BEGIN
INSERT INTO `profile`(`id`, `uid`, `fullname`, `bio`, `image`, `phone`, `location`, `gender`, `created`, `updated`, `deleted`) VALUES(NULL,new.uid,NULL,NULL,NULL,NULL,NULL,NUll,NULL,NULL,NULL)

-- Writer query
SELECT books.*, writers.writername,users.uname,language.lanname,categories.catname FROM books 

JOIN writers on books.writerid= writers.id
JOIN users on books.uid= users.id
JOIN language on books.lid= language.id
JOIN categories on books.cid= categories.id
WHERE books.writerid = 1