<template>
  <form class="w-full max-w-lg">
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-category">
          Category
        </label>
        <input id="grid-category" v-model="aSkill.category" class="appearance-none block w-full bg-gray-50 text-gray-600 text-sm border border-gray-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-50 focus:border-gray-200" type="text" placeholder="Front End">
      </div>
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
          Name
        </label>
        <input id="grid-name" v-model="aSkill.name" class="appearance-none block w-full bg-gray-50 text-gray-600 text-sm border border-gray-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-50 focus:border-gray-200" type="text" placeholder="AlpineJs">
      </div>

      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
          Level
        </label>
        <input id="grid-name" v-model="aSkill.level" class="appearance-none block w-full bg-gray-50 text-gray-600 text-sm border border-gray-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-50 focus:border-gray-200" type="number" placeholder="82">
      </div>

      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-description">
          Description
        </label>
        <input id="grid-description" v-model="aSkill.description" class="appearance-none block w-full bg-gray-50 text-gray-600 text-sm border border-gray-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-50 focus:border-gray-200" type="text" placeholder="Very good with in...">
      </div>

      <div class="w-full px-3 pt-2 space-x-2 flex">
        <div class="w-7/12 md:w-10/12">
          <button class="w-full shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button" @click="save">
            Save
          </button>
        </div>
        <div class="w-5/12 md:w-2/12">
          <button class="w-full shadow bg-gray-700 hover:bg-gray-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button" @click="clear">
            Clear
          </button>
        </div>
      </div>
    </div>
  </form>
</template>

<script lang="ts">
import vue from 'vue'
import { mapActions } from 'vuex'
import { PropType } from '@nuxtjs/composition-api'
import { generateReference, emptySkill } from '@/plugins/helper'
import { Skill } from '@/types/profileApi'

export default vue.extend({
  props: {
    skill: {
      type: Object as PropType<Skill>,
      required: true,
    },
  },
  data () {
    return {
      aSkill: emptySkill(),
      watchableSkill: emptySkill(),
    }
  },
  watch: {
    skill (value) {
      const isSame = this.watchableSkill.reference === value.reference
      if (isSame)
        return
      this.aSkill = { ...value }
      this.watchableSkill = value
    },
  },
  methods: {
    ...mapActions({
      updateSkill: 'updateSkill',
    }),
    async save () {
      try {
        const { reference } = this.aSkill
        if (!reference)
          this.aSkill.reference = generateReference()
        this.updateSkill(this.aSkill)
        const response = await this.$axios.post('/skills', this.aSkill)
        const { data: { data } } = response
        this.updateSkill(data.data)
        this.aSkill = emptySkill()
        this.$toast.success(data.message)
      } catch (e) {
        this.updateSkill(this.watchableSkill)
        this.$toast.danger(e.response.data.errors[0].detail || 'Action unsuccessful')
      }
    },
    clear () {
      this.aSkill = emptySkill()
    },
  },
})
</script>

<style scoped>

</style>
