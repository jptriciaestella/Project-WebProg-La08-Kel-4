IndoForum

2440003695 Tricia Estella
2401962402 Lawysen
2440016905 Mario
2440063460 Muhammad Zaky Hakim Akmal
2401954893 Gilbert Nathaniel 

DARI GITHUB file .env hilang, buat .env baru dari .env.example (copas aja)

> Buat database 'indoforum'
> Pindahkan images pada root folder ke dalam storage>app>public untuk hasil seed yang maksimal

di terminal:
> composer update
> php artisan key:generate
> php artisan migrate:fresh --seed
> php artisan storage:link