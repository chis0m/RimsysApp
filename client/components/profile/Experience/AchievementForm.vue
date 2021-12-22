<template>
  <form class="w-full max-w-lg">
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full pt-2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
          Achievements
        </label>
        <div class="relative">
          <select id="grid-state" class="block appearance-none w-full bg-gray-50 border border-gray-50 text-gray-600 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-gray-50 focus:border-gray-200" @change="setSelectedExperience">
            <option v-for="(experience, i) in experiences" :key="i" :value="experience.reference">{{ experience.company }} - {{ experience.start_year }}</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
          </div>
        </div>
      </div>
      <div class="w-full">
        <TheLister :list="selectedExperience.achievements" :keys="['title']" @editList="showForm" @deleteList="deleteAchievement" />
      </div>
      <div v-if="showAddForm" class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-title">
          Title
        </label>
        <input id="grid-title" v-model="title" class="appearance-none block w-full bg-gray-50 text-gray-600 text-sm border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-50 focus:border-gray-200" type="text" placeholder="Built Information Mgt System">
      </div>
      <div v-if="showAddForm" class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-description">
          Description
        </label>
        <input id="grid-description" v-model="description" class="appearance-none block w-full bg-gray-50 text-gray-600 text-sm border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-50 focus:border-gray-200" type="text" placeholder="More detail...">
      </div>
      <div v-if="showAddForm" class="w-full px-3 pt-2 space-x-2 flex">
        <div class="w-full">
          <button class="w-full shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button" @click="addNewAchievement">
            Add New
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
import { mapActions, mapState } from 'vuex'
import { PropType } from '@nuxtjs/composition-api'
import { generateReference, getCorrectDate } from '@/plugins/helper'
import { Achievement, Experiences } from '@/types/profileApi'
import TheLister from '@/components/globals/TheLister.vue'

export default vue.extend({
  components: {
    TheLister,
  },
  props: {
    experiences: {
      type: Array as PropType<Experiences>,
      required: true,
    },
  },
  data () {
    return {
      expReference: '',
      selectedExperience: this.experiences[0],
      showAddForm: true,
      title: '',
      description: '',
    }
  },
  computed: {
    ...mapState({}),
  },
  methods: {
    ...mapActions({
      deleteAnAchievement: 'deleteAnAchievement',
      updateExperience: 'updateExperience',
      storeExperiences: 'storeExperiences',
    }),
    showForm () {
      this.showAddForm = true
    },

    async addNewAchievement () {
      if (this.selectedExperience) {
        const content = JSON.parse(JSON.stringify(this.selectedExperience))
        content.start_year = getCorrectDate(content.start_year).toISOString().slice(0, 10)
        content.end_year = getCorrectDate(content.end_year).toISOString().slice(0, 10)
        const newAchievement = { reference: generateReference(), title: this.title, description: this.description }
        if (content.achievements)
          content.achievements.unshift(newAchievement)
        else
          content.achievements = [newAchievement]

        try {
          this.updateExperience(content)
          const response = await this.$axios.post('/experiences', content)
          const { data: { data } } = response
          this.updateExperience(data.data)
          this.selectedExperience = data.data
          this.$toast.success(response.data.data.message)
        } catch (e) {
          this.storeExperiences(this.experiences)
          this.$toast.danger(e.response.data.errors[0].detail || 'Action unsuccessful')
        }
      }
    },
    async deleteAchievement (achievement: Achievement) {
      try {
        this.deleteAnAchievement(achievement)
        const response = await this.$axios.delete(`/achievements/${achievement.id}`)
        this.$toast.success(response.data.data.message)
      } catch (e) {
        this.storeExperiences(this.experiences)
        this.$toast.danger(e.response.data.errors[0].detail || 'Action unsuccessful')
      }
    },
    setSelectedExperience (e: any) {
      this.selectedExperience = this.experiences.filter(el => el.reference === e.target.value)[0]
    },
  },
})
</script>

<style scoped>

</style>
