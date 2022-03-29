## Setup Backend Code

The instructions will be divided into parts. 

### Inital

- Go to app folder
- Open .env and .env.test
- You Can get  the following params ( MYSQL_ROOT_PASSWORD & MYSQL_USER & MYSQL_PASSWORD & MYSQL_DATABASE)

## Start Project
From the base directory run these steps:

1. In terminal execute this command ( make start-project )
2. In terminal execute this command (make composer-install) 
3. In new terminal execute this command (make database-inital) .
4. Connect to mysql and create DB
5. Put the name of db inside .env to parameter (MYSQL_DATABASE) 
6. In terminal execute this command (make database-update)
7. After the database is updated you can execute ( make fixture-inital-project )
8. Your application will be run on (http://localhost:8080/)
9. I exported Json Postman to json-collections folder
### Bundles Used
1. Guzzle http client: (https://docs.guzzlephp.org/en/stable/) for unit tests

## Ideas that Used
* I make all review Items Dynamic From Database ( Choices & textarea) and add many items under these like ( Overall Satisfaction)
* I make custom annotation like route in symfony and plugin api in drupal if you know drupal
* the custom annotation that used ProcessorAction
* you can find this annontation class in src/app/symfony_docker/src/ProcessorActions/Annotation/ProcessorAction
* I used seralizer Idea with Groups 

 
## Entities
 
1. I created Vico entity that can have title like ( Circle Design)
2. I created Project Entity that can have many owners like ( Build A Site With Appointment )
3. I created ReviewConstructionItemType Entity that can have many names like ( text & choice ) and have many ReviewConstructionItems like ( Overall Satisfaction & Communications & )
4. if you create a new entity you can update schema with this command ( make database-update)

## Tests
1. To run Unit Test execute this command (make phpunit) and please put your IP in ( APP_URL) in (.env.test)
2. To run behat Test execute this command in terminal (make behat)

## Other Notes
1. I want to make swagger but i don't have time to make it  if you want from me to add swagger  
2. I pushed .env and .env.test to see you what i did it in these files 