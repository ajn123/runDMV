<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends RunningModel
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'location',
    ];

    protected $casts = [
        'day_of_week' => 'array'
    ];

    /**
     * ADD THE FOLLOWING METHODS TO YOUR Club MODEL
     *
     * The 'latitude' and 'longitude' attributes should exist as fields in your table schema,
     * holding standard decimal latitude and longitude coordinates.
     *
     * The 'location' attribute should NOT exist in your table schema, rather it is a computed attribute,
     * which you will use as the field name for your Filament Google Maps form fields and table columns.
     *
     * You may of course strip all comments, if you don't feel verbose.
     */

    /**
     * Returns the 'latitude' and 'longitude' attributes as the computed 'location' attribute,
     * as a standard Google Maps style Point array with 'lat' and 'lng' attributes.
     *
     * Used by the Filament Google Maps package.
     *
     * Requires the 'location' attribute be included in this model's $fillable array.
     *
     * @return array
     */

    public function getLocationAttribute(): array
    {
        return [
            "lat" => (float)$this->latitude,
            "lng" => (float)$this->longitude,
        ];
    }

    /**
     * Takes a Google style Point array of 'lat' and 'lng' values and assigns them to the
     * 'latitude' and 'longitude' attributes on this model.
     *
     * Used by the Filament Google Maps package.
     *
     * Requires the 'location' attribute be included in this model's $fillable array.
     *
     * @param ?array $location
     * @return void
     */
    public function setLocationAttribute(?array $location): void
    {
        if (is_array($location))
        {
            $this->attributes['latitude'] = $location['lat'];
            $this->attributes['longitude'] = $location['lng'];
            unset($this->attributes['location']);
        }
    }

    /**
     * Get the lat and lng attribute/field names used on this table
     *
     * Used by the Filament Google Maps package.
     *
     * @return string[]
     */
    public static function getLatLngAttributes(): array
    {
        return [
            'lat' => 'latitude',
            'lng' => 'longitude',
        ];
    }

    /**
     * Get the name of the computed location attribute
     *
     * Used by the Filament Google Maps package.
     *
     * @return string
     */
    public static function getComputedLocation(): string
    {
        return 'location';
    }

}
