<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SyncApiData extends Command
{
    protected $signature = 'sync:api-data';

    protected $description = 'Синхронизирует данные из внешнего API в локальную БД';

    public function handle()
    {
        $apiKey = env('API_KEY');
        $baseUrl = env('API_BASE_URL');
        $dateFrom = '2025-04-01';
        $dateTo = '2025-04-30';
        $today = date('Y-m-d');

        $endpoints = [
            [
                'name' => 'Продажи',
                'url' => '/api/sales',
                'table' => 'sales',
                'params' => compact('dateFrom', 'dateTo'),
            ],
            [
                'name' => 'Заказы',
                'url' => '/api/orders',
                'table' => 'orders',
                'params' => compact('dateFrom', 'dateTo'),
            ],
            [
                'name' => 'Склады',
                'url' => '/api/stocks',
                'table' => 'stocks',
                'params' => ['dateFrom' => $today],
            ],
            [
                'name' => 'Доходы',
                'url' => '/api/incomes',
                'table' => 'incomes',
                'params' => compact('dateFrom', 'dateTo'),
            ],
        ];

        foreach ($endpoints as $endpoint) {
            $this->info("Начинаем выгрузку: {$endpoint['name']}");

            $page = 1;
            $hasMorePages = true;

            while ($hasMorePages) {
                $params = array_merge(
                    $endpoint['params'],
                    [
                        'page' => $page,
                        'limit' => 500,
                        'key' => $apiKey,
                    ]
                );

                $response = Http::get($baseUrl . $endpoint['url'], $params);

                if ($response->failed()) {
                    $this->error("Ошибка при запросе {$endpoint['name']} на странице {$page}: " . $response->status());
                    Log::error("API Error: " . $response->body());
                    break;
                }

                $data = $response->json();

                $records = $data['data'] ?? [];

                if (!empty($records)) {
                    foreach ($records as $record) {
                        DB::table($endpoint['table'])->insert([
                            'raw_data' => json_encode($record),
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }

                    $this->info("Страница {$page}: сохранено " . count($records) . " записей.");
                } else {
                    $this->info("Страница {$page}: данных нет.");
                }

                $currentPage = $data['current_page'] ?? $page;
                $lastPage = $data['last_page'] ?? $page;

                if ($currentPage < $lastPage) {
                    $page++;
                } else {
                    $hasMorePages = false;
                    $this->info("Выгрузка {$endpoint['name']} завершена. Всего страниц: {$lastPage}");
                }

                sleep(1);
            }
        }

        $this->info("✅ ВСЕ ДАННЫЕ УСПЕШНО ЗАГРУЖЕНЫ В БАЗУ!");
    }
}
