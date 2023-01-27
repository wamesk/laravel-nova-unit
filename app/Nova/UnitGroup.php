<?php

declare(strict_types = 1);

namespace App\Nova;

use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

final class UnitGroup extends BaseResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\UnitGroup::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title',
    ];


    public static function indexQuery(NovaRequest $request, $query)
    {
        if ($request->viaRelationship) {
            return self::relatableQuery($request, $query);
        }
        if (empty($request->get('orderBy'))) {
            $query->getQuery()->orders = [];
            return $query->orderBy('title', 'asc');
        }

        return $query;
    }


    /**
     * Get the fields displayed by the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        return [
            Tabs::make(__('unit_group.detail', ['title' => $this->title]), [
                Tab::make(__('unit_group.singular'), [
                    ID::make()->onlyOnForms(),

                    Text::make(__('unit_group.field.title'), 'title')
                        ->help(__('unit_group.field.title.help'))
                        ->sortable()
                        ->filterable()
                        ->rules('required')
                        ->showOnPreview(),

                    Slug::make(__('unit_group.field.slug'), 'slug')
                        ->help(__('unit_group.field.slug.help'))
                        ->from('title')
                        ->sortable()
                        ->rules('required')
                        ->showOnPreview(),

                    Boolean::make(__('unit_group.field.status'), 'status')
                        ->help(__('unit_group.field.status.help'))
                        ->sortable()
                        ->filterable()
                        ->default(true)
                        ->showOnPreview(),
                ]),
            ])->withToolbar(),

            HasMany::make(__('unit.plural'), 'units', Unit::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
