## Instalacion
#### Pre Requisitos
- Docker
- mysql

#### Instalar imagen app
```
docker compose up
```

#### Instalar mysql
```dockerfile
services:
  mysql:
    image: mysql:5.7
    restart: always
    container_name: mysql57
    environment:
      MYSQL_ROOT_PASSWORD: secret
    network_mode: "host"
    volumes:
      - ./mysql_data:/var/lib/mysql
```
importar la base de datos de la carpeta mysql

#### Permisos de escritura
```
sudo chmod -R 777 protected
sudo chmod -R 777 assets
```

#### Cambiar configuracion de base de datos
```
protected/config/main.php
```

#### Login
```
admin:admin
```

## Changelog

RedVida - v1.1
=======
16 de Octubre del 2014

----------------------

RedVida - v1.0
=======
04 de Octubre del 2014