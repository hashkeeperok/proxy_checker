<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\ProxyCheck
 *
 * @property int $id
 * @property string $ip_port ip адрес и порт
 * @property int $type Тип прокси HTTP, SOCKS и тд
 * @property string $location Гео прокси, страна город
 * @property string $level Уровень  прокси anonymous, elite и тд
 * @property bool $is_available Доступность прокси
 * @property int $timeout Время отклика
 * @property string $real_ip Реальный IP адрес
 * @property int $proxy_check_list_id
 * @property-read \App\Models\ProxyCheckList|null $proxy_check_list
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheck newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheck newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheck query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheck whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheck whereIpPort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheck whereIsAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheck whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheck whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheck whereProxyCheckListId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheck whereRealIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheck whereTimeout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProxyCheck whereType($value)
 * @mixin \Eloquent
 */
class ProxyCheck extends Model
{
    protected $guarded = ['id'];

    public const UPDATED_AT = null;

    public function proxy_check_list(): BelongsTo
    {
        return $this->belongsTo(ProxyCheckList::class);
    }
}