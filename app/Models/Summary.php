<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Summary
 *
 * @method static Builder|Summary newModelQuery()
 * @method static Builder|Summary newQuery()
 * @method static Builder|Summary query()
 * @mixin Eloquent
 * @property int $id
 * @property string $body
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Summary whereBody($value)
 * @method static Builder|Summary whereCreatedAt($value)
 * @method static Builder|Summary whereId($value)
 * @method static Builder|Summary whereUpdatedAt($value)
 * @property string $reference
 * @method static Builder|Summary whereReference($value)
 * @property Carbon|null $deleted_at
 * @method static \Database\Factories\SummaryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Query\Builder|Summary onlyTrashed()
 * @method static Builder|Summary whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Summary withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Summary withoutTrashed()
 */
class Summary extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
}
