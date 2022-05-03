<template>
    <b>{{ label }}</b>
    <prime-button v-if="showDetailsButton"
                  icon="pi pi-comments"
                  class="p-button-sm p-button-rounded p-button-outlined"
                  @click.prevent.stop="display = true"
    />
    <prime-dialog header="Header" footer="Footer" v-model:visible="display"                                      :maximizable="true"
                                     :modal="true">
        {{ paragraph }}
    </prime-dialog>
</template>

<script>
export default {
    name: "DocumentTreeViewItem",
    props: {
        label: {
            type: String,
            required: true,
        },
        uuid: {
            type: String,
            required: true,
        },
        type: {
            type: String,
            required: true,
        },
        paragraph: {
            type: String,
            required: false,
        },
    },
    data() {
      return {
          display: false,
      }
    },
    computed: {
        showDetailsButton() {
            return this.type === 'paragraph' || this.type === 'list-item';
        }
    }
}
</script>

<style scoped>

</style>
