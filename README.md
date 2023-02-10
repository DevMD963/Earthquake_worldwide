# Earthquake_worldwide
install pakges with composer 
```bash
composer install
```
create table in database:
```sql
CREATE TABLE `results` (
 `id` int(11) NOT NULL,
 `result` text NOT NULL,
 `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
```
config database connect in file `config.php` in:
```php
const hostDataBase = 'localhost';
const userDataBase = 'root';
const passDataBase = '';
const nameDataBase = 'bot';
```
finale for start bot you should run file `bot.php` example:
```bash
php bot.php
```