<template>
  <div class="w-full space-x-4 p-6">
    <p class="w-full text-xs italic pl-5 p-2 text-green-700">Click to see more details...</p>
    <SkillModal v-for="(skill, i) in skills" :key="i" :skill="skill" />
    <div class="hidden md:flex flex justify-center items-center lg:pr-24 xl:pr-32 opacity-90">
      <img class="h-64 lg:h-80 xl:96" src="/winners.svg" alt="avatar">
    </div>
  </div>
</template>

<script lang="ts">
import vue from 'vue'
import { PropType } from '@nuxtjs/composition-api'
import SkillModal from '@/components/globals/SkillModal.vue'
import { Skills } from '@/types/profileApi'
export default vue.extend({
  name: 'SkillDisplay',
  components: {
    SkillModal,
  },
  props: {
    skills: {
      type: Array as PropType<Skills>,
    },
  },
})
</script>

<style scoped>

</style>
