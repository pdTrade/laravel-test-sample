<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\MinorCannotBuyAlcoholicBeverageException;

class Beverage extends Model
{
    use HasFactory;

    public function buy()
    {
        if (auth()->user()->isMinor()) {
            throw new MinorCannotBuyAlcoholicBeverageException();
        }

        return true;
    }
}
