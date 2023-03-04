<template>
  <div class="w-full space-x-3 flex flex-wrap">
    <div v-for="(itemObj,i) in list" :key="i" class="flex h-6 border text-center cursor-pointer rounded-xl mt-2 w-72" :class="styles">
      <div class="w-10/12 flex justify-center items-center inline-block hover:bg-gray-100 hover:text-gray-700 text-gray-500 rounded-l-xl py-1 px-4 capitalize h-6 z-2">
        <span class="font-semibold text-gray-500 truncate">{{ itemObj[keys[0]] }} - {{ itemObj[keys[1]] || '' }}</span>
      </div>
      <div class="w-1/12 inline-block border-l grid place-items-center hover:bg-green-200" @click="editList(itemObj)"><IconCheck class="w-4 h-4" /></div>
      <div class="w-1/12 inline-block border-l grid place-items-center hover:bg-pink-200 rounded-r-xl" @click="deleteList(itemObj)"><IconTimes class="w-4 h-4" /></div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'TheLister',
  props: {
    list: {
      type: Array,
      required: true,
    },
    keys: {
      type: Array,
      required: true,
    },
    styles: {
      type: String,
      required: false,
      default: 'text-xs',
    },
    deactivate: {
      type: Boolean,
      required: false,
      default () {
        return false
      },
    },
  },
  methods: {
    editList (item) {
      this.$emit('editList', item)
    },
    deleteList (item) {
      this.$emit('deleteList', item)
    },
  },
}
</script>

<style scoped>

</style>
