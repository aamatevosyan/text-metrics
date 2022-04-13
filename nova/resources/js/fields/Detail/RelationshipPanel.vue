<template>
  <div>
    <!-- <h4 class="text-90 font-normal text-2xl mb-3">{{ panel.name }}</h4> -->

    <component
      v-for="field in panel.fields"
      :key="`${field.attribute}:${resourceId}`"
      :is="'detail-' + field.component"
      :resource-name="resourceName"
      :resource-id="resourceId"
      :resource="resource"
      :field="field"
      @actionExecuted="actionExecuted"
    />
  </div>
</template>

<script>
import { BehavesAsPanel } from '@/mixins'

export default {
  mixins: [BehavesAsPanel],
}
</script>
