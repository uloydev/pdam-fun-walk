<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@mail.com',
        //     'password' => bcrypt('passwordnya'),
        // ]);

        // $prizes = [
        //     [
        //         'name' => 'Paket Umroh',
        //         'amount' => 1,
        //         'is_prime' => true,
        //     ],
        //     [
        //         'name' => 'Sepeda Motor',
        //         'amount' => 1,
        //         'is_prime' => true,
        //     ],
        //     [
        //         'name' => 'Smart TV 43"',
        //         'amount' => 2,
        //         'is_prime' => true,
        //     ],
        //     [
        //         'name' => 'Sepeda Listrik',
        //         'amount' => 2,
        //         'is_prime' => true,
        //     ],
        //     [
        //         'name' => 'Handphone',
        //         'amount' => 4,
        //         'is_prime' => false,
        //     ],
        //     [
        //         'name' => 'Smart Watch',
        //         'amount' => 10,
        //         'is_prime' => false,
        //     ],
        //     [
        //         'name' => 'Power Bank',
        //         'amount' => 20,
        //         'is_prime' => false,
        //     ],
        //     [
        //         'name' => 'TWS Headset',
        //         'amount' => 20,
        //         'is_prime' => false,
        //     ],
        //     [
        //         'name' => 'Mini Hand Fan',
        //         'amount' => 20,
        //         'is_prime' => false,
        //     ],
        //     [
        //         'name' => 'Speaker Wireless',
        //         'amount' => 20,
        //         'is_prime' => false,
        //     ],
        //     [
        //         'name' => 'Tumbler Stainless',
        //         'amount' => 50,
        //         'is_prime' => false,
        //     ]
        // ];

        // foreach ($prizes as $prize) {
        //     \App\Models\Prize::create($prize);
        // }

        // $this->run([
        //     CustomerSeeder::class
        // ]);

        $topCusts = [
            ["customer_code"=> "01010840", "name"=>"DRS. SUNARTO"],
            ["customer_code"=> "01036843", "name"=>"TJOKRO SUPRIANTO"],
            ["customer_code"=> "02004021", "name"=>"ALI AZAR UMAR.SE.AK"],
            ["customer_code"=> "02006626", "name"=>"DRS. DADANG AS."],
            ["customer_code"=> "02007734", "name"=>"ETTY KURNIAWATI"],
            ["customer_code"=> "02024330", "name"=>"E  K  O  . S"],
            ["customer_code"=> "02029829", "name"=>"SYAIFULLAH"],
            ["customer_code"=> "02037241", "name"=>"PT.GUNA BANGSA PERKASA"],
            ["customer_code"=> "02048842", "name"=>"IGA ERNA DWI.S"],
            ["customer_code"=> "02053813", "name"=>"CAECILIA SUDILAH"],
            ["customer_code"=> "03007333", "name"=>"SISWANTO"],
            ["customer_code"=> "03018132", "name"=>"SUKARDI."],
            ["customer_code"=> "03028924", "name"=>"PARLIN SINAGA."],
            ["customer_code"=> "03043327", "name"=>"ASEP AHMAD SAEFUDIN"],
            ["customer_code"=> "03083701", "name"=>"TIEN MARTINI"],
            ["customer_code"=> "04005815", "name"=>"RITA ROSIDA"],
            ["customer_code"=> "04008534", "name"=>"SUWARDIYANTO"],
            ["customer_code"=> "04010223", "name"=>"KOESTINA DJAILANI."],
            ["customer_code"=> "04010841", "name"=>"ABD.SHOMAD"],
            ["customer_code"=> "04052344", "name"=>"MOETIARI"],
            ["customer_code"=> "04177845", "name"=>"HANI MULADI PUTRA"],
        ];

        foreach ($topCusts as $topCust) {
            \App\Models\TopCustomer::create($topCust);
        }
    }
}
