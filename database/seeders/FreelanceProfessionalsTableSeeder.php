<?php

namespace Database\Seeders;

use ReflectionClass;
use App\Enums\Profession;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FreelanceProfessionalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');
        $professions = $this->getProfessions();

        for ($i = 0; $i < 5000; $i++) {
            $profession = $faker->randomElement($professions);
            $vipStatus = $faker->randomElement([true, false]);
            $servicePrice = $faker->randomFloat(2, 50, 500);
            $chargesBy = $faker->randomElement(['hourly', 'daily', 'project']);
            $phone = $faker->unique()->phoneNumber();
            $email = $faker->unique()->email;
            $cpf = $cpf = $faker->numerify('###########');
            $address = [
                'streetName' => $faker->streetName,
                'buildingNumber' => $faker->buildingNumber,
                'secondaryAddress' => $faker->secondaryAddress,
                'postcode' => $faker->postcode,
            ];
            $city = $faker->randomNumber(1, 5610);
            $state = $faker->randomNumber(1, 28);
            $country = $faker->randomNumber(1, 254);

            DB::table('freelance_professionals')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'vip' => $vipStatus,
                'profession' => $profession,
                'service_price' => $servicePrice,
                'charges_by' => $chargesBy,
                'phone' => $phone,
                'email' => $email,
                'cpf' => $cpf,
                'street' => $address['streetName'],
                'number' => $address['buildingNumber'],
                'reference_point' => $address['secondaryAddress'],
                'zip_code' => $address['postcode'],
                'city' => $city,
                'state' => $state,
                'country' => $country,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Get the list of professions dynamically from the Profession enum.
     *
     * @return array
     */
    protected function getProfessions(): array
    {
        $reflectionClass = new ReflectionClass(Profession::class);
        return $reflectionClass->getConstants();
    }
}
