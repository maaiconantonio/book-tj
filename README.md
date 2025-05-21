# 📚 book-tj

**book-tj** é uma aplicação web desenvolvida em [Lumen](https://lumen.laravel.com/) com interface construída usando [Blade](https://laravel.com/docs/11.x/blade) e [Bootstrap](https://getbootstrap.com/), com banco de dados PostgreSQL. O projeto tem como objetivo demonstrar um sistema simples de **cadastro de livros**, sendo utilizado como parte da apresentação de um teste técnico.

## 🚀 Tecnologias Utilizadas

- [PHP 8+](https://www.php.net/)
- [Lumen](https://lumen.laravel.com/)
- [Blade (via Laravel View)](https://laravel.com/docs/11.x/blade)
- [Bootstrap 5](https://getbootstrap.com/)
- [PostgreSQL](https://www.postgresql.org/)
- [Composer](https://getcomposer.org/)

## ⚙️ Instalação e Execução

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/maaiconantonio/book-tj.git
   cd book-tj
   ```

2. **Instale as dependências:**

   ```bash
   composer install
   ```

3. **Configure o ambiente:**

   ```bash
   cp .env.example .env
   ```

   Edite o arquivo `.env` com suas credenciais de banco de dados PostgreSQL:

   ```
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=book_tj
   DB_USERNAME=seu_usuario
   DB_PASSWORD=sua_senha
   ```

4. **Execute as migrações:**

   ```bash
   php artisan migrate
   ```

5. **Inicie o servidor local:**

   ```bash
   php -S localhost:8000 -t public
   ```

   Acesse a aplicação em: [http://localhost:8000](http://localhost:8000)

## 🧪 Testes

Se os testes estiverem configurados com [Pest](https://pestphp.com/) ou PHPUnit, utilize:

```bash
./vendor/bin/pest
# ou
./vendor/bin/phpunit
```

## 🗂️ Funcionalidades

- Cadastro, edição e exclusão de livros
- Listagem com visual limpo e responsivo (Bootstrap)
- Backend com Lumen + Blade
- Integração com PostgreSQL
- Estrutura leve e ideal para testes técnicos

## 📁 Estrutura do Projeto

```plaintext
book-tj/
├── app/               # Código principal (Models, Views, Controllers)
├── bootstrap/         # Arquivo de inicialização
├── config/            # Configurações da aplicação
├── database/          # Migrações e seeds
├── public/            # Raiz web
├── resources/         # Views Blade
├── routes/            # Rotas web
├── tests/             # Testes com Pest/PHPUnit
├── .env.example       # Arquivo de ambiente de exemplo
├── composer.json      # Dependências do projeto
└── README.md          # Documentação
```

## 🧑‍💻 Autor

Desenvolvido por [Maicon Antonio](https://github.com/maaiconantonio) como parte de um teste técnico.

## 🪪 Licença

Este projeto está licenciado sob a [MIT License](LICENSE).
