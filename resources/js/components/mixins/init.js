export default {
    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || 0
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value || 0)
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        }
    }
}
