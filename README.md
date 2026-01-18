# Gestion Du Club Informatique

<!-- TODO: DESCRIPTION DU PROJET -->

## Getting Started

<!-- TODO: HOW TO GET STARTED FOR NEW DEV -->

avant de commencer de manao an'ito commande ito:

```
git pull
git branch feat/index
git checkout feat/index
git push --set-upstream origin feat/index
```

### XAMPP/WAMP

- Start the PHP server.
- Setup the database using phpmyadmin or whatever you use.

#### phpmyadmin (if using XAMPP)

- Import the file from `db/club_informatique.sql` into a database

### Docker

- Start the docker compose container.

```
docker compose up -d
```

- Setup the database using adminer.

#### adminer

- Access adminer on `localhost:8080`
- Connect using `Username:root`, `Password:mariadb`, `Database:database`
- Go to SQL command
- Copy paste file content from `db/init.sql`
- Execute the SQL using the button `Execute`

## Screen

### Index

![alt text](docs/index.png)

### New member

![alt text](docs/new.png)

### Edit member

![alt text](docs/edit.png)

## Contributors

List of contributors on this project.

- Ryuka25 (https://github.com/Ryuka25)
- RalisataRelahy(https://github.com/RalisataRelahy)
- manoyfinaritra (https://github.com/manoyfinaritra)
