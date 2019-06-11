<template>
    <panel-item :field="field">
        <template v-if="field.inlineDetail">
            <p slot="value" class="text-90">
                <checkbox
                    @input="toggle"
                    :id="field.attribute"
                    :name="field.name"
                    :checked="checked"
                    :disabled="isReadonly"
                />
            </p>
        </template>

        <template v-else>
            <p slot="value" class="text-90">
            <span
                    class="inline-block rounded-full w-2 h-2 mr-1"
                    :class="{ 'bg-success': field.value, 'bg-danger': !field.value }"></span>
                <span>{{ displayValue }}</span>
            </p>
        </template>
    </panel-item>
</template>

<script>
    import { Errors, FormField, HandlesValidationErrors } from 'laravel-nova'
    import InlineInit from './mixins/init';
    import InlineMixin from './mixins/inline';

    export default {
        mixins: [FormField, HandlesValidationErrors, InlineInit, InlineMixin],

        props: ['resource', 'resourceName', 'resourceId', 'field'],

        data: () => ({
            value: false,
        }),

        mounted() {
            this.value = this.field.value || false

            this.field.fill = formData => {
                formData.append(this.field.attribute, this.trueValue)
            }
        },

        methods: {
            toggle() {
                this.value = !this.value
                this.submit()
            },
        },

        computed: {
            checked() {
                return Boolean(this.value)
            },
            trueValue() {
                return +this.checked
            },
        },
    }
</script>
