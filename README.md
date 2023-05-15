# Code Challenge in Magento 2 for a technical interview at IMPACT

This repository has a basic installation of Magento 2.4.6 with Sample Data.

## LOCAL DEV ENVIRONMENT

To test this Magento installation on a local environment, follow these instructions:

Use this: https://github.com/markshust/docker-magento/

You can follow the instructions here: https://github.com/ivancunha/impact-magento2-code-challenge/edit/minicart/README.md

Or follow these instructions:

-   For future reference, for Magento 2.4.6, I'm using this version: https://github.com/markshust/docker-magento/releases/tag/44.0.0
-   Download the zip file.
-   Create anywhere, a folder for the project and enter folder
-   Unzip the file just downloaded and copy the contents from the folder docker-magento-44.0.0/compose to the project folder you've just created

Get the files:

-   Open a terminal in the folder you've created
-   git clone -b minicart https://github.com/ivancunha/impact-magento2-code-challenge.git src
-   Run the command: docker-compose -f compose.yaml up -d
-   Run the command: bin/copytocontainer --all

Get the database:

-   Download the database from here: https://www.dropbox.com/s/fla4n0qszv9xna6/magento.sql.zip?dl=0
-   Put the magento.sql (not sql.zip) in the project folder (outside of /src/)
-   Run the command: bin/mysql < magento.sql

Setup the local dev domain:

-   Run the command: bin/setup-domain impactmagento2codechallenge.test

Then restart with this command:

-   Run the command: bin/restart
-   Run the command: bin/fixowns && bin/fixperms && bin/magento setup:di:compile && rm -Rf src/var/cache/_ && rm -Rf src/generated/_ && bin/magento cache:clean && bin/magento cache:flush && bin/magento indexer:reset && bin/magento setup:upgrade && bin/magento setup:di:compile && bin/magento setup:static-content:deploy -f && bin/magento indexer:reindex && bin/magento cache:clean && bin/magento cache:flush

Then open the domain:
• Open the browser and go to https://impactmagento2codechallenge.test/
