<?php

namespace App\Imports;

use App\Enums\RoleEnum;
use App\Models\Country;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithChunkReading, ShouldQueue, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

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
        return 10;
    }

    public function rules(): array
    {
        return [
            '*.name' => 'required',
            '*.surname' => 'required',
            '*.email' => 'required|email|unique:users,email',
            '*.dob' => 'required|date',
            '*.country' => 'required|not_in:USA,UK',
            '*.city' => 'required',
        ];
    }
}
