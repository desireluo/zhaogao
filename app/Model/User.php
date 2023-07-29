<?php

declare(strict_types=1);

namespace App\Model;


use Hyperf\Database\Model\SoftDeletes;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $mobile
 * @property string $access_token
 * @property string $refresh_token
 * @property int $gender
 * @property string $department
 * @property int $create_time
 * @property int $update_time
 */
class User extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'create_time';

    const UPDATED_AT = 'update_time';

    /**
     * The table associated with the model.
     */
    protected ?string $table = 'user';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [];
    public bool $timestamps = false;
    protected ?string $dateFormat = 'U';
    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'gender' => 'integer', 'create_time' => 'integer', 'update_time' => 'integer'];

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
