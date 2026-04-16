## Instalacion

#### Pre Requisitos
- Docker

#### Levantar el proyecto

La primera vez, el volumen debe estar limpio para que MySQL importe el dump automáticamente:

```bash
docker compose down -v
docker compose up --build
```

Esto levanta dos servicios:
- **app** — PHP 5.6 + Apache en `http://localhost:80`
- **db** — MySQL 5.7, importa `./mysql/redvida.sql` al iniciar

#### Permisos de escritura (solo primera vez en el host)
```bash
sudo chmod -R 777 protected
sudo chmod -R 777 assets
```

#### Login
```
admin:admin
```

#### Variables de entorno (opcionales)

El servicio `app` acepta estas variables para sobrescribir la conexión a la base de datos:

| Variable      | Default    |
|---------------|------------|
| `DB_HOST`     | `db`       |
| `DB_NAME`     | `redvida`  |
| `DB_USER`     | `root`     |
| `DB_PASSWORD` | `secret`   |

#### Importar la base de datos manualmente (si es necesario)
```bash
docker exec -i redvida_db mysql -uroot -psecret redvida < mysql/redvida.sql
```

## Changelog

RedVida - v1.1
=======
16 de Octubre del 2014

----------------------

RedVida - v1.0
=======
04 de Octubre del 2014
