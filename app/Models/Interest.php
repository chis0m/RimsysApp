<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Interest
 *
 * @method static Builder|Interest newModelQuery()
 * @method static Builder|Interest newQuery()
 * @method static Builder|Interest query()
 * @mixin Eloquent
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Interest whereCreatedAt($value)
 * @method static Builder|Interest whereDescription($value)
 * @method static Builder|Interest whereId($value)
 * @method static Builder|Interest whereName($value)
 * @method static Builder|Interest whereUpdatedAt($value)
 * @property string $reference
 * @method static Builder|Interest whereReference($value)
 * @property Carbon|null $deleted_at
 * @method static \Database\Factories\InterestFactory factory(...$parameters)
 * @method static \Illuminate\Database\Query\Builder|Interest onlyTrashed()
 * @method static Builder|Interest whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Interest withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Interest withoutTrashed()
 */
class Interest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
}
