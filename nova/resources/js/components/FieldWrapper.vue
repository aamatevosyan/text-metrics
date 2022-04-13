<template>
  <div
    class="field-wrapper flex flex-col md:flex-row border-b border-gray-100 dark:border-gray-700"
    :class="{ 'flex-col': stacked }"
  >
    <slot />
  </div>
</template>
<script>
export default {
  props: {
    stacked: { type: Boolean, default: false },
  },
}
</script>
