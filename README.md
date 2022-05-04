## Docker környezet elindítása
<p>A Docker file-ban kell ki adni command line parancsban hogy docker-compose up</p>

## Laravel elindítása
<p>Sajnos adatbázis manuálisan kell létre hozni mivel arra nem írtam commandot</p>
<p>Ahhoz hogy tudjunk csatlakozni az adatbázishoz kelleni fog egy Adatbázis kezelő rendszerre. Ehhez javaslom a HeidiSql-t https://www.heidisql.com/</p>

### FONTOS ELÖTTE EL KELL INDÍTANI A DOCKER KÖRNYEZETET!

<p>Ezekre az adatokra lesz szükség:</p>

* DB_CONNECTION=mysql
* DB_HOST=localhost
* DB_PORT=3306
* DB_USERNAME=root
* DB_PASSWORD=123456

<p>Majd itt kell létre hozni zarthelyi néven egy adatbázis<p>
  
<p>A zárthelyi mappában ki kell adni command line parancsban ezeket:</p>

```
composer install
npm install
php artisan migrate
php artisan serve
```
<p>Az oldalt majd itt utdja elérni http://127.0.0.1:8000/</p>
