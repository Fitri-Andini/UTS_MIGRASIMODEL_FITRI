<php artisan make:migration create_users_table
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
    });
}

<php artisan migrate;{

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // Hubungkan model dengan tabel
    protected $table = 'users';

    // Attribut yang dapat diisi massal
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // Attribut yang disembunyikan
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relasi dengan model lain, misalnya:
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}