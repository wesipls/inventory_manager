# Inventory Management Software

Requires Docker and docker-compose

## Usage

1, Clone repository

2, run: cd inventory_manager

3, run: docker-compose up

4, when starting inventory_manager for the first time run init-db.sh script, as shown below:

5, from folder inventory_manager run: cd scripts

6, run: ./init-db.sh

7, When asked for a password type in the password specified in docker-compose.yml (default password is: P4ssW0rd)

8, if init-db.sh cannot be executed be run: chmod +x init-db.sh, and rerun step 6 and 7

## Features

Currently Add Entries and Submit Entries work from the Inventory tab, Add entries lets you add completely new entries to the database.

Submit entries will save and changes made to the device table, fields can be edited by clicking on them.

## TODOs

Archives entries button, should move devices with specific status to another "Archived database"  
Delete button, maybe, maybe no, for accounting reasons the devices should not be deleted, although it makes sence to include one delete button somewhere, probably a new maintenance tab.  
docker-clean.sh, for cleaning old docker volumes, cache, layers to test "new deployments"  
Dashboard, quick statistics for current inventory  
Import tab, for importing device info from store pages  
export tab, for exporting database to different formats, excel and db dump most important  
Backups, maintenance tab, backup database to specified location  
