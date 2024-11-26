<?php

namespace TomatoPHP\FilamentAccounts\Models;

use Illuminate\Database\Eloquent\Model;
use TomatoPHP\FilamentAccounts\Services\Helpers;

/**
 * @property integer $id
 * @property integer $type_id
 * @property integer $status_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $subject
 * @property string $message
 * @property boolean $active
 * @property string $created_at
 * @property string $updated_at
 * @property Status $status
 * @property Type $type
 * @property ContactsMeta[] $contactsMeta
 */
class Contact extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['type', 'status', 'name', 'email', 'phone', 'subject', 'message', 'active', 'created_at', 'updated_at'];


    protected $casts = [
        'active' => 'boolean',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        $model = config('filament-types.model') ?? \TomatoPHP\FilamentTypes\Models\Type::class;
        return $this->belongsTo($model);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        $model = config('filament-types.model') ?? \TomatoPHP\FilamentTypes\Models\Type::class;
        return $this->belongsTo($model);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactsMeta()
    {
        return $this->hasMany(Helpers::loadContactMetaModelClass());
    }
}
