<template>
  <form class="w-full max-w-lg">
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
          Name
        </label>
        <input id="grid-name" v-model="anInterest.name" class="appearance-none block w-full bg-gray-50 text-gray-600 text-sm border border-gray-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-50 focus:border-gray-200" type="text" placeholder="Skiing">
      </div>

      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-description">
          Description
        </label>
        <input id="grid-description" v-model="anInterest.description" class="appearance-none block w-full bg-gray-50 text-gray-600 text-sm border border-gray-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-50 focus:border-gray-200" type="text" placeholder="I won gold in skiing...">
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
import 'vue-datepicker-ui/lib/vuedatepickerui.css'
// @ts-ignore
import { mapActions } from 'vuex'
import { PropType } from '@nuxtjs/composition-api'
import { generateReference, emptyInterest } from '@/plugins/helper'
import { Interest } from '@/types/profileApi'

export default vue.extend({
  props: {
    interest: {
      type: Object as PropType<Interest>,
      required: true,
    },
  },
  data () {
    return {
      anInterest: emptyInterest(),
      watchableInterest: emptyInterest(),
    }
  },
  watch: {
    interest (value) {
      const isSame = this.watchableInterest.reference === value.reference
      if (isSame)
        return
      this.anInterest = { ...value }
      this.watchableInterest = value
    },
  },
  methods: {
    ...mapActions({
      updateInterest: 'updateInterest',
    }),
    async save () {
      try {
        const { reference } = this.anInterest
        if (!reference)
          this.anInterest.reference = generateReference()
        this.updateInterest(this.anInterest)
        const response = await this.$axios.post('/interests', this.anInterest)
        const { data: { data } } = response
        this.updateInterest(data.data)
        this.anInterest = emptyInterest()
        this.$toast.success(data.message)
      } catch (e) {
        this.updateInterest(this.watchableInterest)
        this.$toast.danger(e.response.data.errors[0].detail || 'Action unsuccessful')
      }
    },
    clear () {
      this.anInterest = emptyInterest()
    },
  },
})
</script>

<style scoped>

</style>
