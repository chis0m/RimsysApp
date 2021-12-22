<template>
  <div class="tab">
    <div class="text-xs">
      <a href="#" class="block no-underline border-b-2 flex justify-between" :class="adaptiveStyle" @click.prevent="active = !active">
        <span class="truncate font-semibold adaptive-text" :class="titleStyle"> {{ title }} <span class="text-xs pl-10 italic opacity-80">{{ extraText }}</span> </span>
        <span v-show="!active" class="inline">
          <svg class="h-4 w-4 fill-current adaptive-text" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
          </svg>
        </span>
        <span v-show="active" class="inline">
          <svg class="h-4 w-4 fill-current adaptive-text" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 0 1-1.414 0L10 9.414l-3.293 3.293a1 1 0 0 1-1.414-1.414l4-4a1 1 0 0 1 1.414 0l4 4a1 1 0 0 1 0 1.414z" clip-rule="evenodd" />
          </svg>
        </span>
      </a>
    </div>
    <div v-show="active" class="text-sm adaptive-text px-2 mt-4 mb-6"> <slot /> </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
export default Vue.extend({
  name: 'BaseAccordion',
  props: {
    title: {
      type: String,
      required: true,
    },
    adaptiveStyle: {
      type: String,
      default: 'p-4 bg-gray-200 hover:bg-gray-300 dark:bg-blue-dark-theme border-white dark:border-gray-800',
    },
    titleStyle: {
      type: String,
      default: '',
    },
    extraText: {
      type: String,
      default: '',
    },
  },
  data () {
    return {
      active: false,
    }
  },
})
</script>
