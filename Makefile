START = sudo docker-compose --env-file ./app/.env
BASIC = sudo docker-compose --env-file ./app/.env run php
TEST = sudo docker-compose --env-file ./app/.env.test run php
CONSOLE =  bin/console
INITAL_DB = sudo docker-compose exec database /bin/bash

test: clear-cache phpunit behat

update: git-update composer-update database-update clear-cache composer-optimize

start-project:
	$(START) up  --build

end-project:
	$(START) down
### GIT ###

git-update:
	git fetch origin
	git stash
	git pull
	git stash pop || :

### CONSOLE ###

clear-logs:
	cat /dev/null > var/logs/dev.log
	cat /dev/null > var/logs/test.log

clear-cache:
	$(BASIC) $(CONSOLE) cache:clear --no-warmup --env=dev
	$(BASIC) $(CONSOLE) cache:clear --no-warmup --env=test
	$(BASIC) $(CONSOLE) cache:clear --no-warmup --env=prod

#### QUEUE ####
run-enqueue:
	$(BASIC) $(CONSOLE) enqueue:consume --setup-broker -vvv

### TESTS ###

behat:
	$(TEST) vendor/bin/behat

phpunit:
	$(TEST) vendor/bin/phpunit

### COMPOSER ###

composer-install:
	$(BASIC) composer install

composer-update:
	$(BASIC) composer update

composer-require:
	$(BASIC) composer require

composer-optimize:
	$(BASIC) composer dumpautoload --optimize

composer-script-update:
	$(BASIC) composer run-script post-install-cmd

### DATABASE ###
database-inital:
	$(INITAL_DB)
database-update:
	$(BASIC) $(CONSOLE) doctrine:schema:update --force

#### FIXTURES ###

fixture-inital-project:
	$(BASIC) $(CONSOLE) doctrine:fixtures:load --group=projects