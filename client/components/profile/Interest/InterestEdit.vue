<template>
  <div class="edit-exp">
    <div class="w-full border-b p-6">
      <p class="w-full text-xs italic pl-5 p-2 text-green-400">Click to delete...</p>
      <TheLister :list="interests" :keys="['name']" @editList="editInterest" @deleteList="deleteInterest" />
    </div>
    <div class="mt-6 flex justify-center items-center mx-4 space-x-2">
      <div class="w-full md:w-8/12 pr-2">
        <InterestForm :interest="interest" />
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import vue from 'vue'
import { mapActions } from 'vuex'
import { PropType } from '@nuxtjs/composition-api'
import { Interests, Interest } from '@/types/profileApi'
import InterestForm from '@/components/profile/Interest/InterestForm.vue'
import TheLister from '@/components/globals/TheLister.vue'

export default vue.extend({
  name: 'InterestEdit',
  components: {
    InterestForm,
    TheLister,
  },
  props: {
    interests: {
      type: Array as PropType<Interests>,
      required: true,
    },
  },
  data () {
    return {
      interest: {},
    }
  },

  methods: {
    ...mapActions({
      deleteAnInterest: 'deleteAnInterest',
      storeInterests: 'storeInterests',
    }),
    editInterest (interest: Interest) {
      this.interest = interest
    },
    async deleteInterest (interest: Interest) {
      try {
        this.deleteAnInterest(interest)
        const response = await this.$axios.delete(`/interests/${interest.id}`)
        this.$toast.success(response.data.data.message)
      } catch (e) {
        this.storeInterests(this.interests)
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
