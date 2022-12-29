<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Office;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Zeyad',
            'email' => 'zeyadashraf217@gmail.com',
            'phonenumber' => '01026526755',
            'password' => Hash::make('leoleoleo'),
            'type' => 'admin'
        ]);


        Office::create(['city'=>'Alexandria','country'=>'3safra']);
        Office::create(['city'=>'Cairo','country'=>'Egypt']);

        $car = car::create([
            'car_brand' => 'bmw',
            'car_model' => 'model-1',
            'year' => '2011',
            'price' => '100',
            'office_id' => '1',
            'plate_id' => '123',
            'color' => 'blue',
        ]);
            $car
            ->addMedia(storage_path('images\bmw1.png'))
            ->preservingOriginal()
            ->toMediaCollection();

            $car = car::create([
                'car_brand' => 'bmw',
                'car_model' => 'model-1',
                'year' => '2011',
                'price' => '100',
                'office_id' => '1',
                'plate_id' => '1234',
                'color' => 'black',
            ]);
                $car
                ->addMedia(storage_path('images\bmw2.png'))
                ->preservingOriginal()
                ->toMediaCollection();

                $car = car::create([
                    'car_brand' => 'bmw',
                    'car_model' => 'model-x',
                    'year' => '2020',
                    'price' => '600',
                    'office_id' => '1',
                    'plate_id' => '123a',
                    'color' => 'red',
                ]);
                    $car
                    ->addMedia(storage_path('images\bmw3.png'))
                    ->preservingOriginal()
                    ->toMediaCollection();

                    $car = car::create([
                        'car_brand' => 'bmw',
                        'car_model' => 'model-3',
                        'year' => '2018',
                        'price' => '400',
                        'office_id' => '1',
                        'plate_id' => '1234a',
                        'color' => 'white',
                    ]);
                        $car
                        ->addMedia(storage_path('images\bmw4.png'))
                        ->preservingOriginal()
                        ->toMediaCollection();

                        $car = car::create([
                            'car_brand' => 'bmw',
                            'car_model' => 'model-2',
                            'year' => '2016',
                            'price' => '350',
                            'office_id' => '1',
                            'plate_id' => '123ab',
                            'color' => 'grey',
                        ]);
                            $car
                            ->addMedia(storage_path('images/bmw5.png'))
                            ->preservingOriginal()
                            ->toMediaCollection();

                            $car = car::create([
                                'car_brand' => 'chevorlet',
                                'car_model' => 'x-3',
                                'year' => '2018',
                                'price' => '450',
                                'office_id' => '1',
                                'plate_id' => '123abc',
                                'color' => 'yellow',
                            ]);
                                $car
                                ->addMedia(storage_path('images/chevrolet.png'))
                                ->preservingOriginal()
                                ->toMediaCollection();

                                $car = car::create([
                                    'car_brand' => 'tesla',
                                    'car_model' => 's',
                                    'year' => '2019',
                                    'price' => '250',
                                    'office_id' => '1',
                                    'plate_id' => '123abcd',
                                    'color' => 'white',
                                ]);
                                    $car
                                    ->addMedia(storage_path('images/tesla.png'))
                                    ->preservingOriginal()
                                    ->toMediaCollection();

                                    $car = car::create([
                                        'car_brand' => 'audi',
                                        'car_model' => 'i8',
                                        'year' => '2020',
                                        'price' => '450',
                                        'office_id' => '1',
                                        'plate_id' => '123abcde',
                                        'color' => 'black',
                                    ]);
                                        $car
                                        ->addMedia(storage_path('images/audi.png'))
                                        ->preservingOriginal()
                                        ->toMediaCollection();

                                        $car = car::create([
                                            'car_brand' => 'audi',
                                            'car_model' => 'i8',
                                            'year' => '2020',
                                            'price' => '450',
                                            'office_id' => '2',
                                            'plate_id' => '123abcdef',
                                            'color' => 'black',
                                        ]);
                                            $car
                                            ->addMedia(storage_path('images/audi.png'))
                                            ->preservingOriginal()
                                            ->toMediaCollection();



    }
}
