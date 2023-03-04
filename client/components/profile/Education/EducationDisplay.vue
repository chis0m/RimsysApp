<template>
  <div class="col-span-1 bg-white border-b">
    <div class="w-full flex items-center justify-between p-6 space-x-6">
      <div class="flex-1 truncate">
        <div class="flex items-center space-x-3">
          <h3 class="text-gray-600 text-xl tracking-wide leading-6 font-bold truncate">
            {{ educate.school }}
          </h3>
        </div>
        <p class="mt-1 text-gray-500 text-sm leading-5 truncate">
          {{ educate.course }}
        </p>
        <p class="mt-1 text-gray-500 text-xs leading-5 truncate">
          {{ educate.start_year }} - {{ educate.end_year }}
        </p>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import { PropType } from '@nuxtjs/composition-api'
import { Educate } from '@/types/profileApi'
export default Vue.extend({
  name: 'Education',
  props: {
    educate: {
      type: Object as PropType<Educate>,
      required: true,
    },
  },
})
</script>

<style scoped>

</style>
