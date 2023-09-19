<template>
  <div>
    <div v-if="field.inlineIndex" slot="field">
      <div class="inline-flex">
        <div v-if="field.textOnIndex" class="flex-1 text-center py-2 m-1">{{ displayValue }}</div>
        <div class="flex-1 text-center py-2 m-1" @mouseover="showTooltip = true" @mouseout="showTooltip = false">
          <checkbox
              @input="toggle"
              :id="field.attribute"
              :name="field.name"
              :checked="checked"
              :disabled="isReadonly"
          />
          <!-- Tooltip -->
          <span v-if="showTooltip && field.value && field.tooltip" class="tooltip">
            {{ field.tooltip }}
          </span>
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
  </div>
</template>

<script>
import { Errors, FormField, HandlesValidationErrors } from 'laravel-nova';
import InlineInit from './mixins/init';
import InlineMixin from './mixins/inline';

export default {
  mixins: [FormField, HandlesValidationErrors, InlineInit, InlineMixin],

  data: () => ({
    value: false,
    showTooltip: false  // Added this line to control tooltip visibility
  }),

  mounted() {
    this.value = this.field.value || false;

    this.field.fill = formData => {
      formData.append(this.field.attribute, this.trueValue);
    };
  },

  methods: {
    toggle() {
      this.value = !this.value;
      this.submit();
    },
  },

  computed: {
    checked() {
      return Boolean(this.value);
    },
    trueValue() {
      return +this.checked;
    },
    resourceId() {
      return this.$parent.resource.id.value;
    },
  },
};
</script>

<style scoped>
.tooltip {
  position: absolute;
  top: -5px;
  left: 50%;
  transform: translateX(-50%);
  background-color: #333;
  color: #fff;
  padding: 5px 10px;
  border-radius: 4px;
  font-size: 12px;
  z-index: 10;
  opacity: 0.9;
}
</style>

