# php8_oracle
Container criado para facilitar o aprendizado no desenvolvimento de aplicações, utilizando bancos de dados oracle.

# Configuração inicial
  1 - Acesse o site da Oracle e baixe os seguintes arquivos:

    instantclient-basic-linux.x64-19.19.0.0.0dbru.el9.zip
    instantclient-sdk-linux.x64-19.19.0.0.0dbru.el9.zip
    instantclient-sdk-linux.x64-19.19.0.0.0dbru.el9.zip

  2 - Coloque os arquivos na pasta "oracle" do projeto. (Obs: Tentando facilitar, apenas o arquivo "instantclient-basic-linux.x64-19.19.0.0.0dbru.el9.zip" não foi adicionado ao projeto devido ao seu tamanho);

  3 - Altere o nome do arquivo "env_copia" para ".env";
  
  4 - No prompt de comando, entre na pasta do projeto e execute o seguinte comando:
            
    docker-compose up

# Configuração de rede do container

  Caso o acesso seja a uma rede, por exemplo: 172.20.X.X, execute o seguinte comando, substituindo {gateway} pelo o IP que deverá ser direcionado o fluxo da solicitação:
  
    sudo ip route add 172.20.1.0/24 via {gateway}

# Pasta da Aplicação

  Os arquivos da sua aplicação derão estar dentro da pasta app, que está mapeada para a pasta /var/www/html do container.
