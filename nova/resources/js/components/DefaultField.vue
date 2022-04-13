<template>
  <FieldWrapper :stacked="field.stacked" v-if="field.visible">
    <div
      class="px-8 mt-2 md:mt-0 w-full md:w-1/5"
      :class="field.stacked ? 'md:pt-5 w-full' : 'md:py-5'"
    >
      <slot>
        <FormLabel
          :label-for="labelFor || field.uniqueKey"
          :class="{ 'mb-2': showHelpText && field.helpText }"
        >
          {{ fieldLabel }}
          <span v-if="field.required" class="text-red-500 text-sm">
            {{ __('*') }}
          </span>
        </FormLabel>
      </slot>
    </div>

    <div
      class="w-full md:w-3/5 mt-1 md:mt-0 pb-5 md:py-5 px-8"
      :class="fieldClasses"
    >
      <slot name="field" />

      <HelpText class="mt-2 help-text-error" v-if="showErrors && hasError">
        {{ firstError }}
      </HelpText>

      <HelpText
        class="help-text mt-2"
        v-if="showHelpText"
        v-html="field.helpText"
      />
    </div>
  </FieldWrapper>
</template>

<script>
import { HandlesValidationErrors, mapProps } from '@/mixins'

export default {
  mixins: [HandlesValidationErrors],

  props: {
    field: { type: Object, required: true },
    fieldName: { type: String },
    showErrors: { type: Boolean, default: true },
    fullWidthContent: { type: Boolean, default: false },
    labelFor: { default: null },
    ...mapProps(['showHelpText']),
  },

  computed: {
    /**
     * Return the label that should be used for the field.
     */
    fieldLabel() {
      // If the field name is purposefully an empty string, then let's show it as such
      if (this.fieldName === '') {
        return ''
      }

      return this.fieldName || this.field.name || this.field.singularLabel
    },

    /**
     * Return the classes that should be used for the field content.
     */
    fieldClasses() {
      // return this.fullWidthContent
      //   ? this.field.stacked
      //     ? 'w-full'
      //     : 'md:w-4/5'
      //   : 'md:w-1/2'
    },
  },
}
</script>
