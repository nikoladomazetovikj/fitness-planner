<?php

namespace App\Imports;

use App\Enums\RoleEnum;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToArray, WithHeadingRow
{
    use Importable;

    public $data = [];
    public $errors = [];

    public function chunkSize(): int
    {
        return 10;
    }

    public function array(array $rows)
    {
        foreach ($rows as $index => $row) {
            $validator = Validator::make($row, [
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required|email|unique:users,email',
                'dob' => 'required|date',
                'country' => 'required|not_in:USA,UK',
                'city' => 'required',
            ], [
                'email.unique' => 'The email has already been taken.',
                'country.not_in' => 'The country is not allowed.',
            ]);

            $this->data[$index] = [
                'name' => $row['name'] ?? null,
                'surname' => $row['surname'] ?? null,
                'email' => $row['email'] ?? null,
                'dob' => $row['dob'] ?? null,
                'country' => $row['country'] ?? null,
                'city' => $row['city'] ?? null
            ];

            if ($validator->fails()) {
                $this->errors[$index] = $validator->errors()->messages();
            }
        }
    }
}
