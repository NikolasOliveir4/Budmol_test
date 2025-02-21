# Event Manager - Laravel Project

Este é um projeto de gerenciamento de eventos desenvolvido com **Laravel**. O sistema permite a criação, edição, listagem e exclusão de eventos, além da inscrição e cancelamento de participantes para os eventos.

## Pré-requisitos

Antes de rodar o projeto, verifique se você tem as seguintes dependências instaladas:

- **PHP** (preferencialmente versão 8.0 ou superior)
- **Composer** (gerenciador de dependências PHP)
- **MySQL** ou outro banco de dados relacional compatível
- **Node.js** e **npm** (para compilar assets front-end, se necessário)
- **Laravel** (não precisa ser instalado globalmente, apenas via Composer)

Se você estiver utilizando o **Docker**, também pode configurar o ambiente facilmente utilizando o `docker-compose`.

## Instalação

### Passo 1: Clonar o repositório

Clone o repositório do projeto para sua máquina local.

```bash
git clone https://github.com/NikolasOliveir4/Budmol_test.git
cd budmol_test
Passo 2: Instalar dependências do PHP

Execute o comando abaixo para instalar as dependências do Laravel usando o Composer.

bash
Copy
composer install
Passo 3: Configurar o arquivo .env

Copie o arquivo .env.example para .env para configurar o ambiente do seu projeto.

bash
Copy
cp .env.example .env
Agora, edite o arquivo .env com as credenciais do seu banco de dados e outras variáveis de ambiente necessárias, como APP_KEY, DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME e DB_PASSWORD.

Passo 4: Gerar a chave da aplicação

Execute o seguinte comando para gerar a chave da aplicação do Laravel:

bash
Copy
php artisan key:generate
Passo 5: Rodar as migrações do banco de dados

O projeto possui migrações para criar as tabelas necessárias no banco de dados. Execute o comando abaixo para rodá-las:

bash
Copy
php artisan migrate
Passo 6: Instalar dependências de front-end (opcional)

Se você quiser compilar os assets front-end, execute os comandos abaixo:

bash
Copy
npm install
npm run dev
Passo 7: Rodar o servidor

Agora você pode rodar o servidor local do Laravel com o comando:

bash
Copy
php artisan serve
O servidor estará disponível em http://localhost:8000.

Estrutura de Rotas

Rota de Listagem de Eventos
URL: /events
Método: GET
Descrição: Exibe todos os eventos registrados no sistema. Permite que o administrador veja as opções de editar e excluir eventos. Usuários podem se inscrever nos eventos.
Rota de Criação de Evento
URL: /events/create
Método: GET
Descrição: Exibe o formulário para criação de um novo evento. Apenas administradores podem acessar essa página.
Rota para Salvar Evento
URL: /events
Método: POST
Descrição: Salva um novo evento no banco de dados.
Rota de Edição de Evento
URL: /events/{id}/edit
Método: GET
Descrição: Exibe o formulário de edição de um evento existente. Apenas administradores podem acessar essa página.
Rota para Atualizar Evento
URL: /events/{id}
Método: PUT
Descrição: Atualiza os dados do evento no banco de dados.
Rota de Exclusão de Evento
URL: /events/{id}
Método: DELETE
Descrição: Exclui um evento e cancela as inscrições associadas. Apenas administradores podem excluir eventos.
Rota de Inscrição em Evento
URL: /events/{id}/inscribe
Método: POST
Descrição: Permite que um usuário se inscreva em um evento, caso o evento esteja aberto e tenha vagas disponíveis.
Rota de Cancelamento de Inscrição
URL: /events/{id}/cancelInscription
Método: DELETE
Descrição: Permite que um usuário cancele sua inscrição em um evento.
Rota de Visualização de Inscritos
URL: /events/{id}/participants
Método: GET
Descrição: Exibe a lista de participantes inscritos em um evento. Apenas administradores podem visualizar a lista de inscritos.
Autenticação e Autorização

Usuários Admin: Podem criar, editar, excluir eventos, e visualizar a lista de inscritos.
Usuários Participantes: Podem se inscrever e cancelar inscrições em eventos.
Roles e Permissões

Os usuários têm o papel de admin ou participant. O papel do usuário é armazenado no campo role da tabela users. O admin tem permissões para gerenciar eventos, enquanto o participant pode apenas se inscrever e cancelar inscrições.

Como Funciona o Sistema

Criação de Eventos: Administradores podem criar eventos, definindo título, descrição, data de início e término, capacidade e status.
Inscrição e Cancelamento de Inscrição: Usuários podem se inscrever em eventos com vagas disponíveis. Eles também podem cancelar a inscrição, caso necessário.
Exclusão de Eventos: Ao excluir um evento, todas as inscrições associadas ao evento são canceladas automaticamente.
Conclusão

Agora que você configurou e iniciou o projeto, você pode acessar a página principal do Event Manager e começar a gerenciar eventos, inscrever-se em eventos, e aproveitar todas as funcionalidades do sistema!
