# วิธีการติดตั้ง Laravel Project **miniheart**

## Installing Composer Dependencies For Existing Applications

<br>

> run คำสั่งใน bash

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

> run คำสั่งใน bash

```bash
cp .env.example .env
```

> เข้าไปใน file (.env) ของ project

```
APP_NAME="miniheart"
DB_HOST=mysql
DB_USERNAME=sail
DB_PASSWORD=password
REDIS_HOST=redis
```

> run คำสั่งใน bash

```bash
sail up -d
```

> run คำสั่งใน bash

```bash
sail artisan key:generate
```

> run คำสั่งใน bash

```bash
sail yarn install
```

> run คำสั่งใน bash

```bash
sail artisan storage:link
```

> run คำสั่งใน bash

```bash
sail yarn dev
```

> รัน seeder และสร้าง table ใหม่

```bash
sail artisan migrate:fresh --seed
```

### role ในการใช้งาน

---

> ### Admin
>
> -   username: Admin@gmail.com
> -   password: password

---

> ### user
>
> -   username: user1@gmail.com
> -   password: password

---

> -   username: user2@gmail.com
> -   password: password

---

> -   username: user3@gmail.com
> -   password: password

---

> -   username: user4@gmail.com
> -   password: password

---

> -   username: user5@gmail.com
> -   password: password
