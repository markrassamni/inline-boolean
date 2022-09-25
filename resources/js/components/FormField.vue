<template>
    <default-field :field="field" :errors="errors" :show-help-text="showHelpText">
        <template #field>
            <checkbox
                    class="py-2"
                    @input="toggle"
                    :id="field.attribute"
                    :name="field.name"
                    :checked="checked"
                    :disabled="isReadonly"
            />
        </template>
    </default-field>
</template>

<script>
    import { FormField, HandlesValidationErrors } from 'laravel-nova'

    export default {
        mixins: [HandlesValidationErrors, FormField],

        props: ['resourceName', 'resourceId', 'field'],

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
