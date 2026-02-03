- Instalar o [xampp](https://www.apachefriends.org/pt_br/download.html)
- Instalar o [composer](https://getcomposer.org/download/)
- Instalar o [git](https://www.git-scm.com/downloads)
- git clone https://github.com/GabrielVieira9768/Seminario_Uniasselvi.git
## Instalar composers do projeto
  - php -r "readfile('https://getcomposer.org/installer');" | php
  - php composer.phar update
  - php composer.phar install
  - composer dump-autoload
## Subir Database
  - Acesse o http://localhost/phpmyadmin depois do Apache estar iniciado no xampp
  - Crie o database com nome repositorio_base
  - Depois vá na aba import e coloque o .sql lá
## Acessando
  - Abra o Xampp
  - Aperta start em Apache e em Mysql
  - php -S localhost:8000
  - Acesse o localhost:8000 no seu navegador
