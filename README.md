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

2. Comando para abrir o "terminal" do contêiner de back-end.
```bash
docker-compose exec back-end bash
```

3. Comando para instalar as dependências do contêiner, para ele rodar normalmente;
```bash
composer install
```

4. Comando para gerar uma key para o projeto;
```bash
php artisan key:generate
```

5. Comando para criar as tabelas no banco de dados.
```bash
php artisan migrate
```
