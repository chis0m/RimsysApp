import type { ActionTree, MutationTree } from 'vuex'
import {
  Experiences,
  Skills,
  Summaries,
  Interests,
  Education,
  Profiles,
  Experience, Achievement, Educate, Skill, Interest,
} from '@/types/profileApi'

export interface RootState {
  currentProfile: string
  edit: boolean,
  editText: string,
  profiles: Profiles
  summaries?: Summaries
  experiences?: Experiences
  education?: Education
  skills?: Skills
  interests?: Interests,
  profileKeys?: Array<string>
}

export const state = (): RootState => ({
  currentProfile: 'summary',
  edit: false,
  editText: 'edit here',
  profiles: { summaries: [], experiences: [], education: [], skills: [], interests: [] },
  summaries: [],
  experiences: [],
  education: [],
  skills: [],
  interests: [],
  profileKeys: [],
})

export const MutationType = {
  SET_CURRENT_PROFILE: 'set_current_profile',
  SET_EDIT: 'set_edit',
  STORE_PROFILES: 'store_profiles',
  STORE_SUMMARIES: 'store_summaries',
  STORE_WORK_EXPERIENCES: 'store_Experiences',
  STORE_EDUCATION: 'store_education',
  STORE_SKILLS: 'store_skills',
  STORE_INTERESTS: 'store_interest',
  STORE_PROFILE_KEYS: 'store_profile_keys',
  UPDATE_WORK_EXPERIENCE: 'updateWorkExperience',
  UPDATE_EDUCATE: 'updateEducate',
  UPDATE_SKILL: 'updateSkill',
  UPDATE_INTEREST: 'updateInterest',
  DELETE_AN_EXPERIENCE: 'delete_an_experience',
  DELETE_AN_EDUCATION: 'delete_an_education',
  DELETE_AN_ACHIEVEMENT: 'delete_an_achievement',
  DELETE_A_SKILL: 'delete_a_skill',
  DELETE_AN_INTEREST: 'delete_an_interest',
}

export const mutations: MutationTree<RootState> = {
  [MutationType.SET_CURRENT_PROFILE]: (state, currentProfile: string) => { state.currentProfile = currentProfile },
  [MutationType.SET_EDIT]: (state, edit: boolean) => {
    state.edit = edit
    state.editText = (edit) ? 'editing...' : 'edit here'
  },
  [MutationType.STORE_PROFILES]: (state, profiles: Profiles) => { state.profiles = profiles },
  [MutationType.STORE_SUMMARIES]: (state, summaries: Summaries) => { state.summaries = summaries },
  [MutationType.STORE_WORK_EXPERIENCES]: (state, experiences: Experiences) => { state.experiences = experiences },
  [MutationType.STORE_EDUCATION]: (state, education: Education) => { state.education = education },
  [MutationType.STORE_SKILLS]: (state, skills: Skills) => { state.skills = skills },
  [MutationType.STORE_INTERESTS]: (state, interests: Interests) => { state.interests = interests },
  [MutationType.STORE_PROFILE_KEYS]: (state, profileKeys: Array<string>) => { state.profileKeys = profileKeys },
  [MutationType.UPDATE_WORK_EXPERIENCE]: (state, experience: Experience) => {
    if (state.experiences) {
      state.experiences = state.experiences.filter((el) => {
        return el.reference !== experience.reference
      })
      state.experiences.unshift(experience)
    }
  },
  [MutationType.UPDATE_EDUCATE]: (state, educate: Educate) => {
    if (state.education) {
      state.education = state.education.filter((el) => {
        return el.reference !== educate.reference
      })
      state.education.unshift(educate)
    }
  },
  [MutationType.UPDATE_SKILL]: (state, skill: Skill) => {
    if (state.skills) {
      state.skills = state.skills.filter((el) => {
        return el.reference !== skill.reference
      })
      state.skills.unshift(skill)
    }
  },
  [MutationType.UPDATE_INTEREST]: (state, interest: Interest) => {
    if (state.interests) {
      state.interests = state.interests.filter((el) => {
        return el.reference !== interest.reference
      })
      state.interests.unshift(interest)
    }
  },
  [MutationType.DELETE_AN_EXPERIENCE]: (state, experience: Experience) => {
    if (state.experiences)
      state.experiences = state.experiences.filter((el) => {
        return el.reference !== experience.reference
      })
  },
  [MutationType.DELETE_AN_EDUCATION]: (state, educate: Educate) => {
    if (state.education)
      state.education = state.education.filter((el) => {
        return el.reference !== educate.reference
      })
  },
  [MutationType.DELETE_AN_ACHIEVEMENT]: (state, achievement: Achievement) => {
    if (state.experiences)
      state.experiences = state.experiences.map((experience) => {
        if (experience.achievements)
          experience.achievements = experience.achievements.filter(a => a.reference !== achievement.reference)

        return experience
      })
  },
  [MutationType.DELETE_A_SKILL]: (state, skill: Skill) => {
    if (state.skills)
      state.skills = state.skills.filter((el) => {
        return el.reference !== skill.reference
      })
  },
  [MutationType.DELETE_AN_INTEREST]: (state, interest: Interest) => {
    if (state.interests)
      state.interests = state.interests.filter((el) => {
        return el.reference !== interest.reference
      })
  },
}

