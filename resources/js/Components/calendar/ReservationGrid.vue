<script setup lang="ts">
// Basic grid structure for the reservation calendar
const days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
</script>

<template>
  <div class="grid grid-cols-7 gap-px bg-slate-200 border border-slate-200 rounded-lg overflow-hidden">
    <!-- Header -->
    <div v-for="day in days" :key="day" class="bg-slate-50 p-3 text-center text-sm font-semibold text-slate-700">
      {{ day }}
    </div>
    
    <!-- Calendar Cells -->
    <div v-for="i in 35" :key="i" class="bg-white h-24 p-2 text-xs text-slate-400">
      {{ i }}
    </div>
  </div>
</template>
