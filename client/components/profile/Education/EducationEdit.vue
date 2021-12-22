<template>
  <div class="edit-exp">
    <div class="w-full border-b p-6">
      <p class="w-full text-xs italic pl-5 p-2 text-green-400">Click to delete...</p>
      <TheLister :list="education" :keys="['school', 'start_year']" @editList="editEducation" @deleteList="deleteEducation" />
    </div>
    <div class="mt-6 flex justify-center items-center mx-4 space-x-2">
      <div class="w-full md:w-8/12 pr-2">
        <EducationForm :educate="educate" />
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import vue from 'vue'
import { mapActions } from 'vuex'
import { PropType } from '@nuxtjs/composition-api'
import { Educate, Education } from '@/types/profileApi'
import EducationForm from '@/components/profile/Education/EducationForm.vue'
import TheLister from '@/components/globals/TheLister.vue'

export default vue.extend({
  name: 'ExperienceEdit',
  components: {
    EducationForm,
    TheLister,
  },
  props: {
    education: {
      type: Array as PropType<Education>,
      required: true,
    },
  },
  data () {
    return {
      educate: {},
    }
  },

  methods: {
    ...mapActions({
      deleteAnEducation: 'deleteAnEducation',
      storeEducation: 'storeEducation',
    }),
    editEducation (educate: Educate) {
      this.educate = educate
    },
    async deleteEducation (educate: Educate) {
      try {
        this.deleteAnEducation(educate)
        const response = await this.$axios.delete(`/education/${educate.id}`)
        this.$toast.success(response.data.data.message)
      } catch (e) {
        this.storeEducation(this.education)
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
