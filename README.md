# Inventory Management Software

Requires Docker and docker-compose

##Usage

1, Clone repository
2, run: cd inventory_manager
3, run: docker-compose up
4, when starting inventory_manager for the first time run init-db.sh script, as shown below:
5, from folder inventory_manager run: cd scripts
6, run: ./init-db.sh
7, When asked for a password type in the password specified in docker-compose.yml (default password is: P4ssW0rd)
8, if init-db.sh cannot be executed be run: chmod +x init-db.sh, and rerun step 6 and 7
