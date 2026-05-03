<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import DirectorLayout from '@/layouts/DirectorLayout.vue'
defineProps<{ stats: any }>()
</script>

<template>
  <DirectorLayout>
    <div class="p-6">
      <h1 class="text-3xl font-serif mb-6">CRM Dashboard</h1>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="p-6 bg-white border border-slate-200 rounded-lg shadow-sm">
          <h3 class="text-sm text-slate-500">Total Clients</h3>
          <p class="text-2xl font-bold">1,240</p>
        </div>
        <div class="p-6 bg-white border border-slate-200 rounded-lg shadow-sm">
          <h3 class="text-sm text-slate-500">VIP Members</h3>
          <p class="text-2xl font-bold">85</p>
        </div>
        <div class="p-6 bg-white border border-slate-200 rounded-lg shadow-sm">
          <h3 class="text-sm text-slate-500">Avg Satisfaction</h3>
          <p class="text-2xl font-bold">4.8/5</p>
        </div>
      </div>
    </div>
  </DirectorLayout>
</template>
