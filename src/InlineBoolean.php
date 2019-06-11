<?php

namespace MarkRassamni\InlineBoolean;

use Laravel\Nova\Fields\Boolean;

class InlineBoolean extends Boolean
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'inline-boolean';

    /**
     * Enable inline editing on index view.
     *
     * @param Closure|bool $callback
     * @return $this
     */
    public function inlineOnIndex($callback = true)
    {
        return $this->withMeta(['inlineIndex' => $callback]);
    }

    /**
     * Enable inline editing on detail view.
     *
     * @param Closure|bool $callback
     * @return $this
     */
    public function inlineOnDetail($callback = true)
    {
        return $this->withMeta(['inlineDetail' => $callback]);
    }

    /**
     * Set the toast message shown when enabling the boolean
     *
     * @param string $message
     * @return $this
     */
    public function enableMessage($message = 'Enabled')
    {
        return $this->withMeta(['enableMessage' => $message]);
    }

    /**
     * Set the toast message shown when disabling the boolean
     *
     * @param string $message
     * @return $this
     */
    public function disableMessage($message = 'Disabled')
    {
        return $this->withMeta(['disableMessage' => $message]);
    }

    /**
     * Set the true text shown when boolean is not inline
     *
     * @param string $value
     * @return $this
     */
    public function trueText($value)
    {
        return $this->withMeta(['trueText' => $value]);
    }

    /**
     * Set the false text shown when boolean is not inline
     *
     * @param string $value
     * @return $this
     */
    public function falseText($value)
    {
        return $this->withMeta(['falseText' => $value]);
    }

    /**
     * Show text beside the checkbox on the index page
     *
     * @param Closure|bool $callback
     * @return $this
     */
    public function showTextOnIndex($callback = true)
    {
        return $this->withMeta(['textOnIndex' => $callback]);
    }
}