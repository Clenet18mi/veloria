<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue'

const isZenMode = ref(false)

const toggleZen = (e: KeyboardEvent) => {
    if (e.ctrlKey && e.key === 'z') {
        isZenMode.value = !isZenMode.value
    }
}

onMounted(() => {
    window.addEventListener('keydown', toggleZen)
})

onUnmounted(() => window.removeEventListener('keydown', toggleZen))

// Export for layouts to consume via provide/inject if needed
</script>

<template>
  <div :class="{'opacity-0 pointer-events-none': isZenMode}" class="transition-opacity duration-500">
      <slot />
  </div>
</template>
