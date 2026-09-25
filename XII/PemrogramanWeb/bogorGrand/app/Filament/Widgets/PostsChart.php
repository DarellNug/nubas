<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\ChartWidget;

class PostsChart extends ChartWidget
{
    protected ?string $heading = 'Grafik Jumlah Data Posts (Kamar)';

    protected static ?int $sort = -1;

    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        // Hitung jumlah data posts per bulan pada tahun berjalan (Januari - Desember)
        $posts = Post::select('created_at')->get();
        $counts = array_fill(0, 12, 0);

        foreach ($posts as $post) {
            if ($post->created_at) {
                $monthIndex = (int) $post->created_at->format('n') - 1; // 0 - 11
                if ($monthIndex >= 0 && $monthIndex < 12) {
                    $counts[$monthIndex]++;
                }
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Postingan Kamar (Posts)',
                    'data' => array_values($counts),
                    'backgroundColor' => 'rgba(217, 119, 6, 0.75)',
                    'borderColor' => '#d97706',
                    'borderWidth' => 1,
                    'borderRadius' => 6,
                ],
            ],
            'labels' => [
                'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
