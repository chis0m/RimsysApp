<template>
  <div class="col-span-1 bg-white">
    <div class="w-full flex items-center justify-between px-6 pt-6 space-x-6">
      <div class="flex-1 truncate">
        <p class="mt-1 pb-2 font-raleway text-gray-800 text-3xl md:text-4xl tracking-wider leading-10 truncate">
          Chisom Ejim
        </p>
        <div class="flex items-center space-x-3">
          <h3 class="text-gray-500 text-sm leading-5 font-medium truncate">
            Software Engineer
          </h3>
          <span class="flex-shrink-0 inline-block px-2 text-teal-800 text-xs leading-4 font-semibold bg-red-100 rounded-full py-0.5">
            FullStack
          </span>
        </div>
      </div>
      <img class="w-24 h-24 bg-gray-300 rounded-full flex-shrink-0 object-cover object-center" src="/chisom.jpg" alt="avatar">
    </div>
    <div class="pl-6 pr-4 md:pr-24 text-gray-600 leading-6 font-raleway text-sm my-4" v-html="summary.body" />
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import { PropType } from '@nuxtjs/composition-api'
import { Summary } from '@/types/profileApi'
export default Vue.extend({
  props: {
    summary: {
      type: Object as PropType<Summary>,
      required: true,
    },
  },
})
</script>
