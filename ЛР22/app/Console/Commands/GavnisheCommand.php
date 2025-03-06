<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Spatie\SimpleExcel\SimpleExcelReader;
use Spatie\SimpleExcel\SimpleExcelWriter;

class GavnisheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:gavnishe-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $time = 0;
        SimpleExcelReader::create(Storage::path('zbx.csv'))->getRows()->each(function (array $row) use (&$time) {
            $array = array_reverse(array_values(array_filter(array_map('trim', preg_split('/[а-яА-Я]+/u', $row['Длительность'])))));

            foreach ($array as $key => $value) {
                $time += $value * 60 ** $key;
            }
        });
        dd($time);
    }
}
