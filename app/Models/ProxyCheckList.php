<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\ProxyCheckList
 *
 * @property int $id
 * @property string|null $check_time
 * @property int $count
 * @property int $available_count
 * @property array $proxy_list
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProxyCheck> $proxy_checks
 * @property-read int|null $proxy_checks_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheckList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheckList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheckList query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheckList whereAvailableCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheckList whereCheckTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheckList whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheckList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheckList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheckList whereProxyList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheckList whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProxyCheckList extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'proxy_list' => 'array',
    ];

    public function proxy_checks(): HasMany
    {
        return $this->hasMany(ProxyCheck::class);
    }
}