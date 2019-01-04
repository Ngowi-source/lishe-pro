<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'amount', 'currency', 'description', 'reference', 'phone', 'status', 'tracking_id', 'payment_method'
    ];

    protected $table = 'transactions';

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public static function make($first_name, $last_name, $email, $amount, $currency, $desc, $reference, $phonenumber)
    {
        $userExists = User::whereEmail('$email')->first();
        if($userExists)
        {
            $user_id = $userExists->id;
            Transaction::create([
               'user_id' => $user_id,
                'phone' => $phonenumber,
                'amount' => $amount,
                'currency' => $currency,
                'description' => $desc,
                'reference' => $reference
            ]);
        }
        else
        {
            $user = User::create([
                'firstname'=>$first_name,
                'lastname'=>$last_name,
                'email'=>$email,
                'status'=> 0
            ]);

            $user_id = $user->id;
            Transaction::create([
                'user_id' => $user_id,
                'phone' => $phonenumber,
                'amount' => $amount,
                'currency' => $currency,
                'description' => $desc,
                'reference' => $reference
            ]);
        }

    }
}
