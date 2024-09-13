<?php

namespace App\Models;

use App\Enums\DaysOfTheWeek;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
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
        'day_of_week' => 'array',
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
     */
    public function getLocationAttribute(): array
    {
        return [
            'lat' => (float) $this->latitude,
            'lng' => (float) $this->longitude,
        ];
    }

    /**
     * Takes a Google style Point array of 'lat' and 'lng' values and assigns them to the
     * 'latitude' and 'longitude' attributes on this model.
     *
     * Used by the Filament Google Maps package.
     *
     * Requires the 'location' attribute be included in this model's $fillable array.
     */
    public function setLocationAttribute(?array $location): void
    {
        if (is_array($location)) {
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
     */
    public static function getComputedLocation(): string
    {
        return 'location';
    }

    public static function getForm(): array {
        return [
            TextInput::make('name')->required(),
            RichEditor::make('description'),
            TextInput::make('website')->prefix('https://'),
            CheckboxList::make('day_of_week')->options(DaysOfTheWeek::class),
            TextInput::make('instagram')->prefix('@'),
            TextInput::make('geocomplete'),
            Map::make('location')->mapControls([
                'mapTypeControl' => true,
                'scaleControl' => true,
                'streetViewControl' => true,
                'rotateControl' => true,
                'fullscreenControl' => true,
                'searchBoxControl' => false, // creates geocomplete field inside map
                'zoomControl' => false,
            ])
                ->height(fn () => '400px') // map height (width is controlled by Filament options)
                ->defaultZoom(10) // default zoom level when opening form
                ->autocomplete('geocomplete') // field on form to use as Places geocompletion field
                ->autocompleteReverse(true) // reverse geocode marker location to autocomplete field
                ->reverseGeocode([
                    'street' => '%n %S',
                    'city' => '%L',
                    'state' => '%A1',
                    'zip' => '%z',
                ]) // reverse geocode marker location to form fields, see notes below
                ->debug() // prints reverse geocode format strings to the debug console
                ->defaultLocation([38.904974072966, -77.003001885428]) // default for new forms
                ->draggable() // allow dragging to move marker
                ->clickable(true) // allow clicking to move marker
                ->geolocate(),
        ];
    }
}
