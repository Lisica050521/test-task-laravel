# Тестовое задание — Синхронизация данных из API

## 🛠️ Как запустить:
1. `composer install`
2. `Настроить `.env`
3. `php artisan migrate`
4. `php artisan sync:api-data`

## 📂 Структура БД:
- Таблица `sales` — продажи
- Таблица `orders` — заказы
- Таблица `stocks` — склады
- Таблица `incomes` — доходы

## 🔐 Доступ к базе данных (для проверки):
Добавлены данные бд в readme, так как бот не принимает текстовые сообщения с ключами из .env, а принимает только ссылки на гитхаб

DB_CONNECTION=mysql
DB_HOST=bstr1kgovwicqg3gsxot-mysql.services.clever-cloud.com
DB_PORT=3306
DB_DATABASE=bstr1kgovwicqg3gsxot
DB_USERNAME=uij3ikdbbrra98hf
DB_PASSWORD=VGp4DJcEWMoEJ6nQTrjA

API_KEY=E6kUTYrYwZq2tN4QEtyzsbEBk3ie
API_BASE_URL=http://109.73.206.144:6969

 🔑 НАСТРОЙКИ ВНЕШНЕГО API (данные из бота в Telegram)
Получите эти данные у бота в Telegram — он выдаст вам:
- API_KEY — секретный ключ для доступа к API
- API_BASE_URL — адрес сервера, куда отправляются запросы

## 📦 Таблицы:
- `sales`
- `orders`
- `stocks`
- `incomes`
