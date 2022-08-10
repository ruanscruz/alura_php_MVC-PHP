# O que aprendemos?
## 01.Uma entrada para as requisições
* É uma boa prática ter uma entrada única na aplicação web;
* Se na URL não foi especificado um arquivo, o servidor PHP automaticamente chamará o arquivo `index.php`;
* Se uma rota/URL não foi encontrada devemos devolver o status HTTP 404;
* Também é boa prática usar URLs amigáveis (mais legíveis);
* PHP possui uma variável "super global" chamada `$_SERVER` que tem vários informações úteis sobre a requisição;
* Através dela podemos obter a URL: `$_SERVER['PATH_INFO']`;
* Podemos usar o comando `switch`, `case`, `default` para tomar decisões no código.