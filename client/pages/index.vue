<template>
  <div class="container mx-auto adaptive-background flex flex-col adaptive-text lg:flex-row border rounded-md font-raleway">
    <div class="w-full lg:w-2/12 flex lg:flex-col">
      <TheSideTab v-for="(title, i) in profileKeys" :key="i" :title="title" />
    </div>
    <div class="content w-full lg:w-10/12 space-y-6">
      <div class="w-full flex my-2">
        <div class="w-1/2 lg:w-7/12 text-center text-3xl lg:pr-10 font-dance capitalize font-bold">{{ currentProfile }}</div>
        <div class="w-1/2 lg:w-5/12 pt-3 flex justify-end items-center pr-8 lg:pr-10">
          <BaseSwitch />
        </div>
      </div>
      <div class="w-full summary">
        <SummaryPage v-if="currentProfile === 'summary'" :summaries="summaries" />
      </div>
      <div v-if="currentProfile === 'experiences'" class="w-full experience mb-4">
        <ExperiencePage :experiences="experiences" />
      </div>
      <div v-if="currentProfile === 'skills'" class="w-full experience">
        <SkillPage :skills="skills" />
      </div>
      <div v-if="currentProfile === 'education'" class="w-full education">
        <EducationPage :education="education" />
      </div>
      <div v-if="currentProfile === 'interests'" class="w-full interest">
        <InterestPage :interests="interests" />
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import { mapState } from 'vuex'
import TheSideTab from '@/components/globals/TheSideTab.vue'
import SummaryPage from '@/components/profile/Summary/SummaryIndex.vue'
import ExperiencePage from '@/components/profile/Experience/ExperienceIndex.vue'
import EducationPage from '@/components/profile/Education/EducationIndex.vue'
import SkillPage from '@/components/profile/Skill/SkillIndex.vue'
import InterestPage from '@/components/profile/Interest/InterestIndex.vue'
import BaseSwitch from '@/components/globals/BaseSwitch.vue'

export default Vue.extend({
  name: 'Index',
  components: {
    TheSideTab,
    BaseSwitch,
    ExperiencePage,
    SummaryPage,
    EducationPage,
    SkillPage,
    InterestPage,
  },
  computed: mapState({
    currentProfile: 'currentProfile',
    profiles: 'profiles',
    profileKeys: 'profileKeys',
    summaries: 'summaries',
    experiences: 'experiences',
    education: 'education',
    skills: 'skills',
    interests: 'interests',
  }),
})
</script>

<style scoped>
.content {
  @apply overflow-auto;
  height: 800px;
}
</style>
