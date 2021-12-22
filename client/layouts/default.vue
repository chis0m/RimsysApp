<template>
  <div class="relative flex items-center justify-center h-screen adaptive-text bg-cover bg-center" :style="{ backgroundImage: `url('${pattern}')` }">
    <Nuxt />
  </div>
</template>
<script lang="ts">
import vue from 'vue'
export default vue.extend({
  name: 'Default',
  data () {
    return {
      pattern: '/pattern.svg',
    }
  },
})
</script>
<style>
html,body {
  @apply bg-gray-100
}
</style>
