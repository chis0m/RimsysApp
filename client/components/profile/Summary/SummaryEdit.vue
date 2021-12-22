<template>
  <div class="w-full px-6 pt-16">
    <client-only>
      <EditorIndex :model-value="summary.body" @updatedModelValue="getEditorContent" />
    </client-only>
    <button class="w-full bg-green-500 hover:bg-green-400 text-white rounded-bl-xs rounded-sm font-bold px-4 py-1 my-2 focus:outline-none focus:shadow-outline" @click="update">Update</button>
  </div>
</template>

<script lang="ts">
import vue from 'vue'
import { mapActions } from 'vuex'
import EditorIndex from '@/components/globals/Editor/EditorIndex.vue'
import { generateReference } from '@/plugins/helper'
export default vue.extend({
  name: 'SummaryEdit',
  components: {
    EditorIndex,
  },
  props: {
    summary: {
      type: Object,
      required: true,
    },
  },
  data () {
    return {
      body: this.summary.body,
    }
  },
  methods: {
    ...mapActions({
      storeSummaries: 'storeSummaries',
    }),
    getEditorContent (html: string) {
      this.body = html
    },
    async update () {
      try {
        const { reference } = this.summary
        const content = (reference) ? { reference, body: this.body } : { reference: generateReference(), body: this.body }
        this.storeSummaries([content])
        const response = await this.$axios.post('/summary', content)
        this.$toast.success(response.data.data.message)
      } catch (e) {
        this.storeSummaries([this.summary])
        this.$toast.danger(e.response.data.errors[0].detail || 'Action unsuccessful')
      }
    },

  },
})
</script>

<style scoped>

</style>
