<template>
        <div v-if="field.inlineIndex" slot="field">
            <div class="inline-flex">
                <div v-if="field.textOnIndex" class="flex-1 text-center py-2 m-1">{{ displayValue }}</div>
                <div class="flex-1 text-center py-2 m-1">
                    <checkbox
                        @input="toggle"
                        :id="field.attribute"
                        :name="field.name"
                        :checked="checked"
                        :disabled="isReadonly"
                    />
                </div>
            </div>
        </div>
        <div v-else>
            <div class="inline-flex">
                <div class="flex-1 text-center py-2 m-1">
                    <span
                        class="inline-block rounded-full w-2 h-2 mr-1"
                        :class="{ 'bg-success': field.value, 'bg-danger': !field.value }">
                    </span>
                </div>
                <div v-if="field.textOnIndex" class="flex-1 text-center py-2 m-1">
                    {{ displayValue }}
                </div>
            </div>
        </div>
</template>

<script>
    import { Errors, FormField, HandlesValidationErrors } from 'laravel-nova'
    import InlineInit from './mixins/init';
    import InlineMixin from './mixins/inline';

    export default {
        mixins: [FormField, HandlesValidationErrors, InlineInit, InlineMixin],

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
            resourceId() {
                return this.$parent.resource.id.value;
            }
        },
    }
</script>
