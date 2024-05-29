<?php

namespace App\Imports;

use App\Enums\RoleEnum;
use App\Models\Country;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StoreUsersImport implements ToModel, WithChunkReading, ShouldQueue, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'surname' => $row['surname'],
            'email' => $row['email'],
            'password' => Hash::make('12345678'),
            'dob' => $row['dob'],
            'role_id' => RoleEnum::MEMBER,
            'country_id' => Country::where('name', $row['country'])->first()->id,
            'city' => $row['city']
        ]);
    }
    public function chunkSize(): int
    {
       return 20;
    }


}
