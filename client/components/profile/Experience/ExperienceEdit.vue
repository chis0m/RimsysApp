<template>
  <div class="edit-exp">
    <div class="w-full border-b p-6">
      <p class="w-full text-xs italic pl-5 p-2 text-green-400">Click to delete...</p>
      <TheLister :list="experiences" :keys="['company', 'start_year']" @editList="editExperience" @deleteList="deleteExperience" />
    </div>
    <div class="mt-6 flex flex-col lg:flex-row items-center mx-4 space-x-2">
      <div class="w-full lg:w-5/12 pr-2 lg:border-r">
        <ExperienceForm :experience="experience" />
      </div>
      <div class="w-full lg:w-7/12 px-4">
        <AchievementForm :experiences="experiences" />
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import vue from 'vue'
import { mapActions } from 'vuex'
import { PropType } from '@nuxtjs/composition-api'
import { Experience, Experiences } from '@/types/profileApi'
import ExperienceForm from '@/components/profile/Experience/ExperienceForm.vue'
import AchievementForm from '@/components/profile/Experience/AchievementForm.vue'
import TheLister from '@/components/globals/TheLister.vue'

export default vue.extend({
  name: 'ExperienceEdit',
  components: {
    ExperienceForm,
    AchievementForm,
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
      experience: {},
    }
  },

  methods: {
    ...mapActions({
      deleteAnExperience: 'deleteAnExperience',
      storeExperiences: 'storeExperiences',
    }),
    editExperience (experience: Experience) {
      this.experience = experience
    },
    async deleteExperience (experience: Experience) {
      try {
        this.deleteAnExperience(experience)
        const response = await this.$axios.delete(`/experiences/${experience.id}`)
        this.$toast.success(response.data.data.message)
      } catch (e) {
        this.storeExperiences(this.experiences)
        this.$toast.danger(e.response.data.errors[0].detail || 'Action unsuccessful')
      }
    },
  },
})
</script>

<style scoped>
  .edit-exp__ref {
    font-size: 0.6rem;
    @apply text-gray-400;
  }
</style>
