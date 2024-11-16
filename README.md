# Conta Certa
Conta certa é um sistema de gerenciamento financeiro pessoal completo, desenvolvido para auxiliar na gestão financeira apresentando dashboard e interfaces simples e práticas de maneira intuitiva e dinâmica.

## Ferramentas utilizadas
- Larvel framework;
- Docker container (nginx, php:8.2-fpm-alpine, mysql e phpmyadmin).

## Inicialização do projeto

1. Comando para iniciar e configurar os conteiner no Docker (Obs.: O docker tem que estar aberto e com permissão de administrador);
```bash
docker-compose up -d
```

2. Comando para abrir o "terminal" do contêiner de back-end-1.
```bash
docker-compose exec back-end-1 bash
```

3. Comando para instalar as dependências do contêiner, para ele rodar normalmente;
```bash
composer install
```

4. Comando para criar as tabelas no banco de dados.
```bash
php artisan migrate
```

5. Execute novamente o comando para abrir o "terminal" do contêiner de back-end-2.
```bash
docker-compose exec back-end-2 bash
```

6. E novamente execute o comando para instalar as dependências do contêiner, para ele rodar normalmente;
```bash
composer install
```