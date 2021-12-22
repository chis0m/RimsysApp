<template>
  <button class="block w-64 bg-gray-200 text-gray-500 text-center py-1 px-4 cursor-pointer capitalize text-sm mt-2 rounded-xl " @click="simple">
    <span class="font-semibold">{{ interest.name }}</span>
  </button>
</template>

<script>
export default {
  name: 'InterestModal',
  props: {
    interest: {
      type: Object,
      required: true,
    },
  },
  methods: {
    initialCap (text) {
      return text.charAt(0).toUpperCase() + text.slice(1)
    },
    simple () {
      const { name, description } = this.interest
      this.$modal.show({
        type: 'success',
        title: this.initialCap(name),
        body: description,
        primary: {
          label: '😉',
          theme: 'white',
          action: () => {},
        },
      })
    },
  },
}
</script>
