# O que aprendemos?
## 01.Uma entrada para as requisições
* É uma boa prática ter uma entrada única na aplicação web;
* Se na URL não foi especificado um arquivo, o servidor PHP automaticamente chamará o arquivo `index.php`;
* Se uma rota/URL não foi encontrada devemos devolver o status HTTP 404;
* Também é boa prática usar URLs amigáveis (mais legíveis);
* PHP possui uma variável "super global" chamada `$_SERVER` que tem vários informações úteis sobre a requisição;
* Através dela podemos obter a URL: `$_SERVER['PATH_INFO']`;
* Podemos usar o comando `switch`, `case`, `default` para tomar decisões no código.

## 02. Entendendo o _Model View Controller(MVC)_
* Conhecemos o padrão arquitetural MVC;
* MVC define 3 camadas:
  * Modelo: Classes com a lógica de negócio e persistência;
  * View: Arquivos com o código HTML;
  * Controller: Classes que ligam o Model e View;
* Vimos também que existe um FrontController (também chamado de Dispatcher);
* Ele representa a entrada da aplicação e recebe todas as requisições
* Ele decide qual controller específico a usar;
* ![img.png](img.png)
* O padrão MVC não nasceu especificamente para a web;
* O padrão sofreu algumas adaptações para funcionar e atender as aplicações web;
* Por isso também é chamado de MVC Web, MVC Tipo 2 ou MVC Action Based.

## 03. HTTP, Formulários e Validação
* Para ler os dados enviados da requisição existem variáveis "super globais" como `$_REQUEST`, `$_POST` e `$_GET`;
* Para validar e limpar os dados da requisição podemos usar a função `filter_input`;
* Existem diversos **filters** já prontos;
* Também existe a função `filter_var' para aplicar filtros em qualquer variável;
* Mais filtros no link: [https://www.php.net/manual/pt_BR/book.filter.php]();
* Vimos como trabalhar com cabeçalhos no mundo PHP;
* Podemos usar a função genérica 'header' mas também específicos como `http_response_code`;
* Vimos como funciona o redirecionamento, isto é, chamar automaticamente uma nova URL pelo navegador;
* Para tal o servidor precisa devolver o cabeçalho Location para o navegador usando a função `header`.

## 04.Completando o cadastro
* A função `isset(..)` para testar se uma variável existe;
* A função `extract(..)` que recebe um array associativo e define variáveis para cada chave;
* Podemos ativar a buffer de saída do buffer com o `ob_start()`;
* O método `ob_get_contents()` devolve conteúdo do buffer;
* O método `ob_clean()` limpa o buffer;
* O método `ob_get_clean` devolve conteúdo e limpa o buffer;
* Gerar proxy doctrine `php vendor/bin/doctrine orm:generate-proxies`.

## 05.Autenticando usuários
* Como gerar uma senha segura usando o algoritmo **ARGON2I**;
* Usar no código PHP a função `password_verify($senhaPura, $senhaHash)`;
* Como inserir dados com Doctrine através de SQL;
* Como validar um email usando a função `filter_input` (`FILTER_VALIDATE_EMAIL`).

## 06.Trabalhando com Sessão
* Por padrão o servidor não guarda informações ou dados entre requisições;
* Isto é principalmente por causa do protocolo HTTP que é _stateless_ (sem manter estado);
* Para armazenar dados entre requisições precisamos usar uma `SESSION` (sessão);
* Uma session tem um ID (`PHPSESSID`) associado que fica salvo dentro de um arquivo de texto chamado Cookie;
* O Cookie por sua vez fica salvo no navegador;
* O navegador automaticamente envia o cookie em cada requisição;
* Uma sessão precisa ser inicializada explicitamente no PHP pelo comando `session_start()`;
* `session_start()` precisa ser chamada antes de qualquer saída.

## 07.PSRs e Boas Práticas
* Existem vários padrões definidos através de PSRs (_PHP Standard Recommendations_);
* A organização **PHP-FIG** (_Framework Interoperability Group_) sugere e mantém a especificação destes padrões;
  * Site do PHP-FIG é https://www.php-fig.org/
* Seguindo as PSRs aumentamos a compatibilidade do nosso código entre frameworks e bibliotecas;
  * Vimos as seguinte PSRs:
  * PSR-4: _Autoloading_
  * PSR-7: _HTTP message interfaces_
  * PSR-11: _Container interface_
  * PSR-15: _HTTP Server Request Handlers_