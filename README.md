# Digital Signage - Módulo de Gerenciamento e Envio de Playlists
Este repositório contém a camada de gerenciamento web de um sistema de Sinalização Digital (Digital Signage). A aplicação permite que administradores controlem terminais de exibição de mídias (players baseados em hardware como Raspberry Pi), organizem dispositivos em grupos e gerenciem o ciclo de vida de listas de reprodução (playlists).
 
O ecossistema é composto por um back-end robusto em PHP estruturado com padrões de persistência de dados (DAO/PDO) e uma interface dinâmica e responsiva construída em JavaScript.
## Funcionalidades PrincipaisAutenticação Centralizada: 
Sistema de login seguro para administradores do painel (sessão fechada).Gerenciamento de Terminais (Players): Cadastro, edição e vinculação de dispositivos utilizando identificadores únicos de hardware.Organização por Grupos: Agrupamento lógico de $0$ a $n$ dispositivos para replicação em massa de configurações e mídias.Upload e Controle de Mídias: Upload simplificado de arquivos de mídia (imagens, vídeos e textos) estruturados em playlists.Monitoramento de Status (Ping Test): Painel interativo para verificar a latência e o tempo de resposta desde a última comunicação síncrona dos terminais cliente.

## Tecnologias UtilizadasO projeto

Foi construído utilizando um ecossistema nativo e otimizado, evitando sobrecarga de frameworks pesados:Back-end: PHP (Padrão DAO - Data Access Object, Conexões seguras via PDO)Banco de Dados: MySQLFront-end: HTML5, CSS3, JavaScript (Vanilla ES6)Infraestrutura/Ambiente: Docker (opcional/configurável para conteinerização do banco e servidor web)