export const actions: ActionTree<RootState, RootState> = {
  async nuxtServerInit ({ commit }, { $axios }) {
    const profiles: any = await $axios.$get('/profiles')
    const { data: { data } } = profiles
    commit(MutationType.STORE_PROFILES, data)
    commit(MutationType.STORE_SUMMARIES, data.summary)
    commit(MutationType.STORE_WORK_EXPERIENCES, data.experiences)
    commit(MutationType.STORE_EDUCATION, data.education)
    commit(MutationType.STORE_SKILLS, data.skills)
    commit(MutationType.STORE_INTERESTS, data.interests)
    commit(MutationType.STORE_PROFILE_KEYS, Object.keys(data))
    // commit(MutationType.SET_EDIT, false)
  },
  setCurrentProfile ({ commit }, payload) {
    commit(MutationType.SET_CURRENT_PROFILE, payload)
  },
  setEdit ({ commit }, payload) {
    commit(MutationType.SET_EDIT, payload)
  },
  storeExperiences ({ commit }, payload) {
    commit(MutationType.STORE_WORK_EXPERIENCES, payload)
  },
  storeEducation ({ commit }, payload) {
    commit(MutationType.STORE_EDUCATION, payload)
  },
  storeSummaries ({ commit }, payload) {
    commit(MutationType.STORE_SUMMARIES, payload)
  },
  storeSkills ({ commit }, payload) {
    commit(MutationType.STORE_SKILLS, payload)
  },
  storeInterests ({ commit }, payload) {
    commit(MutationType.STORE_INTERESTS, payload)
  },
  updateExperience ({ commit }, payload) {
    commit(MutationType.UPDATE_WORK_EXPERIENCE, payload)
  },
  updateEducate ({ commit }, payload) {
    commit(MutationType.UPDATE_EDUCATE, payload)
  },
  updateSkill ({ commit }, payload) {
    commit(MutationType.UPDATE_SKILL, payload)
  },
  updateInterest ({ commit }, payload) {
    commit(MutationType.UPDATE_INTEREST, payload)
  },
  deleteAnExperience ({ commit }, payload) {
    commit(MutationType.DELETE_AN_EXPERIENCE, payload)
  },
  deleteAnEducation ({ commit }, payload) {
    commit(MutationType.DELETE_AN_EDUCATION, payload)
  },
  deleteAnAchievement ({ commit }, payload) {
    commit(MutationType.DELETE_AN_ACHIEVEMENT, payload)
  },
  deleteASkill ({ commit }, payload) {
    commit(MutationType.DELETE_A_SKILL, payload)
  },
  deleteAnInterest ({ commit }, payload) {
    commit(MutationType.DELETE_AN_INTEREST, payload)
  },
}
