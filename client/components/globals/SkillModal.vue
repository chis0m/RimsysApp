<template>
  <div class="skill relative w-52 h-6 border text-center cursor-pointer rounded-xl mt-2 inline-block overflow-hidden" :style="cssVars" @click="simple">
    <div class="skill__level absolute h-6 left-0 top-0 z-1 bg-gray-200 inline-block  rounded-xl" />
    <div class="absolute top-0 left-0 flex justify-center items-center inline-block  text-gray-500 py-1 px-4 capitalize text-sm h-6 z-2">
      <span class="text-xs font-semibold">{{ skill.name }}</span>
      <span class="">&nbsp;|&nbsp;</span>
      <span class="text-xs font-semibold">{{ skill.level }}% </span>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Skills',
  props: {
    skill: {
      type: Object,
      required: true,
    },
  },
  computed: {
    cssVars () {
      return {
        '--skill-level': `${this.skill.level}%`,
      }
    },
  },
  methods: {
    initialCap (text) {
      return text.charAt(0).toUpperCase() + text.slice(1)
    },
    simple () {
      const { name, description, category, level } = this.skill
      this.$modal.show({
        type: 'success',
        title: this.initialCap(name),
        body: `${this.initialCap(category)} - ${description}`,
        primary: {
          label: `👍 ${level}%`,
          theme: 'white',
          action: () => {},
        },
      })
    },
  },
}
</script>

<style scoped>
.skill:hover .skill__level {
  @apply bg-gray-200;
}
.skill:hover .skill__level {
  animation: level-up 1s ease forwards;
}
@keyframes level-up {
  0% {width: 0;}
  100% {width: var(--skill-level);}
}
</style>
