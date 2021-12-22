<template>
  <form class="w-full max-w-lg">
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-experience">
          Company
        </label>
        <input id="grid-experience" v-model="exp.company" class="appearance-none block w-full bg-gray-50 text-gray-600 text-sm border border-gray-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-50 focus:border-gray-200" type="text" placeholder="Rimsys">
      </div>
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-title">
          Title
        </label>
        <input id="grid-title" v-model="exp.title" class="appearance-none block w-full bg-gray-50 text-gray-600 text-sm border border-gray-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-50 focus:border-gray-200" type="text" placeholder="Fullstack Software Engineer">
      </div>
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-position">
          Position
        </label>
        <input id="grid-position" v-model="exp.position" class="appearance-none block w-full bg-gray-50 text-gray-600 text-sm border border-gray-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-50 focus:border-gray-200" type="text" placeholder="Senior">
      </div>
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
          Start Date
        </label>
        <Datepicker v-model="start_year" lang="english" :placeholder="'Start Date'" :show-clear-button="true" />
      </div>
      <div v-if="!exp.till_present" class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
          End Date
        </label>
        <Datepicker v-model="end_year" lang="english" :placeholder="'End date'" :show-clear-button="true" />
      </div>
      <div class="w-full pt-2 px-3">
        <div class="md:w-1/3" />
        <label class="md:w-2/3 block text-gray-500 font-bold">
          <input v-model="exp.till_present" class="mr-2 leading-tight" type="checkbox">
          <span class="text-sm">Till present</span>
        </label>
      </div>
      <div class="w-full px-3 pt-2 space-x-2 flex pt-4">
        <div class="w-7/12 lg:w-8/12">
          <button class="w-full shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button" @click="save">
            Save
          </button>
        </div>
        <div class="w-5/12 lg:w-4/12">
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
import VueDatepickerUi from 'vue-datepicker-ui'
import { mapActions } from 'vuex'
import { PropType } from '@nuxtjs/composition-api'
import { generateReference, emptyExperience, getCorrectDate } from '@/plugins/helper'
import { Experience } from '@/types/profileApi'

export default vue.extend({
  components: {
    Datepicker: VueDatepickerUi,
  },
  props: {
    experience: {
      type: Object as PropType<Experience>,
      required: true,
    },
  },
  data () {
    return {
      exp: emptyExperience(),
      watchableExp: emptyExperience(),
      start_year: new Date(Date.now()),
      end_year: new Date(Date.now()),
    }
  },
  watch: {
    experience (value) {
      const isSame = this.watchableExp.reference === value.reference
      if (isSame)
        return
      this.exp = { ...value }
      this.start_year = new Date(value.start_year)
      this.end_year = new Date(value.end_year)
      this.watchableExp = value
    },
  },
  methods: {
    ...mapActions({
      updateExperience: 'updateExperience',
      storeExperiences: 'storeExperiences',
    }),
    async save () {
      this.formatDate()
      try {
        const { reference, till_present } = this.exp
        if (!reference)
          this.exp.reference = generateReference()
        if (!till_present)
          this.exp.till_present = false

        this.updateExperience(this.exp)
        const response = await this.$axios.post('/experiences', this.exp)
        const { data: { data } } = response
        this.updateExperience(data.data)
        this.exp = emptyExperience()
        this.$toast.success(data.message)
      } catch (e) {
        this.updateExperience(this.watchableExp)
        this.$toast.danger(e.response.data.errors[0].detail || 'Action unsuccessful')
      }
    },
    formatDate () {
      this.exp.start_year = getCorrectDate(this.start_year).toISOString().slice(0, 10)
      this.exp.end_year = getCorrectDate(this.end_year).toISOString().slice(0, 10)
    },
    clear () {
      this.exp = emptyExperience()
    },
  },
})
</script>

<style scoped>

</style>
