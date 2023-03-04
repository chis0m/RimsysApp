<template>
  <div class="w-full">
    <div v-if="edit" class="w-full p-0 m-0">
      <EducationEdit :education="education" />
    </div>
    <div v-else class="w-full p-0 m-0">
      <EducationDisplay v-for="(educate,i) in education" :key="i" :educate="educate" />
    </div>
  </div>
</template>

<script lang="ts">
import { PropType } from '@nuxtjs/composition-api'
import Vue from 'vue'
import { mapState } from 'vuex'
import { Education } from '@/types/profileApi'
import EducationDisplay from '@/components/profile/Education/EducationDisplay.vue'
import EducationEdit from '@/components/profile/Education/EducationEdit.vue'
export default Vue.extend({
  components: {
    EducationEdit,
    EducationDisplay,
  },
  props: {
    education: {
      type: Array as PropType<Education>,
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
