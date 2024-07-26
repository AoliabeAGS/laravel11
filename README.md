


### Passo a passo
Clone Repositório
```sh
git clone -b 
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Crie o Arquivo .env OBS: como é um teste, isso funciona. Mas em um mundo ideal o .env não funcionará pois carrega infos sensiveis.
```sh
cp .env.example .env
```

Acesse o container app
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```



Rodar as migrations
```sh
php artisan migrate
```
Rodar yarn ou npm install (Maquina precisa conter o node, pois optei por nao colocar no conteiner. Por otimização)

```sh
yarn ou npm install

```


Acesse o projeto
[http://localhost:8000/orders](http://localhost:8000/orders)
