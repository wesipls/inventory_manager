#!/bin/bash
echo "Please Enter DB container MYSQL Password"

docker exec -it db mysql -u invisman -p Inventory -e "CREATE TABLE \`devices\` ( \`device_id\` int(11) NOT NULL AUTO_INCREMENT, \`device_location\` varchar(255) NOT NULL, \`device_name\` varchar(255) NOT NULL, \`device_model\` varchar(255) NOT NULL, \`device_manufacturer\` varchar(255) NOT NULL, \`device_price\` int(11) NOT NULL, \`device_purchase_date\` date NOT NULL, \`device_warranty_date\` date NOT NULL, \`device_info\` varchar(255) DEFAULT NULL, \`device_status\` varchar(30) DEFAULT NULL, PRIMARY KEY (\`device_id\`) ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;"

echo "All Done!"
