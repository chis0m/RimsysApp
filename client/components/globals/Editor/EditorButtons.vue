<template>
  <div v-if="editor" class="tiptap grid grid-cols-5 sm:grid-cols-8 lg:grid-cols-12 gap-1">
    <button v-if="buttonSelect.includes('all') || buttonSelect.includes('bold') " class="tiptap__button" :class="{ 'is-active': editor.isActive('bold') }" @click="editor.chain().focus().toggleBold().run()">
      bold
    </button>
    <button v-if="buttonSelect.includes('all') || buttonSelect.includes('italic') " class="tiptap__button" :class="{ 'is-active': editor.isActive('italic') }" @click="editor.chain().focus().toggleItalic().run()">
      italic
    </button>
    <button v-if="buttonSelect.includes('all') || buttonSelect.includes('strike') " class="tiptap__button" :class="{ 'is-active': editor.isActive('strike') }" @click="editor.chain().focus().toggleStrike().run()">
      strike
    </button>
    <button v-if="buttonSelect.includes('all') || buttonSelect.includes('clear_marks') " class="tiptap__button" @click="editor.chain().focus().unsetAllMarks().run()">
      clear marks
    </button>
    <button v-if="buttonSelect.includes('all') || buttonSelect.includes('clear_nodes') " class="tiptap__button" @click="editor.chain().focus().clearNodes().run()">
      clear nodes
    </button>
    <button v-if="buttonSelect.includes('all') || buttonSelect.includes('paragraph') " class="tiptap__button" :class="{ 'is-active': editor.isActive('paragraph') }" @click="editor.chain().focus().setParagraph().run()">
      paragraph
    </button>
    <button v-if="buttonSelect.includes('all') || buttonSelect.includes('h1') " class="tiptap__button" :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }" @click="editor.chain().focus().toggleHeading({ level: 1 }).run()">
      h1
    </button>
    <button v-if="buttonSelect.includes('all') || buttonSelect.includes('h2') " class="tiptap__button" :class="{ 'is-active': editor.isActive('heading', { level: 2 }) }" @click="editor.chain().focus().toggleHeading({ level: 2 }).run()">
      h2
    </button>
    <button v-if="buttonSelect.includes('all') || buttonSelect.includes('h3') " class="tiptap__button" :class="{ 'is-active': editor.isActive('heading', { level: 3 }) }" @click="editor.chain().focus().toggleHeading({ level: 3 }).run()">
      h3
    </button>
    <button v-if="buttonSelect.includes('all') || buttonSelect.includes('bullet_list') " class="tiptap__button" :class="{ 'is-active': editor.isActive('bulletList') }" @click="editor.chain().focus().toggleBulletList().run()">
      bullet list
    </button>
    <button v-if="buttonSelect.includes('all') || buttonSelect.includes('ordered_list') " class="tiptap__button" :class="{ 'is-active': editor.isActive('orderedList') }" @click="editor.chain().focus().toggleOrderedList().run()">
      ordered list
    </button>
    <button v-if="buttonSelect.includes('all') || buttonSelect.includes('block_quote') " class="tiptap__button" :class="{ 'is-active': editor.isActive('blockquote') }" @click="editor.chain().focus().toggleBlockquote().run()">
      blockquote
    </button>
    <button v-if="buttonSelect.includes('all') || buttonSelect.includes('hard_break') " class="tiptap__button" @click="editor.chain().focus().setHardBreak().run()">
      hard break
    </button>
    <button v-if="buttonSelect.includes('all') || buttonSelect.includes('undo') " class="tiptap__button" @click="editor.chain().focus().undo().run()">
      undo
    </button>
  </div>
</template>

<script>
export default {
  name: 'EditorButtons',
  props: {
    editor: {
      type: Object,
      required: false,
      default: null,
    },
    buttonSelect: {
      type: Array,
      required: false,
      default: () => ['all'],
    },
  },
}
</script>

<style scoped>
button {
  font-size: 10px;
}
.tiptap__button {
  @apply grid place-items-center text-gray-600 hover:bg-gray-200 py-2 rounded-sm cursor-pointer border border-gray-200;
}

</style>
