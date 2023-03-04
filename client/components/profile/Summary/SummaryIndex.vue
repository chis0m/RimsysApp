<template>
  <div class="w-full">
    <SummaryEdit v-if="edit" :summary="summaries[0]" />
    <SummaryDisplay v-else :summary="summaries[0]" />
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import { mapState } from 'vuex'
import { PropType } from '@nuxtjs/composition-api'
import { Summaries } from '@/types/profileApi'
import SummaryDisplay from '@/components/profile/Summary/SummaryDisplay.vue'
import SummaryEdit from '@/components/profile/Summary/SummaryEdit.vue'
export default Vue.extend({
  name: 'SummaryIndex',
  components: {
    SummaryEdit,
    SummaryDisplay,
  },
  props: {
    summaries: {
      type: Array as PropType<Summaries>,
      required: true,
    },
  },
  computed: mapState({
    edit: 'edit',
  }),
})
</script>

<style scoped>

</style>
