<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue'

const isNotificationOpen = ref(false)
const notifications = ref([
    { id: 1, message: 'Room 101 cleaned', time: '5m ago' },
    { id: 2, message: 'New booking for Smith', time: '12m ago' }
])
</script>

<template>
  <div class="relative">
    <button @click="isNotificationOpen = !isNotificationOpen" class="p-2 hover:bg-slate-100 rounded-full">
      <span class="relative">🔔</span>
    </button>
    <div v-if="isNotificationOpen" class="absolute right-0 mt-2 w-64 bg-white shadow-lg border rounded-lg p-4 z-50">
        <h4 class="font-bold mb-2">Notifications</h4>
        <div v-for="notif in notifications" :key="notif.id" class="text-sm py-1 border-b">{{ notif.message }}</div>
    </div>
  </div>
</template>
