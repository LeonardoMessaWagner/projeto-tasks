# Processo seletivo - QA

Candidato Leonardo Messa Wagner

Tecnologias Usadas: 
- PHP 8.2.0 (lembre-se de habilitar no php.ini o driver do postgres)
- PostgreSQL 15.2 
- Composer 2.5.1

Frameworks Usados:
- Laravel 10.8.0
- Bootstrap 5.2

Bibliotecas Usadas:

- SweetAlerts2 (https://realrashid.github.io/sweet-alert/)

## Passo 1 Criando o Database:

Coloquei o nome do banco de "QA_teste" com o usuario "postgres" e a senha "1234" (Esse processo foi feito de forma manual).

![image](https://user-images.githubusercontent.com/62308324/233801536-a428c1fe-b15c-42bf-879b-5f2db0816589.png)


## Passo 2 Alocando o projeto Laravel no computador:

Com o composer instalado e dentro do repositório clonado no computador, execute os seguintes comandos no CMD.
 
     composer install

![image](https://user-images.githubusercontent.com/62308324/233802289-507b0a5a-e567-432c-87ed-632da4e0ea33.png)

      composer update
      
![image](https://user-images.githubusercontent.com/62308324/233802370-5864df0a-9da1-4faa-8d8c-82256bcef012.png)

## Passo 3 Configurando o .env:

Há um arquivo chamado ".env" na pasta raiz do laravel, ele contem todas as configurações para se conectar ao Banco de dados, configure ele conforme o usuario, senha e o nome que colocou no seu banco de dados e claro não se esqueça de colocar a qualporta esta tentando se conectar e o host.

- Linhas 11 a 16

![image](https://user-images.githubusercontent.com/62308324/233802798-6c15b152-3aa1-47d8-b376-166a953f469f.png)

## Passo 4 Rodando as Migrations e Seeders:

Basta rodas os seguintes comandos no CMD.

     php artisan migrate
     
![image](https://user-images.githubusercontent.com/62308324/233803015-04f8ed86-7900-4e77-8895-0bdfda0f0604.png)

     php artisan db:seed
     
![image](https://user-images.githubusercontent.com/62308324/233803069-5e957ea6-2489-4929-befd-dfdf07562a8b.png)

- OBS: o usuario padrão para login que eu coloquei no semeador é o de email "leonardowagner22@outlook.com" e senha "12345678".
- OBS 2: os outros usuarios da factory tem senha "12345678", mas os emails são unicos para cada usuario.

## Passo 5 Rodando o Servidor:

Para isso digite o seguinte comando no CMD.

     php artisan serve

![image](https://user-images.githubusercontent.com/62308324/233803298-d6a5950c-dedf-471d-b67e-81d0b2fb92f3.png)

Agora é só acessar o link que ele retornou!


 
## Descrição dos Requisitos Funcionais
 
RF1 - O acesso ao sistema deverá se dar através de login e senha, sendo que o usuário não poderá acessar as telas internas se não informar os dados corretos.
 
![image](https://user-images.githubusercontent.com/62308324/233803671-bdea8fe8-d91f-4568-964b-2fd81739a688.png)

RF2 - Tela de listagem de tarefas
2.1 - Deverá possuir um link que direcione o usuário para a tela de cadastro de tarefa (RF3).
2.2 - Deverá listar em uma tabela todas as tarefas que não estejam concluídas, as colunas devem
ser:
- Número da tarefa (id).
- Título da tarefa
- Tipo da tarefa
- Prioridade da tarefa
- Data de abertura
- Responsável pela tarefa

2.3 - Deverá ter uma paginação onde cada página deverá listar até 10 resultados por página.

2.4 - Na coluna id, da tabela de listagem de tarefas, deverá conter um link que direcione o usuário
para a página de visualização (RF4) deste registro.

2.5 - Quando for inserido um novo registro, deverá ser mostrada uma mensagem de sucesso
informando que a tarefa com o id XXXX foi inserida com sucesso.

2.6 - Na tabela de listagem de tarefas, os registros que estiverem sob a responsabilidade do
usuário logado deverão aparecer com a cor alaranjada.

![image](https://user-images.githubusercontent.com/62308324/233804311-4f7e706b-73b6-430c-8ad7-3631649e7574.png)

RF3 - Tela de cadastro de tarefa
3.1 - O formulário de cadastro de tarefas deverá exibir os campos abaixo, sendo que todos eles
são obrigatórios:
- Título
- Tipo
- Prioridade
- Descrição
3.2 - O campo Prioridade será uma caixa de lista suspensa (combo) com os seguintes valores
disponíveis para seleção:
- Alta
- Média
- Baixa
- Sem prioridade
3.3 - O campo Tipo será uma caixa de lista suspensa (combo) com os seguintes valores
disponíveis para seleção:
- Incidente
- Solicitação de Serviço
- Melhorias
- Projetos

3.4 - O campo Descrição será do tipo Rich Text e poderá conter formatação em HTML.

3.5 - O botão Salvar deverá salvar os dados preenchidos nos campos do formulário sendo que a
data de abertura deve considerar a data atual e o responsável deverá ser o usuário responsável
pelo cadastro do registro.

3.6 - O botão Cancelar deverá retornar o usuário para a página de listagem (RF2) sem fazer
qualquer alteração no banco de dados.

3.7 - Após salvar os registros no banco de dados, o usuário deverá ser redirecionado para a tela
de listagem (RF2) com a mensagem de registro inserido com sucesso.

![image](https://user-images.githubusercontent.com/62308324/233804392-800f99c5-c1a1-4ca2-a4a2-069018935791.png)

- OBS: Optei ao inves de uma pagina inteira, criar uma modal para o cadastro de tarefas.

![image](https://user-images.githubusercontent.com/62308324/233804475-c1b21267-2f27-429f-88fa-40da1ce55cd4.png)

RF4 - Detalhes da tarefa
4.1 - A tela de detalhes deverá conter as seguintes informações referente a tarefa:
- Número da tarefa
- Título da tarefa
- Responsável pela tarefa
- Prioridade da tarefa
- Tipo de tarefa
- Data de criação
- Descrição da tarefa
- Situação da tarefa

4.2 - Deverá haver um botão que permita que outro usuário assuma a tarefa, sendo que somente
o usuário logado poderá assumir a tarefa. O botão não deverá aparecer caso o usuário logado
seja o responsável pela tarefa.

Ao clicar no botão deverá ser alterado o responsável pela tarefa para o id do usuário logado.

4.3 - Deverá haver um botão que permita fechar a tarefa, este botão só estará disponível para o
usuário responsável pela tarefa e enquanto a tarefa estiver concluída.

Ao clicar no botão de finalizar tarefa o mesmo deverá solicitar uma nova providência explicando o
que foi feito na tarefa e logo em seguida o status da tarefa deve ser alterado para Concluída.
4.4 - O campo Descrição deverá estar disponível para Somente Leitura (read only) e deverá
exibir a descrição da tarefa.

4.5 - Nova Observação

4.5.1 - Deverá haver um campo do tipo Rich Text que aceite HTML para que seja digitado
uma nova providência e só estará habilitado para digitação se o usuário logado for o
responsável pela tarefa e a tarefa não esteja concluída.

4.5.2 - Deverá haver um botão de salvar que permita salvar o texto digitado no banco de
dados e só estará habilitado para digitação se o usuário logado for o responsável pela tarefa
e a tarefa não estiver concluída.A observação deverá salvar o usuário cadastrado, a data de cadastro e o texto digitado no
campo observação.

4.5.3 - Deverá ser exibido na tela a lista de observações já cadastradas, ordenadas pela data
de criação, da mais recente para a mais antiga.

![image](https://user-images.githubusercontent.com/62308324/233804689-733a85d7-ad6b-45af-9bc6-ee7f18099dba.png)

-OBS: Será necessario cadastrar as observações manualmente.

![image](https://user-images.githubusercontent.com/62308324/233805114-622b9db0-ef65-4160-a772-2cfaef39edd3.png)



  

