# PHPMVC

## Dependencias
* PHP 5.3+
* Apache com mod_rewrite

## Instalação
git clone http://github.com/douglaszporto/phpmvc.git MyProjectName

## Documentação

Por hora, a documentação está neste readme.md, porém, criarei uma página com uma documentação mais eficaz A.S.A.P

###URLs

O .htaccess verifica se a requisição começa com '/statics/', '/docs/' ou se é uma requisição para 'sitemap.xml'. Caso afirmativo, a requisição é processada normalmente.
Caso não atenda à verificação anterior, ele redireciona a requisição para o arquivo urls.php, na raiz do projeto.
O arquivo urls.php receberá este valor através do índice "url" da variável $_GET

No arquivo *urls.php*, definimos qual controller será responsável por qual requisição.
Devemos definir um método da classe Controller para renderizar a View quando uma determinada requisição for recebida.

Vamos supor que, ao acessar a url http://localhost/articles/2014/10, queremos ver uma listagem dos artigos escritos em Outubro de 2014.
Primeiramente, definimos esta URL no *urls.php*, como segue:
`$url->url('^/articles/(\d{4})/(\d{1,2})$','Artigos.Listagem');`

Acima, chamamos o método url, do objeto $url, passando dois parâmetros. 
O primeiro parâmetro é uma expressão regular para a url adicionada. Definimos que a nossa expressão regular deverá começar com  a string '/articles/', sucedido por um número de 4 dígitos(\d{4}), uma barra ('/'), um número de 1 até 2 dígitos (\d{1,2}) e nada além ($). Note os agrupadores na expressão regular. Eles serão passados como parâmetro para o Controller.

O segundo parâmetro indica qual a Classe de Controller e qual o método desta classe que será responsável por responder à requisição. Esta string segue sempre a estrutura de 'Classe.Método'. A classe definida deve estar na pasta Controllers e o arquivo deve possuir o mesmo nome da classe.

Portanto, para seguir com o nosso exemplo, poderíamos criar um controller chamado Artigos (nome da classe: Artigos, nome do arquivo: Artigos.php), e declarar um método chamado Listagem.
Este método deve receber 2 parâmetros (lembra dos agrupadores da expressão regular? Aqui eles entram na jogada).
Para cada agrupador definido, um novo parâmetro será fornecido na chamada do método.
Por exemplo, se a URL definida na expressão regular fosse '^/a/([^/])/([^/])/([^/])/([^/])$', teríamos 4 parâmetros no método responsável pela resposta desta requisição.

Este método deve chamar o método estático [[View::render]]



