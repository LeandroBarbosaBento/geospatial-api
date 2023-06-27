# API FOR GEOSPATIAL DATA

In this API we have only one endpoint for retrieving info from a place taking latitude and longitude as parameters. 

## Info

* PHP version: 8.1.2
* Composer version: 2.5.8
* Postgres version: 15.3
* PostGIS: library 3.3.3

**Note that the database used is Postgres with PostGIS, so you MUST have these tools installed in your environment.**

It's also needed to have the PDO installed for the database connection.

Run the following line in the command line to install it

```bash
sudo apt install php8.1-pgsql
```

Then run
```bash
composer install
```


## Usage
First you need to connect with your database. In the file 
```bash
api/src/database/Connection.php
``` 
you change the private variables with your own database connection info. 

In this repository root there is a file named *quasar-space.backup*. You can import it in your own database using the RESTORE option in pgAdmin4. It will import data from Brazilian cities. This information was downloaded from IBGE website (from 2010). 

**Again, note that the database used is Postgres with PostGIS, so you MUST have these tools installed in your environment.**

You can start one server running in your terminal
```bash
 php -S localhost:8080
```
Now you have your server running at localhost:8080.

## API Info

The API has only **ONE** endpoint, and it is **/get-data-from-location** and it takes two params, latitude and longitude. 

As an example, Salvador, a city in Bahia/Brazil has latitude=-13.0147719115328 and longitude=-38.4880614840079. If you run the endpoint like
```json
localhost:8080/get-data-from-location?latitude=-13.0147719115328&longitude=-38.4880614840079
```

the returned info will be: 

```json
{
    "latitude": "-13.0147719115328",
    "longitude": "-38.4880614840079",
    "data": [
        {
        "tipo": "URBANO",
        "distrito": "SALVADOR",
        "municipio": "SALVADOR",
        "uf": "BAHIA",
        "mesoregiao": "METROPOLITANA DE SALVADOR",
        "microrregiao": "SALVADOR",
        "categoria": "CIDADE",
        "altitude": "5.87215"
        }
    ]
}
```
The endpoint will return the info from the exactly position.

If another HTTP method or endpoint is used, an error message will be displayed.


## Other cities latitude and longitude

City         | Latitude          | Longitude
---------    | ------            | ---
Joinville    | -26.3045176486541 | -48.849409143238
Brasília     | -15.794087361891  | -47.8879054780313
Porto Alegre | -51.2286604637023 | -30.0300367747664
Rio de Janeiro | -22.8766521181865 | -43.2278751249952
