<template>
  <form class="w-full max-w-lg">
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-school">
          School
        </label>
        <input id="grid-school" v-model="edu.school" class="appearance-none block w-full bg-gray-50 text-gray-600 text-sm border border-gray-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-50 focus:border-gray-200" type="text" placeholder="Rimsys">
      </div>
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-course">
          Course
        </label>
        <input id="grid-course" v-model="edu.course" class="appearance-none block w-full bg-gray-50 text-gray-600 text-sm border border-gray-50 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-50 focus:border-gray-200" type="text" placeholder="Fullstack Software Engineer">
      </div>
      <div class="w-full flex flex-col sm:flex-row">
        <div class="w-full sm:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
            Start Date
          </label>
          <Datepicker v-model="start_year" lang="english" :placeholder="'Start Date'" :show-clear-button="true" />
        </div>
        <div class="w-full sm:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
            End Date
          </label>
          <Datepicker v-model="end_year" lang="english" :placeholder="'End date'" :show-clear-button="true" />
        </div>
      </div>
      <div class="w-full px-3 pt-2 space-x-2 flex pt-4">
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
import VueDatepickerUi from 'vue-datepicker-ui'
import { mapActions } from 'vuex'
import { PropType } from '@nuxtjs/composition-api'
import { generateReference, emptyEducation, getCorrectDate } from '@/plugins/helper'
import { Educate } from '@/types/profileApi'

export default vue.extend({
  components: {
    Datepicker: VueDatepickerUi,
  },
  props: {
    educate: {
      type: Object as PropType<Educate>,
      required: true,
    },
  },
  data () {
    return {
      edu: emptyEducation(),
      watchableEdu: emptyEducation(),
      start_year: new Date(Date.now()),
      end_year: new Date(Date.now()),
    }
  },
  watch: {
    educate (value) {
      const isSame = this.watchableEdu.reference === value.reference
      if (isSame)
        return
      this.edu = { ...value }
      this.watchableEdu = value
      this.start_year = new Date(value.start_year)
      this.end_year = new Date(value.end_year)
    },
  },
  methods: {
    ...mapActions({
      updateEducate: 'updateEducate',
    }),
    async save () {
      this.formatDate()
      try {
        const { reference } = this.edu
        if (!reference)
          this.edu.reference = generateReference()
        this.updateEducate(this.edu)
        const response = await this.$axios.post('/education', this.edu)
        const { data: { data } } = response
        this.updateEducate(data.data)
        this.edu = emptyEducation()
        this.$toast.success(data.message)
      } catch (e) {
        this.updateEducate(this.watchableEdu)
        this.$toast.danger(e.response.data.errors[0].detail || 'Action unsuccessful')
      }
    },
    formatDate () {
      this.edu.start_year = getCorrectDate(this.start_year).toISOString().slice(0, 10)
      this.edu.end_year = getCorrectDate(this.end_year).toISOString().slice(0, 10)
    },
    clear () {
      this.edu = emptyEducation()
    },
  },
})
</script>

<style scoped>

</style>
