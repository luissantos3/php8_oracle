# php8_oracle
Container criado para facilitar o aprendizado no desenvolvimento de aplicações, utilizando bancos de dados oracle.

# Configuração de rede do container
Caso o acesso seja a uma rede, por exemplo: 172.20.X.X, execute o seguinte comando, substituindo {gateway} pelo o IP que deverá ser direcionado o fluxo da solicitação:
  sudo ip route add 172.20.1.0/24 via {gateway}

# Pasta da Aplicação
Os arquivos da sua aplicação derão estar dentro da pasta app, que está mapeada para a pasta /var/www/html do container.
