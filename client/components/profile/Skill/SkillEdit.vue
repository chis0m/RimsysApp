<template>
  <div class="edit-exp">
    <div class="w-full border-b p-6">
      <p class="w-full text-xs italic pl-5 p-2 text-green-400">Click to delete...</p>
      <TheLister :list="skills" :keys="['name', 'category']" @editList="editSKill" @deleteList="deleteSkill" />
    </div>
    <div class="mt-6 flex justify-center items-center mx-4 space-x-2">
      <div class="w-full md:w-8/12 pr-2">
        <SkillForm :skill="skill" />
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import vue from 'vue'
import { mapActions } from 'vuex'
import { PropType } from '@nuxtjs/composition-api'
import { Skills, Skill } from '@/types/profileApi'
import SkillForm from '@/components/profile/Skill/SkillForm.vue'
import TheLister from '@/components/globals/TheLister.vue'

export default vue.extend({
  name: 'SkillEdit',
  components: {
    SkillForm,
    TheLister,
  },
  props: {
    skills: {
      type: Array as PropType<Skills>,
      required: true,
    },
  },
  data () {
    return {
      skill: {},
    }
  },

  methods: {
    ...mapActions({
      deleteASkill: 'deleteASkill',
      storeSkills: 'storeSkills',
    }),
    editSKill (skill: Skill) {
      this.skill = skill
    },
    async deleteSkill (skill: Skill) {
      try {
        this.deleteASkill(skill)
        const response = await this.$axios.delete(`/skills/${skill.id}`)
        this.$toast.success(response.data.data.message)
      } catch (e) {
        this.storeSkills(this.skills)
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
