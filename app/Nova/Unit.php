<?php

declare(strict_types = 1);

namespace App\Nova;

use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

final class Unit extends BaseResource
{
    use HasSortableRows;


    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Unit::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = ['title', ' - ', 'symbol'];

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title', 'symbol',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        return [
            Tabs::make(__('unit.detail', ['title' => $this->title]), [
                Tab::make(__('unit.singular'), [
                    ID::make()->onlyOnForms(),

                    BelongsTo::make(__('unit.field.group'), 'group', UnitGroup::class)
                        ->help(__('unit.field.group.help'))
                        ->sortable()
                        ->filterable()
                        ->rules('required')
                        ->showOnPreview(),

                    Text::make(__('unit.field.title'), 'title')
                        ->help(__('unit.field.title.help'))
                        ->sortable()
                        ->filterable()
                        ->rules('required')
                        ->showOnPreview(),

                    Slug::make(__('unit.field.slug'), 'slug')
                        ->help(__('unit.field.slug.help'))
                        ->from('title')
                        ->sortable()
                        ->rules('required')
                        ->showOnPreview(),

                    Text::make(__('unit.field.symbol'), 'symbol')
                        ->help(__('unit.field.symbol.help'))
                        ->sortable()
                        ->filterable()
                        ->rules('required')
                        ->showOnPreview(),

                    Text::make(__('unit.field.coefficient'), 'coefficient')
                        ->help(__('unit.field.coefficient.help'))
                        ->sortable()
                        ->filterable()
                        ->default(1)
                        ->rules('required')
                        ->showOnPreview(),

                    Boolean::make(__('unit.field.basic'), 'basic')
                        ->help(__('unit.field.basic.help'))
                        ->sortable()
                        ->filterable()
                        ->exceptOnForms()
                        ->showOnPreview(),

                    Boolean::make(__('unit.field.status'), 'status')
                        ->help(__('unit.field.status.help'))
                        ->sortable()
                        ->filterable()
                        ->default(true)
                        ->showOnPreview(),
                ]),
            ])->withToolbar(),
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
