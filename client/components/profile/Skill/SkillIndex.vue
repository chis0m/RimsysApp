<template>
  <div class="w-full">
    <div v-if="edit" class="w-full p-0 m-0">
      <SkillEdit :skills="skills" />
    </div>
    <div v-else class="w-full p-0 m-0">
      <SkillDisplay :skills="skills" />
    </div>
  </div>
</template>

<script lang="ts">
import { PropType } from '@nuxtjs/composition-api'
import Vue from 'vue'
import { mapState } from 'vuex'
import { Skills } from '@/types/profileApi'
import SkillDisplay from '@/components/profile/Skill/SkillDisplay.vue'
import SkillEdit from '@/components/profile/Skill/SkillEdit.vue'
export default Vue.extend({
  components: {
    SkillEdit,
    SkillDisplay,
  },
  props: {
    skills: {
      type: Array as PropType<Skills>,
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
