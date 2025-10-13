<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vendor extends Model
{
    protected $fillable = [
        'user_id', 'shop_name', 'authorized_person', 'pan_number', 'shop_photo_url', 'address', 'latitude', 'longitude', 'market_area', 'locality', 'pin_code', 'district', 'city', 'state', 'office_code', 'delivery_radius_km', 'handling_charge_enabled', 'handling_charge', 'delivery_charge_enabled', 'delivery_charge', 'subscription_valid_to', 'is_active', 'deleted_at',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function catalogues(): HasMany
    {
        return $this->hasMany(VendorCatalogue::class);
    }

    /**
     * @return HasMany
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
