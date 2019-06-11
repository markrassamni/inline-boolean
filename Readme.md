# Laravel Nova: Inline Boolean

Adds the ability to edit a boolean field directly from the index or detail page of a resource.

![](https://raw.githubusercontent.com/markrassamni/inline-boolean/master/InlineBooleanIndex.png)

![](https://raw.githubusercontent.com/markrassamni/inline-boolean/master/InlineBooleanDetail.png)

## Prerequisites
 - [Laravel](https://laravel.com/)
 - [Laravel Nova](https://nova.laravel.com/)

## Installation

```
$ composer require markrassamni/inline-boolean
```

## Usage

Use the `MarkRassamni\InlineBoolean\InlineBoolean` field in your Nova resource:

```php
use MarkRassamni\InlineBoolean\InlineBoolean;

class MyResource extends Resource
{
    public function fields(Request $request)
    {
        return [
            InlineBoolean::make('Enabled')
                ->enableMessage('Boolean has been enabled.')
                ->disableMessage('Boolean has been disabled.')
                ->inlineOnIndex()
                ->showTextOnIndex()
                ->trueText('Enabled')
                ->falseText('Disabled')
        ];
    }
}
```