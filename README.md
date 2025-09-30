# Gestor de documentos náuticos - DPSN
## Plataforma de gerenciamento de documentos náuticos da empresa DPSN
### CENTRO PAULA SOUZA  
### FACULDADE DE TECNOLOGIA DE JAHU  
### CURSO DE TECNOLOGIA EM DESENVOLVIMENTO DE SOFTWARE MULTIPLATAFORMA 
### Jau, SP, BR
### Inicio: 2° Semestre / 2025
---
# Documento da aplicação web
### Autores
- Aneliza Nardelli
- João Pedro Pascuci De Russi
- Luis Eduardo Abdo dos Santos
# Sumário
  - [1. Descrição da aplicação web](#1-descrição-da-aplicação-web)
    - [1.1 Introdução](#11-introdução)
    - [1.2 Métodos da pesquisa](#12-método-de-pesquisa)
  - [2. Documento de requisitos](#2-documento-de-requisitos)
    - [2.1. Requisitos funcionais](#21-requisitos-funcionais)
    - [2.2. Requisitos não funcionais](#22-requisitos-não-funcionais)
  - [3. Regras de negócios](#3-regras-de-negócio)
      - [3.1 Figura 1- Modelo de nogócio canvas](#31-figura-1--modelo-de-nogócio-canvas)
      - [3.2 Proposta de valor](#32-proposta-de-valor)
      - [3.3 Parcerias-chaves](#33-parcerias-chaves)
      - [3.4 Recursos-chave](#34-recursos-chave)
      - [3.5 Atividades-chave](#35-atividades-chave)
      - [3.6 Relacionamento com cliente](#36-relacionamento-com-cliente)
      - [3.7 Canais de distribuição](#37-canais-de-distribuição)
      - [3.8 Segmento de clientes](#38-segmento-de-clientes)
      - [3.9 Estrutura de custos](#39-estrutura-de-custos)
      - [3.10 Fonte de receita](#310-fonte-de-receita)
        

## 1. Descrição da aplicação web
## 1.1 Introdução
Esse projeto é uma plataforma web desenvolvida com o objetivo de automatizar o preenchimento de documentos náuticos emitidos por estaleiros parceiros da empresa DPSN. A aplicação visa simplificar e agilizar o processo de emissão e gerenciamento de documentos navais, processo que atualmente na maioria dos casos é feito manualmente. 

A solução proposta é um sistema digital que centraliza e automatiza esse fluxo de trabalho. A plataforma permitirá que o estaleiro insira as informações do cliente e da embarcação de forma padronizada. Com base nesses dados, o sistema irá automaticamente gerar o documento necessário, de acordo com o modelo da embarcação, e convertê-lo para o formato PDF. 

O arquivo PDF gerado ficará disponível para que o tecnólogo naval da empresa possa acessá-lo, aplicar sua assinatura digital de forma segura, e reencaminhá-lo ao estaleiro através da própria plataforma. Isso não apenas elimina a necessidade de múltiplas trocas de e-mail e manipulação manual de arquivos, mas também cria um registro digital de cada documento, facilitando o gerenciamento e a auditoria de todas as embarcações. 

Este sistema, portanto, oferece uma solução robusta para otimizar o processo de documentação náutica, reduzindo o tempo de resposta, minimizando erros e garantindo a conformidade e a segurança dos dados.  
## 1.2 Método de pesquisa 
Ao desenvolver a aplicação web, serão utilizadas diversas ferramentas e tecnologias apresentadas no curso de Desenvolvimento de Software Multiplataforma (DSM), integrando conceitos abordados ao longo das aulas. Algumas dessas ferramentas incluem tecnologias de desenvolvimento front-end e back-end, além de metodologias de engenharia de software. 

As tecnologias usadas no Front-end do projeto incluem HTML, CSS, JavaScript e o framework Bootstrap. O Beck-end do nosso projeto vai usar a linguagem PHP, ferreamentas como o XAMPP está sendo utilizada e o nosso bando de dados feito no MySQL. O protótipo do projeto foi criado no Figma.

## 2. Documento de requisitos
## 2.1 Requisitos Funcionais
### **RF 1 - Cadastrar Administrador**
Possibilitar que um administrador/tecnólogo crie uma conta e gerencie suas aplicações. 
### **RF 2 - Cadastrar Estaleiros**
Possibilitar que o administrador crie uma conta dos estaleiros com que trabalha. Colocando informações como nome, endereço, CEP, CNPJ, email, senha e telefone.  
### **RF 3 - Cadastrar Embarcações**
Permitir que o administrador cadastre as embarcações de cada estaleiro com que trabalha.  
### **RF 4 - Gerencia de dados dos estaleiros**
Possibilitar que o estaleiro troque sua senha e modifique seus dados se necessário.
### **RF 5 - Realizar login e logout**
Todos os administradores e estaleiros podem realizar login e logout do sistema.
### **RF 6 - Emitir dados dos clientes**
Os estaleiros e administradores podem emitir os dados de um cliente para gerar um documento. Dados como nome, endereço, informações sobre a embarcação comprada e data da emissão.
### **RF 7 - Ver sobre as embarcações**
Os estaleiros e administradores podem ver quais embarcações foram cadastradas e ver as informações da cada uma delas.
### **RF 8 - Gerar documento PDF**
O sistema deve gerar um arquivo PDF para cada documento náutico que for criado, e deixar a mostra para o tecnólogo e o estaleiro assiná-lo.
### **RF 9 - Fazer download e upload dos PDFs**
Os usuários podem fazem download dos PDFs para assinar os documentos, após a assinatura eles podem fazer o upload do documento assinado.
### **RF 10 - Limpar os PDFs do banco de dados**
Os PDFs dos documentos serão excluidos automaticamente de 30 em 30 dias, os dados vão estar salvos, apenas o PDF vai ser excluido.
### **RF 11 - Solicitar um documento PDF**
Os estaleiros e administradores podem solicitar documentos antigos, que o PDF não está mais disponível para download, para gerar um novo PDF.

## 2.2 Requisitos Não Funcionais
### **RNF 1 - Usabilidade**
 A aplicação deve ser fácil de entender e usar, com uma interface limpa e formulários diretos, com explicações claras dos indicadores, para que diferentes tipos de usuários possam navegar sem problemas. 
### **RNF 2 - Acessibilidade**
O sistema deve ser acessível para todos os tipos de usuários, incluindo aqueles com necessidades especiais.
### **RNF 3 - Proteção de dados**
Os dados de cada usuário deve ser protegido. Cada usuário acessa os seus respectivos dados.
### **RNF 4 Criptografia de dados sensíveis**
O sistema deve criptografar os dados sensíveis de todos os usuários.

## 3. Regras de negócio
## 3.1 Figura 1- Modelo de nogócio canvas
<div align="center">
    <img alt="Figura 1 - Canvas, modelo de negócios" src="./imgs/Modelo de negocios.png">
</div>

# 3.2 Proposta de valor 
Criar uma aplicação web para facilitar e automatizar o trabalho da empresa DPSN. E criar uma forma de armazenar seus documentos digitalmente, melhorando a organização e o gerenciamento deles.
## 3.3 Parcerias-chaves
- Empresa DPSN
- Faculdade de Tecnologia de Jahu (Fatec Jahu)
## 3.4 Recursos-chave
- Ferramentas de desenvolvimento
- Documentação
- Organização da equipe
## 3.5 Atividades-chave
- Preencher automaticamente os documentos náuticos
- Desenvolvimento e manutenção da aplicação
## 3.6 Relacionamento com cliente
- Feedback da empresa 
- Contato com a empresa
## 3.7 Canais de distribuição
- O uso da aplicação pela empresa
- Uso da aplicação pelos estaleiros parceiros da empresa
## 3.8 Segmento de clientes
- Tecnólogos 
- Estaleiros parceiros da DPSN
- Clientes dos estaleiros 
- Empresas do ramo naval
## 3.9 Estrutura de custos
- Manutenção da aplicação
- Hospedagem 
- Suporte
## 3.10 Fonte de receita
- investimentos da própria empresa DPSN










