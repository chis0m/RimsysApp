<template>
  <div class="w-full">
    <div v-if="edit" class="w-full p-0 m-0">
      <InterestEdit :interests="interests" />
    </div>
    <div v-else class="w-full p-0 m-0">
      <InterestDisplay :interests="interests" />
    </div>
  </div>
</template>

<script lang="ts">
import { PropType } from '@nuxtjs/composition-api'
import Vue from 'vue'
import { mapState } from 'vuex'
import { Interests } from '@/types/profileApi'
import InterestDisplay from '@/components/profile/Interest/InterestDisplay.vue'
import InterestEdit from '@/components/profile/Interest/InterestEdit.vue'
export default Vue.extend({
  name: 'InterestIndex',
  components: {
    InterestEdit,
    InterestDisplay,
  },
  props: {
    interests: {
      type: Array as PropType<Interests>,
      required: true,
    },
  },
  computed: mapState({
    edit: 'edit',
  }),
})
</script>

<style scoped>

</style>
