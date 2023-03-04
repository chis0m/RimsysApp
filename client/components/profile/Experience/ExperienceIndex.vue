<template>
  <div class="w-full">
    <div v-if="edit" class="w-full p-0 m-0">
      <ExperienceEdit :experiences="experiences" />
    </div>
    <div v-else class="w-full p-0 m-0">
      <ExperienceDisplay v-for="(experience,i) in experiences" :key="i" :experience="experience" />
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import { mapState } from 'vuex'
import { PropType } from '@nuxtjs/composition-api'
import { Experiences } from '@/types/profileApi'
import ExperienceDisplay from '@/components/profile/Experience/ExperienceDisplay.vue'
import ExperienceEdit from '@/components/profile/Experience/ExperienceEdit.vue'
export default Vue.extend({
  name: 'ExperienceIndex',
  components: {
    ExperienceEdit,
    ExperienceDisplay,
  },
  props: {
    experiences: {
      type: Array as PropType<Experiences>,
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
