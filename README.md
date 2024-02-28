# Sistema de Agendamento

Este é um sistema de agendamento para agendar compromissos. Ele permite aos usuários criar, visualizar, editar e excluir agendamentos, além de oferecer funcionalidades de login, cadastro e reset de senha.

## Funcionalidades Principais

- **Cadastro de Agendamentos:** Os usuários podem criar novos agendamentos, especificando a data e hora do compromisso.
- **Visualização de Agendamentos:** Os usuários podem ver uma lista de todos os seus agendamentos.
- **Edição de Agendamentos:** Os usuários podem editar a data e hora de agendamentos existentes.
- **Exclusão de Agendamentos:** Os usuários podem excluir agendamentos que não são mais necessários.
- **Autenticação de Usuários:** Os usuários podem fazer login e logout da aplicação.
- **Cadastro de Usuários:** Os novos usuários podem se cadastrar na aplicação.
- **Reset de Senha:** Os usuários podem redefinir sua senha se a esquecerem.

## Tecnologias Utilizadas

- **Laravel:** Framework PHP para o desenvolvimento do backend.
- **Bootstrap:** Framework CSS para o design responsivo do frontend.
- **MySQL:** Sistema de gerenciamento de banco de dados para armazenar os agendamentos dos usuários.

## Pré-requisitos

- PHP >= 7.4
- Composer instalado
- MySQL instalado
- Node.js e npm (para compilação de assets, se necessário)

## Instalação

1. Clone este repositório para o seu ambiente local.
2. Navegue até o diretório do projeto no terminal.
3. Execute o comando `composer install` para instalar as dependências do Laravel.
4. Configure o arquivo `.env` com as informações do banco de dados.
5. Execute o comando `php artisan migrate` para executar as migrações do banco de dados.
6. Execute o comando `npm install && npm run dev` para compilar os assets do frontend (se necessário).
7. Inicie o servidor Laravel com o comando `php artisan serve`.

## Contribuição

Contribuições são bem-vindas! Se você quiser contribuir para este projeto, siga estas etapas:

1. Faça um fork do projeto.
2. Crie uma branch para sua modificação (`git checkout -b feature/nova-feature`).
3. Faça commit das suas alterações (`git commit -am 'Adicionando nova feature'`).
4. Faça push para a branch (`git push origin feature/nova-feature`).
5. Abra um Pull Request.

## Licença

Este projeto está licenciado sob a [MIT License](https://opensource.org/licenses/MIT).
