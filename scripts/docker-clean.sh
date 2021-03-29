#!/bin/bash
echo "This script will clean all data related to previously run docker containers, as well ass the db folder of the Inventory_manager project"
echo "NOTICE!!! Do not run this script if you have not backed up your Inventory_manager database, as this script will remove it and it is not recoverable!"
echo "NOTICE!!! Do not run this scipt if moved form original folder without checking what it does, it will remove any db folder in the ../db path!"
read -p "Are you sure? " -n 1 -r
echo""
if [[ $REPLY =~ ^[Yy]$ ]]
then
	echo "Alright, let's start cleaning!"
	echo "Shutting down running containers"
	docker-compose down
	echo "Removing networks, containers and images"
	docker system prune --all --force
	echo "Removing volumes"
	docker volume rm $(docker volume ls -q)
	echo "Reomving Inventory_manager db folder"
	cd ../
	sudo rm -r -f db/
else
	echo "A wise choise"
fi

