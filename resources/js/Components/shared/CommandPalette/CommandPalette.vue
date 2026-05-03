<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue'
import Fuse from 'fuse.js'

const isOpen = ref(false)
const search = ref('')

const actions = [
  { name: 'New Reservation', route: '/reservations/create' },
  { name: 'View Billing', route: '/billing' },
  { name: 'Maintenance Log', route: '/maintenance' },
]

const fuse = new Fuse(actions, { keys: ['name'] })
const results = ref(actions)

const toggle = (e: KeyboardEvent) => {
  if (e.metaKey && e.key === 'k') {
    isOpen.value = !isOpen.value
  }
}

onMounted(() => window.addEventListener('keydown', toggle))
onUnmounted(() => window.removeEventListener('keydown', toggle))
</script>

<template>
  <div v-if="isOpen" class="fixed inset-0 bg-black/50 z-50 flex justify-center p-10">
    <div class="bg-white w-full max-w-lg rounded-lg shadow-xl p-4">
      <input v-model="search" placeholder="Search Veloria..." class="w-full p-2 border-b outline-none">
      <ul class="mt-2">
        <li v-for="res in results" :key="res.name" class="p-2 hover:bg-slate-100 cursor-pointer">
          {{ res.name }}
        </li>
      </ul>
    </div>
  </div>
</template>
