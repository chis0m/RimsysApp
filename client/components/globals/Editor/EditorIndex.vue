<template>
  <div class="editor text-white">
    <EditorButtons :editor="editor" :button-select="buttonSelect" />
    <div class="py-2" />
    <EditorContent :editor="editor" />
  </div>
</template>

<script>
import { Editor, EditorContent } from '@tiptap/vue-2'
import StarterKit from '@tiptap/starter-kit'
import EditorButtons from '@/components/globals/Editor/EditorButtons.vue'

export default {
  components: {
    EditorContent,
    EditorButtons,
  },
  props: {
    modelValue: {
      type: String,
      default: '',
    },
  },
  data () {
    return {
      editor: null,
      buttonSelect: ['code_block', 'bold', 'italic',
        'h1', 'h2', 'h3', 'bullet_list', 'ordered_list', 'undo', 'block_quote',
      ],
    }
  },
  watch: {
    modelValue (value) {
      const isSame = this.editor.getHTML() === value
      if (isSame)
        return

      this.editor.commands.setContent(value, false)
    },
  },
  mounted () {
    this.editor = new Editor({
      content: this.modelValue,
      extensions: [
        StarterKit,
      ],
      onUpdate: () => {
        this.$emit('updatedModelValue', this.editor.getHTML())
      },
    })
  },

  beforeDestroy () {
    this.editor.destroy()
  },
}
</script>
