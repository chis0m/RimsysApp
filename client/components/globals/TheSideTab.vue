<template>
  <div class="tab w-full flex items-center justify-center lg:justify-start h-16 lg:h-auto md:py-0 lg:pl-4 text-xs md:text-sm font-semibold capitalize tracking-wide adaptive-text dark:text-gray-300 cursor-pointer border-r border-b dark:border-gray-700 lg:flex-1" @click="changeCurrentProfile">
    {{ title }}
  </div>
</template>

<script lang="ts">

import Vue from 'vue'
import { mapActions } from 'vuex'
export default Vue.extend({
  name: 'TheSideTab',
  props: {
    title: {
      type: String,
      required: true,
    },
  },
  methods: {
    ...mapActions({
      setCurrentProfile: 'setCurrentProfile',
      setEdit: 'setEdit',
    }),
    changeCurrentProfile () {
      this.setCurrentProfile(this.title)
      this.setEdit(false)
    },
  },
})
</script>
<style lang="css" scoped>
.tab:hover {
    animation: trans 0.3s linear forwards;
    @apply border-t border-solid;
}

@keyframes trans {
  from {transform: translateY(0px);}
  to {transform: translateY(5px);}
}

@media (min-width: 1024px) {
  @keyframes trans {
    from {transform: translateX(0px);}
    to {transform: translateX(7px);}
  }
}
</style>
