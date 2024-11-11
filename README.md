### Passo a passo para instalção

Comando para iniciar e configurar o Docker.
```sh
docker-compose up -d
```

Comando para abrir o "terminal" do contêiner de back-end.
```sh
docker-compose exec back-end bash
```

Comando para instalar as dependências para rodar o contêiner de back-end.
```sh
composer install
```

Comando para gerar uma key para o projeto. (Observação: Ela é extremamente necessária.)
```sh
php artisan key:generate
```

Comando para criar as tabelas no banco de dados.
```sh
php artisan migrate
```