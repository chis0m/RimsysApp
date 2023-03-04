<template>
  <div class="bg-white border-b" :class="styles">
    <div class="w-full flex items-center justify-between p-6 space-x-6">
      <div class="flex-1 truncate">
        <div class="flex items-center space-x-3">
          <h3 class="text-gray-600 text-xl tracking-wide leading-6 font-bold truncate">
            {{ experience.title }}
          </h3>
          <span class="flex-shrink-0 inline-block px-2 text-teal-800 text-xs leading-4 font-medium bg-green-100 rounded-full py-0.5">
            {{ experience.position }}
          </span>
        </div>
        <p class="mt-1 text-gray-500 text-sm leading-5 truncate">
          {{ experience.company }}
        </p>
        <p class="mt-1 text-gray-500 text-xs leading-5 truncate">
          {{ experience.start_year }} -  <span v-if="experience.till_present">till present</span> <span v-else>{{ experience.end_year }}</span>
        </p>
      </div>
      <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" :src="`/${experience.image_url}`" alt="avatar">
    </div>
    <div class="w-full mb-3 px-6">
      <BaseAccordion :adaptive-style="'pl-2 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-blue-dark-theme-lightest border-white dark:border-gray-800 rounded-sm'" title="Achievements" :title-style="'text-lg leading-3 tracking-wide'" extra-text="click to view">
        <div class="w-full">
          <BaseAccordion v-for="(achievement, i) in experience.achievements" :key="i" :title="achievement.title"> {{ achievement.description }}</BaseAccordion>
        </div>
      </BaseAccordion>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import { PropType } from '@nuxtjs/composition-api'
import { Experience } from '@/types/profileApi'
import BaseAccordion from '@/components/globals/BaseAccordion.vue'
export default Vue.extend({
  name: 'Experience',
  components: {
    BaseAccordion,
  },
  props: {
    experience: {
      type: Object as PropType<Experience>,
      required: true,
    },
    styles: {
      type: String,
      default: '',
    },
  },
})
</script>
