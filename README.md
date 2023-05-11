# Code Challenge in Magento 2 for a technical interview at IMPACT

This repository has a basic installation of Magento 2.4.6 with Sample Data.

LOCAL DEV ENVIRONMENT
To test this Magento installation on a local environment, follow these instructions:

Use this: https://github.com/markshust/docker-magento/
• But for future reference, for Magento 2.4.6, I'm using this version: https://github.com/markshust/docker-magento/releases/tag/44.0.0
• Download the zip file.
• Create anywhere, a folder for the project and enter folder
• Unzip the file just downloaded and copy the contents from the folder docker-magento-44.0.0/compose to the project folder you've just created

Get the files:
• git clone -b main git@github.com:ivancunha/impact-magento2-code-challenge.git src
• Run the command: docker-compose -f compose.yaml up -d
• Run the command: bin/copytocontainer --all

Get the database:
• Put the backup.sql (not sql.gz) in the project folder (outside of /src/)
• Run the command: bin/clinotty mysql -hdb -uroot -pmagento magento < src/backup.sql
•

TODO...
