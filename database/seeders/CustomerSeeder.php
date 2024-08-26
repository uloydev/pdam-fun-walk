<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // open csv file
        $file = fopen(database_path('seeders/data-pelanggan-clean.csv'), 'r');

        // skip the header
        fgetcsv($file);

        // read the file
        $chunksize = 25;
        while (!feof($file)) {
            $chunkdata = [];

            for ($i = 0; $i < $chunksize; $i++) {
                $data = fgetcsv($file);
                if ($data === false) {
                    break;
                }
                $chunkdata[] = $data;
            }

            $this->processData($chunkdata);
        }
        fclose($file);
    }

    private function processData(array $data): void
    {
        foreach ($data as $row) {
            $customer = new Customer();
            $customer->customer_code = $row[0];
            $customer->name = $row[1];
            $customer->is_active = $row[2];
            $customer->save();
        }
    }
}
