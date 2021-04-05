# Laravel Nova: Inline Boolean

[![Latest Stable Version](https://poser.pugx.org/markrassamni/inline-boolean/v/stable)](https://packagist.org/packages/markrassamni/inline-boolean) [![Total Downloads](https://poser.pugx.org/markrassamni/inline-boolean/downloads)](https://packagist.org/packages/markrassamni/inline-boolean) [![License](https://poser.pugx.org/markrassamni/inline-boolean/license)](https://packagist.org/packages/markrassamni/inline-boolean)

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

And add trait DisableRulesForInline


```php
use MarkRassamni\InlineBoolean\InlineBoolean;
use MarkRassamni\InlineBoolean\DisableRulesForInline;

class MyResource extends Resource
{
    use DisableRulesForInline;

    public function fields(Request $request)
    {
        return [
            InlineBoolean::make('Enabled')
                ->inlineOnIndex()  // Use inline field on the index page
                ->inlineOnDetail()  // Use inline field on the detail page
                ->enableMessage('Boolean has been enabled.')  // Toast message when enabling boolean
                ->disableMessage('Boolean has been disabled.')  // Toast message when disabling boolean
                ->trueText('Enabled')  // Change the text describing true boolean values
                ->falseText('Disabled')  // Change the text describing false boolean values
                ->showTextOnIndex()  // Show true/false text beside the checkbox on the index page
        ];
    }
}
```