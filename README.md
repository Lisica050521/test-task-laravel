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

- **Хост:** clever-cloud.com
- **Порт:** 3306
- **Имя БД:** your_db_name
- **Пользователь:** your_user
- **Пароль:** your_password

 🔑 НАСТРОЙКИ ВНЕШНЕГО API (данные из бота в Telegram)
Получите эти данные у бота в Telegram — он выдаст вам:
- API_KEY — секретный ключ для доступа к API
- API_BASE_URL — адрес сервера, куда отправляются запросы

## 📦 Таблицы:
- `sales`
- `orders`
- `stocks`
- `incomes`
