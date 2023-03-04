<template>
  <div class="w-full space-x-4 p-6">
    <p class="w-full text-xs italic pl-5 p-2 text-green-700">Click to see more details...</p>
    <InterestModal v-for="(interest, i) in interests" :key="i" :interest="interest" />
    <div class="hidden md:flex flex justify-center items-center lg:pr-24 xl:pr-32 opacity-90">
      <img class="h-64 lg:h-80 xl:96" src="/winners.svg" alt="avatar">
    </div>
  </div>
</template>

<script lang="ts">
import vue from 'vue'
import { PropType } from '@nuxtjs/composition-api'
import { Interests } from '~/client/types/profileApi'
import InterestModal from '@/components/globals/InterestModal.vue'
export default vue.extend({
  name: 'Interests',
  components: {
    InterestModal,
  },
  props: {
    interests: {
      type: Array as PropType<Interests>,
    },
  },
})
</script>

<style scoped>

</style>
