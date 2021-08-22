# project_test2
 ปี 3 เทอม 2 สอบพีแพรไฟนอล
![image](https://user-images.githubusercontent.com/71112083/130343079-2b480076-59d3-4ccb-af09-00a207d32c11.png)
     
ตารางใน SQl     
     CREATE TABLE user (
     	id int(11) NOT null AUTO_INCREMENT PRIMARY KEY ,
        username varchar(50) not null,
        password varchar(50) not null,
       	email varchar(50) not null,
        fullname varchar(50) not null,
        age int(3) not null,
       	id_card varchar (13) not null,
        phon varchar(10) not null,
        sex varchar(3) not null
        ) ENGINE = INNODB DEFAULT CHARSET=utf8;
