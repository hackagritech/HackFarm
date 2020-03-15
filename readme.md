
  

  

# Hectagro

Protótipo desenvolvido durante o Hackaton Agriteh, com o objetivo de solucionar o 
seguinte problema:

`Falta de qualidade da informações nos processos da lavroura`

## Requisitos:
Para se ter o mesmo ambiente em que foi desenvolvido é necessário fazer a utilização
do ``docker``, porem é possivel apenas alterar as configurações do arquivo ``.env`` de
com as configurações do ambiente local para executar.

`Recomendo a utilização do docker`

## Setup:
É necessário executar todos esses comandos:

Para não utilizar os dados fakes gerados pelo protótipo, dentro do arquivo `.env`
marque como false a variavel `WITH_FAKER`

```bash

git clone https://github.com/hackagritech/HackFarm.git

cd hackfarm

composer install 

sudo chmod 777 storage/ -R 

php artisan storage:link 

cp .env.example .env # Realize aqui as alterações caso não faço o uso do docker

php artisan key:generate

php artisan migrate:fresh --seed

npm install

npm run production

```

Caso esteja sendo realizado a utilização do docker é necessário acessar os conteiners para executar
os próximos comandos
```
    php artisan migrate:fresh --seed
```

## Demo:

- Demostração Online [hectagro.com](http://hectagro.com)

##Senhas para acesso:

**Produtor**
Username: produtor@test.com
Password: 123456

**Gestor**
Username: gestor@test.com
Password: 123456

**Operador**
Username: operador@test.com
Password: 123456


## Packages:

#### Laravel (php):

*  [Laravel Framework](https://github.com/laravel/laravel/) (6.x)
*  [Forms & HTML](https://github.com/laravelcollective/html) : para formulários
*  [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar) : para Debug 

#### JS plugins:

*  ADMINATOR plugins [aqui](https://github.com/puikinsh/Adminator-admin-dashboard#built-with)
*  [sweetalert2](https://github.com/limonte/sweetalert2)
*  [Axios](https://github.com/mzabriskie/axios)
*  [Select2](https://github.com/select2/select2)
