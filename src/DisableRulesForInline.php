<?php

namespace MarkRassamni\InlineBoolean;

use Laravel\Nova\Http\Requests\NovaRequest;


trait DisableRulesForInline
{

	public static function rulesForUpdate(NovaRequest $request, $resource = null)
    {
        if ($request->has('is_inline_update') and $request->input('is_inline_update') === '1') {
            return [];
        }

        return parent::rulesForUpdate($request, $resource);
    }
}
