<template>
  <label for="switch" class="flex items-center cursor-pointer">
    <div class="relative">
      <input
        id="switch"
        ref="switch"
        :checked="edit"
        type="checkbox"
        class="sr-only"
        @change="toggleSwitch($event)"
      >
      <div class="switch__cover block bg-gray-300 w-10 h-6 rounded-full" />
      <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition" />
    </div>
    <div class="ml-2 w-18 font-medium text-center">{{ editText }}</div>
  </label>
</template>

<script>
import { mapActions, mapState } from 'vuex'

export default {
  name: 'BaseSwitch',
  computed: {
    ...mapState({ edit: 'edit', editText: 'editText' }),
  },
  methods: {
    ...mapActions({ setEdit: 'setEdit' }),
    toggleSwitch (e) {
      const editing = e.target.checked
      this.setEdit(editing)
      this.editText = (editing) ? 'editing...' : 'edit here'
    },
  },
}
</script>

<style scoped>
input:checked ~ .dot {
  transform: translateX(100%);
}

input:checked ~ .switch__cover {
  @apply bg-green-500;
}

</style>
